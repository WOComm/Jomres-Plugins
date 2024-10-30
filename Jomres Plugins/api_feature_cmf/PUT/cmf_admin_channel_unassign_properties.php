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

Flight::route('PUT /cmf/admin/channel/unassign/properties', function()
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();

	$_PUT = $GLOBALS['PUT'];
	
	$channel_id					= (int)$_PUT['channel_id'];
	$all_properties = false;
	if (isset($_PUT['all_properties'])) {
		$all_properties = (bool)$_PUT['all_properties'];
	}
	$properties				= json_decode(stripslashes($_PUT['properties']));

	if ($channel_id == 0 ) {
		Flight::halt(204, "Channel id not sent");
	}
	
	if (empty($properties)) {
		Flight::halt(204, "No properties sent");
	}
	
	$query = "SELECT channel_id , property_uid FROM #__jomres_channelmanagement_framework_property_uid_xref ";
	$result = doSelectSql($query);

	$existing_channel_properties = array();
	if (!empty($result)) {
		foreach ( $result as $property ) {
			$existing_channel_properties[$property->property_uid] = $property->channel_id;
		}
	}

	$properties_to_unassign = array();
	$unsuccessful_unassignments = array();
	
	foreach ($properties as $property) {
		// This check has been disabled. Previously it would be that only one manager could be cross referenced with a property in the CMF xref table, however we want to use the CMF UI to allow local administration of properties using the CMF endpoints. To that end, each manager who has rights to admin the property (e.g. the creating manager, and then the super managers) need to have a record in the xref table. Ergo, these checks are now disabled.
		//if ( !array_key_exists( $property->property_uid , $existing_channel_properties) ) {
		//	$unsuccessful_unassignments[] = $property ;
		//} else {
			$properties_to_unassign[] = $property;
		//}
	}

	if ($all_properties) {
		if (!empty($existing_channel_properties)) {
			foreach ($existing_channel_properties as $property_uid => $chan_id) {
				if ($chan_id == $channel_id){
					$properties_to_unassign[] = $property_uid;
				}
			}
		}
	}

	$successful_unassignments = array();
	

	if (!empty($properties_to_unassign)) {
		foreach ($properties_to_unassign as $property ) {
			$query = "DELETE FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE property_uid = ".(int)$property->property_uid." LIMIT 1 ";
			if (doInsertSql($query)) {
				$successful_unassignments[] = $property;
			} else {
				$unsuccessful_unassignments[] = $property ;
			}
		}
	}


	// 
	
	$response = array ( "unsuccessful_unassignments" => $unsuccessful_unassignments , "successful_unassignment" => $successful_unassignments );
	
	Flight::json( $response_name = "response" , $response ); 
	});
	
	