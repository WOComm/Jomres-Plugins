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
	** Title | Get list tariffs for a specific property
	** Description | Get list tariffs by property uid
	** Plugin | api_feature_tariffs
	** Scope | properties_get
	** URL | tariffs
 	** Method | GET
	** URL Parameters | tariffs/@ID
	** Data Parameters | None
	** Success Response | {
  "data": {
    "tariffs": {
      "1": {
        "517": {
          "4089": {
            "rates_uid": 4089,
            "rate_title": "Tariff",
            "rate_description": "",
            "validfrom": "2017/04/01",
            "validto": "2018/12/31",
            "roomrateperday": "100",
            "mindays": 1,
            "maxdays": 365,
            "minpeople": 1,
            "maxpeople": 100,
            "roomclass_uid": 1,
            "ignore_pppn": 0,
            "allow_ph": 1,
            "allow_we": 1,
            "weekendonly": 0,
            "validfrom_ts": 2017,
            "validto_ts": 2018,
            "dayofweek": 7,
            "minrooms_alreadyselected": 0,
            "maxrooms_alreadyselected": 100,
            "property_uid": 32,
            "tarifftype_id": 517
          }
        }
      }
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/tariffs/1/(/@language)
	** Notes | returns an array like $this->rates[roomclass_uid][tarifftype_id][rates_uid][]
	
*/

Flight::route('GET /tariffs/@id(/@language)', function( $property_uid , $language ) 
	{
    $property_uid = (int)$property_uid;
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
    
    $current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
    
    $basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
	$basic_rate_details->get_rates($property_uid);
       
	Flight::json( $response_name = "tariffs" ,$basic_rate_details->rates);
	});
