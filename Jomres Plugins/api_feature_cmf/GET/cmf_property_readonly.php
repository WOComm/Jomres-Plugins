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
*
* Return the property details of a property that exists in the system that belongs to the manager but is not owned by this channel
*
* Primarily for use by jomres2jomres and other systems that want to export properties from one system to another. The scope remains Channel Management
*
*/

Flight::route('GET /cmf/property/readonly/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_is_in_managers_authorised_properties_list($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid , true ); // Second arg allows the method to return more detailed information that otherwise is usually not included because pulling that information is slower

	// These shouldn't be editable via the CMF, so we'll unset them for the purpose of the REST API
	unset($property->all_property_uids);
	unset($property->apikey);
	unset($property->property_mappinglink);
	unset($property->property_site_id);
	
	cmf_utilities::cache_write( $property_uid , "response" , $property );
	
	Flight::json( $response_name = "response" , $property ); 
	});
	
	