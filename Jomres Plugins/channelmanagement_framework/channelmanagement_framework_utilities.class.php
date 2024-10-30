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

	use Gregwar\Image\Image;

	class channelmanagement_framework_utilities
	{

		function __construct()
		{

		}

		public static function remove_local_properties_of_manager( $manager_id = 0 , $channel_id = 0 , $property_uids = array() )
		{
			jr_import('jomres_call_api');

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

			$system_token =$jrConfig['system_token'];

			$properties_array = array();
			if (!isset($property_uids) || empty($property_uids)) { // This is intended for when any manager logs in and for the first time a cross reference is created for them in the cmf xref table
				foreach ($thisJRUser->authorisedProperties as $property_uid) {
					$properties_array[] = [ "channel_id" =>  $channel_id ,  "property_uid" =>  $property_uid , "remote_property_uid" => 'local_property_manager_'.$manager_id.'_property_'.$property_uid , "cms_user_id" => $manager_id];
				}
			} else { // This is intended for when a property is added, we will have to trust that the calling script has already checked that the manager has the rights to admin this property
				foreach ($property_uids as $property_uid) {
					$properties_array[] = [ "channel_id" =>  $channel_id ,  "property_uid" =>  $property_uid , "remote_property_uid" => 'local_property_manager_'.$manager_id.'_property_'.$property_uid , "cms_user_id" => $manager_id];
				}
			}


			$call_api = new jomres_call_api('system' , $system_token );

			$method = 'PUT';
			$endpoint = 'cmf/admin/channel/unassign/properties';

			$result = $call_api->send_request(
				$method ,
				$endpoint ,
				[
					'channel_id' => $channel_id ,
					'properties' =>
						json_encode(
							$properties_array
						)
				] ,
				[
					'X-JOMRES-CHANNEL-NAME: jomres_local_ui'
				]
			);
		}

		public static function register_local_properties_to_manager( $manager_id = 0 , $channel_id = 0 , $property_uids = array() )
		{
			jr_import('jomres_call_api');

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

			$system_token =$jrConfig['system_token'];

			$properties_array = array();
			if (!isset($property_uids) || empty($property_uids)) { // This is intended for when any manager logs in and for the first time a cross reference is created for them in the cmf xref table
				foreach ($thisJRUser->authorisedProperties as $property_uid) {
					$properties_array[] = [ "channel_id" =>  $channel_id ,  "property_uid" =>  $property_uid , "remote_property_uid" => 'local_property_manager_'.$manager_id.'_property_'.$property_uid , "cms_user_id" => $manager_id];
				}
			} else { // This is intended for when a property is added, we will have to trust that the calling script has already checked that the manager has the rights to admin this property
				foreach ($property_uids as $property_uid) {
					$properties_array[] = [ "channel_id" =>  $channel_id ,  "property_uid" =>  $property_uid , "remote_property_uid" => 'local_property_manager_'.$manager_id.'_property_'.$property_uid , "cms_user_id" => $manager_id];
				}
			}


			$call_api = new jomres_call_api('system' , $system_token );

			$method = 'PUT';
			$endpoint = 'cmf/admin/channel/assign/properties';

			$result = $call_api->send_request(
				$method ,
				$endpoint ,
				[
					'channel_id' => $channel_id ,
					'properties' =>
						json_encode(
							$properties_array
						)
				] ,
				[
					'X-JOMRES-CHANNEL-NAME: jomres_local_ui'
				]
			);
		}

		/*
		 *
		 * Find all manager ids for a channel by channel name
		 *
		 * Pass channel name, return manager IDs array
		 *
		 */
		public static function get_manager_ids_by_channel_name( $channel_name = '' )
		{
			if (!isset($channel_name) || $channel_name == '' ) {
				throw new Exception( "Channel name not set" );
			}

			$reply =[];

			$query = "SELECT id , cms_user_id FROM #__jomres_channelmanagement_framework_channels WHERE channel_name = '".$channel_name."' ";
			$result = doSelectSql($query);
			if (!empty($result)) {
				foreach ($result as $r) {
					$reply[$r->cms_user_id] = array ( "cms_user_id" => $r->cms_user_id , "channel_id" => $r->id );
				}
			}
			return $reply;
		}

		/*
		 *
		 * Search for a Jomres region id, using fuzzy searching
		 *
		 * We don't use the Jomres region names because they may not be identical to those stored on other systems, instead we'll use fuzzy searching for a best guess
		 *
		 */

		public static function search_for_region_id( $country_code , $region_name )
		{
			$reply = new stdClass();

			$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
			$jomres_regions -> get_all_regions();

			$regions = array();
			foreach ( $jomres_regions->regions as $region ) {
				$region_id = $region['id'];
				if ( $region['countrycode'] == $country_code ) {
					$regions[] = array("id" => $region_id, "region_name" => $region['regionname']);
				}
			}

			$sfs = new SimpleFuzzySearch($regions, ["id" , "region_name"],  $region_name );
			$results = $sfs->search();

			if ( isset($results[0][0]['id']) ) {
				$reply->jomres_region_id = $results[0][0]['id'];
				$reply->jomres_region_name = $results[0][0]['region_name'];
			} else {
				return false;
			}
			return $reply;
		}



		/*
		*
		* Set cross references for a given item type (e.g. extras) for a property
		*
		* Send the property uid and the item type, retrieve all remote item ids. Used by scripts that create, update and delete items imported from parents
		*
		*/
		public static function set_cross_references_for_property_uid ( $channel = '' , $property_uid = 0 , $item_type = '' , $remote_id = 0 , $local_id = 0 )
		{
			if (!isset($property_uid) || $property_uid == 0 ) {
				throw new Exception( "Property uid not set" );
			}

			if (!isset($channel) || $channel == '' ) {
				throw new Exception( "Channel not set" );
			}

			if (!isset($remote_id) || $remote_id == 0 ) {
				throw new Exception( "Remote id not set" );
			}

			$put_data = array (
				"property_uid" 			=> $property_uid,
				"item_type" 			=> $item_type,
				"remote_id" 			=> $remote_id,
				"local_id" 				=> $local_id
			);

			$manager_id = 999999999;

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');
			$send_response = $jomres_call_api->send_request(
				"PUT"  ,
				"cmf/property/cross/reference" ,
				$put_data ,
				array (	"X-JOMRES-channel-name: ". $channel, "X-JOMRES-proxy-id: ".$manager_id )
			);

		}

		/*
		*
		* Get cross references for a given item type (e.g. extras) for a property
		*
		* Send the property uid and the item type, retrieve all remote item ids. Used by scripts that create, update and delete items imported from parents
		*
		*/
		public static function get_cross_references_for_property_uid ( $channel = '' , $property_uid = 0 , $item_type = '' )
		{
			if (!isset($property_uid) || $property_uid == 0 ) {
				throw new Exception( "Property uid not set" );
			}

			if (!isset($channel) || $channel == '' ) {
				throw new Exception( "Channel not set" );
			}

			$manager_id = channelmanagement_framework_utilities :: get_manager_id_for_local_property_uid ( $property_uid );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');
			$send_response = $jomres_call_api->send_request(
				"GET"  ,
				"cmf/property/".$property_uid ,
				[] ,
				array (	"X-JOMRES-channel-name: ". $channel, "X-JOMRES-proxy-id: ".$manager_id )
			);

			if ($item_type == '' ) {
				if (isset($send_response->data->response->remote_data->cross_references)) {
					return json_decode(json_encode($send_response->data->response->remote_data->cross_references), true);
				} else {
					return [];
				}
			} else {
				if (isset($send_response->data->response->remote_data->cross_references->$item_type)) {
					return json_decode(json_encode($send_response->data->response->remote_data->cross_references->$item_type), true);
				} else {
					return [];
				}
			}


		}

		public static function get_channel_ids_for_channel_name ( $channel_name = '' )
		{
			if (!isset($channel_name) || $channel_name == '' ) {
				throw new Exception( "channel_name not set" );
			}

			$query = "SELECT id FROM #__jomres_channelmanagement_framework_channels WHERE channel_name = '".$channel_name."'";
			$result = doSelectSql($query);

			$channel_ids = array();
			if (!empty($result)) {
				foreach ($result as $channel) {
					$channel_ids[] = $channel->id;
				}
			}
			return $channel_ids;
		}

		/*
	*
	* Used by changelog scripts that want to update a local property
	*
	 *
	 * Because the changelog script is handling the _remote site's_ webhook data then it's the remote site's property uid that is passed to this script
	 *
	*/
		public static function get_manager_id_for_local_property_uid ($local_property_uid)
		{
			$channelmanagement_framework_user_accounts = new channelmanagement_framework_user_accounts();
			// We need to find the manager's uid so that we can send the call to the local system

			$query = "SELECT cms_user_id as manager_id FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE `property_uid` = ".(int)$local_property_uid." ";
			$result = doSelectSql($query);

			$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
			$jomres_users->get_users();

			$manager_accounts = array();
			if (!empty($result)){
				foreach ( $result as $user  ) {
					$user_id = $user->manager_id;
					$manager_accounts[$user_id] = array (
						"user_id" => $user_id ,
						"user_name" => $jomres_users->users[$user_id]['username'] ,
						"access_level" => $jomres_users->users[$user_id]['access_level']
					);
				}
			}

			if (empty($manager_accounts)) {
				throw new Exception( "Tried to get manager id for local property uid (get_manager_id_for_local_property_uid) however no managers exist to enable access to API");
			}

			reset($manager_accounts);
			$manager_id = key($manager_accounts);
			if ($manager_id == 0 ) {
				throw new Exception( "Manager id is 0");
			}

			return $manager_id;
		}


		/*
		*
		* Used by changelog scripts that want to update a local property
		*
		 *
		 * Because the changelog script is handling the _remote site's_ webhook data then it's the remote site's property uid that is passed to this script
		 *
		*/
		public static function get_local_manager_id_for_remote_property_uid ($remote_property_uid)
		{
			$channelmanagement_framework_user_accounts = new channelmanagement_framework_user_accounts();
			// We need to find the manager's uid so that we can send the call to the local system
			$manager_accounts = $channelmanagement_framework_user_accounts->find_channel_owners_for_property($remote_property_uid);

			if (empty($manager_accounts)) {
				throw new Exception( "Tried to get local manager id for remote property uid (get_local_manager_id_for_remote_property_uid) however no managers exist to enable access to API");
			}

			reset($manager_accounts);
			$manager_id = key($manager_accounts);
			if ($manager_id == 0 ) {
				throw new Exception( "Manager id is 0");
			}

			return $manager_id;
		}



		public static function get_current_channel( $obj , $pattern = array() )
		{
			if ( !is_object($obj) ) {
				throw new Exception( "Empty object passed" );
			}

			if ( empty($pattern)) {
				throw new Exception( 'Pattern varaible is not an array' );
			}

			$current_class = get_class($obj);
			return str_replace( $pattern , "" , $current_class);
		}

		public static function get_mapped_dictionary_items( $channel = "" , $mapped_to_jomres_only = false )
		{
			if ( $channel == "" ) {
				throw new Exception( "Channel not passed" );
			}

			$dictionary_class_name = 'channelmanagement_'.$channel.'_dictionaries';
			jr_import($dictionary_class_name);
			if ( !class_exists($dictionary_class_name) ) {
				throw new Exception( jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',false, false ) );
			}

			$dictionary_class = new $dictionary_class_name();
			$dictionary_items = $dictionary_class->get_mappable_dictionary_items();

			jr_import('channelmanagement_framework_mapping');
			$channelmanagement_framework_mapping = new channelmanagement_framework_mapping();

			$all_channel_dictionary_items = array();
			foreach ($dictionary_items as $item_type=>$item) {

				$mapped_dictionary_items = $channelmanagement_framework_mapping->get_items_for_mapping( $channel , $item['jomres_type'] ); // These are the dictionary types that can be handled by this channel manager service. Next we will find all of the items that have already been cross referenced with Jomres "dictionary items", such as room types, property types etc

				if ($mapped_to_jomres_only && $mapped_dictionary_items != false ) {
					$temp_arr = array();
					foreach ($mapped_dictionary_items as $key=>$val) {
						if ($val->jomres_id > 0) {
							$temp_arr[$key] = $val;
						}
						$all_channel_dictionary_items[$item_type] = $temp_arr;
					}
				} else {
					$all_channel_dictionary_items[$item_type] = $mapped_dictionary_items;
				}
			}

			return $all_channel_dictionary_items;
		}


		public static function get_image ($url , $property_uid , $resource_type = "property" , $resource_id = 0 )
		{
			$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			$mkdir_mode = 0755;


			if (!@curl_get_file_contents($url)) { // This just checks that we can open the file. Importing is done a little later
				return false;
			}

			$result = $MiniComponents->triggerEvent('03379' , array( "property_uid" => $property_uid ) );
			$resource_types = $MiniComponents->miniComponentData[ '03379' ];

			if (empty($resource_types)) { // Do nowt.
				return;
			}

			//if resource type is empty, return
			if ($resource_type == '')
				return;

			//if resource id is blank, make it 0
			if ($resource_id == '')
				$resource_id = '0';

			// A security check to ensure that the user's not trying to pass a resource type that we can't handle
			if (!array_key_exists($resource_type, $resource_types)) { // The resource type isn't recognised, let's get the hell outta Dodge.
				return;
			}

			$resource_id_required = $resource_types [$resource_type] [ 'resource_id_required' ];

			//set image upload paths
			if ($resource_id_required) {
				$abs_path = $resource_types [$resource_type] ['upload_root_abs_path'].$resource_type.JRDS.$resource_id.JRDS;
				$rel_path = $resource_types [$resource_type] ['upload_root_rel_path'].$resource_type.'/'.$resource_id.'/';
			} else {
				$abs_path = $resource_types [$resource_type] ['upload_root_abs_path'].$resource_type.JRDS;
				$rel_path = $resource_types [$resource_type] ['upload_root_rel_path'].$resource_type.'/';
			}

			if (!is_dir(JOMRES_TEMP_ABSPATH."temp_images_dirty".JRDS)) {
				mkdir(JOMRES_TEMP_ABSPATH."temp_images_dirty".JRDS, $mkdir_mode, true);
			}

			$resized_file_name = basename($url);

			$file = JOMRES_TEMP_ABSPATH."temp_images_dirty".JRDS . basename($url);
			$fileHandle = fopen($file, "w+");

			try {
				$client = new GuzzleHttp\Client();
				$client->request('GET',$url, [
					'sink' => $file,
				]);
			} catch (RequestException $e) {
				return;
			} finally {
				@fclose($fileHandle);
			}

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');

			//  Fullsize image
			if (!is_dir($abs_path)) {
				mkdir($abs_path, $mkdir_mode, true);
			}

			Image::open($file)
				->zoomCrop((int)$jrConfig[ 'maxwidth' ], (int)$jrConfig[ 'maxwidth' ] )
				->save( $abs_path.JRDS.$resized_file_name , 'jpg', 85);

			$jomres_media_centre_images->handle_uploaded_image(
				$property_uid,
				$resource_type,
				$resource_id,
				$resized_file_name,
				'large',
				$resource_id_required
			);

			//  Medium image
			if (!is_dir($abs_path.JRDS.'medium')) {
				mkdir($abs_path.JRDS.'medium', $mkdir_mode, true);
			}

			Image::open($file)
				->zoomCrop((int)$jrConfig[ 'thumbnail_property_header_max_width' ], (int)$jrConfig[ 'thumbnail_property_header_max_height' ] )
				->save( $abs_path.JRDS.'medium'.JRDS.$resized_file_name , 'jpg', 85);

			$jomres_media_centre_images->handle_uploaded_image(
				$property_uid,
				$resource_type,
				$resource_id,
				$resized_file_name,
				'medium',
				$resource_id_required
			);

			//  Thumbnail image
			if (!is_dir($abs_path.JRDS.'thumbnail')) {
				mkdir($abs_path.JRDS.'thumbnail', $mkdir_mode, true);
			}

			Image::open($file)
				->zoomCrop((int)$jrConfig[ 'thumbnail_property_list_max_width' ], (int)$jrConfig[ 'thumbnail_property_list_max_height' ] )
				->save(  $abs_path.JRDS.'thumbnail'.JRDS.$resized_file_name , 'jpg', 85);

			$jomres_media_centre_images->handle_uploaded_image(
				$property_uid,
				$resource_type,
				$resource_id,
				$resized_file_name,
				'small',
				$resource_id_required
			);

			if (file_exists($file)) {
				unlink($file);
			}

			$jomres_media_centre_images->get_images($property_uid);

			$MiniComponents->triggerEvent('03383');

			$webhook_notification						= new stdClass();
			$webhook_notification->webhook_event				= 'image_added';
			$webhook_notification->webhook_event_description		= 'Logs when images are added.';
			$webhook_notification->webhook_event_plugin			= 'channelmanagement_framework';
			$webhook_notification->data					= new stdClass();
			$webhook_notification->data->property_uid			= $property_uid;
			$webhook_notification->data->added_image			= $resized_file_name;
			$webhook_notification->data->resource_type			= $resource_type;

			add_webhook_notification($webhook_notification);

			return $jomres_media_centre_images->multi_query_images[$property_uid][$resource_type];

		}


		public static function delete_image ($file_name , $property_uid , $resource_type = "property" , $resource_id = 0 )
		{
			$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');

			$result = $MiniComponents->triggerEvent('03379' , array( "property_uid" => $property_uid ) );
			$resource_types = $MiniComponents->miniComponentData[ '03379' ];

			if (empty($resource_types)) { // Do nowt.
				return false ;
			}

			//if resource type is empty, return
			if ($resource_type == '')
				return false ;

			//if resource id is blank, make it 0
			if ($resource_id == '')
				$resource_id = '0';

			// A security check to ensure that the user's not trying to pass a resource type that we can't handle
			if (!array_key_exists($resource_type, $resource_types)) { // The resource type isn't recognised, let's get the hell outta Dodge.
				return false ;
			}

			$resource_id_required = $resource_types [$resource_type] [ 'resource_id_required' ];

			//set image upload paths
			if ($resource_id_required) {
				$abs_path = $resource_types [$resource_type] ['upload_root_abs_path'].$resource_type.JRDS.$resource_id.JRDS;
				$rel_path = $resource_types [$resource_type] ['upload_root_rel_path'].$resource_type.'/'.$resource_id.'/';
			} else {
				$abs_path = $resource_types [$resource_type] ['upload_root_abs_path'].$resource_type.JRDS;
				$rel_path = $resource_types [$resource_type] ['upload_root_rel_path'].$resource_type.'/';
			}

			if ($file_name == '') {
				return false ;
			}

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');

			//delete image from disk and db
			if (!$jomres_media_centre_images->delete_image($property_uid, $resource_type, $resource_id, $file_name, $abs_path, $resource_id_required)) {
				$response = array('message' => "Boo, we couldn't delete it. I'm going to have a little cry in the corner now.", 'success' => '0');
			} else {
				$response = array('message' => "Yay, we'll deleted this sukka", 'success' => '1');
			}

			$MiniComponents->triggerEvent('03383');
			$MiniComponents->triggerEvent('03384');

			$webhook_notification								= new stdClass();
			$webhook_notification->webhook_event				= 'image_deleted';
			$webhook_notification->webhook_event_description	= 'Logs when images are deleted.';
			$webhook_notification->webhook_event_plugin			= 'channelmanagement_framework';
			$webhook_notification->data							= new stdClass();
			$webhook_notification->data->property_uid			= $property_uid;
			$webhook_notification->data->deleted_image			= $file_name;
			$webhook_notification->data->resource_type			= $resource_type;
			add_webhook_notification($webhook_notification);

			$jomres_media_centre_images->get_images($property_uid);

			return $jomres_media_centre_images->images[$resource_type];

		}

	}


	function curl_get_file_contents($URL)
	{

		$c = curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $URL);
		$contents = curl_exec($c);
		curl_close($c);
		if ($contents) return $contents;
		else return FALSE;
	}

	/**
	 * A Simple Fuzzy Search component using
	 * Levenshtein Distance (LD) Algorithm and
	 * Longest Common Substring (LCS) Algorithm.
	 *
	 * @author wataridori
	 */



	class SimpleFuzzySearch
	{
		/**
		 * @var array
		 */
		protected $arrayData;

		/**
		 * @var array
		 */
		protected $attributes;

		/**
		 * @var string
		 */
		protected $searchString;

		/**
		 * @var float Max Levenshtein Distance Rate.
		 */
		protected $maxLD = 0.3;

		/**
		 * @var float Min Longest Common Substring Rate.
		 */
		protected $minLCS = 0.7;

		const NOT_MATCH = 0;
		const STR2_STARTS_WITH_STR1 = 1;
		const STR2_CONTAINS_STR1 = 2;
		const STR1_STARTS_WITH_STR2 = 3;
		const STR1_CONTAINS_STR2 = 4;
		const LEVENSHTEIN_DISTANCE_CHECK = 5;
		const LONGEST_COMMON_SUBSTRING_CHECK = 6;

		/**
		 * Constructor.
		 *
		 * @param array $arrayData
		 * @param array|string $attribute
		 * @param string|null $searchString
		 */
		public function __construct($arrayData, $attribute, $searchString = null)
		{
			$this->arrayData = $arrayData;
			$this->attributes = is_array($attribute) ? $attribute : [$attribute];
			$this->searchString = $searchString;
		}

		/**
		 * Get Max Levenshtein Distance Rate.
		 *
		 * @return float
		 */
		public function getMaxLD()
		{
			return $this->maxLD;
		}

		/**
		 * Set Max Levenshtein Distance Rate.
		 *
		 * @param float $ld
		 */
		public function setMaxLD($ld)
		{
			$this->maxLD = $ld;
		}

		/**
		 * Get Min Longest Common Substring Rate.
		 *
		 * @return float
		 */
		public function getMinLCS()
		{
			return $this->minLCS;
		}

		/**
		 * Set Min Longest Common Substring Rate.
		 *
		 * @param float $lcs
		 */
		public function setMinLCS($lcs)
		{
			$this->minLCS = $lcs;
		}

		/**
		 * Search using Levenshtein Distance (LD) Algorithm and
		 * Longest Common Substring (LCS) Algorithm.
		 *
		 * @param string|null $searchString
		 *
		 * @return array
		 */
		public function search($searchString = null)
		{
			$results = [];
			$search = $searchString ? strtolower($searchString) : strtolower($this->searchString);
			if (!$search) {
				return [];
			}
			foreach ($this->arrayData as $obj) {
				$found = false;
				foreach ($this->attributes as $attr) {
					if ($found || !isset($obj[$attr])) {
						continue;
					}
					$val = strtolower($obj[$attr]);
					if (!$val) {
						continue;
					}
					$type = self::NOT_MATCH;
					if (strpos($search, $val) !== false && strpos($search, $val) === 0) {
						$type = self::STR2_STARTS_WITH_STR1;
						$typeVal = strlen($val);
					} elseif (strpos($search, $val) > 0) {
						$type = self::STR2_CONTAINS_STR1;
						$typeVal = strlen($val);
					} elseif (strpos($val, $search) !== false && strpos($val, $search) === 0) {
						$type = self::STR1_STARTS_WITH_STR2;
						$typeVal = strlen($val);
					} elseif (strpos($val, $search) > 0) {
						$type = self::STR1_CONTAINS_STR2;
						$typeVal = strlen($val);
					} elseif ($this->checkLD($ld = levenshtein($val, $search), $search)) {
						$type = self::LEVENSHTEIN_DISTANCE_CHECK;
						$typeVal = $ld / strlen($search);
					} else {
						$lcs = $this->getLCS($val, $search);
						$similarPercent = strlen($lcs) / strlen($search);
						if ($similarPercent > $this->minLCS) {
							$type = self::LONGEST_COMMON_SUBSTRING_CHECK;
							$typeVal = strlen($lcs) / strlen($val) * (-1);
						}
					}
					if ($type !== self::NOT_MATCH) {
						array_push($results, [$obj, $attr, $type, $typeVal]);
						$found = true;
					}
				}
			}
			usort($results, [$this, 'sortArray']);

			return $results;
		}

		/**
		 * Check whether Levenshtein Distance is small enough.
		 *
		 * @param int $ld
		 * @param string $str
		 *
		 * @return bool
		 */
		private function checkLD($ld, $str)
		{
			$length = strlen($str);
			if ($ld / $length <= $this->maxLD) {
				return true;
			}
			return false;
		}

		/**
		 * Get Longest Common Substring.
		 *
		 * @param string $firstString
		 * @param string $secondString
		 *
		 * @return string
		 */
		private function getLCS($firstString, $secondString)
		{
			$firstStringLength = strlen($firstString);
			$secondStringLength = strlen($secondString);
			$return = '';

			if ($firstStringLength === 0 || $secondStringLength === 0) {
				return $return;
			}
			$longestCommonSubstring = [];
			for ($i = 0; $i < $firstStringLength; $i++) {
				$longestCommonSubstring[$i] = [];
				for ($j = 0; $j < $secondStringLength; $j++) {
					$longestCommonSubstring[$i][$j] = 0;
				}
			}
			$largestSize = 0;
			for ($i = 0; $i < $firstStringLength; $i++) {
				for ($j = 0; $j < $secondStringLength; $j++) {
					if ($firstString[$i] === $secondString[$j]) {
						if ($i === 0 || $j === 0) {
							$longestCommonSubstring[$i][$j] = 1;
						} else {
							$longestCommonSubstring[$i][$j] = $longestCommonSubstring[$i - 1][$j - 1] + 1;
						}
						if ($longestCommonSubstring[$i][$j] > $largestSize) {
							$largestSize = $longestCommonSubstring[$i][$j];
							$return = '';
						}
						if ($longestCommonSubstring[$i][$j] === $largestSize) {
							$return = substr($firstString, $i - $largestSize + 1, $largestSize);
						}
					}
				}
			}
			return $return;
		}

		/**
		 * Sort arrays base on type and typeVal.
		 *
		 * @param array $firstArray
		 * @param array $secondArray
		 *
		 * @return int
		 */
		private function sortArray($firstArray, $secondArray)
		{
			if ($firstArray[2] === $secondArray[2]) {
				if ($firstArray[3] === $secondArray[3]) {
					return 0;
				} else {
					return $firstArray[3] < $secondArray[3] ? -1 : 1;
				}
			} else {
				return $firstArray[2] < $secondArray[2] ? -1 : 1;
			}
		}
	}