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

Flight::route('PUT /cmf/property/remote/id', function()
	{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid						= (int)$_PUT['property_uid'];
	$new_remote_id						= (int)$_PUT['new_remote_id'];

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	if ( $property_uid == 0 ) {
		Flight::halt(204, "Remote property uid not sent");
	}
	
	if ( $new_remote_id == 0 ) {
		Flight::halt(204, "Remote id not sent");
	}

	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/properties/ids",
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
	);

	$response = json_decode(stripslashes($call_self->call($elements)));

	if (!isset($response->data->response) || !is_array($response->data->response) ) {
		Flight::halt(204, "Cannot get manager's properties");
	}

	$claim_property = false;
	foreach ($response->data->response as $property ) {
		if ($property->local_property_uid == $property_uid && is_null( $property->remote_property_uid )) {
			$claim_property = true;
		}
	}

	if ($claim_property) {
		$query = "INSERT INTO #__jomres_channelmanagement_framework_property_uid_xref ( channel_id , property_uid , remote_property_uid , cms_user_id ) VALUES ( ".(int)Flight::get('channel_id')." ,".(int)$property_uid." ,'".$new_remote_id."' ,".(int)Flight::get('user_id')." )";
	} else {
		$query = "UPDATE #__jomres_channelmanagement_framework_property_uid_xref SET remote_property_uid = ". $new_remote_id." WHERE property_uid = ".$property_uid." LIMIT 1";
	}

	if (doInsertSql($query)) {
		$response = (object) array( "success" => true );
	} else {
		Flight::halt(204, "Unable to update remote id ");
	}

	Flight::json( $response_name = "response" , $response );
	});
	
	