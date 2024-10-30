<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Webhooks Guest Deleted
	** Description | Should respond with 404
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/guest_deleted/:GUEST_UID
	** Data Parameters | None
	** Success Response |Response code 404
	** Error Response | 
	** Sample call |jomres/api/webhooks/1/guest_deleted/37
	** Notes | Replies with 404 if the extra is not found
*/

Flight::route('GET /webhooks/@id/guest_deleted/@guest_uid', function($property_uid , $guest_uid)
	{
    $guest_uid = (int)$guest_uid;
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

    jr_import( 'jrportal_guests' );
	$jrportal_guests = new jrportal_guests();
	$jrportal_guests->id = $guest_uid;
	$jrportal_guests->property_uid = $property_uid;

    if (!$jrportal_guests->get_guest()) {
        Flight::halt( "404" ,"invalid_guest_uid");
    } else {
        $response                               = new stdClass();
        $response->firstname                    = $jrportal_guests->firstname;
        $response->surname                      = $jrportal_guests->surname;
        $response->house                        = $jrportal_guests->house;
        $response->street                       = $jrportal_guests->street;
        $response->town                         = $jrportal_guests->town;
        $response->region                       = $jrportal_guests->region;
        $response->country                      = $jrportal_guests->country;
        $response->postcode                     = $jrportal_guests->postcode;
        $response->tel_landline                 = $jrportal_guests->tel_landline;
        $response->tel_mobile                   = $jrportal_guests->tel_mobile;
        $response->discount                     = $jrportal_guests->discount;
        $response->vat_number                   = $jrportal_guests->vat_number;
        $response->vat_number_validated         = $jrportal_guests->vat_number_validated;
        
        Flight::json( $response_name = "guest_details" ,$response);
        }
	});
