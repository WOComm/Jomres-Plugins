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
	** Title | Webhooks Rooms Multiple Added
	** Description | This is normally triggered when Normal mode tariffs are changed, or multiple rooms are added. In this instance, the best approach is to respond with all room uids and room types for the property as individual rooms are added and removed during the save process
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/rooms_multiple_added
	** Data Parameters | None
	** Success Response | {"data":{"all_property_rooms":{"property_rooms":{"1":["7","8","9","10","11","12","13","14","15","16"],"3":["17","18","19","20","21","22","23","24","25","26"]},"room_types":{"1":{"abbv":"Double Room","desc":"","image":"double.png"},"3":{"abbv":"Single Room","desc":"","image":"single.png"}}}},"meta":{"code":200}}
	** Error Response | 403
	** Sample call |jomres/api/webhooks/1/rooms_multiple_added
	** Notes | Repies with two sets of data, the rooms, indexed by room type, and a list of the property's room types
*/

Flight::route('GET /webhooks/@id/rooms_multiple_added', function($property_uid)
	{
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
    $basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
    $basic_property_details->gather_data($property_uid);
    
    $response                                  = new stdClass();
    $response->property_rooms                  = $basic_property_details->multi_query_result[$property_uid]['rooms_by_type'];
    $response->room_types                      = $basic_property_details->multi_query_result[$property_uid]['room_types'];
    Flight::json( $response_name = "all_property_rooms" ,$response);
    
	});
