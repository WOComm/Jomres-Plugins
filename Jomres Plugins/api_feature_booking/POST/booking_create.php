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
	 * Create the booking if it validates
	 *
	 * This endpoint is a PoC to create bookings through the API. I'm relucatant to make this a part of the Core API set because it bypasses the booking confirmation page which is a gatekeeoer to both payment gateways, but also for creating Booking Enquiries bookings. Payment gateways are a good way of preventing fraudulent bookings, and likewise for booking enquiries.
	 *
	 * Nevertheless, I'm going  to put it here, ensure that it's working, and then disable it for the time being until I've had time to think about it more.
	 *
	 */
	Flight::route('POST /booking/create', function()
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

		set_booking_number();

		if ( (bool)$nbe->TempBookingHandler->getBookingData('ok_to_book') === true && (bool)$nbe->TempBookingHandler->getNBEData('booking_paid') === true ) { // A payment gateway can set this value to 1/true
			insertInternetBooking( $session_id , false, false , '');
			Flight::json( "create" , [ 'valid' => true ] );
		} elseif ( (bool)$nbe->TempBookingHandler->getBookingData('ok_to_book') === true && $nbe->bypass_confirmation == true ) {
			insertInternetBooking( $session_id , false, false , '');
			Flight::json( "create" , [ 'valid' => true ] );
		} else {
			Flight::json( "create" , [ 'valid' => false , 'reason' => 'Property has active gateways, cannot directly create a booking. Instead you should redirect the guest to the confirmation_url' ] );
		}

	});


