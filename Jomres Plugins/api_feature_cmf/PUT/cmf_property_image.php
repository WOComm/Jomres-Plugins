<?php
/**
 * Core file
 *
 * @author  
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################



/*
	Tell the API to import an image for the property

*/

Flight::route('PUT /cmf/property/image/', function() 
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid		= (int)$_PUT['property_uid'];

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$url 				= filter_var($_PUT['url'], FILTER_SANITIZE_SPECIAL_CHARS);
	$resource_type		= filter_var($_PUT['resource_type'], FILTER_SANITIZE_SPECIAL_CHARS); 
	$resource_id		= (int)$_PUT['resource_id'];
	
	jr_import('channelmanagement_framework_utilities');
	$images = channelmanagement_framework_utilities :: get_image ( $url ,$property_uid , $resource_type , $resource_id );
	
	Flight::json( $response_name = "response" , array ( "resouce_type" => $resource_type , "images" => $images , "url" => get_showtime('live_site') )); 
	});	

