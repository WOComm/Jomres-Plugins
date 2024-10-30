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

Flight::route('PUT /cmf/admin/property/change/channel', function()
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();

	$_PUT = $GLOBALS['PUT'];
	
	
	$property_uid					= (int)$_PUT['property_uid'];
	$new_channel_id					= (int)$_PUT['new_channel_id'];
	

	$query = "SELECT id , channel_id FROM  #__jomres_channelmanagement_framework_property_uid_xref WHERE property_uid = ".$property_uid." LIMIT 1";
	$current_channel = doSelectSql($query , 2 );
	
	if ( $current_channel == false ) {
		Flight::halt(204, "Property not owned by any channels");
	}
	
	if ( $current_channel['channel_id'] == $new_channel_id ) {
		Flight::halt(204, "Property already owned by this channel");
	}
	
	
	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/admin/list/channels/",
		"data"=>array()
		);
			
	$response = json_decode(stripslashes($call_self->call($elements)));
	
	
	
	if (empty($response->data->response) ) {
		Flight::halt(204, "Cannot get channel data");
	}
	
	$current_channels = json_decode(json_encode($response->data->response), true);

	if (!array_key_exists( $new_channel_id , $current_channels ) ) {
		Flight::halt(204, "New channel id is invalid");
	}
	
	$query = "UPDATE #__jomres_channelmanagement_framework_property_uid_xref SET channel_id = ".(int)$new_channel_id." WHERE id = ".$current_channel['id'] ;

	if (doInsertSql($query)) {
		$response = (object) array( "success" => true );
	} else {
		$response = (object) array( "success" => false , "message" => "Failed to change channel" );
	}
	
	Flight::json( $response_name = "response" , $response ); 
	});
	
	