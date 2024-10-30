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

Flight::route('GET /cmf/property/room/type/features/@id/@local_room_type_id', function( $property_uid , $local_room_type_id )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); // This utility will return an instance of jomres_properties, because this class has a method for updating an existing property without going through the UI.
	
	$local_room_type_id = (int)$local_room_type_id;
	if ( $local_room_type_id == 0 ) {
		Flight::json( $response_name = "property_room_features" ,array( "success" => 0 , "message" => "Room type id not sent") ); 
	}
	
	$features = array();
	
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
			if ($room["room_classes_uid"] == $local_room_type_id ) {
				$room_type_id = $room["room_classes_uid"];
				$room_features = array();
				if ($room['room_features_uid'] != '' ) {
					$bang = explode ("," , $room['room_features_uid'] );
					if (!empty($bang)) {
						foreach ($bang as $id ) {
							$room_features[] = array ("feature_name" => $basic_room_details->all_room_features[$id]["feature_description"] , "feature_id" => $id );
						}
					}
				}
				
				if (!empty($room_features)) {
					foreach ($room_features as $feature) {
						$features[]= $feature ;
					}
				}
				

			}
			
		}
	}
	
	$features = super_unique($features);
	$features = array_values($features);

	cmf_utilities::cache_write( $property_uid , "property_room_features" , $features );
	
	Flight::json( $response_name = "response" , $features ); 
	});
	
	
function super_unique($array)
{
  $result = array_map("unserialize", array_unique(array_map("serialize", $array)));

  foreach ($result as $key => $value)
  {
    if ( is_array($value) )
    {
      $result[$key] = super_unique($value);
    }
  }

  return $result;
}