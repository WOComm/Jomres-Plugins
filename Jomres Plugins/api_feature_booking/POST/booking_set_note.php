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
	 * Send the booking adetails, respond with the deposit amount
	 *
	 *
	 */
	Flight::route('POST /booking/set/note', function()
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


		$note				= jomresGetParam( $_POST, 'note', '' );
		if ($note == 'undefined'|| $note == 'null') {
			$note = '';
		}

		if ($note != '') {
			$existing_notes = $nbe->TempBookingHandler->getBookingData('booking_notes');
			if (is_null($existing_notes)){
				$existing_notes = array();
			}
			$existing_notes[] = $note;
			$nbe->TempBookingHandler->setBookingData('booking_notes',$existing_notes);
			$nbe->save_session();
			Flight::json( "set_note" , [ 'valid' => true ] );
		} else {
			Flight::json( "set_note" , [ 'valid' => false , 'reason' => 'Note empty' ] );
		}

	});


