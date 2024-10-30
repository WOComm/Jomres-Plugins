<?php
/**
 * Core file
 *
 * @author  
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################



/*
	** Title | Update micromanage tariff
	** Description | Updates a micromanage tariff
	** Plugin | api_feature_tariffs
	** Scope | properties_set
	** URL | tariffs
 	** Method | PUT
	** URL Parameters | 
	** Data Parameters | 
	** Success Response |{"data":{"tarifftypeid":521},"meta":{"code":200}}
	** Error Response | "Tariff save method not valid for this property"
	** Sample call |    curl --request PUT \
  --url http://localhost/joomla_portal/jomres/api/tariffs/32/add/micromanage \
  --header 'authorization: Bearer c33e4d8ac810280c084194ef65cd74cc736712cc' \
  --header 'content-type: multipart/form-data; boundary=---011000010111000001101001' \
  --form tarifftypeid=69 \
  --form rate_title=test \
  --form rate_description=testty \
  --form maxdays=365 \
  --form minpeople=2 \
  --form maxpeople=2 \
  --form roomclass_uid=1 \
  --form dayofweek=7 \
  --form ignore_pppn=0 \
  --form allow_we=1 \
  --form weekendonly=0 \
  --form minrooms_alreadyselected=0 \
  --form maxrooms_alreadyselected=100 \
  --form 'tariffinput[1491004800]=65' \
  --form 'tariffinput[1491091200]=75' \
  --form 'mindaysinput[1491004800]=1' \
  --form 'mindaysinput[1491091200]=1'
	** Notes |  If you receive the "Tariff save method not valid for this property" response, then the property is configured to save tariffs in either Normal or Advanced editing mode.
    
    When guests book, they select a combination of room ( or room type ) and tariff. This allows us to have multiple tariffs for the same room type, and is extremely flexible.
    These settings determine if a tariff is valid to be shown in the booking form once the dates and guest numbers ( if guest types have been created ) have been selected.
    
    maxdays Maximum days of the visit
    minpeople Minimum number of people for this tariff to be valid.
    maxpeople Maximum number of people for this tariff to be valid.
    roomclass_uid The id of the room type that this tariff is for.
    dayofweek Checking day of week allowed. If the booking starts on N day of the week, then this tariff is valid to be offered. 0 : Sunday 1 : Monday 2 : Tuesday : 3 Wednesday : 4 Thursday : 5 Friday : 6 Saturday : 7 Any day of week.
    ignoreppn Properties can be configured to charge per person per night by default. This setting (1 or 0 ) allows certain tariffs to be priced at a flat rate instead of per person per night.
    allow_we Allow bookings that span weekend days. For example, a tariff that has this option set to No (zero) would be a maximum of 5 nights long if the checkin date was a Monday. This allows you to have midweek only tariffs.
    minrooms_alreadyselected
    maxrooms_alreadyselected These two settings allow you to create room/tariff combinations that are only offered if the guest has already selected another room in the booking form. Most of the time you would leave these at the defaults of 0 & 100.
	
    tariffinput[epoch] Prices for each date.
    dates_mindays[epoch] Minimum days stay for each date.

*/

Flight::route('PUT /cmf/property/tariff/', function() 
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid		= (int)$_PUT['property_uid'];

	cmf_utilities::validate_property_uid_for_user($property_uid);


    jr_import('jrportal_rates');
	$jrportal_rates = new jrportal_rates();
	$jrportal_rates->property_uid 				= $property_uid;
	$jrportal_rates->tarifftype_id  			= (int)jomresGetParam( $_PUT, 'tarifftypeid', 0 );
	$jrportal_rates->roomclass_uid 				= (int)jomresGetParam( $_PUT, 'roomclass_uid', 	$jrportal_rates->rates_defaults['roomclass_uid'] );

	$jrportal_rates->dates_rates				= $_PUT['tariffinput'];
	$jrportal_rates->dates_mindays				= $_PUT['mindaysinput'];

	if ($jrportal_rates->tarifftype_id > 0 && isset($jrportal_rates->rates[$jrportal_rates->tarifftype_id]) ) { // If tariff type id is set, when we get_rate the jrportal_rates class will throw an exception if the tariff type doesn't exist so we can trust that we are working on a valid tariff type here

		reset($jrportal_rates->rates[$jrportal_rates->tarifftype_id]);
		$first_key = key($jrportal_rates->rates[$jrportal_rates->tarifftype_id]);

		$jrportal_rates->rate_title					= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['rate_title'];
		$jrportal_rates->rate_description			= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['rate_description'];
		$jrportal_rates->maxdays					= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['maxdays'];
		$jrportal_rates->minpeople					= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['minpeople'];
		$jrportal_rates->maxpeople					= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['maxpeople'];
		$jrportal_rates->dayofweek					= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['dayofweek'];
		$jrportal_rates->ignore_pppn				= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['ignore_pppn'];
		$jrportal_rates->allow_we					= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['allow_we'];
		$jrportal_rates->weekendonly				= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['weekendonly'];
		$jrportal_rates->minrooms_alreadyselected	= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['minrooms_alreadyselected'];
		$jrportal_rates->maxrooms_alreadyselected	= $jrportal_rates->rates[$jrportal_rates->tarifftype_id][$first_key]['maxrooms_alreadyselected'];

		if ( isset($_PUT['rate_title'])) {
			$jrportal_rates->rate_title 				= jomresGetParam( $_PUT, 'rate_title', $jrportal_rates->rates_defaults['rate_title'] );
		}
		if ( isset($_PUT['rate_description'])) {
			$jrportal_rates->rate_description 			= jomresGetParam( $_PUT, 'rate_description', $jrportal_rates->rates_defaults['rate_description'] );
		}
		if ( isset($_PUT['maxdays'])) {
			$jrportal_rates->maxdays 					= (int)jomresGetParam( $_PUT, 'maxdays', $jrportal_rates->rates_defaults['maxdays'] );
		}
		if ( isset($_PUT['minpeople'])) {
			$jrportal_rates->minpeople 					= (int)jomresGetParam( $_PUT, 'minpeople', $jrportal_rates->rates_defaults['minpeople'] );
		}
		if ( isset($_PUT['maxpeople'])) {
			$jrportal_rates->maxpeople 					= (int)jomresGetParam( $_PUT, 'maxpeople', $jrportal_rates->rates_defaults['maxpeople'] );
		}
		if ( isset($_PUT['dayofweek'])) {
			$jrportal_rates->dayofweek 					= (int)jomresGetParam( $_PUT, 'dayofweek', $jrportal_rates->rates_defaults['dayofweek'] );
		}
		if ( isset($_PUT['ignore_pppn'])) {
			$jrportal_rates->ignore_pppn 				= (int)jomresGetParam( $_PUT, 'ignore_pppn', $jrportal_rates->rates_defaults['ignore_pppn'] );
		}
		if ( isset($_PUT['allow_we'])) {
			$jrportal_rates->allow_we 					= (int)jomresGetParam( $_PUT, 'allow_we', $jrportal_rates->rates_defaults['allow_we'] );
		}
		if ( isset($_PUT['weekendonly'])) {
			$jrportal_rates->weekendonly 				= (int)jomresGetParam( $_PUT, 'weekendonly', $jrportal_rates->rates_defaults['weekendonly'] );
		}
		if ( isset($_PUT['minrooms_alreadyselected'])) {
			$jrportal_rates->minrooms_alreadyselected 	= (int)jomresGetParam( $_PUT, 'minrooms_alreadyselected', $jrportal_rates->rates_defaults['minrooms_alreadyselected'] );
		}
		if ( isset($_PUT['maxrooms_alreadyselected'])) {
			$jrportal_rates->maxrooms_alreadyselected 	= (int)jomresGetParam( $_PUT, 'maxrooms_alreadyselected', $jrportal_rates->rates_defaults['maxrooms_alreadyselected'] );
		}

	} else {
		$jrportal_rates->rate_title 				= jomresGetParam( $_PUT, 'rate_title', $jrportal_rates->rates_defaults['rate_title'] );
		$jrportal_rates->rate_description 			= jomresGetParam( $_PUT, 'rate_description', $jrportal_rates->rates_defaults['rate_description'] );
		$jrportal_rates->maxdays 					= (int)jomresGetParam( $_PUT, 'maxdays', $jrportal_rates->rates_defaults['maxdays'] );
		$jrportal_rates->minpeople 					= (int)jomresGetParam( $_PUT, 'minpeople', $jrportal_rates->rates_defaults['minpeople'] );
		$jrportal_rates->maxpeople 					= (int)jomresGetParam( $_PUT, 'maxpeople', $jrportal_rates->rates_defaults['maxpeople'] );
		$jrportal_rates->roomclass_uid 				= (int)jomresGetParam( $_PUT, 'roomclass_uid', $jrportal_rates->rates_defaults['roomclass_uid'] );
		$jrportal_rates->dayofweek 					= (int)jomresGetParam( $_PUT, 'dayofweek', $jrportal_rates->rates_defaults['dayofweek'] );
		$jrportal_rates->ignore_pppn 				= (int)jomresGetParam( $_PUT, 'ignore_pppn', $jrportal_rates->rates_defaults['ignore_pppn'] );
		$jrportal_rates->allow_we 					= (int)jomresGetParam( $_PUT, 'allow_we', $jrportal_rates->rates_defaults['allow_we'] );
		$jrportal_rates->weekendonly 				= (int)jomresGetParam( $_PUT, 'weekendonly', $jrportal_rates->rates_defaults['weekendonly'] );
		$jrportal_rates->minrooms_alreadyselected 	= (int)jomresGetParam( $_PUT, 'minrooms_alreadyselected', $jrportal_rates->rates_defaults['minrooms_alreadyselected'] );
		$jrportal_rates->maxrooms_alreadyselected 	= (int)jomresGetParam( $_PUT, 'maxrooms_alreadyselected', $jrportal_rates->rates_defaults['maxrooms_alreadyselected'] );

	}
	// tariff type id, property id, room class id, prices and min days

	$jrportal_rates->save_rate();

	Flight::json( $response_name = "response" ,$jrportal_rates->tarifftype_id);
	});	

