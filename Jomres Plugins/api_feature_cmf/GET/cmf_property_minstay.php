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
	** Title | Get property blocks
	** Description | Get dates when the property is not available
*/


Flight::route('GET /cmf/property/minstay/@property_uid/@start_date/@end_date', function( $property_uid , $start_date , $end_date )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);

	cmf_utilities::cache_read($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); // Information about the property. We will use the number of rooms to determine if the property is fully booked or not

	if ( !isset($property->rooms['local_rooms']) || empty($property->rooms['local_rooms']) ) {
		Flight::halt(204, "There are no rooms for this property.");
	}

	$number_of_rooms = count($property->rooms['local_rooms']);

	$dates_array = cmf_utilities::get_date_ranges( $start_date , $end_date );

	$days_in_potential_booking = count($dates_array);
	
	$basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
	$basic_rate_details->get_rates($property_uid);

	if (empty($basic_rate_details->multi_query_rates[$property_uid])){
		Flight::json( $response_name = "calendar" ,$response = array( "success" => false , "error" => "There are no tariffs for this property, cannot return the minimum stay") );
	}

	// Figure out mindays for tariffs in range
	foreach ($basic_rate_details->multi_query_rates[$property_uid] as $tariff_type) {
		foreach ($tariff_type as $tariff_set) {
			foreach ($tariff_set as $tariff) {
				$valid_from = str_replace("/","-",  $tariff['validfrom']);
				$valid_to = str_replace("/","-",  $tariff['validto']);
				$tariff_date_ranges = cmf_utilities::get_date_ranges( $valid_from , $valid_to );

				foreach ($tariff_date_ranges as $tariff_date=>$val) {
					if ( array_key_exists($tariff_date , $dates_array)){
						if ( isset($dates_array[$tariff_date]['minstay'] ) ) {
							if ($dates_array[$tariff_date]['minstay'] > $tariff['mindays']) {
								$dates_array[$tariff_date]['minstay'] = $tariff['mindays'];
							}
						} else {
							$dates_array[$tariff_date]['minstay'] = $tariff['mindays'];
						}
					}
				}
			}
		}
	}

	cmf_utilities::cache_write( $property_uid , "response" , $dates_array );
	
	Flight::json( $response_name = "response" , $dates_array );
	});

