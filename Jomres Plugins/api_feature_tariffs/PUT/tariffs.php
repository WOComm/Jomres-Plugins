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

Flight::route('PUT /tariffs/@id/micromanage', function($property_uid) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

    $property_uid = (int)$property_uid;
    
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
    
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if ($mrConfig['tariffmode'] != '2' || $mrConfig[ 'is_real_estate_listing' ] == '1' || get_showtime('is_jintour_property')) {
        Flight::halt(204, "Tariff save method not valid for this property");
    }

	
	$_PUT = $GLOBALS['PUT'];

    jr_import('jrportal_rates');
	$jrportal_rates = new jrportal_rates();
	$jrportal_rates->property_uid = $property_uid;

	$jrportal_rates->tarifftype_id  			= (int)jomresGetParam( $_PUT, 'tarifftypeid', 0 );
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

	//tariffs and min days, not sanitized yet. The rates class will do this
	//TODO find a better way
	$jrportal_rates->dates_rates				= $_PUT['tariffinput'];
	$jrportal_rates->dates_mindays				= $_PUT['mindaysinput'];

	//save tariff
	$jrportal_rates->save_rate();

	Flight::json( $response_name = "tarifftypeid" ,$jrportal_rates->tarifftype_id);
	});	

