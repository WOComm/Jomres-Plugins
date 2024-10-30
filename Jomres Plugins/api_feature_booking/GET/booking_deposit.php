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
	 * Send the booking details, respond with the deposit amount
	 *
	 * Some items (adults/children) are not used, but they might be so adding them now gives us scope for future changes without needing to modify the client UIs
	 *
	 */
	Flight::route('GET /booking/deposit', function()
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

		$RoomIdTariffIdHatPair = $nbe->TempBookingHandler->getBookingData('requestedRoom');
		$arrivalDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
		$departureDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
		$number_of_adults = $nbe->TempBookingHandler->getNBEData('adults');
		$number_of_children = $nbe->TempBookingHandler->getNBEData('total_children');
		$stay_days = $nbe->TempBookingHandler->getBookingData('stayDays');
		$accommodation_booking_total = (float)$nbe->TempBookingHandler->getBookingData('room_total');

		if ($departureDate == '') {
			apiBookingUtilities::throwError ('007' );
		}

		if (!apiBookingUtilitiesValidation::validateDate($arrivalDate)) {
			apiBookingUtilities::throwError ('008' );
		}

		if (!apiBookingUtilitiesValidation::validateDate($departureDate)) {
			apiBookingUtilities::throwError ('009' );
		}

		$response = apiBookingUtilitiesValidation::validateDateOrder($arrivalDate , $departureDate );
		if (isset($response['success']) && $response['success'] === false ) {
			apiBookingUtilities::throwError ('008' ,  $response['message'] );
		}

		$response = apiBookingUtilitiesValidation::validateAdultNumbers($number_of_adults , $nbe);
		if (isset($response['success']) && $response['success'] === false ) {
			apiBookingUtilities::throwError ('011' ,  $response['message'] );
		}

		$response = apiBookingUtilitiesValidation::validateChildNumbers($number_of_children , $nbe);
		if (isset($response['success']) && $response['success'] === false ) {
			apiBookingUtilities::throwError ('012' ,  $response['message'] );
		}

		$bang = explode(",",$RoomIdTariffIdHatPair);
		foreach ( $bang as $hatPair) {
			$response = apiBookingUtilitiesValidation::validateHatPair ( $hatPair , $nbe->NBE_FilterTariffsOrganiseByRoomType->rooms );
			if (isset($response['success']) && $response['success'] === false ) {
				apiBookingUtilities::throwError ('013' ,  $response['message'] );
			}
		}

		$mrConfig = $nbe->PropertyConfiguration->mrConfig;


		$interval = new DateInterval('P1D');
		$datesTilBooking = count(NBE_Utilities::getPeriods(date('Y-m-d'), $arrivalDate, $interval ));


		$rate_pernight = $accommodation_booking_total/$stay_days;

		if ($mrConfig[ 'depositIsOneNight' ] == '1') {
			if ($stay_days == 1) {
				$depositValue = $accommodation_booking_total;
			} else {
				$depositValue = $rate_pernight;
				if ($nbe->prices_shown_are_nett_price == true) {
					$basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
					$depositValue = $basic_property_details->get_gross_accommodation_price($depositValue, $nbe->property_uid);
				}
			}
		} else {
			if ($mrConfig[ 'use_variable_deposits' ] == '1' && count($datesTilBooking) <= (int) $mrConfig[ 'variable_deposit_threashold' ]) {
				$depositValue = $accommodation_booking_total;
			} else {
				$depositValue = $mrConfig[ 'depositValue' ];
				$totalBooking = $accommodation_booking_total;
				if ($mrConfig[ 'depAmount' ] == '1') {
					$depositValue = $accommodation_booking_total;
				} else {
					if ($mrConfig[ 'depositIsPercentage' ] == '1') {
						if ($mrConfig[ 'roundupDepositYesNo' ] == '1') {
							$depositValue = ceil(($totalBooking / 100) * $depositValue);
						} else {
							$depositValue = ($totalBooking / 100) * $depositValue;
						}
					} else {
						if ($mrConfig[ 'roundupDepositYesNo' ] == '1') {
							$depositValue = ceil($depositValue);
						}
					}
				}
			}
		}
		$deposit_required = $depositValue;

		if (!isset($mrConfig[ 'minimum_deposit_value' ])) {
			$mrConfig[ 'minimum_deposit_value' ] = 0;
		}

		if ( $accommodation_booking_total > $deposit_required && (float)$mrConfig[ 'minimum_deposit_value' ] >  $deposit_required ) { // Minimum deposit. If less than grand total, and minimum deposit is greater than the calculated deposit, replace the deposit value with this figure
			$deposit_required = (float)$mrConfig[ 'minimum_deposit_value' ];
		}

		$nbe->TempBookingHandler->setBookingData('deposit_required' , $deposit_required );
		$nbe->save_session();
		Flight::json( "deposit" , [ 'deposit' => $deposit_required , 'daily_rate' => $rate_pernight ] );
	});


