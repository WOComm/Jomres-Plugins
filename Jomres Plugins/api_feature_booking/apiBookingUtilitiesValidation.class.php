<?php

	class apiBookingUtilitiesValidation
	{

		/*
		 * Dates must be delivered in YYYY-MM-DD format
		 */
		public static function validateDate($date)
		{
			$bang = explode("-" , $date );

			if (!isset($bang[0]) || !isset($bang[1]) || !isset($bang[2]) ) {
				return ['success' => false, 'message' => 'date in wrong format'];
			}

			if (!checkdate($bang[1], $bang[2], $bang[0] )) {
				return ['success' => false, 'message' => 'invalid date'];
			}
			return true;
		}

		/*
		 * Must be delivered Int^Int.
		 *
		 * Caller passes hatPair and the property's rooms. If the hatPair doesn't look like Int^Int return false + message. If the tariff id doesn't correspond with a property's rooms/tariffs, return false + message.
		 *
		 * Does not confirm that the hatPair is valid for the passed Arrival and Departure dates
		 *
		 */
		public static function validateHatPair ($hatPair , $property_rooms = array() )
		{
			$bang = explode("^", $hatPair);
			if (!isset($bang[0]) || !isset($bang[1])) {
				return ['success' => false, 'message' => 'invalid hatPair format'];
			}

			if (empty($property_rooms)) {
				return ['success' => false, 'message' => 'property has no rooms'];
			}

			$room_id = $bang[0];
			$tariff_id = $bang[1];

			if (!array_key_exists($room_id , $property_rooms) ) {
				return ['success' => false, 'message' => 'room id invalid for property'];
			}
			$tariff_sets = $property_rooms[$room_id]["tariff_sets"];
			foreach ($tariff_sets as $tariff_set) {
				foreach ($tariff_set['dates'] as $date) {
					if ($date["rate_id"]== $tariff_id ) {
						return true;
					}
				}
			}
			return ['success' => false, 'message' => 'tariff invalid for room id'];
		}

		public static function validateAdultNumbers( $adultNumbers = 0 , $nbe = object )
		{
			$adultNumbers = (int)$adultNumbers;
			if (!isset($nbe->PropertyConfiguration->mrConfig['accommodates_adults'])) {
				return ['success' => false, 'message' => 'Fatal error. nbe accommodates_adults value not set '];
			}

			if ($nbe->AdultsRequiredInBooking && $adultNumbers == 0 ) {
				return ['success' => false, 'message' => 'No adults passed, must be at least 1 adult in the booking'];
			}

			if ( $adultNumbers > $nbe->PropertyConfiguration->mrConfig['accommodates_adults']) {
				return ['success' => false, 'message' => 'Adult numbers exceed property capacity for adults'];
			}

			return true;
		}

		public static function validateChildNumbers( $childNumbers = 0 , $nbe = object )
		{
			$childNumbers  = (int)$childNumbers ;

			if (!isset($nbe->PropertyConfiguration->mrConfig['accommodates_children'])) {
				return ['success' => false, 'message' => 'Fatal error. nbe accommodates_children value not set '];
			}

			if ($nbe->ChildrenRequiredInBooking && $childNumbers == 0 ) {
				return ['success' => false, 'message' => 'No children passed, must be at least 1 child in the booking'];
			}

			if ( $childNumbers > $nbe->PropertyConfiguration->mrConfig['accommodates_children']) {
				return ['success' => false, 'message' => 'Child numbers exceed property capacity for children'];
			}

			return true;
		}

		/*
		 * Assumes that the dates have already been checked to be valid dates, we'll check to ensure that departureDate is later than arrivalDate
		 *
		 */
		public static function validateDateOrder( $arrivalDate , $departureDate )
		{
			if ( $departureDate < $arrivalDate )  {
				return ['success' => false, 'message' => 'Departure date earlier than arrival date'];
			}
			return true;
		}

		/*
		 * Assumes that the dates have already been checked to be valid dates, we'll check to ensure that departureDate is later than arrivalDate
		 *
		 */
		public static function validateDateNotHistoric( $date )
		{
			$today = date("YYYY-MM-DD");
			if ( $today > $date )  {
				return ['success' => false, 'message' => 'Date is historic'];
			}
			return true;
		}

		public static function validateBookingComplete( $nbe )
		{
			$session_id = $nbe->TempBookingHandler->booking_data->jomressession;
			if ($session_id == '' ) {
				$reason = 'Session id not set';
				return [ 'success' => false , 'reason' => $reason];
			}

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$response = $jomres_call_api->send_request("GET" , "booking/validate/address" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$session_id]);
			if (!isset($response->data->address_validation->valid) || $response->data->address_validation->valid == false ) {
				$reason = 'Address does not validate';
				return [ 'success' => false , 'reason' => $reason.' '.$response->data->address_validation->reason];
			}

			$response = $jomres_call_api->send_request("GET" , "booking/validate/dates" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$session_id] );
			if (!isset($response->data->dates_validation->valid) || $response->data->dates_validation->valid == false ) {
				$reason = 'Dates do not validate';
				return [ 'success' => false , 'reason' => $reason];
			}

			$response = $jomres_call_api->send_request("GET" , "booking/validate/guest/numbers" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$session_id] );
			if (!isset($response->data->guest_number_validation->valid) || $response->data->guest_number_validation->valid == false ) {
				$reason = 'Guest numbers do not validate';
				return [ 'success' => false , 'reason' => $reason];
			}

			$response = $jomres_call_api->send_request("GET" , "booking/validate/rooms" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$session_id] );
			if (!isset($response->data->rooms_validation->valid) || $response->data->rooms_validation->valid == false ) {
				$reason = 'Rooms do not validate';
				return [ 'success' => false , 'reason' => $reason];
			}

			$stay_days = $nbe->TempBookingHandler->getBookingData('stayDays');
			if ( (int)$stay_days ==0) {
				$reason = 'Stay days do not validate';
				return [ 'success' => false , 'reason' => $reason];
			}

			$accommodation_booking_total = (float)$nbe->TempBookingHandler->getBookingData('room_total');
			if ( $accommodation_booking_total == 0) {
				$reason = 'Accommodation total does not validate';
				return [ 'success' => false , 'reason' => $reason];
			}

			$deposit_required = $nbe->TempBookingHandler->getBookingData('deposit_required');

			if ( $deposit_required == 0 && (float) $nbe->PropertyConfiguration->mrConfig['depositValue'] > 0 ) {
				$reason = 'Deposit does not validate, current setting '.$nbe->PropertyConfiguration->mrConfig['depositValue']. ' but stored value is '.$deposit_required ;
				return [ 'success' => false , 'reason' => $reason];
			}

			return [ 'success' => true];
		}

	}