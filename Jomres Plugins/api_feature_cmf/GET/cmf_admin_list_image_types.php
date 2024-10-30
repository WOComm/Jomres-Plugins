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

Flight::route('GET /cmf/admin/list/image/types', function()
	{
    require_once("../framework.php");
	
	cmf_utilities::validate_admin_for_user();
	
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
	