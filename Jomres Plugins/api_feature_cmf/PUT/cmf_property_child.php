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

Flight::route('PUT /cmf/property/child', function()
	{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid						= (int)$_PUT['property_uid'];
	$remote_property_uid				= (int)$_PUT['remote_property_uid'];
	$remote__url						= filter_var($_PUT['remote__url'] , FILTER_VALIDATE_URL);
	$remote_username					= filter_var($_PUT['remote_username'], FILTER_SANITIZE_SPECIAL_CHARS);
	$jomres2jomres						= (int)(bool)$_PUT['jomres2jomres'];
	
	$remote_property_api_url			= '';
	$remote_property_api_client			= '';
	$remote_property_api_secret			= '';
	
	if ( isset($_PUT['jomres2jomres'])) {
		$jomres2jomres						= filter_var($_PUT['jomres2jomres'] , FILTER_VALIDATE_URL );
	}
	if ( isset($_PUT['remote_property_api_url'])) {
		$remote_property_api_url			= filter_var($_PUT['remote_property_api_url'] , FILTER_VALIDATE_URL);
	}
	if ( isset($_PUT['remote_property_api_client'])) {
		$remote_property_api_client			= filter_var($_PUT['remote_property_api_client'], FILTER_SANITIZE_SPECIAL_CHARS);
	}
	if ( isset($_PUT['remote_property_api_secret'])) {
		$remote_property_api_secret			= filter_var($_PUT['remote_property_api_secret'], FILTER_SANITIZE_SPECIAL_CHARS);
	}
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	if ( $remote_property_uid == 0 ) {
		Flight::halt(204, "Remote property uid not sent");
	}
	
	if ( $remote__url == '' ) {
		Flight::halt(204, "Remote url not sent. Anything do, including localhost and domains in an extranet, but it needs to be set");
	}
	
	if ( $remote_username == '' ) {
		Flight::halt(204, "Remote username not sent.");
	}
	
	$url = parse_url ($remote__url);
	$host = $url['host'];
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); // This utility will return an instance of jomres_properties, because this class has a method for updating an existing property without going through the UI.

	if (!isset($property->remote_data->children)) {
		$property->remote_data->children = array();
	}
	
	$property->remote_data->children[$host][$remote_property_uid] = array(
		"remote_property_uid"			=> $remote_property_uid,
		"remote__url"					=> $remote__url,
		"remote_username"				=> $remote_username,
		"jomres2jomres"					=> $jomres2jomres,
		"remote_property_api_url"		=> $remote_property_api_url,
		"remote_property_api_client"	=> $remote_property_api_client,
		"remote_property_api_secret"	=> $remote_property_api_secret
		);

	cmf_utilities::set_property_remote_data($property);

	Flight::json( $response_name = "response" , $property->remote_data->children[$host][$remote_property_uid] ); 
	});
	
	