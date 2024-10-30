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
* Delete all property rooms
*
*/

Flight::route('DELETE /cmf/property/image/@id/@file_name/@resource_type/@resource_id', function($property_uid , $file_name , $resource_type , $resource_id )
	{
    require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
 	$property_uid		= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$file_name			= filter_var($file_name, FILTER_SANITIZE_SPECIAL_CHARS);
	$resource_type		= filter_var($resource_type, FILTER_SANITIZE_SPECIAL_CHARS); 
	$resource_id		= (int)$resource_id;
	
	jr_import('channelmanagement_framework_utilities');
	$images = channelmanagement_framework_utilities ::delete_image ($file_name , $property_uid , $resource_type , $resource_id );
	
	
	Flight::json( $response_name = "response" , array ( "resouce_type" => $resource_type , "images" => $images , "url" => get_showtime('live_site') ) );
	});