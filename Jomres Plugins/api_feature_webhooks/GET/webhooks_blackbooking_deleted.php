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
	** Title | Webhooks Black Booking Deleted
	** Description | Should respond that the black booking id doesn't exist 404
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/blackbooking_deleted/:CONTRACT_UID
	** Data Parameters | None
	** Success Response | {"meta":{"code":"404","error_message":"invalid_contract_uid"}}
	** Error Response | 
	** Sample call |jomres/api/webhooks/1/blackbooking_deleted/1000
	** Notes | Correct response is 404, invalid_contract_uid
*/

Flight::route('GET /webhooks/@id/blackbooking_deleted/@contract_uid', function($property_uid , $contract_uid)
	{
    $contract_uid = (int)$contract_uid;
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	$current_contract_details = jomres_singleton_abstract::getInstance('basic_contract_details');
    $result = $current_contract_details->gather_data($contract_uid, $property_uid);
    if (!$result) {
        Flight::halt( "404" ,"invalid_contract_uid");
    } else {
        $response                               = new stdClass();
        $response->arrival                      = $current_contract_details->contract[$contract_uid]['contractdeets']['arrival'];
        $response->departure                    = $current_contract_details->contract[$contract_uid]['contractdeets']['departure'];
        $response->special_reqs                 = $current_contract_details->contract[$contract_uid]['contractdeets']['special_reqs'];
    }
 
    
	Flight::json( $response_name = "blackbooking_details" ,$result);
	
	});
