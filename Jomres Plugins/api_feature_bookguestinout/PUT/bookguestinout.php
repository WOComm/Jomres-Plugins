<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Put check-in for a specific property
	** Description | Put check-in by property uid and contract id
	** Plugin | api_feature_bookguestinout
	** Scope | properties_set
	** URL | bookguestinout
 	** Method | PUT
	** URL Parameters | bookguestinout/:ID/:CONTRACTID/checkin/(:LANGUAGE)
	** Data Parameters | property_uid, contract_uid
	** Success Response |{
  "data": {
    "checkin_booked_in": [
      {
        "contract_uid": "58",
        "property_uid": "1",
        "note": "Booked guest in",
        "booked_in": 1
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/bookguestinout/8/226/checkin
	** Notes | None
*/

Flight::route('PUT /bookguestinout/@id/@contractid/checkin/(@language)', function($property_uid, $contract_uid, $language) 
	{

	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
    require_once("../framework.php");

	if ($contract_uid == 0)
		{
		Flight::halt(204, "Contract uid not sent");
		}
		
	jr_import('jrportal_booking_manager');
	$jrportal_booking_manager = new jrportal_booking_manager();
	$jrportal_booking_manager->contract_uid = (int)$contract_uid;
	$jrportal_booking_manager->property_uid = (int)$property_uid;
	$jrportal_booking_manager->guest_checkin();

	$checkin_booked_in = array();
	$checkin_booked_in[] = array ( 
		"contract_uid" => $contract_uid,
		"property_uid" => $property_uid,
		"note" => jr_gettext('_JOMRES_BOOKGUESTINOUT_API_CHECKIN','_JOMRES_BOOKGUESTINOUT_API_CHECKIN',false),
		"booked_in" => 1
		);

	Flight::json( $response_name = "checkin_booked_in" ,$checkin_booked_in);
	});


/*
	** Title | Put Undo check-in for a specific contract
	** Description | Put Undo check-in by property uid and contract id
	** Plugin | api_feature_bookguestinout
	** Scope | properties_set
	** URL | bookguestinout
 	** Method | PUT
	** URL Parameters | bookguestinout/:ID/:CONTRACTID/undo_checkin/(:LANGUAGE)
	** Data Parameters | property_uid, contract_uid
	** Success Response |{
  "data": {
    "undo_checkin_booked_in": [
      {
        "contract_uid": "58",
        "property_uid": "1",
        "note": "Undid guest book-in",
        "booked_in": 0
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/bookguestinout/1/226/undo_checkin
	** Notes | None
*/

Flight::route('PUT /bookguestinout/@id/@contractid/undo_checkin/(@language)', function($property_uid, $contract_uid, $language) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
    require_once("../framework.php");

	if ($contract_uid == 0)
		{
		Flight::halt(204, "Contract uid not sent");
		}
		
	jr_import('jrportal_booking_manager');
	$jrportal_booking_manager = new jrportal_booking_manager();
	$jrportal_booking_manager->contract_uid = (int)$contract_uid;
	$jrportal_booking_manager->property_uid = (int)$property_uid;
	$jrportal_booking_manager->undo_guest_checkin();	

	$undo_checkin_booked_in = array();
    $undo_checkin_booked_in[] = array ( 
		"contract_uid" => $contract_uid,
		"property_uid" => $property_uid,
		"note" => jr_gettext('_JOMRES_BOOKGUESTINOUT_API_UNDO_CHECKIN','_JOMRES_BOOKGUESTINOUT_API_UNDO_CHECKIN',false),
		"booked_in" => 0
		);
	
	Flight::json( $response_name = "undo_checkin_booked_in" ,$undo_checkin_booked_in);
	});
	
/*
	** Title | Put check-out for a specific property
	** Description | Put check-out by property uid and contract id
	** Plugin | api_feature_bookguestinout
	** Scope | properties_set
	** URL | bookguestinout
 	** Method | PUT
	** URL Parameters | bookguestinout/:ID/:CONTRACTID/checkout/(:LANGUAGE)
	** Data Parameters | property_uid, contract_uid
	** Success Response |{
  "data": {
    "checkout_bookedout": [
      {
        "contract_uid": "58",
        "property_uid": "1",
        "note": "Booked guest out",
        "bookedout": 1
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/bookguestinout/8/226/checkout
	** Notes | None
*/

Flight::route('PUT /bookguestinout/@id/@contractid/checkout/(@language)', function($property_uid,$contract_uid, $language) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
    require_once("../framework.php");

	if ($contract_uid == 0)
		{
		Flight::halt(204, "Contract uid not sent");
		}
		
	jr_import('jrportal_booking_manager');
	$jrportal_booking_manager = new jrportal_booking_manager();
	$jrportal_booking_manager->contract_uid = (int)$contract_uid;
	$jrportal_booking_manager->property_uid = (int)$property_uid;
	$jrportal_booking_manager->guest_checkout();
	
	$checkout_bookedout = array();
	$checkout_bookedout[] = array ( 
		"contract_uid" => $contract_uid,
		"property_uid" => $property_uid,
		"note" => jr_gettext('_JOMRES_BOOKGUESTINOUT_API_CHECKOUT','_JOMRES_BOOKGUESTINOUT_API_CHECKOUT',false),
		"bookedout" => 1
		);

	Flight::json( $response_name = "checkout_bookedout" ,$checkout_bookedout);
	});

/*
	** Title | Put Undo check-out for a specific property
	** Description | Put Undo check-out by property uid and contract id
	** Plugin | api_feature_bookguestinout
	** Scope | properties_set
	** URL | bookguestinout
 	** Method | PUT
	** URL Parameters | bookguestinout/:ID/:CONTRACTID/undo_checkout/(:LANGUAGE)
	** Data Parameters | property_uid, contract_uid
	** Success Response |{
  "data": {
    "undo_checkout_bookedout": [
      {
        "contract_uid": "58",
        "property_uid": "1",
        "note": "Undid guest book-out",
        "bookedout": 0
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/bookguestinout/8/226/undo_checkout
	** Notes | None
*/

Flight::route('PUT /bookguestinout/@id/@contractid/undo_checkout/(@language)', function($property_uid,$contract_uid, $language) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
    require_once("../framework.php");

	if ($contract_uid == 0)
		{
		Flight::halt(204, "Contract uid not sent");
		}
	
	jr_import('jrportal_booking_manager');
	$jrportal_booking_manager = new jrportal_booking_manager();
	$jrportal_booking_manager->contract_uid = (int)$contract_uid;
	$jrportal_booking_manager->property_uid = (int)$property_uid;
	$jrportal_booking_manager->undo_guest_checkout();

	$undo_checkout_bookedout = array();
	$undo_checkout_bookedout[] = array ( 
		"contract_uid" => $contract_uid,
		"property_uid" => $property_uid,
		"note" => jr_gettext('_JOMRES_BOOKGUESTINOUT_API_UNDO_CHECKOUT','_JOMRES_BOOKGUESTINOUT_API_UNDO_CHECKOUT',false),
		"bookedout" => 0
		);

	Flight::json( $response_name = "undo_checkout_bookedout" ,$undo_checkout_bookedout);
	});	
