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

Flight::route('PUT /cmf/property/blackbooking', function()
	{
    require_once("../framework.php");

	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$_PUT['property_uid'];
	$dates_unavailable		= json_decode(stripslashes($_PUT['availability']));
	$room_ids				= json_decode(stripslashes($_PUT['room_ids']));
	$remote_booking_id		= filter_var( $_PUT['remote_booking_id'] , FILTER_SANITIZE_SPECIAL_CHARS );
	if (isset($_PUT['text'])) {
        $text   				= filter_var( $_PUT['text'], FILTER_SANITIZE_SPECIAL_CHARS); // This can be used for any textual content
    } else {
	    $text = '';
    }

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	if (empty($dates_unavailable)) {
		Flight::halt(204, "No dates sent to set availability.");
	}

	if ( !cmf_utilities::validate_date($dates_unavailable->date_from) ) {
		Flight::halt(204, "Date from incorrect, must be in Y-m-d format");
		}
	
	if ( !cmf_utilities::validate_date($dates_unavailable->date_to) ) {
		Flight::halt(204, "Date to incorrect, must be in Y-m-d format");
		}

	if (!isset($remote_booking_id) || is_null($remote_booking_id)) {
		$remote_booking_id = 'Unknown';
	}
	
	$basic_room_details = jomres_singleton_abstract::getInstance( 'basic_room_details' );
	$basic_room_details->get_all_rooms($property_uid);
	
	if (empty($basic_room_details->rooms)) {
		Flight::halt(204, "No rooms in property, cannot book anything");
	}
	
	$response = array();
	
	$rooms_to_block = array();
	if ( empty($room_ids) ) {  // We'll attempt to block all rooms
		foreach ($basic_room_details->rooms as $room ) {
			$rooms_to_block[] = $room['room_uid'];
		}
	} else { // We'll block those room ids supplied
		foreach ($room_ids as $room_id) {
			if ( array_key_exists($room_id , $basic_room_details->rooms ) ) {
				$rooms_to_block[] = (int)$room_id;
			}
		}
	}

	jr_import('jomres_generic_black_booking_insert');
	$bkg = new jomres_generic_black_booking_insert();
	$bkg->property_uid			= $property_uid;
	$bkg->arrival				= date( "Y/m/d" , strtotime($dates_unavailable->date_from));
	$bkg->departure				= date( "Y/m/d" , strtotime($dates_unavailable->date_to." +1 day"));
	$bkg->room_uids				= $rooms_to_block;
	$bkg->special_reqs			= $text ;
	$bkg->booking_number		= $remote_booking_id;

	if ( $bkg->create_black_booking() ) {
		$response = array ( "success" => true , "contract_id" => $bkg->contract_uid );
	} else {
		$response = array ( "success" => false );
	}

	Flight::json( $response_name = "response" , $response ); 
	});
	
	