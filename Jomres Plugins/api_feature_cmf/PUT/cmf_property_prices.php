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

Flight::route('PUT /cmf/property/prices', function()
	{
    require_once("../framework.php");

	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$_PUT['property_uid'];
	$date_sets				= json_decode(stripslashes($_PUT['ratepernight']));

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$new_ratepernight_array  = array();
	$new_mindays_array  = array();
	foreach ( $date_sets as $date_set ) {
		if ( !cmf_utilities::validate_date($date_set->date_from) ) {
			Flight::halt(204, "Date from incorrect, must be in Y-m-d format");
			}
			
		if ( !cmf_utilities::validate_date($date_set->date_to) ) {
			Flight::halt(204, "Date to incorrect, must be in Y-m-d format");
			}
			
		if ( !isset($date_set->ratepernight) || $date_set->ratepernight < 1 ) {
			Flight::halt(204, "Ratepernight not set or less than 1");
			}
			
		$dates_array = array_keys(cmf_utilities::get_date_ranges( $date_set->date_from , $date_set->date_to ));
		foreach ($dates_array as $date ) {
			$epoch = (string)strtotime($date);
			$new_ratepernight_array[$epoch] = convert_entered_price_into_safe_float($date_set->ratepernight);
			$new_mindays_array[$epoch] = 1;
		}
	}
	
	$basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
	$basic_rate_details->get_rates($property_uid);
	
	if (empty($basic_rate_details->multi_query_rates[$property_uid])) {
		Flight::halt(204, "Tariffs don't yet exist for this property. First set the Base rate, then you can use this feature to fine-tune things.");
	}
	
	jr_import('jrportal_rates');
	foreach ( $basic_rate_details->multi_query_rates[$property_uid] as $tariff_sets ) {
		foreach ($tariff_sets as $tariff_type) {
			reset($tariff_type);
			$first_key = key($tariff_type);

			$jrportal_rates = new jrportal_rates();
			
			$jrportal_rates->property_uid				= $property_uid;
			$jrportal_rates->tarifftype_id				= $tariff_type[$first_key]['tarifftype_id'];
			$jrportal_rates->rate_title					= $tariff_type[$first_key]['rate_title'];
			$jrportal_rates->rate_description			= $tariff_type[$first_key]['rate_description'];
			$jrportal_rates->maxdays					= $tariff_type[$first_key]['maxdays'];
			$jrportal_rates->minpeople					= $tariff_type[$first_key]['minpeople'];
			$jrportal_rates->maxpeople					= $tariff_type[$first_key]['maxpeople'];
			$jrportal_rates->roomclass_uid				= $tariff_type[$first_key]['roomclass_uid'];
			$jrportal_rates->dayofweek					= $tariff_type[$first_key]['dayofweek'];
			$jrportal_rates->ignore_pppn				= $tariff_type[$first_key]['ignore_pppn'];
			$jrportal_rates->allow_we					= $tariff_type[$first_key]['allow_we'];
			$jrportal_rates->weekendonly				= $tariff_type[$first_key]['weekendonly'];
			$jrportal_rates->minrooms_alreadyselected	= $tariff_type[$first_key]['minrooms_alreadyselected'];
			$jrportal_rates->maxrooms_alreadyselected	= $tariff_type[$first_key]['maxrooms_alreadyselected'];

			$epoch_roomrateperday = array();
			$epoch_mindays = array();
			foreach ($tariff_type as $tariff) {
				$date_from				= str_replace ( "/" , "-" , $tariff['validfrom']);
				$date_to				= str_replace ( "/" , "-" , $tariff['validto']);
				$dates_array = array_keys(cmf_utilities::get_date_ranges( $date_from , $date_to ));

				foreach ($dates_array as $date) {
					$epoch = strtotime($date);
					$epoch_roomrateperday[$epoch]	= (string)$tariff['roomrateperday'];
					$epoch_mindays[$epoch]			= (string)$tariff['mindays'];
				}
			}

		// Up until now we weren't able to set the min days, so we'll do that here now that we have the tariff's min days setting. Without it a no-index error is thrown by php
		foreach ( $new_mindays_array as $epoch => $val ) {
			$new_mindays_array[$epoch] = (string)$tariff['mindays'];
		}

		$epoch_roomrateperday = $new_ratepernight_array + $epoch_roomrateperday ;
		ksort($epoch_roomrateperday);

		$epoch_mindays = $new_mindays_array + $epoch_mindays ;
		ksort($epoch_mindays);

		$jrportal_rates->dates_rates				= $epoch_roomrateperday;
		$jrportal_rates->dates_mindays				= $epoch_mindays;

		$jrportal_rates->save_rate();
		}
	}

	Flight::json( $response_name = "response" , true ); 
	});
	
	