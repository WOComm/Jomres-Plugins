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

Flight::route('GET /cmf/property/rooms/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$basic_room_details = jomres_singleton_abstract::getInstance('basic_room_details');
	$basic_room_details->get_all_rooms($property_uid);
	
	$jomres_room_types = jomres_singleton_abstract::getInstance('jomres_room_types');
	$jomres_room_types->get_all_room_types();
	
	$room_features_ids = array();
	if (!empty($basic_room_details->rooms)) {
		foreach ($basic_room_details->rooms as $room ) {
			if ($room['room_features_uid'] != '' ) {
				$bang = explode ("," , $room['room_features_uid'] );
				if (!empty($bang)) {
					foreach ($bang as $id ) {
						$room_features_ids[] = $id;
					}
					
				}
			}
		}
	}
	$room_features_ids = array_unique($room_features_ids);
	if (!empty($room_features_ids)){
		$basic_room_details->get_rooms_features($room_features_ids);
	}
	
	$rooms = array();
	if (!empty($basic_room_details->rooms)) {
		foreach ($basic_room_details->rooms as $room ) {
			$room_type_id = $room["room_classes_uid"];
			$room_features = array();
			if ($room['room_features_uid'] != '' ) {
				$bang = explode ("," , $room['room_features_uid'] );
				if (!empty($bang)) {
					foreach ($bang as $id ) {
						if ( isset($basic_room_details->all_room_features[$id])) {
							$room_features[] = $basic_room_details->all_room_features[$id]["feature_description"];
						}
					}
				}
			}

			$rooms[]= array (
				"room_uid"		=> $room["room_uid"] ,
				"room_name"		=> $room["room_name"] ,
				"room_number"	=> $room["room_number"] ,
				"room_type_id"	=> $room["room_classes_uid"] ,
				"room_type"		=> $jomres_room_types->room_types[ $room_type_id ] ["room_class_abbv"] ,
				"room_features"	=> $room_features ,
				"max_people"	=> $room["max_people"] ,
				"singleperson_suppliment"	=> $room["singleperson_suppliment"] ,
				"tagline"	=> $room["tagline"] ,
				"surcharge"	=> $room["surcharge"] ,
				"description"	=> $room["description"]
			) ;
		}
	}
	
	cmf_utilities::cache_write( $property_uid , "rooms" , $rooms );
	
	Flight::json( $response_name = "response" , $rooms ); 
	});
	
	