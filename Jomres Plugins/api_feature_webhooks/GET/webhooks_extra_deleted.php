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
	** Title | Webhooks Extra Deleted
	** Description | Should respond with 404
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/extra_deleted/:EXTRA_UID
	** Data Parameters | None
	** Success Response |Response code 404
	** Error Response | 
	** Sample call |jomres/api/webhooks/1/extra_deleted/37
	** Notes | Replies with 404 if the extra is not found
*/

Flight::route('GET /webhooks/@id/extra_deleted/@contract_uid', function($property_uid , $extra_uid)
	{
    $extra_uid = (int)$extra_uid;
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
    $query = $query="SELECT `name`,`desc`,`price`,`auto_select`,`tax_rate`,`maxquantity`,`validfrom`,`validto`,`include_in_property_lists`,`limited_to_room_type` FROM `#__jomres_extras` WHERE uid = '".$extra_uid."' AND property_uid = '".$property_uid."' LIMIT 1";
	$exList =doSelectSql($query);
            
    if (count($exList)==0) {
        Flight::halt( "404" ,"invalid_extra_uid");
    } else {
        $response                               = new stdClass();
        $response->name                         = $exList[0]->name;
        $response->desc                         = $exList[0]->desc;
        $response->auto_select                  = $exList[0]->auto_select;
        $response->tax_rate                     = $exList[0]->tax_rate;
        $response->maxquantity                  = $exList[0]->maxquantity;
        $response->validfrom                    = $exList[0]->validfrom;
        $response->validto                      = $exList[0]->validto;
        $response->include_in_property_lists    = $exList[0]->include_in_property_lists;
        $response->limited_to_room_type         = $exList[0]->limited_to_room_type;
        
        Flight::json( $response_name = "extra_details" ,$response);
        }
	});
