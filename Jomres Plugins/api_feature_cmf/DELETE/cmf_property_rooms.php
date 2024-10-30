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

Flight::route('DELETE /cmf/property/rooms/@id', function($property_uid)
	{
    require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$bookings = cmf_utilities::get_property_bookings( $property_uid );
	if (!empty($bookings)){
		Flight::json( $response_name = "delete_tariffs" ,$response = array( "success" => false , "error" => "There are bookings for this property, you must delete all bookings before attempting to delete rooms") );
	}
	
 	if ( $property_uid > 0 ) {
		jr_import('jrportal_rooms');
		
		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data($property_uid);

		if (!empty($current_property_details->multi_query_result[$property_uid]['rooms_by_type'])) {
			foreach ( $current_property_details->multi_query_result[$property_uid]['rooms_by_type'] as $room_type ) {
				if (!empty($room_type)) {
					foreach ($room_type as $room_uid ) {
						// Can't use jrportal_rooms class as it checks to see if it's an SRP, and if it is that class doesn't allow us to delete rooms because it assumes that any room is the property's only room
						$query = 'DELETE FROM #__jomres_rooms WHERE `room_uid` = '.(int) $room_uid.' AND `propertys_uid` = '.(int) $property_uid;
						if (!doInsertSql($query, jr_gettext('_JOMRES_COM_MR_ROOM_DELETED', '_JOMRES_COM_MR_ROOM_DELETED', false))) {
							throw new Exception('Error: Delete room failed.');
						}
					}
				}
			}
			$query = " DELETE FROM #__jomres_channelmanagement_framework_rooms_xref WHERE `property_uid` = ".$property_uid." AND `channel_id` = ".Flight::get('channel_id');
			doInsertSql($query);
		}
	}
	
	$query = "SELECT  `params` FROM #__jomres_channelmanagement_framework_rooms_xref WHERE `property_uid` = ".$property_uid." AND `channel_id` = ".Flight::get('channel_id')." LIMIT 1";
	$existing_rooms = doSelectSql( $query , 2 );
	
	if (!empty($existing_rooms)) {
		$response = false;
	} else {
		$response = true;
	}
	
	
	Flight::json( $response_name = "response" ,$response );
	});