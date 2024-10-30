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


/**
*
* Delete all property tariffs
*
*/

Flight::route('DELETE /cmf/property/child/@property_uid/@hostname/@remote_property_id', function($property_uid , $hostname , $remote_property_id  )
	{
	require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); // This utility will return an instance of jomres_properties, because this class has a method for updating an existing property without going through the UI.
	
	if (!isset($property->remote_data->children)) {
		$response = array ( "success" => false , "message" => "Property has no children." );
	} elseif ( !isset($property->remote_data->children[$hostname])) {
		$response = array ( "success" => false , "message" => "Host unknown" );
	} elseif ( !isset($property->remote_data->children[$hostname][$remote_property_id]) ) {
		$response = array ( "success" => false , "message" => "Child unknown" );
	} else {
		unset($property->remote_data->children[$hostname][$remote_property_id]);
		cmf_utilities::set_property_remote_data($property);
		$response = array ("success" => true );
	}
	
	Flight::json( $response_name = "response" , $response ); 
	});