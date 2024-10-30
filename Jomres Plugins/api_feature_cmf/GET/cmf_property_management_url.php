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

Flight::route('GET /cmf/property/management/url/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid			= (int) $property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$remote_data = cmf_utilities::get_property_remote_data ($property_uid);
	
	$management_url = '';
	if (isset($remote_data->origin_management_url)) {
		$management_url = $remote_data->origin_management_url;
	}

	Flight::json( $response_name = "response" , $management_url ); 
	});
	
	