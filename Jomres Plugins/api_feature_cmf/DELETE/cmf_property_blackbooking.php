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
* Delete all property tariffs
*
*/

Flight::route('DELETE /cmf/property/blackbooking/@id/@contract_id', function($property_uid , $contract_id )
	{
	require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$contract_id = (int)$contract_id;
	
	$query="SELECT `contract_uid` FROM `#__jomres_room_bookings` WHERE `contract_uid` = ".$contract_id." AND  `property_uid` = ".(int)$property_uid;
	$contracts =doSelectSql($query);
	
	if (empty($contracts)) {
		Flight::halt(204, "Contract id is not valid");
	}
	
	jr_import('jomres_generic_booking_cancel');
	$bkg = new jomres_generic_booking_cancel();

	$bkg->property_uid = $property_uid;
	$bkg->contract_uid = $contract_id;
	$bkg->reason = '';
	$bkg->note = '';

	if ($bkg->cancel_booking()) {
		$response = true;
	} else {
		$response = false;
	}
	

	$response = true;
	
	Flight::json( $response_name = "response" ,$response );
	});