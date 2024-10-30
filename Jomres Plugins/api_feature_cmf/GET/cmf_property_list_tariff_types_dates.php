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


Flight::route('GET /cmf/property/list/tariff/types/dates/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	$basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
	$basic_rate_details->get_rates($property_uid);

	if (empty($basic_rate_details->multi_query_rates[$property_uid])){
		Flight::json( $response_name = "calendar" ,$response = array( "success" => false , "error" => "There are no tariffs for this property, cannot return the base price") );
	}

	$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
	$current_property_details->gather_data($property_uid);

	$found_tariffs = array();
	
	// Figure out mindays for tariffs in range
	foreach ($basic_rate_details->multi_query_rates[$property_uid] as $tariff_type) {
		foreach ($tariff_type as $tariff_set) {
			
			foreach ($tariff_set as $tariff) {

				$valid_from = str_replace("/","-",  $tariff['validfrom']);
				$valid_to = str_replace("/","-",  $tariff['validto']);
				$tariff_date_ranges = cmf_utilities::get_date_ranges( $valid_from , $valid_to );
				$number_of_days_tariff_spans = count($tariff_date_ranges);
				
				$price_excluding_vat = $tariff['roomrateperday'];
				if ($mrConfig[ 'prices_inclusive' ] == 1) {
					$price_excluding_vat =  $current_property_details->get_nett_accommodation_price($price_excluding_vat, $property_uid);
				}
				
				$room_rate = cmf_utilities::get_pricing_response( $property_uid , $price_excluding_vat );
				$tariff_type_id = $tariff['tarifftype_id'];
				
				$per_person_per_night = (bool)$mrConfig['perPersonPerNight'];
				if ( $tariff['ignore_pppn'] == "1" ) {
					$per_person_per_night = false;
				}
				
				if (!isset($found_tariffs["tariff_sets"][$tariff_type_id])) {
					$found_tariffs["tariff_sets"][$tariff_type_id]['dates'] = array();
				}
				
				$dates_array = $found_tariffs["tariff_sets"][$tariff_type_id]['dates'];
				$found_tariffs["tariff_sets"][$tariff_type_id]['dates'] = array_merge ($dates_array , array_keys ($tariff_date_ranges));

				
			}
		}
	}
	
	cmf_utilities::cache_write( $property_uid , "response" , $found_tariffs );
	
	Flight::json( $response_name = "response" , $found_tariffs ) ;
	});

