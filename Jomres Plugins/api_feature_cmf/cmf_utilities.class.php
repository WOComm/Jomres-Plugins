<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


class cmf_utilities
{
	
	function __construct()
	{
		require_once("../framework.php");
	}

	/**
	*
	* Ensures that the manager has rights to access this property
	*
	*/
	public static function validate_admin_for_user()
	{

		if ( Flight::get('scopes') != array("*") ) {
			if (empty($result)) {
				Flight::halt(204, "Invalid API Client for accessing Admin endpoints");
			}
		}
	}
	
	/**
	*
	* Checks the request header for the X-JOMRES-channel-name header, if it doesn't exist or it doesn't correspond to the manager's channels, we'll drop out. If it exists we'll set the Flight channel name and channel id for use elsewhere if needed
	*
	*/
	public static function validate_channel_for_user( $channel_name = '' )
	{
		$all_headers = getallheaders();

		if (!empty($all_headers)) {
			foreach ($all_headers as $key => $val ) {
				$new_index = strtoupper($key);
				unset($all_headers[$key]);
				$all_headers[$new_index] = $val;
			}
		}
        //logging::log_message( "Headers ".serialize($all_headers) , 'API', 'DEBUG' , '' );

		if (isset($all_headers['X-JOMRES-CHANNEL-NAME'])) {
			$channel_name = filter_var($all_headers['X-JOMRES-CHANNEL-NAME'], FILTER_SANITIZE_SPECIAL_CHARS);
		} else {
			Flight::halt(204, "Channel not set");
		}


		if (!isset($channel_name) ||  trim($channel_name) == '' ) {
			Flight::halt(204, "Channel not set");
		}

		if ( isset($all_headers['X-JOMRES-PROXY-ID']) && (int)$all_headers['X-JOMRES-PROXY-ID'] > 0 ) {  // Only the "system" OAuth client can send proxy ids. "system" is used by plugins in Jomres to call the cmf rest api functionality, however when working on properties, we need to actually hand over the real property manager's cms id. In essence, the "system" client is only used to get valid tokens and to call the endpoint, from that point onwards, the manager's id is used.
			if ( Flight::get('scopes') == array("*") ) {
				if ( (int)$all_headers['X-JOMRES-PROXY-ID']  == 0 ) {
					Flight::halt(204,  "Incorrect proxy id sent");
				}
				Flight::set('user_id' , (int)$all_headers['X-JOMRES-PROXY-ID'] );
				$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
				$thisJRUser->init_user( (int)$all_headers['X-JOMRES-PROXY-ID'] );

			} else {
				Flight::halt(204, "You cannot use proxy ids.");
			}
		} else {
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			$thisJRUser->init_user( Flight::get('user_id') );
		}

		if (Flight::get('user_id') == 0 ) {
			Flight::halt(204,  "Manager ID not found");
		}

		$query = "SELECT `id` FROM #__jomres_channelmanagement_framework_channels WHERE `cms_user_id` =".Flight::get('user_id')." AND `channel_name` = '".$channel_name."' LIMIT 1";
		$result = doSelectSql($query , 1 );
		if ( empty($result) || is_null($result) ) {
			Flight::halt(204, "User ".Flight::get('user_id')." does not have access to this channel ".$channel_name);
		}

		Flight::set('channel_header' , 'X-JOMRES-CHANNEL-NAME' );
		Flight::set('channel_name' , $channel_name );
		Flight::set('channel_id' , (int)$result );
	}
	
	/**
	*
	* Ensures that the manager has rights to access this property
	*
	*/
	public static function validate_property_uid_for_user( $property_uid = 0 )
	{
		if ($property_uid == 0 ) {
			Flight::halt(204, "Property uid not passed");
		}
		
		// Security
		$mrConfig = getPropertySpecificSettings($property_uid);
		if (!isset($mrConfig['api_privacy_off'])) { // CMF exposure is about allowing a property to be revealed to all REST API callers, regardless of whether or not the calling channel created the property. If exposure is allowed we will just check that the property is in the manager's allowed properties list. If it's not then we will check that the property was created by the calling channel
			$api_privacy_off = false;
		} else {
			$api_privacy_off = (bool) $mrConfig['api_privacy_off'];
		}

		if ( !$api_privacy_off ) {
			$query = "SELECT id FROM `#__jomres_channelmanagement_framework_property_uid_xref` WHERE `property_uid` = ".$property_uid." AND `channel_id` =  ".Flight::get('channel_id')." AND `cms_user_id` = ".(int)Flight::get('user_id') ;
			$result = doSelectSql($query);
			if (empty($result)) {
				Flight::halt(204, "Manager ".(int)Flight::get('user_id')." does not have access to property ".$property_uid." on channel ".Flight::get('channel_id')." , or the property does not exist.");
			}
		} else {
			cmf_utilities::validate_property_is_in_managers_authorised_properties_list($property_uid);
		}
		Flight::set('response_envelope_property_uid' , $property_uid );
	}

	/**
	 *
	 * Confirm that the manager has readonly access to this property
	 *
	 * Intended for when the calling script is jomres2jomres, we validate that the property uid exists in the authorisedproperties variable, and if so then we allow the user to see this information
	 *
	 */
	public static function validate_property_is_in_managers_authorised_properties_list( $property_uid = 0 )
	{
		if ($property_uid == 0 ) {
			Flight::halt(204, "Property uid not passed");
		}

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		$thisJRUser->init_user(Flight::get('user_id'));

		if (!empty($thisJRUser->authorisedProperties)) {
			if (!in_array($property_uid, $thisJRUser->authorisedProperties) ) {
				Flight::halt(204, "Manager not authorised to view property");
			}
		} else {
			Flight::halt(204, "Manager has no properties");
		}
	}


	/**
	*
	* Get cache contents and exit
	*
	* The webhook watcher should clear the temporary directory any time the property is changed
	* 
	*/
	
	public static function cache_read($property_uid  , $general_data = false  )
	{
		// Needs to be checked before it's considered ready for action
		return;

		$hash = 'sha256';
		$algos = hash_algos();
		if ( in_array( 'sha512' , $algos ) ) {
			$hash = 'sha512';
		}

		if (!$general_data ) {
			$temp_path = JOMRES_TEMP_ABSPATH."cmf_rest_api";
		} else {
			$temp_path = JOMRES_TEMP_ABSPATH."cmf_rest_api".JRDS."general";
		}

		if (!is_dir( JOMRES_TEMP_ABSPATH."cmf_rest_api")) {
			if (!mkdir( JOMRES_TEMP_ABSPATH."cmf_rest_api")) {
				Flight::halt(500, "Can't create temporary directory ". JOMRES_TEMP_ABSPATH."cmf_rest_api");
			}
		}

		if (!is_dir($temp_path)) {
			if (!mkdir($temp_path)) {
				Flight::halt(500, "Can't create temporary directory ".$temp_path);
			}
		}
		
		if (!is_dir($temp_path.JRDS.$property_uid)) {
			if (!mkdir($temp_path.JRDS.$property_uid)) {
				Flight::halt(500, "Can't create temporary directory ".$temp_path.JRDS.$property_uid);
			}
		}
		
		$request = Flight::request();
		$url = $request->url;
		$file_name = hash($hash , $url).".php";

		if (file_exists($temp_path.JRDS.$property_uid.JRDS.$file_name)) {
			include($temp_path.JRDS.$property_uid.JRDS.$file_name);
			if (class_exists("cmf_cache_contents") ) {
				$cache_contents = new cmf_cache_contents();
				Flight::json( $cache_contents->response_name , $cache_contents->response_contents );
			}
		}
	}
	
	/**
	*
	* Write to the cache file
	*
	* 
	* General data refers to information that is not specific to any property uid
	*/
	
	public static function cache_write($property_uid , $response_name = '' , $response_contents = ''  , $general_data = false )
	{
		// Needs to be checked before it's considered ready for action
		return;

		$hash = 'sha256';
		$algos = hash_algos();
		if ( in_array( 'sha512' , $algos ) ) {
			$hash = 'sha512';
		}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		if ($jrConfig['development_production'] == 'development') { // If we are in development mode, we don't want to use caching
			return;
		}

		if (!$general_data ) {
			$temp_path = JOMRES_TEMP_ABSPATH."cmf_rest_api";
		} else {
			$temp_path = JOMRES_TEMP_ABSPATH."cmf_rest_api".JRDS."general";
		}
		if (!is_dir($temp_path)) {
			if (!mkdir($temp_path)) {
				Flight::halt(500, "Can't create temporary directory");
			}
		}
		
		if (!is_dir($temp_path.JRDS.$property_uid)) {
			if (!mkdir($temp_path.JRDS.$property_uid)) {
				Flight::halt(500, "Can't create temporary directory");
			}
		}
		
		$request = Flight::request();
		$url = $request->url;
		$file_name = hash($hash , $url).".php";

		if (!file_exists($temp_path.JRDS.$property_uid.JRDS.$file_name)) {
			$cache_contents = '<?php
				defined( \'_JOMRES_INITCHECK\' ) or die( \'\' );
				class cmf_cache_contents
					{
						public function __construct()
						{
							$this->response_name = "'.$response_name.'" ;
							$this->response_contents = unserialize(\''.serialize($response_contents).'\') ;
						}
					}
				';

			file_put_contents($temp_path.JRDS.$property_uid.JRDS.$file_name, $cache_contents);
		}
	}
	
	/**
	*
	* Uses existing functional in Jomres to build an object of jomres_properties which is then handed back
	*
	*/
	public static function get_property_object_for_update( $property_uid = 0 , $detailed = false )
	{
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		//jomres properties object
		$jomres_properties = jomres_singleton_abstract::getInstance('jomres_properties');
		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data($property_uid);
		
		$jomres_properties->propertys_uid = $property_uid;
		
		$jomres_properties->property_name					= $current_property_details->multi_query_result[$property_uid]['property_name'];
		$jomres_properties->property_street					= $current_property_details->multi_query_result[$property_uid]['property_street'];
		$jomres_properties->property_town					= $current_property_details->multi_query_result[$property_uid]['property_town'];
		$jomres_properties->property_region					= $current_property_details->multi_query_result[$property_uid]['property_region_id'];
		$jomres_properties->property_country				= $current_property_details->multi_query_result[$property_uid]['property_country_code'];
		$jomres_properties->property_postcode				= $current_property_details->multi_query_result[$property_uid]['property_postcode'];
		$jomres_properties->property_tel					= $current_property_details->multi_query_result[$property_uid]['property_tel'];
		$jomres_properties->property_fax					= $current_property_details->multi_query_result[$property_uid]['property_fax'];
		$jomres_properties->property_email					= $current_property_details->multi_query_result[$property_uid]['property_email'];
		$jomres_properties->metatitle						= $current_property_details->multi_query_result[$property_uid]['metatitle'];
		$jomres_properties->metadescription					= $current_property_details->multi_query_result[$property_uid]['metadescription'];
		$jomres_properties->metakeywords					= $current_property_details->multi_query_result[$property_uid]['metakeywords'];
		$jomres_properties->price							= $current_property_details->multi_query_result[$property_uid]['real_estate_property_price'];
		$jomres_properties->lat								= $current_property_details->multi_query_result[$property_uid]['lat'];
		$jomres_properties->long							= $current_property_details->multi_query_result[$property_uid]['long'];
		$jomres_properties->ptype_id						= $current_property_details->multi_query_result[$property_uid]['ptype_id'];
		$jomres_properties->stars							= $current_property_details->multi_query_result[$property_uid]['stars'];
		$jomres_properties->superior						= $current_property_details->multi_query_result[$property_uid]['superior'];
		$jomres_properties->cat_id							= $current_property_details->multi_query_result[$property_uid]['cat_id'];
		$jomres_properties->permit_number					= $current_property_details->multi_query_result[$property_uid]['permit_number'];
		$jomres_properties->property_features				= $current_property_details->multi_query_result[$property_uid]['property_features'];
		$jomres_properties->published						= $current_property_details->multi_query_result[$property_uid]['published'];
		
		$jomres_properties->property_description			= $current_property_details->multi_query_result[$property_uid]['property_description'];
		$jomres_properties->property_checkin_times			= $current_property_details->multi_query_result[$property_uid]['property_checkin_times'];
		$jomres_properties->property_area_activities		= $current_property_details->multi_query_result[$property_uid]['property_area_activities'];
		$jomres_properties->property_driving_directions		= $current_property_details->multi_query_result[$property_uid]['property_driving_directions'];
		$jomres_properties->property_airports				= $current_property_details->multi_query_result[$property_uid]['property_airports'];
		$jomres_properties->property_othertransport			= $current_property_details->multi_query_result[$property_uid]['property_othertransport'];
		$jomres_properties->property_policies_disclaimers	= $current_property_details->multi_query_result[$property_uid]['property_policies_disclaimers'];

		if (isset($current_property_details->multi_query_result[$property_uid]['rooms'])) {
			$jomres_properties->room_info['rooms']				= $current_property_details->multi_query_result[$property_uid]['rooms'];
			$jomres_properties->room_info['rooms_by_type']		= $current_property_details->multi_query_result[$property_uid]['rooms_by_type'];
			$jomres_properties->room_info['room_types']			= $current_property_details->multi_query_result[$property_uid]['room_types'];
			$jomres_properties->room_info['rooms_max_people']	= $current_property_details->multi_query_result[$property_uid]['rooms_max_people'];
		}


		$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
		$jomres_media_centre_images->get_images($property_uid);
		if ( isset($jomres_media_centre_images->multi_query_images[$property_uid]['property'])) {
			$jomres_properties->images['property'] = $jomres_media_centre_images->multi_query_images[$property_uid]['property'];
		}
		if ( isset($jomres_media_centre_images->multi_query_images[$property_uid]['slideshow'])) {
			$jomres_properties->images['slideshow'] = $jomres_media_centre_images->multi_query_images[$property_uid]['slideshow'];
		}

		$jomres_properties->images['image_relative_path'] = get_showtime('live_site');

		$query = "SELECT  `params` FROM #__jomres_channelmanagement_framework_rooms_xref WHERE `property_uid` = ".$property_uid." AND `channel_id` = ".Flight::get('channel_id')." LIMIT 1";
		$existing_rooms = doSelectSql( $query , 2 );
		if (isset($existing_rooms['params'])) {
			$params  = unserialize($existing_rooms['params']);
			$jomres_properties->rooms = $params;
		}
		
		$query = 'SELECT `rates_uid`,`rate_title`,`rate_description`,`validfrom`,`validto`,
			`roomrateperday`,`mindays`,`maxdays`,`minpeople`,`maxpeople`,`roomclass_uid`,
			`ignore_pppn`,`allow_ph`,`allow_we`
			FROM #__jomres_rates WHERE property_uid = ' .$property_uid.' ORDER BY rate_title,roomclass_uid,validto';
		$tariffsList = doSelectSql($query);
		if (!empty($tariffsList)) {
			$jomres_properties->tariffs = $tariffsList;
		}

		if ($detailed) {
			
			$jomres_properties->other_settings = array();
			
			$jomres_properties->other_settings['cleaning_fee'] = 0.0;

			$call_self = new call_self( );
			$elements = array(
				"method"=>"GET",
				"request"=>"cmf/property/cleaningfee/".$property_uid,
				"data"=>array(),
				"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
				);
			
			$response = json_decode(stripslashes($call_self->call($elements)));
			
			if ( isset($response->data->response)) {
				$jomres_properties->other_settings['cleaning_fee'] = $response->data->response;
			}
			
			$jomres_properties->other_settings['security_deposit'] = 0.0;
			
			$call_self = new call_self( );
			$elements = array(
				"method"=>"GET",
				"request"=>"cmf/property/securitydeposit/".$property_uid,
				"data"=>array(),
				"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
				);
			
			$response = json_decode(stripslashes($call_self->call($elements)));
			
			if ( isset($response->data->response)) {
				$jomres_properties->other_settings['security_deposit'] = $response->data->response;
			}


		}

		$jomres_properties->remote_data = cmf_utilities::get_property_remote_data ( $property_uid );
		
		return $jomres_properties ; 
	}
	
	/**
	*
	* Save an instance of jomres_properties
	*
	*/
	public static function update_property( $jomres_properties )
	{

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		$jomres_countries = jomres_singleton_abstract::getInstance('jomres_countries');
		$jomres_countries->get_all_countries();
		if ( !array_key_exists( $jomres_properties->property_country , $jomres_countries->countries ) ) {
			Flight::halt(204, "Country incorrect");
		}
	
		$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
		$jomres_property_types->get_all_property_types();
		if (!array_key_exists( $jomres_properties->ptype_id , $jomres_property_types->property_types ) ) {
			Flight::halt(204, "Property type id incorrect");
		}

		$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
		$jomres_regions->get_all_regions();
		if ( !array_key_exists ($jomres_properties->property_region , $jomres_regions->regions ) ) {
			Flight::halt(204, "Region id incorrect");
		}
	
		if ( $jomres_properties->stars > 5 ) {
			Flight::halt(204, "Stars cannot be greater than 5");
		}
		
		if ( $jomres_properties->stars < 0 ) {
			Flight::halt(204, "Stars cannot be less than 0");
		}
		
		if ( $jomres_properties->superior > 1 ) {
			Flight::halt(204, "superior cannot be greater than 1");
		}
		
		if ( $jomres_properties->superior < 0 ) {
			Flight::halt(204, "superior cannot be less than 0");
		}
		
		if ($jrConfig[ 'limit_property_country' ] == '1') {
			$jomres_properties->property_country = $jrConfig[ 'limit_property_country_country' ];
		}
		
		if (is_string($jomres_properties->property_features)) {
			$jomres_properties->property_features = explode ("," , $jomres_properties->property_features);
			foreach ($jomres_properties->property_features as $key => $val ) {
				if ($val == "0" || $val == '' ) {
					unset($jomres_properties->property_features[$key]);
				}
			}
		}
		
		$jomres_properties->commit_update_property();

		// These shouldn't be editable via the CMF, so we'll unset them for the purpose of the REST API
		unset($jomres_properties->all_property_uids);
		unset($jomres_properties->apikey);
		unset($jomres_properties->property_mappinglink);
		unset($jomres_properties->property_site_id);
		
		return $jomres_properties ; 
	}
	
	/**
	* Get the property's channel management remote data
	*/
	public static function get_property_remote_data ( $property_uid ) 
	{
		$remote_data = new stdClass();
		
		$query = 'SELECT `remote_data` FROM `#__jomres_channelmanagement_framework_property_uid_xref` WHERE property_uid = '.$property_uid.' LIMIT 1';
		$data = doSelectSql($query,1);

		// Need to base64 encode/decode this data because it's easy to corrupt serialized data when the allowed data is arbitrary
		if ( $data != '' && $data != false ) {
			$decoded = unserialize(base64_decode($data));
				return $decoded;
			}
		
		return $remote_data;
	}
	
	/**
	* Set the property's channel management remote data
	*/
	public static function set_property_remote_data ( $property ) 
	{
		if (isset($property->remote_data) || !is_null($property->remote_data) ) {
			$query = 'UPDATE `#__jomres_channelmanagement_framework_property_uid_xref` SET `remote_data` = \''.base64_encode(serialize($property->remote_data)).'\' WHERE property_uid = '.$property->propertys_uid.' LIMIT 1';
			doInsertSql($query);
		}
	}
		
	/**
	* 
	*/
	public static function modify_property_rooms( $property_uid , $room_type )
	{
		jr_import('jrportal_rooms');
		$jrportal_rooms = new jrportal_rooms();

		$jrportal_rooms->rooms_generator['propertys_uid'] = (int) $property_uid;
		$jrportal_rooms->rooms_generator['number_of_rooms'] = (int)$room_type->count;
		$jrportal_rooms->rooms_generator['room_classes_uid'] = (int)$room_type->amenity->jomres_id;
		$jrportal_rooms->rooms_generator['max_people'] = (int)$room_type->max_guests;
		$jrportal_rooms->rooms_generator['delete_existing_rooms'] = false;

		$jrportal_rooms->commit_new_rooms();
		
	}
	
	/**
	* 
	*/
	public static function get_property_bookings( $property_uid )
	{
		$conn = Flight::db();
		$conn->query("SET NAMES 'UTF8'");

		$query = "SELECT a.`room_uid` , a.`contract_uid` , a.`black_booking` , a.`date` , b.`room_uid` , b.`room_name` , b.`room_number` FROM ".Flight::get("dbprefix")."jomres_room_bookings `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_rooms `b` ON a.`room_uid` = b.`room_uid` WHERE a.`property_uid` = :property_uid ORDER BY a.`date` ASC ";

		$stmt = $conn->prepare( $query );
		$stmt->execute([ 'property_uid' => $property_uid ]);
		
		$bookingslist = array();

		while ($row = $stmt->fetch())
			{
			$bookingslist[] = array (
				"room_uid"	=> $row['room_uid'],
				"room_name"	=> $row['room_name'],
				"room_number"   => $row['room_number'],
				"contract_uid"	=> $row['contract_uid'],
				"black_booking"	=> (int)$row['black_booking'],
				"date"			=> str_replace("/" , "-" , $row['date'])
				);
			}
			
		return $bookingslist;
	
	}
		
	/**
	* 
	*/
	public static function organise_bookings_by_date( $bookings )
		{
			$bookings_dates = array();
			if (!empty($bookings)) {
				
				// First we will find the first and last dates. The list of bookings should be passed to us in date order, however we will assume that it isn't and sort the array afterwards
				
				foreach ( $bookings as $booking ) {
					
					$bookings_dates[] = $booking['date'];
				}
				
				usort($bookings_dates, "cmf_util_date_sort");
			}
			return $bookings_dates;
		}
	
	public static function validate_date( $date )
	{
		$d = DateTime::createFromFormat('Y-m-d', $date);
		// The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
		return $d && $d->format('Y-m-d') === $date;
	}

	public static function get_date_ranges ( $start , $end , $include_last_day = false )
	{

		if ( !cmf_utilities::validate_date($start) ) {
			Flight::halt(204, "Start date incorrect, must be in Y-m-d format");
			}
		

		if ( !cmf_utilities::validate_date($end) ) {
			Flight::halt(204, "End date incorrect, must be in Y-m-d format");
			}
		
		if (!$include_last_day) {
			$end_date_adjusted = date('Y-m-d', strtotime($end.' +1 day'));
		} else {
			$end_date_adjusted = date('Y-m-d', strtotime($end.' +2 days'));
		}
		

		$period = new DatePeriod(
			 new DateTime($start),
			 new DateInterval('P1D'),
			 new DateTime($end_date_adjusted)
		);
		
		$dates_array = array();
		foreach ($period as $key => $value) {
			$val = $value->format('Y-m-d');
			$dates_array[$val] = array();
		}
		return $dates_array;
	}
	
	/**
	* Receives a nett value, responds with formatted pricing
	*/
	
	public static function get_pricing_response( $property_uid = 0 , $price_excluding_vat = 0 )
	{
		if ( $property_uid == 0 ) {
			Flight::halt(204, "Property uid not set");
			}
			
		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data($property_uid);
	
		$mrConfig = getPropertySpecificSettings($property_uid);
		
		$output_price = output_price( $price_excluding_vat , '' , false , true , false );
		$currency_code = output_price( $price_excluding_vat , '' , false , true , true );
		
		$price_including_vat =  $current_property_details->get_gross_accommodation_price($price_excluding_vat, $property_uid);
			
		$response = array (
			"display_price"			=> $output_price,
			"price_excluding_vat" 	=> $price_excluding_vat,
			"price_including_vat" 	=> $price_including_vat,
			"currency_code"			=> $currency_code
			);
			
		return $response;
	}
	
	/**
	* Receives a the booking total value, responds with the calculated deposit
	*/

/* 				case 2:
					$settings['depositIsPercentage'] = "1";
					$settings['depositValue'] = $deposit_value;
					break;
				case 3:
					$settings['depositIsPercentage'] = "1";
					$settings['depositValue'] = $deposit_value;
					break;
				case 4:
					$settings['depositIsPercentage'] = "0"; // Type 4 in Jomres is not supported, so we will go with fixed amount per stay instead
					$settings['chargeDepositYesNo'] = $deposit_value;
					break;
				case 5:
					$settings['depositIsPercentage'] = "0";
					$settings['chargeDepositYesNo'] = $deposit_value;
					break; */
	
	public static function calculate_deposit( $property_uid = 0 , $booking_total = 0 , $days_in_booking = 0)
	{
		if ( $property_uid == 0 ) {
			Flight::halt(204, "Property uid not set");
			}
	
		$deposit_value = 0.0;
		$cleaning_fee  = 0.0;
		$security_deposit = 0.0;
		
		$cmf_temp_data_security_fee_found = (bool)get_showtime("cmf_temp_data_security_fee_found");
		
		if (!$cmf_temp_data_security_fee_found) {
			$call_self = new call_self( );
			$elements = array(
				"method"=>"GET",
				"request"=>"cmf/property/securitydeposit/".$property_uid,
				"data"=>array(),
				"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
				);
			
			$response = json_decode(stripslashes($call_self->call($elements)));
			
			if (isset($response->data->response) && $response->data->response > 0 ) {
				$security_deposit = (float)$response->data->response;
			}
			set_showtime("cmf_temp_data_security_fee_found" , true );
			set_showtime("cmf_temp_data_security_fee" , $security_deposit );
		} else {
			$security_deposit = (float)get_showtime("cmf_temp_data_security_fee");
		}
		
	
		$cmf_temp_data_cleaning_fee_found = (bool)get_showtime("cmf_temp_data_cleaning_fee_found");
		
		if (!$cmf_temp_data_cleaning_fee_found) {
			$call_self = new call_self( );
			$elements = array(
				"method"=>"GET",
				"request"=>"cmf/property/cleaningfee/".$property_uid,
				"data"=>array(),
				"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
				);
					
			$response = json_decode(stripslashes($call_self->call($elements)));

			if (isset($response->data->response) && $response->data->response > 0 ) {
				$cleaning_fee = (float)$response->data->response;
			}
			set_showtime("cmf_temp_data_cleaning_fee_found" , true );
			set_showtime("cmf_temp_data_cleaning_fee" , $cleaning_fee );
		} else {
			$cleaning_fee = (float)get_showtime("cmf_temp_data_cleaning_fee");
		}
		
		$cmf_temp_data_deposit_type_found = (bool)get_showtime("cmf_temp_data_deposit_type_found");
		
		if (!$cmf_temp_data_deposit_type_found) {
			$call_self = new call_self( );
			$elements = array(
				"method"=>"GET",
				"request"=>"cmf/property/deposit/type/".$property_uid,
				"data"=>array(),
				"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
				);
			
			$response = json_decode(stripslashes($call_self->call($elements)));

			if (!isset($response->data->response)) {
				Flight::halt(204, "Cannot determine deposit setting for property");
			}
			
			set_showtime("cmf_temp_data_deposit_type_found" , true );
			set_showtime("cmf_temp_data_deposit_type" , $response->data->response );
			$deposit_type = $response->data->response;
		} else {
			$deposit_type = get_showtime("cmf_temp_data_deposit_type");
		}
		
		
		$mrConfig = getPropertySpecificSettings($property_uid);
		

		// The booking_total should be the exclusive of vat price, so there's no need to find ex-vat prices
		
		switch ($deposit_type) {
			case 1: // No deposit
				$desposit_value = 0.0;
				break;
			case 2: // Percentage of total price (without cleaning)
					$percentage_value = (float)$mrConfig['depositValue'];
					$deposit_value = ($booking_total / 100 ) * $percentage_value;
				break;
			case 3: // Percentage of total price (including cleaning)
					$percentage_value = (float)$mrConfig['depositValue'];
					$deposit_value = ($booking_total / 100 ) * $percentage_value;
					$cleaning_fee = 0;
				break;
			case 4: // Fixed amount per day // Not supported in Jomres Core, so we will fall back to using fixed amount instead
			case 5: // Flat amount per stay
					$deposit_value = (float)$mrConfig['depositValue'];
				break;
			default:
				Flight::halt(204, "Cannot calculate deposit based on deposit settings");
				break;
		}

		$deposit_response = array (
			"deposit_type" => $deposit_type,
			"deposit" => $deposit_value,
			"cleaning" => $cleaning_fee,
			"security" => $security_deposit
			
		);

		return $deposit_response;
	}
	
	public static function build_booking_output( $contract , $property_uid = 0 , $linked_bookings = array() , $room_types_booked = array() )
	{
		if ( $property_uid == 0 ) {
			Flight::halt(204, "Property uid not set");
			}
			
		if ( !isset($contract->booking_id ) ) {
			Flight::halt(204, "Booking not sent");
			}
		
		jr_import('jomres_encryption');
		$jomres_encryption = new jomres_encryption();
	
		$cmf_temp_data_booking_status_texts_found = (bool)get_showtime("cmf_temp_data_booking_status_texts_found");
		
		if (!isset($cmf_temp_data_booking_status_texts_found) || $cmf_temp_data_booking_status_texts_found == false) {
			$call_self = new call_self( );
			$elements = array(
				"method"=>"GET",
				"request"=>"cmf/list/booking/statuses/",
				"data"=>array(),
				"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
				);
			
			$booking_statuses = json_decode(stripslashes($call_self->call($elements)));
			
			$booking_status_texts_array = array();
			if ( isset($booking_statuses->data->response)) {
				$tmp = (array)$booking_statuses->data->response;
				foreach ($tmp as $key => $val ) { // Convert the keys to integers
					$booking_status_texts_array[ (int) $key] = $val;
				}
			}
			set_showtime("cmf_temp_data_booking_status_texts_found" , true );
			set_showtime("cmf_temp_data_booking_status_texts" , $booking_status_texts_array );
		} else {
			$booking_status_texts_array = get_showtime("cmf_temp_data_booking_status_texts");
		}

		
		
		$basic_guest_type_details = jomres_singleton_abstract::getInstance( 'basic_guest_type_details' ); // It's a singleton so no need to cache it
		$basic_guest_type_details->get_all_guest_types($property_uid);
	
		$guest_numbers = array( "adults" => 0 , "children" => 0);
		if ( trim($contract->guest_types) != '' ) {
			$guest_types_arr = explode ("," , $contract->guest_types );
			if (!empty($guest_types_arr)) {
				foreach ($guest_types_arr as $gt) {
					$bang = explode ( "_" , $gt);
					if ($bang[0] == 'guesttype' ) {
						$id = $bang[1];
						$quantity = $bang[2];
						$value = $bang[3];
						if ( isset($basic_guest_type_details->guest_types[$id])) {
							$guest_type_record = $basic_guest_type_details->guest_types[$id];
							if ( $guest_type_record['is_child'] == "1" ) {
								$guest_numbers['children'] = $guest_numbers['children'] + $quantity;
							} else {
								$guest_numbers['adults'] =$guest_numbers['adults'] + $quantity;
							}
						}
					}
				}
			}
		}

		if ( $guest_numbers['adults'] > 0 || $guest_numbers['children'] ) {
            $guest_numbers['number_of_guests'] = $guest_numbers['adults'] + $guest_numbers['children'] ;
        } else {
            $guest_numbers['number_of_guests'] = 2;
        }

		
		$booking_status = 1;
		if ( $contract->noshow_flag == "0" && $contract->cancelled == "0" ) {
			if ( $contract->booked_in == "0" && $contract->bookedout == "0" ) {
				if ( $contract->approved == "1" ) { // Approved
					$booking_status = 3;
				} else {
					if ( $contract->deposit_paid == "0" ) { // New, deposit paid (not approved)
						$booking_status = 2; 
					} else { // New, deposit not paid (not approved)
						$booking_status = 1; 
					}
				}
			} else {
				if ( $contract->bookedout == "1" ) { // Booked out
					$booking_status = 5; 
				} else {  // Booked in
					$booking_status = 4;
				}
			}
		} else { 
			if ( $contract->rejected == "1" ) { // Rejected
				$booking_status = 8;
			} else {
				if ( $contract->noshow_flag == "1" ) { // Marked as no show
					$booking_status = 7;
				} else { // Booking cancelled
					$booking_status = 6;
				}
			}
		}
			
		$already_paid = 0;
		if ( $contract->deposit_paid == "0" ) {
			$already_paid = $contract->deposit_required;
		}
			
		$mapping = array ();



		if ( array_key_exists(  $contract->booking_id , $linked_bookings)) {
			$mapping['linked_bookings'] =  $linked_bookings[$contract->booking_id] ;
		}

		$status_text = "No description";
		if (isset($booking_status_texts_array[ (string)$booking_status ])) {
			$status_text = $booking_status_texts_array[(string)$booking_status];
		}

		$booking = array (
			"booking_id"			=> $contract->booking_id,
			"booking_number"		=> $contract->booking_number,
			"invoice_id"			=> $contract->invoice_id,
			"invoice_number"		=> $contract->invoice_number,
			"comments"				=> $contract->special_reqs,
				
			"status" => array ( "status_code" => $booking_status , "status_text" => $status_text ),
				
			"property_uid"			=> $contract->property_uid,
				
			"booking_created"		=> date('Y-m-d H:i:s', strtotime($contract->booking_created) ),
			"last_modified"			=> date('Y-m-d H:i:s', strtotime($contract->last_changed) ),
				
			"date_from"				=> str_replace("/" , "-" , $contract->arrival),
			"date_to"				=> date('Y-m-d', strtotime($contract->departure.' -1 day')),
			"booking_total"			=> $contract->contract_total,
			"deposit_amount"		=> $contract->deposit_required,
			"deposit_paid"			=> (bool)$contract->deposit_paid,
			"currency_code"			=> $contract->currency_code,
				
			"referrer"				=> $contract->referrer,
				
			"mapping"				=> $mapping,
				
			"guest_numbers"			=> $guest_numbers,

			"room_types_booked"			=> $room_types_booked,

			"guest_data" => array (
				"guest_id"				=> $contract->guests_uid,
				"guest_system_id"		=> $contract->mos_userid,
				"enc_firstname"			=> $jomres_encryption->decrypt($contract->enc_firstname),
				"enc_surname"			=> $jomres_encryption->decrypt($contract->enc_surname),
				"enc_house"				=> $jomres_encryption->decrypt($contract->enc_house),
				"enc_street"			=> $jomres_encryption->decrypt($contract->enc_street),
				"enc_city"				=> $jomres_encryption->decrypt($contract->enc_town),
				"enc_region"			=> jomres_decode(find_region_name($jomres_encryption->decrypt($contract->enc_county))),
				"country"				=> getSimpleCountry($jomres_encryption->decrypt($contract->enc_country)),
				"country_code"			=> $jomres_encryption->decrypt($contract->enc_country),
					"enc_postcode"			=> $jomres_encryption->decrypt($contract->enc_postcode),
					"enc_preferences"		=> $jomres_encryption->decrypt($contract->enc_preferences),
					"enc_tel_landline"		=> $jomres_encryption->decrypt($contract->enc_tel_landline),
					"enc_tel_mobile"		=> $jomres_encryption->decrypt($contract->enc_tel_mobile),
					"enc_email"				=> $jomres_encryption->decrypt($contract->enc_email)
				)
			);
		return $booking;
	}
	
	/**
	*
	*
	* Given an array of dates we'll walk through the dates to build ranges
	*
	*/
	public static function build_date_sets( $dates_array = array() )
	{
	 	// prepare results array
		$multi = array();

		// take the first date from the submitted array
		$group_start = array_shift($dates_array);
		$timestamp_previous_iteration = strtotime($group_start);

		// iterate over remaining values
		foreach ($dates_array as $date) {
			// calculate current iteration's timestamp
			$timestamp_current = strtotime($date);

			// calculate timestamp for 1 day before the current value
			$timestamp_yesterday = strtotime('-1 day', $timestamp_current);

			if ($timestamp_previous_iteration != $timestamp_yesterday) {
				// create group...
				$multi[$group_start] = date('Y-m-d', $timestamp_previous_iteration);
				// ...and store the next group's start date
				$group_start = $date;
			}

			// log timestamp for next iteration
			$timestamp_previous_iteration = $timestamp_current;
		}

		// add final group
		$multi[$group_start] = date('Y-m-d', $timestamp_previous_iteration);

		$result = array();
		foreach ($multi as $key=>$val) {
			$result[] = array($key , $val );
		}
		return $result;
	}
	
	/**
	*
	* Create the booking
	* 
	* This method doesn't do input filtering as that's the responsibility of the calling script
	* 
	*/
	public static function add_booking( $booking = null )
	{
		if ( trim($booking->remote_reservation_id) == '' )	{ return (object) array( "success" => false , "message" => "Remote reservation id not set "); }
		if ( trim($booking->referrer) == '' )				{ return (object) array( "success" => false , "message" => "referrer not set "); }
		if ( trim($booking->guest_name) == '' )				{ return (object) array( "success" => false , "message" => "guest_name not set "); }
		if ( trim($booking->guest_surname) == '' )			{ return (object) array( "success" => false , "message" => "guest_surname not set "); }
		if ( trim($booking->guest_email) == '' )			{ return (object) array( "success" => false , "message" => "guest_email not set "); }
		if ( trim($booking->guest_phone) == '' )			{ return (object) array( "success" => false , "message" => "guest_phone not set "); }
		if ( trim($booking->guest_address) == '' )			{ return (object) array( "success" => false , "message" => "guest_address not set "); }
		if ( trim($booking->guest_post_code) == '' )		{ return (object) array( "success" => false , "message" => "guest_post_code not set "); }
		if ( trim($booking->guest_country_code) == '' )		{ return (object) array( "success" => false , "message" => "guest_country_code not set "); }
		if ( trim($booking->guest_language_id) == '' )		{ return (object) array( "success" => false , "message" => "guest_language_id not set "); }
		
		if ( trim($booking->property_uid) == '' )			{ return (object) array( "success" => false , "message" => "property_uid not set "); }
		if ( trim($booking->date_from) == '' )				{ return (object) array( "success" => false , "message" => "date_from not set "); }
		if ( trim($booking->date_to) == '' )				{ return (object) array( "success" => false , "message" => "date_to not set "); }
		if ( trim($booking->client_price) == '' )			{ return (object) array( "success" => false , "message" => "client_price not set "); }
		if ( trim($booking->channel_price) == '' )			{ return (object) array( "success" => false , "message" => "channel_price not set "); }
		if ( trim($booking->already_paid) == '' )			{ return (object) array( "success" => false , "message" => "already_paid not set "); }

		$query = "SELECT contract_uid FROM #__jomres_contracts WHERE tag = '".$booking->remote_reservation_id."' AND property_uid = ".$booking->property_uid." LIMIT 1";
		$bklist = doSelectSql($query);
		if (!empty($bklist)) { // The booking has already been imported into the system previously, we'll return
			 (object) array( "success" => false , "message" => "Booking number already exists");
		}

		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data( $booking->property_uid );

		$reply = (object) array( 
			"property_uid" => $booking->property_uid,
			"date_from" => $booking->date_from,
			"date_to" => $booking->date_to,
			"property_name" => jomres_decode($current_property_details->property_name)
			);

		$propertyConfig = jomres_singleton_abstract::getInstance( 'jomres_config_property_singleton' );
		$propertyConfig->property_config['requireApproval'] ="0"; // We need to directly access the singleton to set requireApproval to 0 so that the booking doesn't require approval later. We can't use the approval functionality here as that requires tempbookingdata to allow the customer to complete the payment, which of course doesn't exist as they've not come through the Jomres booking engine. 
		
		$mrConfig = getPropertySpecificSettings( $booking->property_uid );
		$currency_code = $mrConfig['property_currencycode'];
		
		jr_import( 'jomres_generic_booking_insert' );
		$bkg = new jomres_generic_booking_insert();

		$bkg->guest_details['firstname']	= $booking->guest_name;
		$bkg->guest_details['surname']		= $booking->guest_surname;
		$bkg->guest_details['house']		= "";
		$bkg->guest_details['street']		= $booking->guest_address;
		$bkg->guest_details['town']			= '';
		$bkg->guest_details['region']		= '';
		$bkg->guest_details['country']		= $booking->guest_country_code ;
		$bkg->guest_details['postcode']		= $booking->guest_post_code;
		$bkg->guest_details['tel_landline']	= $booking->guest_phone;
		$bkg->guest_details['tel_mobile']	= $booking->guest_phone;
		$bkg->guest_details['email']		= $booking->guest_email ;
		
		//OK, let`s move on and set the new booking details
		$bkg->booking_details['property_uid']					= $booking->property_uid;
		$bkg->booking_details['booking_number']					= $booking->remote_reservation_id ;
		$bkg->booking_details['booked_in']						= false;
		$bkg->booking_details['channel_manager_booking']		= 1;
		
		$bkg->booking_details['arrivalDate']				= str_replace("-","/",$booking->date_from );
		$bkg->booking_details['departureDate']				= date("Y/m/d" ,strtotime( $booking->date_to." + 1 day " ) );
		$dates												= findDateRangeForDates( $bkg->booking_details['arrivalDate'] , $bkg->booking_details['departureDate'] );
		$allBarLast											= array_slice($dates, 0, count($dates)-1, true);
		$bkg->booking_details['dateRangeString']			= implode(",", $allBarLast );
		
		$bkg->booking_details['currency_code']				= $currency_code;
		$bkg->booking_details['referrer']					= $booking->referrer;
		$bkg->booking_details['contract_total']				= $booking->channel_price;
		$bkg->booking_details['room_total_nodiscount']		= $booking->channel_price;
		
		$bkg->booking_details['sendGuestEmail']				= false;
		$bkg->booking_details['sendHotelEmail']				= false;

		if ($booking->already_paid > 0)
			$bkg->booking_details['deposit_required']		= $booking->already_paid;
		else
			$bkg->booking_details['deposit_required']		= $bkg->booking_details['contract_total'];

		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
		$cfgcode = $mrConfig[ 'accommodation_tax_code' ];
		$accommodation_tax_rate = (float) $jrportal_taxrate->taxrates[ $cfgcode ][ 'rate' ];
		
		if ( $mrConfig[ 'prices_inclusive' ] == 1 ) {
			$divisor = ( $accommodation_tax_rate / 100 ) + 1;
			$price   = $bkg->booking_details['room_total_nodiscount'] / $divisor;
			
			$bkg->booking_details['room_total_nodiscount']		= $price;
			$bkg->booking_details['tax']						= $bkg->booking_details['contract_total'] - $price ;
			$bkg->booking_details['room_total']					= $current_property_details->get_nett_accommodation_price((float)$bkg->booking_details['room_total_nodiscount'], $booking->property_uid ); //has to be without tax
			} else {
				$bkg->booking_details['room_total']					= $bkg->booking_details['contract_total'];
				$bkg->booking_details['tax']						= 0.00 ;
			}

		$bkg->booking_details['depositpaidsuccessfully'	] = true;
		if ($booking->already_paid == 0 ) {
			$bkg->booking_details['depositpaidsuccessfully'	] = false;
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// We need to find the room ids that are available this date
		
		// First we'll find the room requirements

		
		
		// Could be problematic, as this endpoint finds only those rooms where the available rooms returned are all those continuously available for the entire span of the booking. Not a problem if this is an SRP, but if it's an MRP it can be more difficult
		$call_self = new call_self( );

		$elements = array(
			"method"=>"GET",
			"request"=>"cmf/property/available/rooms/".$booking->property_uid."/".$booking->date_from."/".$booking->date_to,
			"data"=>array(),
			"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') ),

			);
				
		$response = json_decode(stripslashes($call_self->call($elements)));

		if ( isset($response->data->response) && !empty($response->data->response) ) {
			foreach ($response->data->response as $available_rooms) {
				$filtered_rooms = array();
				foreach ($available_rooms as $room ) {
					$id = $room->room_uid;
					$filtered_rooms [$id] = $room;
				}
				
				// Filtering. We'll return failures if we cannot find rooms that match the requested criteria
				if ( $booking->guest_number > 0 ) {
					foreach ( $response->data->response->room_details as $room_details ) {
						if ($room_details->max_people < $booking->guest_number ) {
							unset($filtered_rooms[$room_details->room_uid]) ;
						}
					}
				}
				
				if (empty($filtered_rooms)) {
					return (object) array( "success" => false , "message" => "No rooms available that can accommodate the required guest numbers");
				}
				
				if ( $booking->room_type_id > 0 ) {
					foreach ( $response->data->response->room_details as $room_details ) {
						if ($room_details->room_classes_uid != $booking->room_type_id ) {
							unset($filtered_rooms[$room_details->room_uid]) ;
						}
					}
				}
				
				if (empty($filtered_rooms)) {
					return (object) array( "success" => false , "message" => "No rooms available for the required room type id");
				}
				
				$rooms_that_satisfy_room_type_name_requirements = array();
				if ( $booking->room_type_name != "" ) {
					foreach ( $response->data->response->room_details as $room_details ) {
						if ($room_details->room_type != $booking->room_type_name ) {
							unset($filtered_rooms[$room_details->room_uid]) ;
						}
					}
				}
		
				if (empty($filtered_rooms)) {
					return (object) array( "success" => false , "message" => "No rooms available for the required room type name");
				}
				
				if (count($filtered_rooms) < $booking->room_quantity ) {
					return (object) array( "success" => false , "message" => "Not enough rooms available");
				}
				
				reset($filtered_rooms);
				$first_key = key($filtered_rooms);

				$bkg->booking_details['requestedRoom']				 .= $first_key."^0,"; //it needs to have the ^tariff_uid too 
				$bkg->booking_details['requestedRoom'] = substr( $bkg->booking_details['requestedRoom'], 0, strlen( $bkg->booking_details['requestedRoom'] ) - 1 );

				//Finally let`s insert the new booking
				try {
					$MiniComponents =jomres_getSingleton('mcHandler');
					$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
					$tmpBookingHandler->updateBookingField('cart_payment' , false ) ;

					$bkg->sendGuestEmail = false;
					$bkg->sendHotelEmail = false;

					$insert_result = $bkg->create_booking();

					if ( isset($MiniComponents->miniComponentData["03020"]["insertbooking"]["insertSuccessful"]) && $MiniComponents->miniComponentData["03020"]["insertbooking"]["insertSuccessful"] == true ) {
						$contract_uid = $MiniComponents->miniComponentData["03020"]["insertbooking"]["contract_uid"] ;

						$elements = array(
							"method"=>"PUT",
							"request"=>"cmf/property/booking/link/",
							"data"=>array(
								"property_uid" => $booking->property_uid ,
								"remote_booking_id" => $booking->remote_reservation_id,
								"local_booking_id" => $contract_uid
								),
							"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
							);

						$link_response = json_decode(stripslashes($call_self->call($elements)));

						if ( isset($link_response->data->response->link_id) && $link_response->data->response->link_id > 0 ) {
							$reply = (object) array( 
								"link_id" => $link_response->data->response->link_id , 
								"contract_uid" => $contract_uid,
								"property_uid" => $booking->property_uid,
								"date_from" => $booking->date_from,
								"date_to" => $booking->date_to,
								"property_name" => $current_property_details->property_name
								);
						}

						return (object) array( "success" => true , "link" => $reply );
					} else {
						return (object) array( "success" => false , "message" => "Could not create booking ");
					}
				}
				catch (Exception $e) {
					logging::log_message( "Failed to insert booking, most likely there are more rooms in the Channel manager than there are in Jomres. ".$e->getMessage() , 'CHANNEL_MANAGEMENT_FRAMEWORK', 'ERROR' , '' );
					return;
				}
		
			}
		} else {
			return (object) array( "success" => false , "message" => "No rooms continuously available");
		}
	}
}

function cmf_util_date_sort($a, $b) {
	return strtotime($a) - strtotime($b);
}
