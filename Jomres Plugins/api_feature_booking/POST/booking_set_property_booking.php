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
	Flight::route('POST /booking/set/property/booking/', function()
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

		$availableRooms = apiBookingUtilities::get_rooms_available_on_dates($nbe);

		if (empty($availableRooms['rooms'])) {
			Flight::json( "set_rooms" , [ 'valid' => false , 'reason' => 'no rooms available' ] );
		}

		if ($nbe->booking_model == 'SRP') {
			$room_id = array_key_first($nbe->NBE_FilterTariffsOrganiseByRoomType->rooms);
			$first_Date= array_key_first($nbe->NBE_FilterTariffsOrganiseByRoomType->rooms[$room_id]['tariff_sets'][0]['dates']);
			$tariff_id = $nbe->NBE_FilterTariffsOrganiseByRoomType->rooms[$room_id]['tariff_sets'][0]['dates'][$first_Date]['rate_id'];

			$requestedRooms = $room_id.'^'.$tariff_id;
		} else {
			$requestedRooms = filter_var($_POST['selectedRooms'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		}

		if ($requestedRooms =='') { // Unselect all rooms
			Flight::json( "set_rooms" , [ 'valid' => false , 'reason' => 'Requested rooms is empty' ] );
		} else {
			$nbe->TempBookingHandler->setBookingData('requestedRoom',$requestedRooms);
		}

		$arrivalDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
		$departureDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
		$boom = explode( "," , $requestedRooms);

		if (empty($boom)) { // Unselect all rooms
			$nbe->TempBookingHandler->setBookingData('requestedRoom','');
			Flight::json( "set_rooms" ,  [ 'valid' => false , 'reason' => 'room/tariff array not set' ]  );
		}

		$valid_room_tariff_sets = array();

		$property_tariffs	= $nbe->PropertyItemsTariffs->allPropertyTariffSets;

		foreach ($boom as $room_and_tariff_combination ) {

			$bang = explode("^", $room_and_tariff_combination);
			$room_id  = (int)$bang[0] ;
			$existing_rooms = $nbe->NBE_FilterTariffsOrganiseByRoomType->rooms;

			if ($room_id <1) {
				Flight::json( "set_rooms" , [ 'valid' => false , 'reason' => 'room id invalid' ] );
			}

			if (!array_key_exists($room_id , $existing_rooms)) {
				Flight::json( "set_rooms" , [ 'valid' => false , 'reason' => 'room id not found for this property' ] );
			}

			// We can be handed more than one set, so first we will find tariffs that correspond to this room's room type.
			// If not found then it's not a valid tariff for that room type.

			$property_room = $existing_rooms[$room_id];

			$room_type_id = $property_room["room"]['room_classes_uid'];
			foreach ($property_tariffs as $tariff_set) {
				if ( $tariff_set['roomclass_uid'] == $room_type_id ) {
					$valid_room_tariff_sets[$room_and_tariff_combination]['room'] = $property_room['room'];

					$temp_tariff_set = array();
					foreach ($tariff_set['dates'] as $date => $tariff_individual_date) {
						if ($date >= $arrivalDate && $date < $departureDate ) {
							$temp_tariff_set [$date] = $tariff_individual_date;
						}
					}
					$valid_room_tariff_sets[$room_and_tariff_combination]['tariffs'] = $temp_tariff_set;
				}
			}
		}

		if (empty($valid_room_tariff_sets)) {
			Flight::json( "set_rooms" , [ 'valid' => false , 'reason' => 'no valid room/tariff combinations found for' ] );
		}

		// In the old booking engine we would have to loop through individual tariffs, finding lots of reasons to discard them. We may still need to do that, but for now we'll just store the $room_and_tariff_combination hatPair as selected rooms
		$requestedRooms = '';
		foreach ($valid_room_tariff_sets as $key => $val) {
			$requestedRooms .=$key.",";
		}
		$requestedRooms = rtrim($requestedRooms, ",");

		$nbe->TempBookingHandler->setBookingData('requestedRoom',$requestedRooms);

		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api('system');
		$response = $jomres_call_api->send_request("GET" , "booking/validate/rooms" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$session_id] );

		if (!isset($response->data->rooms_validation->valid) || $response->data->rooms_validation->valid == false ) {
			Flight::json( "set_property_booking" , [ 'valid' => false , 'reason' =>$response->data->reason ] );
		} else {
			Flight::json( "set_property_booking" , [ 'valid' => true , 'hatPair' => $requestedRooms ] );
		}
	});
