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
	 * Send the dates. The validation stage will check that the dates fall into the date ranges allowed by the property, and that they're in fact valid dates
	 *
	 *  Must be delivered in YYYY-MM-DD format
	 *
	 */
	Flight::route('POST /booking/set/dates', function()
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

		$arrivalDate					= jomresGetParam( $_POST, 'arrivalDate', '' );
		$departureDate					= jomresGetParam( $_POST, 'departureDate', '' );

		if ($arrivalDate == $departureDate) {
			Flight::json( "set_dates" , [ 'valid' => false , 'reason' => 'Dates are the same' ] );
		}

		$nbe->TempBookingHandler->setNBEData('arrivalDate',$arrivalDate);
		$nbe->TempBookingHandler->setNBEData('departureDate',$departureDate);

		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api('system');
		try {
			$response = $jomres_call_api->send_request("GET" , "booking/validate/dates" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$session_id] );
		}
		catch (Exception $e) {
			// throw new Exception('Error: invalid response from local API, received '.$e->getMessage() );
		}

		if (!isset($response->data->dates_validation->valid) || $response->data->dates_validation->valid == false ) {
			Flight::json( "set_dates" , [ 'valid' => false , 'reason' =>$response->error_message ] );
		} else {
			$interval = new DateInterval('P1D');
			$dates = NBE_Utilities::getPeriods($arrivalDate, $departureDate, $interval , false );
			$nbe->TempBookingHandler->setBookingData('stayDays',count($dates));
			$nbe->save_session();
			Flight::json( "set_dates" , [ 'valid' => true ] );
		}
	});


