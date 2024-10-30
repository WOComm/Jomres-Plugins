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

Flight::route('PUT /cmf/reservations/add', function()
	{
	
	define("FORCE_JOMRES_SESSION" , true );
	
    require_once("../framework.php");

	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$session_id = jomres_cmsspecific_getsessionid();

	$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
	$tmpBookingHandler->initBookingSession( $session_id );

	$reservations = json_decode($_PUT['reservations']); // Removed stripslashes

	if ($reservations == false ) {
		Flight::halt(204, "Invalid reservation data passed");
	}
	
	if ( empty($reservations->reservations) ) {
		Flight::halt(204, "No reservation data passed");
	}

	$call_self = new call_self( );
	
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/properties/ids",
		"data"=>array(),
		"headers" => array (
			Flight::get('channel_header' ).": ".Flight::get('channel_name'),
			"X-JOMRES-proxy-id: ".Flight::get('user_id')
			)
		);

	$properties_response = json_decode(stripslashes($call_self->call($elements)));

	if ( !isset($properties_response->data->response) || empty($properties_response->data->response) ) { // Critical error
		Flight::halt(204, "Cannot determine manager's properties.");
	}
		
	// We will collect the manager's property uids to ensure that the client can book them all
	$manager_property_uids = array();
	foreach ($properties_response->data->response as $property) {
		if ( isset($property->local_property_uid) && (int)$property->local_property_uid > 0 ) {
			$manager_property_uids[] = (int)$property->local_property_uid ;
		}
	}
	
	$response = array ( "successful_bookings" => array() , "unsuccessful_bookings" => array() );

	foreach ( $reservations->reservations as $reservation ) { // A set of one or more bookings
		$booking							= new stdClass();

		$booking->remote_reservation_id		= filter_var($reservation->remote_reservation_id, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->comments					= filter_var($reservation->comments, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->referrer					= filter_var($reservation->referrer, FILTER_SANITIZE_SPECIAL_CHARS);
		
		$booking->guest_name				= filter_var($reservation->guest_info->name, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->guest_surname				= filter_var($reservation->guest_info->surname, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->guest_email				= filter_var($reservation->guest_info->email, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->guest_phone				= filter_var($reservation->guest_info->phone, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->guest_address				= filter_var($reservation->guest_info->address, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->guest_post_code			= filter_var($reservation->guest_info->post_code, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->guest_country_code		= filter_var($reservation->guest_info->country_code, FILTER_SANITIZE_SPECIAL_CHARS);
		$booking->guest_language_id			= filter_var($reservation->guest_info->language_id, FILTER_SANITIZE_SPECIAL_CHARS);
		
		// In case incomplete information is sent for the guest name
		if ( $booking->guest_name == "") {
			$bang = explode(" ",$booking->guest_surname);
			if (count($bang)==2) {
				$booking->guest_name = $bang[0];
					$booking->guest_surname = $bang[1];
					}
				elseif (count($bang)==3) {
					$booking->guest_name = $bang[0]." ".$bang[1];
					$booking->guest_surname = $bang[2];
					}
				else {
					$booking->guest_name = "unknown";
				}
			}
		
		$booking->booking_prices_include_tax	= true;

		if (empty($reservation->stay_infos)) {
			Flight::halt(204, "No stays passed");
		}
		
		$dates_valid = true;
		$stays = array();

		foreach ($reservation->stay_infos as $stay) {
			if ( !cmf_utilities::validate_date($stay->date_from) ) {
				$dates_valid = false;
			}
			
			if ( !cmf_utilities::validate_date($stay->date_to) ) {
				$dates_valid = false;
			}
		
			if ($dates_valid && in_array ( (int)$stay->property_id , $manager_property_uids ) ) {
				if (!isset($stay->client_price)) {
					$stay->client_price = 0.00;
				}
				
				if (!isset($stay->room_quantity)) {
					$stay->room_quantity = 1;
				}
				
				if (!isset($stay->room_type_id)) {
					$stay->room_type_id = 0;
				}
				
				if (!isset($stay->room_type_name)) {
					$stay->room_type_name = "Double";
				}
				
				if (!isset($stay->guest_number)) {
					$stay->guest_number = 0;
				}
				
				$booking->property_uid	= (int)$stay->property_id;
				$booking->date_from		= $stay->date_from;
				$booking->date_to		= $stay->date_to;
				$booking->client_price	= convert_entered_price_into_safe_float($stay->client_price);
				$booking->channel_price	= convert_entered_price_into_safe_float($stay->channel_price);
				$booking->already_paid	= convert_entered_price_into_safe_float($stay->already_paid);
				$booking->room_quantity	= (int)$stay->room_quantity;
				$booking->room_type_id	= (int)$stay->room_type_id;
				$booking->room_type_name= filter_var($stay->room_type_name, FILTER_SANITIZE_SPECIAL_CHARS);
				$booking->guest_number	= (int)$stay->guest_number;

				try {
					$insert = cmf_utilities::add_booking($booking);

					if ( isset($insert->success) && $insert->success === true ) {
						$response['successful_bookings'][$reservation->remote_reservation_id] = $insert;
					} else {
						$response['unsuccessful_bookings'][$reservation->remote_reservation_id] = $insert;
					}

				} catch (Exception $e) {
					logging::log_message( "Failed to insert booking : ".$e->getMessage() , 'CHANNEL_MANAGEMENT_FRAMEWORK', 'ERROR' , '' );
					return;
				}
			}
		}
	}

	$tmpBookingHandler->session_jomres_start();  // The booking insert class will reset the temp data, including mos_userid If we don't restart the session here, subsequent sessions will fail.
	
	Flight::json( $response_name = "response" , $response );
	});
	
	