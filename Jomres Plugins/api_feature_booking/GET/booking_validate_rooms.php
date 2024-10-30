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
	 * Check that valid room_tariff hatPairs have been stored. No need to validate them here because that was already done by the set_rooms endpoint
	 *
	 */
	Flight::route('GET /booking/validate/rooms', function()
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

		$requestedRoom = $nbe->TempBookingHandler->getBookingData('requestedRoom');
		$nbe->save_session();
		if ( is_null($requestedRoom) || $requestedRoom == '' ) {
			Flight::json( "rooms_validation" , [ 'valid' => false , 'reason' => 'hatPairs not stored' ] );
		} else {
			Flight::json( "rooms_validation" , [ 'valid' =>true ] );
		}
	});
