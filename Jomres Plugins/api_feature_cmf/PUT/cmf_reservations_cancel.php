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

Send remote booking numbers, find local contract uids and cancel those bookings

*/

Flight::route('PUT /cmf/reservations/cancel', function()
	{
    require_once("../framework.php");

	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$session_id = jomres_cmsspecific_getsessionid();

	$reservation_ids = json_decode(stripslashes($_PUT['reservation_ids']));

	if ($reservation_ids == false ) {
		Flight::halt(204, "Invalid reservation data passed");
	}
	
	if ( empty($reservation_ids) ) {
		Flight::halt(204, "No reservation data passed");
	}
	
	$call_self = new call_self( );
	
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/properties/ids",
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
			
	$response = json_decode(stripslashes($call_self->call($elements)));

	if ( !isset($response->data->response) || empty($response->data->response) ) { // Critical error
		Flight::halt(204, "Cannot determine manager's properties.");
	}

	$manager_property_uids = array();
	foreach ($response->data->response as $property) {
		if ( isset($property->local_property_uid) && (int)$property->local_property_uid > 0 ) {
			$manager_property_uids[] = (int)$property->local_property_uid ;
		}
	}

	$query = "SELECT  id , property_uid , remote_booking_id , local_booking_id FROM #__jomres_channelmanagement_framework_bookings_xref WHERE channel_id = ".Flight::get('channel_id')." AND remote_booking_id IN (".jomres_implode($reservation_ids).") ";
	$existing_reservations = doSelectSql($query);

	jr_import('jomres_generic_booking_cancel');
	
	if (!empty($existing_reservations)) {
		$cancellation_messages = array();
		foreach ( $existing_reservations as $reservation ) {
			if (in_array ( $reservation->property_uid , $manager_property_uids ) ) {
				$bkg = new jomres_generic_booking_cancel();
				//OK, let`s move on and set the booking details
				$bkg->property_uid = $reservation->property_uid;
				$bkg->contract_uid = $reservation->local_booking_id;
				$bkg->reason = '';
				$bkg->note = jr_gettext('_JOMRES_COM_MR_EB_GUEST_CANCELLED', '_JOMRES_COM_MR_EB_GUEST_CANCELLED', false);
				$cancellationSuccessful = $bkg->cancel_booking();
				if ( $cancellationSuccessful ) {
					$cancellation_messages[] = "Cancelled booking for property uid ".$reservation->property_uid." with contract id of ".$reservation->local_booking_id." ";
					$query = "DELETE FROM #__jomres_channelmanagement_framework_bookings_xref WHERE id = ".$reservation->id." LIMIT 1";
					doInsertSql($query);
				} else {
					$cancellation_messages[] = "Could not cancel booking for property uid ".$reservation->property_uid." with contract id of ".$reservation->local_booking_id." for an unknown reason";
				}
			} else {
				$cancellation_messages[] = "Could not cancel booking for property uid ".$reservation->property_uid." with contract id of ".$reservation->local_booking_id." because it is not owned by this manager";
			}
		}
		$response = (object) array( "success" => true , "cancellations" => $cancellation_messages );
	} else {
		$response = (object) array( "success" => false , "message" => "No reservations found");
	}


		
		
	Flight::json( $response_name = "response" , $response );
	});
	
	