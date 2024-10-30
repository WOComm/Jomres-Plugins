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
	 * Respond with all of the data the remote form will need to setup a booking UI
	 *
	 */

	Flight::route('GET /booking/prices', function()
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


		if ($nbe->property_uid == '0') {
			$errors = apiBookingUtilities::throwError ('002');
		}

		if ($nbe->property_published == '0') {
			$errors = apiBookingUtilities::throwError ('003' );
		}

		$response = new stdClass();

		$requestedRooms = $nbe->TempBookingHandler->getBookingData('requestedRoom');

		if (!isset($requestedRooms) || trim($requestedRooms) == '') {
			apiBookingUtilities::throwError ('018' , 'Selected rooms : '.$requestedRooms. ' Session id '.$session_id );
		}

		$response = apiBookingUtilities::calculateRoomsPrice( $nbe );

		if ( (float) $nbe->PropertyConfiguration->mrConfig['depositValue'] > 0) {
			$response['deposit'] = apiBookingUtilities::calculateDeposit( $nbe );
		} else {
			$response['deposit'] = 0.00;
		}
		$nbe->TempBookingHandler->setBookingData('deposit_required' , $response['deposit'] );


		if ( (float) $nbe->PropertyConfiguration->mrConfig['city_tax_value'] > 0) {
			$response['city_tax'] = $response['deposit'] = apiBookingUtilities::calculateDeposit( $nbe );
		} else {
			$response['city_tax'] = 0;
		}
		$nbe->TempBookingHandler->setBookingData('city_tax' , $response['city_tax'] );

		if ( (float)$nbe->PropertyConfiguration->mrConfig['cleaning_fee'] > 0) {
			$response['cleaning_fee'] = $nbe->PropertyConfiguration->mrConfig['cleaning_fee'];
		} else {
			$response['cleaning_fee'] = 0;
		}
		$nbe->TempBookingHandler->setBookingData('cleaning_fee',$response['cleaning_fee']);

		$nbe->save_session();


		Flight::json( $response_name = "room_prices" , [ $response ] );
	});
