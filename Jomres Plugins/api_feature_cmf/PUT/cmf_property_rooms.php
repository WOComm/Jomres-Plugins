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

Flight::route('PUT /cmf/property/rooms', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid			= (int)$_PUT['property_uid'];
	$rooms					= json_decode(stripslashes($_PUT['rooms']));

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	jr_import('jrportal_rooms');
	
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); 
	
	
	if ( $mrConfig[ 'singleRoomProperty' ] == '1' && isset($property->rooms["local_rooms"]) &&  count($property->rooms["local_rooms"]) == 1 ) {
		Flight::json( $response_name = "property" , array( "success" => 0 , "message" => "Cannot add more than one room to an SRP")  ); 
	}
	
	if ($mrConfig[ 'singleRoomProperty' ] == '1') {  // SRPs can only have one room, we need to pare back any extra rooms sent to ensure that only one is created
		$arr = array();
		$arr[0] = $rooms[0];
		$arr[0]->count = 1;
		$rooms = $arr;
	}

	foreach ( $rooms as $room_type ) {

		cmf_utilities::modify_property_rooms( $property_uid , $room_type);
		
		// Now query the rooms table for rooms and store that information in the xref table

		$query = "SELECT room_uid , room_classes_uid , max_people FROM #__jomres_rooms WHERE `propertys_uid` = ".$property_uid;
		$property_rooms = doSelectSql($query);

		$params = array( "local_rooms" => $property_rooms );

		$query = "SELECT id FROM #__jomres_channelmanagement_framework_rooms_xref WHERE `property_uid` = ".$property_uid." AND `channel_id` = ".Flight::get('channel_id');
		$existing = doSelectSql( $query );

		if (empty($existing)) {

			$query = "INSERT INTO #__jomres_channelmanagement_framework_rooms_xref 
				(
				`channel_id`,
				`property_uid`,
				`params`
				)
				VALUES
				(
				".(int)Flight::get('channel_id')." ,
				".$property_uid." , 
				'".serialize($params)."'
				)";
		} else {
			$query = "UPDATE #__jomres_channelmanagement_framework_rooms_xref 
				SET 
				`params` = '".serialize($params)."'
				WHERE 
					`channel_id` = ".(int)Flight::get('channel_id')."
				AND
					`property_uid` = ".$property_uid."
				";

		}
		doInsertSql($query);
	}

	
	
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); // This utility will return an instance of jomres_properties, because this class has a method for updating an existing property without going through the UI.
	unset($property->all_property_uids);
	unset($property->apikey);
	unset($property->property_mappinglink);
	unset($property->property_site_id);
	
	Flight::json( $response_name = "response" , $property ); 
	});
	
	