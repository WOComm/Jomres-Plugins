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
	** Title | Webhooks Guest Checked out
	** Description | Notifies remote services that a guest has been checked out
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/guest_checkedout/:CONTRACT_UID
	** Data Parameters | None
	** Success Response | {"data":{"contract_details":{"arrival":"2016\/12\/30","departure":"2016\/12\/31","guest_uid":"13","rooms_tariffs":"53^72","deposit_paid":"0","contract_total":"133","special_reqs":"","extras":"1,","cancelled":"0","coupon_id":"0","firstname":"webhook test","surname":"webhook test","image":"http:\/\/localhost\/joomla_portal\/jomres\/images\/noimage.gif","extradeets":{"1":{"uid":"1","name":"Final cleaning","price":"70","tax_rate":"1","qty":1}},"roomdeets":{"53":{"room_uid":"53","black_booking":null,"reception_booking":"1","internet_booking":"0","room_classes_uid":"1","room_name":"","room_number":"01","room_floor":"","max_people":"2","singleperson_suppliment":"0","rate_title":"Double STD -  Bed & Breakfast - WD\/WE"}}}},"meta":{"code":200}}
	** Error Response | 
	** Sample call |jomres/api/webhooks/1/guest_checkedout/41
	** Notes | Replies with the booking details from the query
*/

Flight::route('GET /webhooks/@id/guest_checkedout/@contract_uid', function($property_uid , $contract_uid)
	{
    $contract_uid = (int)$contract_uid;
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$current_contract_details = jomres_singleton_abstract::getInstance('basic_contract_details');
    $current_contract_details->gather_data($contract_uid, $property_uid);
    $result = $current_contract_details->gather_data($contract_uid, $property_uid);

    if (!$result) {
        Flight::halt( "404" ,"invalid_contract_uid");
    } else {
        $response                               = new stdClass();
        $response->arrival                      = $current_contract_details->contract[$contract_uid]['contractdeets']['arrival'];
        $response->departure                    = $current_contract_details->contract[$contract_uid]['contractdeets']['departure'];
        $response->guest_uid                    = $current_contract_details->contract[$contract_uid]['contractdeets']['guest_uid'];
        $response->rooms_tariffs                = $current_contract_details->contract[$contract_uid]['contractdeets']['rooms_tariffs'];
        $response->deposit_paid                 = $current_contract_details->contract[$contract_uid]['contractdeets']['deposit_paid'];
        $response->contract_total               = $current_contract_details->contract[$contract_uid]['contractdeets']['contract_total'];
        $response->special_reqs                 = $current_contract_details->contract[$contract_uid]['contractdeets']['special_reqs'];
        $response->extras                       = $current_contract_details->contract[$contract_uid]['contractdeets']['extras'];
        $response->cancelled                    = $current_contract_details->contract[$contract_uid]['contractdeets']['cancelled'];
        $response->coupon_id                    = $current_contract_details->contract[$contract_uid]['contractdeets']['coupon_id'];
        $response->booked_in                    = $current_contract_details->contract[$contract_uid]['contractdeets']['booked_in'];
        $response->bookedout                    = $current_contract_details->contract[$contract_uid]['contractdeets']['bookedout'];
        $response->firstname                    = $current_contract_details->contract[$contract_uid]['guestdeets']['firstname'];
        $response->surname                      = $current_contract_details->contract[$contract_uid]['guestdeets']['surname'];
        $response->image                        = $current_contract_details->contract[$contract_uid]['guestdeets']['image'];
        $response->extradeets                   = $current_contract_details->contract[$contract_uid]['extradeets'] ;
        $response->roomdeets                    = $current_contract_details->contract[$contract_uid]['roomdeets'] ; 
        
        Flight::json( $response_name = "contract_details" ,$response);
        }
	});
