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

Return the property types

*/

Flight::route('GET /cmf/list/room/types', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

		$jomres_room_types = jomres_singleton_abstract::getInstance('jomres_room_types');
		$jomres_room_types->get_all_room_types();
	
	$response = array();
	if (!empty($jomres_room_types->room_types)) {
		foreach ( $jomres_room_types->room_types as $val ) {
			$response[] = array ( "room_classes_uid" => $val['room_classes_uid'] , "room_class_abbv" => $val['room_class_abbv'] , 'ptype_xref' => $val['ptype_xref']  ) ;
		}
	}

	Flight::json( $response_name = "response" , $response ); 
	});
	
	