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
	 * Send the booking address details
	 *
	 */
	Flight::route('GET /booking/validate/address/', function()
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

		$mrConfig = $nbe->PropertyConfiguration->mrConfig;

		$valid = true;
		$reason = '';

		// Could make this a loop, but this is way more readable
		if ( $nbe->TempBookingHandler->getGuestData('firstname') == '' &&  (bool)$mrConfig["bookingform_requiredfields_name"] == true ) {
			$valid = false;
			$reason = 'firstname is required';
		}
		if ( $nbe->TempBookingHandler->getGuestData('surname') == '' && (bool)$mrConfig["bookingform_requiredfields_surname"] == true ) {
			$valid = false;
			$reason = 'surname is required';
		}
		if ( $nbe->TempBookingHandler->getGuestData('house') == '' && (bool)$mrConfig["bookingform_requiredfields_houseno"]== true ) {
			$valid = false;
			$reason = 'house is required';
		}
		if ( $nbe->TempBookingHandler->getGuestData('street') == '' && (bool)$mrConfig["bookingform_requiredfields_street"]== true ) {
			$valid = false;
			$reason = 'street is required';
		}
		if ( $nbe->TempBookingHandler->getGuestData('postcode') == '' && (bool)$mrConfig["bookingform_requiredfields_postcode"] == true ) {
			$valid = false;
			$reason = 'postcode is required';
		}
		if ( $nbe->TempBookingHandler->getGuestData('town') == '' && (bool)$mrConfig["bookingform_requiredfields_town"] == true ) {
			$valid = false;
			$reason = 'town is required';
		}
		if ( $nbe->TempBookingHandler->getGuestData('region') == '' && (bool)$mrConfig["bookingform_requiredfields_region"] == true ) {
			$valid = false;
			$reason = 'region is required';
		}

		if ( $nbe->TempBookingHandler->getGuestData('country') == '' && (bool)$mrConfig["bookingform_requiredfields_country"]== true ) {
			$valid = false;
			$reason = 'country is required';
		}
		if ( $nbe->TempBookingHandler->getGuestData('tel_mobile') == '' && (bool)$mrConfig["bookingform_requiredfields_mobile"] == true ) {
			$valid = false;
			$reason = 'tel_mobile is required';
		}
		if ( $nbe->TempBookingHandler->getGuestData('email') == '' && (bool)$mrConfig["bookingform_requiredfields_email"] == true ) {
			$valid = false;
			$reason = 'email is required';
		}

		// Now let's check that the country exists in the db
		$country_code = $nbe->TempBookingHandler->getGuestData('country');

		$countries = countryCodesArray();
		if (!array_key_exists( $country_code , $countries)) {
			$valid = false;
			$reason = 'country '.$country_code.' is invalid';
		} else {
			$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
			$regionArray = $jomres_regions->get_country_regions($country_code);
			if (!array_key_exists( $nbe->TempBookingHandler->getGuestData('region') , $regionArray )) {
				$valid = false;
				$reason = 'region '.$nbe->TempBookingHandler->getGuestData('region').' is invalid';
			}
		}
		$nbe->save_session();
		if (!$valid) {
			Flight::json( "address_validation" , [ 'valid' => $valid , 'reason' => $reason ] );
		} else {
			Flight::json( "address_validation" , [ 'valid' => $valid ] );
		}

	});
