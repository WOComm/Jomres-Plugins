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

Flight::route('PUT /cmf/admin/channel/change/owner', function()
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();

	$_PUT = $GLOBALS['PUT'];
	
	
	$channel_id					= (int)$_PUT['channel_id'];
	$new_owner_cms_user_id		= (int)$_PUT['new_owner_cms_user_id'];
	
	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/admin/list/managers/",
		"data"=>array()
		);
			
	$response = json_decode(stripslashes($call_self->call($elements)));
	
	if (empty($response->data->response)) {
		Flight::halt(204, "No managers in system.");
	}
	
	$managers = (array)$response->data->response;
	
	$property_managers = array();
	foreach ($managers as $manager) {
		$manager = (array)$manager;
		$id = $manager['cms_user_id'];
		$property_managers[$id] = $manager;
	}
	
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/admin/list/channels/",
		"data"=>array()
		);
			
	$response = json_decode(stripslashes($call_self->call($elements)));
	
	$channels = (array)$response->data->response;
	
	$local_channels = array();
	foreach ($channels as $channel) {
		$channel = (array)$channel;
		$id = $channel['id'];
		$local_channels[$id] = $channel;
	}
	
	if (empty($channels)) {
		Flight::halt(204, "No channels in system.");
	}
	
	if ( !isset($local_channels[$channel_id]) ) {
		Flight::halt(204, "Channel not known");
	}
	
	if (isset($local_channels[$channel_id])) {
		if ($local_channels[$channel_id]['cms_user_id'] != $new_owner_cms_user_id) {
			$query = "UPDATE #__jomres_channelmanagement_framework_channels SET cms_user_id = ".$new_owner_cms_user_id." WHERE id = ".$channel_id ;
			if (doInsertSql($query)) {
				$response = (object) array( "success" => true );
			}
			
		} else {
			$response = (object) array( "success" => false , "message" => "Already owned by that manager" );
		}
	}
	
	Flight::json( $response_name = "response" , $response ); 
	});
	
	