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
	** Title | Webhooks Room Deleted
	** Description | Responds with 404 if the room does not exist
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/room_deleted/:ROOM_UID
	** Data Parameters | None
	** Success Response | 404
	** Error Response | {"data":{"room_details":{"room_uid":54,"room_classes_uid":1,"propertys_uid":1,"room_features_uid":"","room_name":"","room_number":"02","room_floor":"","max_people":2,"singleperson_suppliment":0}},"meta":{"code":200}}
	** Sample call |jomres/api/webhooks/1/room_deleted/37
	** Notes | Replies with the booking details from the query
*/

Flight::route('GET /webhooks/@id/room_deleted/@room_uid', function($property_uid , $room_uid)
	{
    $room_uid = (int)$room_uid;
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
    $basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
    $basic_property_details->gather_data($property_uid);
    $property_rooms = $basic_property_details->multi_query_result[$property_uid]['rooms'];
    if (!in_array( $room_uid , $property_rooms)) {
        Flight::halt( "404" ,"invalid_room_uid");
    }

    try {    
        $basic_room_details = jomres_singleton_abstract::getInstance('basic_room_details');
        $basic_room_details->get_room($room_uid);
        
        Flight::json( $response_name = "room_details" ,$basic_room_details->room);
    } catch (Exception $e) {
            Flight::halt( "404" ,"invalid_room_uid");
            }
	});
