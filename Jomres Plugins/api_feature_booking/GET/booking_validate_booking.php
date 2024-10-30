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
	Flight::route('GET /booking/validate/booking', function()
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

		$response = apiBookingUtilitiesValidation::validateBookingComplete( $nbe );

		$room_total = $nbe->TempBookingHandler->getBookingData('room_total');

		$ok_to_book = $response['success'];
		if ( isset($response['success']) && $response['success'] == true && $room_total > 0 ) {

			$nbe->TempBookingHandler->setBookingData('ok_to_book', $ok_to_book );
			$nbe->TempBookingHandler->setBookingData('referrer',"Jomres NBE");

			// Settings that need to be set so that the confirmation/booking creation functionality doesn't throw its teddy out of it's pram
			$nbe->TempBookingHandler->setGuestData('existing_id',"0");

			$adults = (int)$nbe->TempBookingHandler->getNBEData('adults');
			$children = $nbe->TempBookingHandler->getNBEData('children');

			$city_tax = $nbe->TempBookingHandler->getBookingData('city_tax');
			$cleaning_fee = $nbe->TempBookingHandler->getBookingData('cleaning_fee');

			$total_children = 0;
			foreach ($children as $child_rate) {
				$total_children = $total_children + (int)$child_rate['quantity'];
			}
			$nbe->TempBookingHandler->setBookingData('standard_guest_numbers',$adults+$total_children);
			$nbe->TempBookingHandler->setBookingData('total_in_party',$adults+$total_children);

			$nbe->TempBookingHandler->setBookingData('extra_guest_numbers',0);
			$nbe->TempBookingHandler->setBookingData('single_person_suppliment',0);


			// Generally this is just to give the old booking engine some data to work with, given that we can't eradicate the old blighter just yet
			$arrivalDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
			$departureDate = $nbe->TempBookingHandler->getNBEData('departureDate');
			$interval = new DateInterval('P1D');
			$dates = NBE_Utilities::getPeriods($arrivalDate, $departureDate, $interval , false );
			$shloop =  str_replace( "-" , "/" ,implode(',', $dates)); // $shloop is the sound of an implosion?
			$nbe->TempBookingHandler->setBookingData('dateRangeString' , $shloop );

			$nbe->TempBookingHandler->setBookingData('arrivalDate' ,  str_replace( "-" , "/" ,$arrivalDate) );
			$nbe->TempBookingHandler->setBookingData('departureDate' ,  str_replace( "-" , "/" , $departureDate) );

			// Until I add Extras, the contract total will be the same as the room total
			$extrasvalue = 0.00;

			$nbe->TempBookingHandler->setBookingData('extrasvalue' , $extrasvalue );

			$room_total = apiBookingUtilities::calculateInclTaxPrice( $nbe , $room_total , $nbe->PropertyItemsTaxRates->accommodation_tax_code );

			$nbe->TempBookingHandler->setBookingData('room_total_nodiscount', $room_total );
			$nbe->TempBookingHandler->setBookingData('contract_total', $room_total + $city_tax + $cleaning_fee + $extrasvalue );
			$nbe->save_session();
		}

		if ( !$ok_to_book ) {
			Flight::json( "booking_validation" , [ 'valid' => false , 'reason' => $response['reason'] ] );
		} else {
			Flight::json( "booking_validation" , [ 'valid' =>true ] );
		}

	});
