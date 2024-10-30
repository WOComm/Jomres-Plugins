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


Flight::route('GET /cmf/property/price/@property_uid/@start_date/@end_date/@number_of_people', function( $property_uid , $start_date , $end_date , $number_of_people )
	{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/property/availability/blocks/".$property_uid."/".$start_date."/".$end_date,
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
	
	$blocks = json_decode(stripslashes($call_self->call($elements)));
	
	$potential_booking_date_ranges = array_keys (cmf_utilities::get_date_ranges( $start_date , $end_date ));
	if (!empty($blocks->data->response)) {
		foreach ($potential_booking_date_ranges as $date ) {
			if ( in_array($date , $blocks->data->response ) ) {
				Flight::halt(204, "Property not available during these dates");
			}
		}
	}
	
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/property/list/prices/".$property_uid,
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
	
	$prices = json_decode(stripslashes($call_self->call($elements)));
	
	if (!isset($prices->data->response)) {
		Flight::halt(204, "Cannot get prices for property");
	}
	
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/property/list/tariff/types/dates/".$property_uid,
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
	
	$tariff_type_dates = json_decode(stripslashes($call_self->call($elements)));
	
	if (!isset($tariff_type_dates->data->response->tariff_sets) || empty($tariff_type_dates->data->response->tariff_sets) ) {
		Flight::halt(204, "Cannot get tariff type dates for property");
	}
	
	// First we'll scan each tariff type id to ensure that the tariff type's dates are all valid for the requested dates
	$valid_tariff_sets = array();
	foreach ($tariff_type_dates->data->response->tariff_sets as $key=>$val) {
		$tariff_set_valid = true;
		foreach ( $potential_booking_date_ranges as $booking_date ) {

			if (!in_array( $booking_date , $val->dates ) ) {
				$tariff_set_valid[] = false;
			}
		}
		if ($tariff_set_valid) {
			$valid_tariff_sets[] = $key ;
		}
	}
	unset($tariff_type_dates);
	
	// 
	if (empty($valid_tariff_sets)) {
		Flight::halt(204, "Cannot find valid tariffs for dates of booking");
	}
	
	$tariffs_with_valid_dates = array();
	foreach ($prices->data->response->tariff_sets as $tariff_type_id => $tariff ) {
		if (in_array( $tariff_type_id , $valid_tariff_sets) ) {
			$tariffs_with_valid_dates[ $tariff_type_id ] = $tariff;
		}
	}
	unset($prices);
	
	// Next we need to check that the tariff's min and max days and min and max people requirements are satisfied
	// 
	$days_in_booking = count($potential_booking_date_ranges);
	$tariffs_where_min_max_days_and_min_max_people_are_satisfied = array();
	foreach ( $tariffs_with_valid_dates as $tariff_type_id =>$tariff_sets ) {
		foreach ( $tariff_sets as $tariff ) {
			
			if ( $days_in_booking <= $tariff->max_days && $days_in_booking >= $tariff->min_days ) {

				if ( $number_of_people <= $tariff->maxpeople && $number_of_people >= $tariff->minpeople ) {
					$tariffs_where_min_max_days_and_min_max_people_are_satisfied[$tariff_type_id] = $tariff_sets;
				}
			}
		}
	}
	unset($tariffs_with_valid_dates);

	$property_price = array();
	if (!empty($tariffs_where_min_max_days_and_min_max_people_are_satisfied)) {
		// We only want the first valid tariff set, more will just confuse things
		$valid_tariffs = reset($tariffs_where_min_max_days_and_min_max_people_are_satisfied);
		unset($tariffs_where_min_max_days_and_min_max_people_are_satisfied);
		
		$daily_prices_totals = array();
		$cumulative_price = array ("cumulative_inclusive_of_vat" => 0 , "cumulative_exclusive_of_vat" => 0 , "excluding_vat_individual_prices" => array() , "including_vat_individual_prices" => array() );
		foreach ($valid_tariffs as $tariff ) {

			$currency_code = $tariff->rate_per_night->currency_code;
			$number_range = range($tariff->minpeople, $tariff->maxpeople);
			$per_person_per_night = $tariff->per_person_per_night;
			
			foreach ( $potential_booking_date_ranges as $booking_date ) {
				if (in_array( $booking_date , $tariff->dates ) ) {
					
					$cumulative_price["cumulative_inclusive_of_vat"] = $cumulative_price["cumulative_inclusive_of_vat"] +  $tariff->rate_per_night->price_including_vat;
					$cumulative_price["cumulative_exclusive_of_vat"] = $cumulative_price["cumulative_exclusive_of_vat"] +  $tariff->rate_per_night->price_excluding_vat;
					$cumulative_price["excluding_vat_individual_prices"][$booking_date] = $tariff->rate_per_night->price_excluding_vat;
					$cumulative_price["including_vat_individual_prices"][$booking_date] = $tariff->rate_per_night->price_including_vat;
				}
			}
		}
		$cumulative_price["daily_price_inclusive_of_vat"] = $cumulative_price["cumulative_inclusive_of_vat"] / $days_in_booking;
		$cumulative_price["daily_price_exclusive_of_vat"] = $cumulative_price["cumulative_exclusive_of_vat"] / $days_in_booking;
		
		
		foreach ( $number_range as $number_of_guests ) {
			if ($per_person_per_night) {
				$daily_prices_totals[$number_of_guests] = array (
					"number_of_guests" => $number_of_guests , 
					"daily_price_inclusive_of_vat" => $cumulative_price["daily_price_inclusive_of_vat"] * $number_of_guests , 
					"price_exclusive_of_vat" => $cumulative_price["daily_price_exclusive_of_vat"] * $number_of_guests , 
					"total_price_inclusive_of_vat" => $cumulative_price["daily_price_inclusive_of_vat"] * $number_of_guests * $days_in_booking , 
					"total_price_exclusive_of_vat" => $cumulative_price["daily_price_exclusive_of_vat"] * $number_of_guests * $days_in_booking 
					);
			} else {
				$daily_prices_totals[$number_of_guests] = array (
					"number_of_guests" => $number_of_guests , 
					"daily_price_inclusive_of_vat" => $cumulative_price["daily_price_inclusive_of_vat"], 
					"price_exclusive_of_vat" => $cumulative_price["daily_price_exclusive_of_vat"], 
					"total_price_inclusive_of_vat" => $cumulative_price["daily_price_inclusive_of_vat"] * $days_in_booking, 
					"total_price_exclusive_of_vat" => $cumulative_price["daily_price_exclusive_of_vat"] * $days_in_booking 
					);
			}
		}
		
		// The daily_prices_totals array is useful for checking my maths, but we want to return a more simplistic response with the ex-vat price and the number of guests
		foreach ($daily_prices_totals as $prices) {
			$number_of_guests = $prices['number_of_guests'];
			$deposit_values = cmf_utilities::calculate_deposit($property_uid , $prices['total_price_exclusive_of_vat'] , $days_in_booking );

			$daily_prices[$number_of_guests] = array("number_of_guests" => $number_of_guests , "price_exclusive" => $prices['total_price_exclusive_of_vat'] , "cleaning" => $deposit_values['cleaning'] , "security" => $deposit_values['security'] , "deposit" => $deposit_values['deposit'] );
		}
		
		
	}

	cmf_utilities::cache_write( $property_uid , "response" , $daily_prices );
	
	Flight::json( $response_name = "response" , $daily_prices );
	});

