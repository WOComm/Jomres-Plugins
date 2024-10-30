<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*

Return the items for a given property type (e.g. property types) that currently exist in the system

*/

Flight::route('PUT /cmf/property/unpublish', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid			= (int)$_PUT['property_uid'];
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/property/status/".$property_uid,
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
			
	$property_status = json_decode(stripslashes($call_self->call($elements)));

	$response = false;
	if ( $property_status->data->response->status_code == "1" ||  $property_status->data->response->status_code == "2" ) {
		$jomres_properties = jomres_singleton_abstract::getInstance('jomres_properties');
		$jomres_properties->propertys_uid = $property_uid;
		$jomres_properties->unpublish_property();
		$response = true;
	}

	$warnings = array();
	
	Flight::json( $response_name = "response" , $response ); 
	});
	
	