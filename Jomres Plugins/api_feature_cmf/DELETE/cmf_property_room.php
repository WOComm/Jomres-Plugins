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

Flight::route('DELETE /cmf/property/room/@property_uid/@room_uid', function($property_uid , $room_uid )
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

		$jrportal_rooms					= new jrportal_rooms();
		$jrportal_rooms->propertys_uid	= $property_uid;
		$jrportal_rooms->room_uid		= $room_uid;
		$success = $jrportal_rooms->delete_room();

		if ($success) {
			$query = " DELETE FROM #__jomres_channelmanagement_framework_rooms_xref WHERE `property_uid` = ".$property_uid." AND `channel_id` = ".Flight::get('channel_id');
			doInsertSql($query);
			Flight::json( $response_name = "response" , true );
		} else {
			Flight::json( $response_name = "response" , false );
		}

	}
	});