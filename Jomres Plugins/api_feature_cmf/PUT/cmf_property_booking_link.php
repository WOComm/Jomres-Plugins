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

SRPs only, set dates available/not available

*/

Flight::route('PUT /cmf/property/booking/link', function()
	{
    require_once("../framework.php");

	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$_PUT['property_uid'];
	$remote_booking_id		= filter_var($_PUT['remote_booking_id'], FILTER_SANITIZE_SPECIAL_CHARS);
	$local_booking_id		= (int)$_PUT['local_booking_id'];

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if (!isset($mrConfig['minimuminterval'])) {
		$mrConfig['minimuminterval'] = 1;
	}
	
	if ($remote_booking_id == '' ) {
		Flight::halt(204, "Remote booking id not set.");
	}
	
	if ($local_booking_id == '' ) {
		Flight::halt(204, "Local booking id not set.");
	}
	
	$active_bookings = cmf_utilities::get_property_bookings( $property_uid );
	
	if (empty($active_bookings)) {
		Flight::halt(204, "Proprety has no active bookings");
	}
	
	$booking_found = false;
	foreach ( $active_bookings as  $active_booking ) {
		if ( $active_booking['contract_uid'] == $local_booking_id ) {
			$booking_found = true;
			$local_booking = $active_booking;
		}
	}
	
	if (!$booking_found) {
		Flight::halt(204, "Booking does not exist");
	}
	
	$query = "SELECT  id FROM #__jomres_channelmanagement_framework_bookings_xref WHERE local_booking_id = ".$local_booking_id;
	$id = doSelectSql($query , 1 );
	
	if (!$id) {
		$query = "INSERT INTO #__jomres_channelmanagement_framework_bookings_xref ( `property_uid`, `channel_id` , `remote_booking_id` , `local_booking_id`  ) VALUES ( ".$property_uid." , ".Flight::get('channel_id')." , '".$remote_booking_id."' , ".$local_booking_id." )";
		$id = doInsertSql($query);
	} else {
		$query = "UPDATE #__jomres_channelmanagement_framework_bookings_xref SET  `remote_booking_id`= '".$remote_booking_id."'  WHERE id = ".(int)$id;
		doInsertSql($query);
	}

	Flight::json( $response_name = "response" , array ( "link_id" => $id ) );
	});
	
	