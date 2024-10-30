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
	** Title | Webhooks Guest Saved
	** Description | Notes when a guest is added/updated
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/guest_saved/:GUEST_UID
	** Data Parameters | None
	** Success Response | {"data":{"guest_details":{"firstname":"webhook test","surname":"webhook test","house":"webhook test","street":"webhook test","town":"webhooktest","county":"1305","country":"GB","postcode":"webhook test","tel_landline":"webhook test","tel_mobile":"webhook test","tel_fax":"","discount":"0","vat_number":"","vat_number_validated":"0"}},"meta":{"code":200}}
	** Error Response | 
	** Sample call |jomres/api/webhooks/1/guest_saved/13
	** Notes | Replies with 404 if the guest is not found
*/

Flight::route('GET /webhooks/@id/guest_saved/@guest_uid', function($property_uid , $guest_uid)
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
