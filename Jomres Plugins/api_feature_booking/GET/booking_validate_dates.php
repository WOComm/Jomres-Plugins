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
	 * Check that the stored dates are valid and that they're within the dates allowed by the property settings
	 *
	 */
	Flight::route('GET /booking/validate/dates', function()
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

		$valid = true;
		$errors = [];

		$arrivalDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
		$departureDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');

		if ($arrivalDate == '') {
			$errors = apiBookingUtilities::throwError ('006' , 'arrival date empty' , false , true );
		}

		if ($departureDate == '') {
			$errors = apiBookingUtilities::throwError ('007' , 'departure date empty' , false , true );
		}

		if (!apiBookingUtilitiesValidation::validateDate($arrivalDate)) {
			$errors = apiBookingUtilities::throwError ('008' , 'arrival date wrong format' , false , true );
		}

		if (!apiBookingUtilitiesValidation::validateDate($departureDate)) {
			$errors = apiBookingUtilities::throwError ('009' , 'departure date wrong format' , false , true );
		}

		$response = apiBookingUtilitiesValidation::validateDateOrder($arrivalDate , $departureDate );
		if (isset($response['success']) && $response['success'] === false ) {
			$errors = apiBookingUtilities::throwError ('008'  , 'departure date before arrival date' , false , true );
		}

		if ( !in_array($arrivalDate , $nbe->NBE_PropertyStatesDatesWithinBookingSettingParameters->datesWithinBookingSettingParameters)) {
			$errors = apiBookingUtilities::throwError ('014'  , '' , false , true );
		}

		if ( !in_array($departureDate , $nbe->NBE_PropertyStatesDatesWithinBookingSettingParameters->datesWithinBookingSettingParameters)) {
			$errors = apiBookingUtilities::throwError ('015'  , '' , false , true );
		}
		$nbe->save_session();
		if ( isset($errors['error_message'])) {
			Flight::json( "dates_validation" , [ 'valid' => $valid , 'reason' => $errors['error_message'] ] );
		} else {
			Flight::json( "dates_validation" , [ 'valid' =>true ] );
		}

	});
