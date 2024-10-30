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

Flight::route('PUT /cmf/property/contacts', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid		= (int)$_PUT['property_uid'];
	$telephone			= strtoupper(filter_var( $_PUT['telephone'], FILTER_SANITIZE_SPECIAL_CHARS));
	$fax				= strtoupper(filter_var( $_PUT['fax'], FILTER_SANITIZE_SPECIAL_CHARS));
	$email				= strtolower(filter_var( $_PUT['email'], FILTER_SANITIZE_SPECIAL_CHARS));

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); // This utility will return an instance of jomres_properties, because this class has a method for updating an existing property without going through the UI.
	
	$property->property_tel					= $telephone;
	$property->property_fax					= $fax;
	$property->property_email				= $email;
	
	$property = cmf_utilities::update_property($property);  // This utility will perform any checks required and then update the db with the property details

	
	Flight::json( $response_name = "response" , $property ); 
	});
	
	