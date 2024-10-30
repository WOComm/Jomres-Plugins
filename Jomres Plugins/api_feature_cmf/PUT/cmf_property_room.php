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

Flight::route('PUT /cmf/property/room', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid				= (int)$_PUT['property_uid'];

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	jr_import('jrportal_rooms');
	
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid);

	$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
	$current_property_details->gather_data($property_uid);
	$room_types_available_to_this_property_type = array_keys ($current_property_details->this_property_room_classes);

	$room_type_id =  (int) jomresGetParam($_PUT, 'room_type_id', 0);

	if ($room_type_id ==0 ) {
		Flight::halt(204, "Room type not set ");
	}

	if (!in_array( $room_type_id , $room_types_available_to_this_property_type )) {
		Flight::halt(204, "Room type not valid for this property type");
	}

	if ( $mrConfig[ 'singleRoomProperty' ] == '1' && isset($property->rooms["local_rooms"]) &&  count($property->rooms["local_rooms"]) == 1 ) {
		Flight::json( $response_name = "property" , array( "success" => 0 , "message" => "Cannot add more than one room to an SRP")  ); 
	}

	$jrportal_rooms = new jrportal_rooms();

	$jrportal_rooms->propertys_uid				= $property_uid;
	$jrportal_rooms->room_uid					= (int) jomresGetParam($_PUT, 'room_uid', 0);
	$jrportal_rooms->room_classes_uid			= $room_type_id;
	$jrportal_rooms->max_people					= (int) jomresGetParam($_PUT, 'max_people', 0);
	$jrportal_rooms->room_name					= getEscaped(jomresGetParam($_PUT, 'room_name', ''));
	$jrportal_rooms->room_number				= getEscaped(jomresGetParam($_PUT, 'room_number', ''));
	$jrportal_rooms->room_floor					= getEscaped(jomresGetParam($_PUT, 'room_floor', ''));
	$jrportal_rooms->singleperson_suppliment	= (float) jomresGetParam($_PUT, 'singleperson_suppliment', 0.0);
	$jrportal_rooms->room_features_uid			= [];
	$jrportal_rooms->tagline					= getEscaped(jomresGetParam($_PUT, 'tagline', ''));
	$jrportal_rooms->surcharge					= (float) jomresGetParam($_PUT, 'surcharge', 0.0);
	$jrportal_rooms->description			= jomresGetParam($_PUT, 'description', '');

	if ($jrportal_rooms->room_uid > 0) {
		$jrportal_rooms->commit_update_room();
	} else {
		$jrportal_rooms->commit_new_room();
	}

	if ( $jrportal_rooms->room_uid > 0 ) {
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

		Flight::json( $response_name = "response" , array( "room_uid" => $jrportal_rooms->room_uid) );
	}

	});
	
	