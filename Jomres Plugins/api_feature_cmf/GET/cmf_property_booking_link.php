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

Find the local booking/contract uid based on the remote booking number

*/

Flight::route('GET /cmf/property/booking/link/@property_uid/@remote_booking_number', function( $property_uid , $remote_booking_number )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;
	$remote_booking_number		= filter_var($remote_booking_number, FILTER_SANITIZE_SPECIAL_CHARS);

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$mrConfig = getPropertySpecificSettings($property_uid);

	if ($remote_booking_number == '' ) {
		Flight::halt(204, "Remote booking id not set.");
	}
	
	$query = "SELECT  `local_booking_id` FROM #__jomres_channelmanagement_framework_bookings_xref WHERE remote_booking_id = ".$remote_booking_number.' AND `property_uid` = '.$property_uid.' AND `channel_id` = '.Flight::get('channel_id');
	$local_bookings = doSelectSql($query);

	Flight::json( $response_name = "response" , array ( "local_bookings" => $local_bookings ) );
	});
	
	