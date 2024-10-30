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

Return all countries 

*/

Flight::route('GET /cmf/list/image/types', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$MiniComponents = jomres_getSingleton('mcHandler');
	$MiniComponents->triggerEvent('03379');
	$resource_types = $MiniComponents->miniComponentData['03379'];
	
	$image_types = array();

	foreach ($resource_types as $type => $resource_type ) {
		if (isset($resource_type["name"])) {
			$image_types[]= array (
				"type" => $resource_type["name"],
				"internal_type" => $type,
				"resource_id_required" => $resource_type["resource_id_required"]
				);
		}
	}

	Flight::json( $response_name = "response" , $image_types ); 
	});
	