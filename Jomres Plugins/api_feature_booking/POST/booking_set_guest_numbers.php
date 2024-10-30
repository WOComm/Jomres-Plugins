<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

	/*
	 *
	 * Send the guest numbers.
	 *
	 * Adults are easy, just an integer. The child data is more complicated because they can be any number of children depending on the child types created by the property manager.
	 *
	 *
	 */
	Flight::route('POST /booking/set/guest/numbers', function()
	{
		require_once("../framework.php");

		jr_import('NBE_BookingEngineException');
		jr_import('jomres_markdown');
		jr_import('new_booking_engine');
		jr_import('apiBookingUtilities');
		jr_import('apiBookingUtilitiesValidation');
		jr_import('NBE_Utilities');

		$session_id = apiBookingUtilities::getSessionIdFromHeaders();
		$nbe = new new_booking_engine();
		$nbe->context = 'api';
		$nbe->initialise( $session_id );
		apiBookingUtilities::crawlerCheck($nbe);

		$nbe->TempBookingHandler->setBookingData('ok_to_book',false );

		if ($nbe->property_uid == '0') {
			$errors = apiBookingUtilities::throwError ('002');
		}

		if ($nbe->property_published == '0') {
			$errors = apiBookingUtilities::throwError ('003' );
		}
		$total_children			= 0;

		$adults					= jomresGetParam( $_POST, 'adults', 0 );
		$children_reduced		= jomresGetParam( $_POST, 'children', '' );

		$children_reduced		= str_replace( '&#34;' , '"' , $children_reduced);
		$children_reduced		= str_replace( '\\' , '' , $children_reduced);
		$children = json_decode($children_reduced);

		if (empty($children)){
			$children = array();
		}

		if (!empty($children)){
			foreach ($children as $child_rate) {
				$total_children = $total_children + (int)$child_rate->quantity;
			}
		}

		$nbe->TempBookingHandler->setNBEData('adults',$adults);
		$nbe->TempBookingHandler->setNBEData('children',$children);
		$nbe->TempBookingHandler->setNBEData('total_children',$total_children);
		$nbe->save_session();
		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api('system');
		try {
			$response = $jomres_call_api->send_request("GET" , "booking/validate/guest/numbers" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$session_id] );
		}
		catch (Exception $e) {
			// throw new Exception('Error: invalid response from local API, received '.$e->getMessage() );
		}

		if (!isset($response->data->guest_number_validation->valid) || $response->data->guest_number_validation->valid == false ) {
			Flight::json( "set_guest_numbers" , [ 'valid' => false , 'reason' =>$response->data->guest_number_validation->reason ] );
		} else {
			Flight::json( "set_guest_numbers" , [ 'valid' => true ] );
		}
	});


