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

Flight::route('GET /cmf/property/cleaningfee/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	
	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/property/list/extras/".$property_uid,
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
	
	$cleaning_fee = 0.0;
	
	$response = json_decode(stripslashes($call_self->call($elements)));
	if ( isset ($response->data->response)) {
		if (!empty($response->data->response)) {
			foreach ($response->data->response as $extra ) {
				if($extra->name == jr_gettext('_CMF_CLEANING_STRING','_CMF_CLEANING_STRING',false , false ) ) { 
					$cleaning_fee = $extra->price;
				}
			}
		}
	}
	
	cmf_utilities::cache_write( $property_uid , "response" , $cleaning_fee );
	
	Flight::json( $response_name = "response" , $cleaning_fee ); 
	});
	
	