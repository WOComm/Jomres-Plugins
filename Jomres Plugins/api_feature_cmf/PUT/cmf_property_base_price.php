<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*

SRPs only, set dates available/not available

*/

Flight::route('PUT /cmf/property/base/price', function()
	{
    require_once("../framework.php");

	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$_PUT['property_uid'];
	$base_price				= convert_entered_price_into_safe_float($_PUT['base_price']);
	$max_people				= (int)$_PUT['max_people'];

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if (!isset($mrConfig['minimuminterval'])) {
		$mrConfig['minimuminterval'] = 1;
	}
	
	$default_minimum_interval = $mrConfig['minimuminterval']; 
	
	$basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
	$basic_rate_details->get_rates($property_uid);
	
	if (!empty($basic_rate_details->multi_query_rates[$property_uid])) {
		Flight::halt(204, "Tariffs already exist for this property, use the Property Minstays and Property Prices endpoints to set prices for different periods");
	}
	
	$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
	$current_property_details->gather_data($property_uid);
	
	$today = date("Y-m-d");
	$ten_years_on = date("Y-m-d" , strtotime( $today . " + 2 years") );

	jr_import('jrportal_rates');
	
	foreach ( $current_property_details->room_types as $room_type_id => $room_type ) {
		$jrportal_rates = new jrportal_rates();
		
		$jrportal_rates->property_uid				= $property_uid;
		$jrportal_rates->tarifftype_id				= 0;
		$jrportal_rates->roomclass_uid				= $room_type_id;
		$jrportal_rates->maxpeople 					= $max_people;

		$epoch_roomrateperday = array();
		$epoch_mindays = array();
		
		$dates_array = array_keys(cmf_utilities::get_date_ranges( $today , $ten_years_on ));
		
		foreach ($dates_array as $date) {
			$epoch = (string)strtotime($date);
			$epoch_roomrateperday[$epoch]	= $base_price;
			$epoch_mindays[$epoch]			= $default_minimum_interval;
		}

		$jrportal_rates->dates_rates				= $epoch_roomrateperday;
		$jrportal_rates->dates_mindays				= $epoch_mindays;
		$response = $jrportal_rates->save_rate();
	} 

	Flight::json( $response_name = "response" , true );
	});
	
	