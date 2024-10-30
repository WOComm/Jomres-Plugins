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
	** Title | Get property black bookings
	** Description | Get dates when the property is not available
*/


Flight::route('GET /cmf/property/list/blackbookings/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	

	if ( (int)$property_uid == 0) {
		Flight::halt(204, "property id not sent");
	}

	$today = date("Y-m-d");
	
	$query="SELECT DISTINCT contract_uid FROM #__jomres_room_bookings WHERE black_booking = '1' AND property_uid = ".(int)$property_uid ." AND DATE_FORMAT(`date`, '%Y-%m-%d') >= ".$today;
	$black_bookings_list = doSelectSql($query);

	$black_bookings_contract_uids = array();
	if (!empty($black_bookings_list)) {
		foreach ($black_bookings_list as $black_booking ) {
			$black_bookings_contract_uids['blackbooking_ids'][] = $black_booking->contract_uid;
		}
	}

	if ( isset($black_bookings_contract_uids['blackbooking_ids'])) {
		$query = "SELECT `contract_uid` ,  `arrival` , `departure` FROM #__jomres_contracts WHERE `property_uid` = ".(int)$property_uid." AND `contract_uid` IN (".jomres_implode($black_bookings_contract_uids['blackbooking_ids']).") AND `cancelled` != 1 AND rejected  != 1 AND bookedout != 1 ORDER BY arrival ASC    ";
		$all_bookings = doSelectSql($query);
		
		$bookings = array();
		if (!empty($all_bookings)) {
			foreach ($all_bookings as $booking ) {
				$date_from = str_replace( "/" , "-" , $booking->arrival);
				$date_to = date ( "Y-m-d" , strtotime($booking->departure." -1 day") );
				$bookings[$booking->contract_uid] = array ( "date_from" => $date_from , "date_to" => $date_to ) ;
			}
		$black_bookings_contract_uids['blackbookings'] = $bookings;
		}
	}
	cmf_utilities::cache_write( $property_uid , "response" , $black_bookings_contract_uids );
	
	Flight::json( $response_name = "response" , $black_bookings_contract_uids ) ;
	});

