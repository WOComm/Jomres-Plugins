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
	 * Send the booking accommodation total, respond with the city tax
	 *
	 * Number of adults/Number of children not yet supported/used
	 *
	 */
	Flight::route('GET /booking/validate/guest/numbers', function()
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
		$cumulative_child_numbers = 0;

		$adults = $nbe->TempBookingHandler->getNBEData('adults');
		$children = $nbe->TempBookingHandler->getNBEData('children');


		if (!empty($children)) {
			foreach ($children as $child_rate) {
				$cumulative_child_numbers = $cumulative_child_numbers + $child_rate['quantity'];
			}
		}
		if ($adults > $mrConfig['accommodates_adults']) {
			$valid = false;
			$reason = 'Too many adults. Max adults: '.$mrConfig['accommodates_adults'];
		}
		if ($cumulative_child_numbers > $mrConfig['accommodates_children']) {
			$valid = false;
			$reason = 'Too many children. Max children: '.$mrConfig['accommodates_children'];
		}

		$arrivalDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
		$departureDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');

		$interval = new DateInterval('P1D');
		$dates = NBE_Utilities::getPeriods($arrivalDate, $departureDate, $interval , $max_one_year = true );

		$reasons = array();
		foreach ($dates as $date) {
			if ( (int)$nbe->PropertyItemsBookings->capacityByDate[$date]['adults'] < $adults ) {
				$valid = false;
				$reasons[] = " Too many adults (".$adults.") on ".$date.". Capacity on ".$date." is  ".(int)$nbe->PropertyItemsBookings->capacityByDate[$date]['adults']." adults ";
			}
			if ( (int)$nbe->PropertyItemsBookings->capacityByDate[$date]['children'] < $cumulative_child_numbers ) {
				$valid = false;
				 $reasons[] = " Too many children (".$cumulative_child_numbers.") on ".$date.". Capacity on ".$date." is ".(int)$nbe->PropertyItemsBookings->capacityByDate[$date]['children']." children";
			}
		}
		$nbe->save_session();
		if (!empty($reasons)){
			$reason = implode( "," , $reasons );
			Flight::json( "guest_number_validation" , [ 'valid' => $valid , 'reason' => $reason ] );
		} else {
			Flight::json( "guest_number_validation" , [ 'valid' => $valid ] );
		}

	});
