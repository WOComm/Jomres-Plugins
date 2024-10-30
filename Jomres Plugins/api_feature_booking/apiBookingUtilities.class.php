<?php

	class apiBookingUtilities
	{
		public static function getSessionIdFromHeaders()
		{
			$all_headers = getallheaders();

			if (!empty($all_headers)) {
				foreach ($all_headers as $key => $val ) {
					$new_index = strtoupper($key);
					if ($new_index == 'X-JOMRES-BOOKING-SESSION-ID') {
						$session_id = $val;
					}
				}
			}

			if (!isset($session_id)) {
				if (isset($_REQUEST['X-JOMRES-BOOKING-SESSION-ID'])) {
					$_REQUEST['X-JOMRES-BOOKING-SESSION-ID'] = filter_var( $_REQUEST['X-JOMRES-BOOKING-SESSION-ID'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				}
			}

			if (!isset($session_id)) {
				Flight::halt(204, [ 'response' => [ "error_message" => "Error. Session id not passed. Send sess_id via headers. The session id should be unique to each of your site visitors." , "error_number" => '001' ] ] );
			}

			return $session_id;
		}

		public static function crawlerCheck($nbe)
		{
			if ( $nbe->is_crawler) {
				Flight::halt(204, 'Crawler identified, cannot proceed. If you think you are seeing this in error, please see https://www.jomres.net/technical-blog/172-postman-settings-for-jomres-v10-4' );
			}
		}

		public static function throwError($number = '000' , $supplimentary_message = '' , $test = false , $return_error = false )
		{
			$errors = array();
			$errors['001'] =  [ "error_message" => "Error. Session id not passed. Send a session_id X-JOMRES-BOOKING-SESSION-ID via headers. The session id should be unique to each of your site visitors." , "error_number" => '001' ];
			$errors['002'] =  [ "error_message" => "Error. Property uid not sent" , 			"error_number" => '002' ] ;
			$errors['003'] =  [ "error_message" => "Error. Property is not published" , 		"error_number" => '003' ];
			$errors['004'] =  [ "error_message" => "Error. Accommodation total not sent" ,		"error_number" => '004' ];
			$errors['005'] =  [ "error_message" => "Error. Number of adults not sent" , 		"error_number" => '005' ] ;
			$errors['006'] =  [ "error_message" => "Error. Arrival date not sent" , 			"error_number" => '006' ] ;
			$errors['007'] =  [ "error_message" => "Error. Departure date not sent" , 			"error_number" => '007' ] ;
			$errors['008'] =  [ "error_message" => "Error. Arrival date invalid" , 				"error_number" => '008' ] ;
			$errors['009'] =  [ "error_message" => "Error. Departure date invalid" , 			"error_number" => '009' ] ;
			$errors['010'] =  [ "error_message" => "Error. Stay days not sent" ,	 			"error_number" => '010' ] ;
			$errors['011'] =  [ "error_message" => "Error. Adult numbers incorrect" ,			"error_number" => '011' ] ;
			$errors['012'] =  [ "error_message" => "Error. Child numbers incorrect" ,	 		"error_number" => '012' ] ; // Probably will never be used but I'll leave it here for congruence
			$errors['013'] =  [ "error_message" => "Error. Cannot validate hatPair" ,		 	"error_number" => '013' ] ;
			$errors['014'] =  [ "error_message" => "Error. Arrival date not within dates allowed by property" ,"error_number" => '014' ] ;
			$errors['015'] =  [ "error_message" => "Error. Departure date not within dates allowed by property" ,"error_number" => '015' ] ;

			$errors['016'] =  [ "error_message" => "Error. Room id invalid" ,					"error_number" => '016' ] ;
			$errors['017'] =  [ "error_message" => "Error. Tariff id invalid" ,					"error_number" => '017' ] ;
			$errors['018'] =  [ "error_message" => "Error. No rooms selected" ,					"error_number" => '018' ] ;

			$errors['020'] =  [ "error_message" => "Error. Accommodation total not calculated yet" , "error_number" => '020' ] ;
			$errors['021'] =  [ "error_message" => "Error. Stay days not calculated yet" ,	"error_number" => '021' ] ;


			$errors['101'] =  [ "error_message" => "Unspecified error" ,	"error_number" => '101' ] ;

			if ($test == true) {
				return $errors;
			}

			if ($supplimentary_message != '') {
				$error = $errors[$number];
				$msg =  $errors[$number]['error_message']." : ".$supplimentary_message;
				$errors[$number]['error_message'] = $msg ;
			}

			if ($return_error == false) {
				Flight::halt(204, $number.' -- '.$errors[$number]['error_message'] );
			} else {
				return ['error_number' => $number , 'error_message' => $errors[$number]['error_message'] ];
			}

		}

		public static function calculateRoomsPrice( $nbe )
		{
			$requestedRooms = $nbe->TempBookingHandler->getBookingData('requestedRoom');
			$arrivalDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
			$departureDate = $nbe->TempBookingHandler->getNBEData('departureDate');
			$adults = $nbe->TempBookingHandler->getNBEData('adults');
			$children = $nbe->TempBookingHandler->getNBEData('children');

			$boom = explode( "," , $requestedRooms);

			if (empty($boom)) { // Unselect all rooms
				return ['error_number' => '018' , 'error_message' => 'hatPair not stored' ];
			}

			$valid_room_tariff_sets = array();

			$property_tariffs	= $nbe->PropertyItemsTariffs->allPropertyTariffSets;

			$response = array();
			$response['requestedRooms'] = $requestedRooms ;

			foreach ($boom as $room_and_tariff_combination ) {

				$bang = explode("^", $room_and_tariff_combination);
				$room_id  = (int)$bang[0] ;
				$existing_rooms = $nbe->NBE_FilterTariffsOrganiseByRoomType->rooms;

				if ($room_id <1) {
					return ['error_number' => '016' , 'error_message' => 'room id invalid' ];
				}

				if (!array_key_exists($room_id , $existing_rooms)) {
					return ['error_number' => '016' , 'error_message' => 'room id not found for this property' ];
				}

				$response['rooms'][$room_id]['room_id'] = $room_id;

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
				$response['rooms'][$room_id]['tariff_set'] = $valid_room_tariff_sets[$room_and_tariff_combination]['tariffs'];
			}

			$interval = new DateInterval('P1D');
			$dates = NBE_Utilities::getPeriods($arrivalDate, $departureDate, $interval , false );
			$stay_days = count($dates);


			foreach ($valid_room_tariff_sets as $hatPair => $room) {

				$cumulative_adult_price = 0.00;
				$cumulative_seven_day_price = 0.00;
				$cumulative_thirty_day_price = 0.00;

				$room_id = $room['room']['room_uid'];
				foreach ( $room['tariffs'] as $tariff_set) {
					$cumulative_adult_price += (float)$tariff_set['adult_price'];
					$cumulative_seven_day_price += (float)$tariff_set['seven_day_price'];
					$cumulative_thirty_day_price += (float)$tariff_set['thirty_day_price'];
				}

				if ($stay_days < 7) {
					$base_price = $cumulative_adult_price / $stay_days;
				} elseif ($stay_days >= 7 && $stay_days <= 30 ) {
					$base_price = $cumulative_seven_day_price / $stay_days;
				} else {
					$base_price = $cumulative_thirty_day_price / $stay_days;
				}

				$response['rooms'][$room_id]['calculated_prices'] = array (
					'calculated_base_price' => $base_price,
					'cumulative_adult_price' => $cumulative_adult_price / $stay_days ,
					'cumulative_seven_day_price' => $cumulative_seven_day_price / $stay_days ,
					'cumulative_thirty_day_price' => $cumulative_thirty_day_price / $stay_days,
				);

				// Currently adults are not assigned to multiple rooms (at this stage, I'm working just on SRPS)
				// Later this will need to be changed to do calculations based on room assignations,
				// therefore this response will set adult prices in the root of the array, which is what will be passed back in the response;

				if (!isset($response['adult_prices'])) {
					$response['adult_prices'] = 0.00;
				}

				if ($nbe->booking_model == 'SRP') {
					if ($adults <= 2) {
						$response['adult_prices'] = 2 * $base_price * $stay_days;
					} else {
						$response['adult_prices'] = $adults * $base_price * $stay_days;
					}
					$response['adult_quantity'] = $adults;
					$response['stayDays'] =  $stay_days;
				} else {
					if ($adults <= 2) {
						$response['adult_prices'] = $response['adult_prices'] + (2 * $base_price * $stay_days);
					} else {
						$response['adult_prices'] = $response['adult_prices'] + ($adults * $base_price * $stay_days);
					}

					$response['adult_quantity'] = $adults;
					$response['stayDays'] =  $stay_days;
				}

			}

			$child_prices = array();

			$child_price_total = 0.00;
			foreach ($children as $child_rate) {
				if (isset($child_rate['label'])) {
					$child_rate_id = $child_rate['id'];
					$response['info'][$child_rate_id]['child_price'] = $child_rate['price'];
					$response['info'][$child_rate_id]['quantity'] = $child_rate['quantity'];
					$response['info'][$child_rate_id]['stay_days'] = $stay_days;
					$response['info'][$child_rate_id]['model'] = $child_rate['model'];
					$response['info'][$child_rate_id]['label'] = $child_rate['label'];
					$response['info'][$child_rate_id]['child_rate_id'] = $child_rate_id;

					$child_prices[$child_rate_id]['id'] = $child_rate['id'];
					if ($child_rate['quantity'] >0) {
						if ($child_rate['model'] == 'per_night') {
							$child_prices[$child_rate_id]['total'] = $child_rate['price'] * $child_rate['quantity'] * $stay_days;
						} else {
							$child_prices[$child_rate_id]['total'] = $child_rate['price'] * $child_rate['quantity'];
						}
						$child_prices[$child_rate_id]['quantity'] = $child_rate['quantity'];
						$child_prices[$child_rate_id]['rate'] = $child_rate['price'];
						$child_price_total = $child_price_total + 	$child_prices[$child_rate_id]['total'];
					}
				}
			}

			$response['child_prices_breakdown'] = $child_prices;
			$response['child_prices'] = $child_price_total;

			$ex_tax_room_total = $response['adult_prices'];



			$inc_tax_room_total = self::calculateInclTaxPrice($nbe ,  $ex_tax_room_total , $nbe->PropertyItemsTaxRates->accommodation_tax_code );
			$nbe->TempBookingHandler->setBookingData('room_total',$ex_tax_room_total);
			$nbe->TempBookingHandler->setBookingData('stay_days',$stay_days);
			$nbe->save_session();

			$response['accommodation_total_ex_tax'] = $ex_tax_room_total + $child_price_total;
			$response['accommodation_total_inc_tax'] = $inc_tax_room_total + $child_price_total;

			return $response;
		}


		/*
		 *
		 * Returns a detailed list of available rooms on -dates- organised into two arrays. The first organises available room hatPairs by room type, the second presents individual rooms with their details so that they can be selected directly
		 *
		 */
		public static function get_rooms_available_on_dates($nbe)
		{
			$arrivalDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
			$departureDate = $nbe->TempBookingHandler->getNBEData('departureDate');

			if ($arrivalDate == '') {
				return [ 'success' => false , 'reason' => 'Arrival date not set'];
			}

			if ($departureDate == '') {
				return [ 'success' => false , 'reason' => 'Departure date not set'];
			}

			if ( $arrivalDate == $departureDate) {
				return [ 'success' => false , 'reason' => 'Dates are the same day'];
			}

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');
			$response = $jomres_call_api->send_request("GET" , "booking/validate/dates" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$nbe->session_id] );
			if (!isset($response->data->dates_validation->valid) || $response->data->dates_validation->valid == false ) {
				Flight::json( "set_dates" , [ 'valid' => false , 'reason' =>$response->error_message ] );
			}

			// NBE Common has collected the information we need, but for MRPs we need to rejig this information to organise it by room type
			// We'll then look at the dates of the booking and filter out any rooms that are not available on all those dates.
			// Once that's done we can create a hatPair for each room and it's tariff(s). With the hatPair, for each room type we'll add the tariff as a sub type, and then the available rooms to that tariff.
			//
			// Once we have that we will return 2 arrays. One will be a list of room types, with hatPair sets allowing the client html/javascript to offer dropdowns.
			// The other array will be the rooms themselves, with their hatPairs. Although to begin with the Jomres NBE booking form will only support selecting rooms by room type, the second array returned will give the client the option to instead offer individual rooms, a la Classic room booking mode in Jomres Old Booking Engine. Then, depending on demand later, I can re-add that feature if requested.
			//

			$interval = new DateInterval('P1D');
			$booking_dates = NBE_Utilities::getPeriods($arrivalDate, $departureDate, $interval , false );

			$number_of_days = count($booking_dates);

			$all_rooms = $nbe->NBE_FilterTariffsOrganiseByRoomType->rooms;

			foreach ( $all_rooms as $index=>$room) {
				$all_dates_found_to_be_free = true;
				foreach ( $booking_dates as $booking_date ) {
					if (array_key_exists($booking_date,$nbe->PropertyItemsBookings->allBookings) ) {
						foreach ($nbe->PropertyItemsBookings->allBookings as $bookings) {
							foreach ($bookings as $booking) {
								if ( $booking["room_uid"] == $room['room']['room_uid'] ) {
									$all_dates_found_to_be_free = false;
								}
							}
						}
					}
				}
				if ($all_dates_found_to_be_free == false ) {
					unset($all_rooms[$index]);
				}
			}

			$room_types = array();
			$rooms_available = array();
			$room_type_features = array();

			// Ok, we've found and got rid of rooms that aren't available for the requested date, let's now build those two lists
			foreach ( $all_rooms as $index=>$room) {
				// I started Jomres 17 years ago. If I'd known I'd still be at it, I would have paid more attention to crafting consistent id names in the database.
				// It's too late to change them in the Core now, there are just too many places where things can go wrong.
				// Room type id is one of those, in one table it's X, in another table it's Y. Here I'll unset the existing element and add the index as room_type_id so that the souls who're using the api have got something they can tie to each room/room type/tariff.

				$room_type_id = $room["room_type"]["room_class_id"];
				$room['room']['room_type_id'] = $room_type_id;
				unset( $room['room']["room_classes_uid"] );

				if (!isset($room_type_features[$room_type_id])) {
					$room_type_features[$room_type_id] = array();
				}

				if (!isset($room_types[$room_type_id])) {
					$room["room_type"]['room_type_id'] = $room_type_id;
					//ksort($room["room_type"]);
					$room_types[$room_type_id]['room_type_info'] = $room["room_type"];
					unset($room_types[$room_type_id]['room_type_info']["room_class_id"]);
					$room_types[$room_type_id]['room_type_rooms'] = array();
					$room_types[$room_type_id]['room_type_tariffs'] = array();
				}

				$room_types[$room_type_id]['occupancy_levels'] = $nbe->jomres_occupancy_levels[$room_type_id];

				// Now we'll build the room types list
				// At the top we've got the room type, it's name, it's id and a link to the room type image
				// Under that we'll create an array of hatPairs reconstructed from each room's tariff sets $room ["tariff_sets"]
				// Right now we're limiting this to Standard tariffs so there should only be one tariff set per room, and a bunch of dates/prices in that
				// but we do need (?) to check the min_days setting of the tariff sets, if any of them are > $number_of_days then we can't use it (Hmm, do we? Not implemented yet, need to give this more thought)
				// This means that after we've done the rounds of the tariffs we will need to unset $room_types[$room_type_id] if there aren't any valid tariffs found

				$room_id = $room['room']["room_uid"];
				$counter =0;
				foreach ($room['tariff_sets'] as $tariff_set) {
					$hatPair = null;
					$room_types[$room_type_id]['room_type_rooms'][$counter]['tariff_name'] = $tariff_set['rate_title'];

					foreach ( $booking_dates as $booking_date ) {
						foreach ($tariff_set['dates'] as $date => $tariff) {
							if (is_null($hatPair)) {
								$hatPair = $room_id.'^'.$tariff_set['dates'][$booking_date]['rate_id'];
								$room_types[$room_type_id]['room_type_rooms'][$counter]['hatPairs'][]=$hatPair;

								// If the property has room features, let's send them upstream too
								$room_features = array();
								if ( trim($room['room']['room_features_uid']) != '') {
									$bang = explode ( "," , $room['room']['room_features_uid']);
									foreach ($bang as $room_feature_id) {
										if (!isset($room_type_features[$room_type_id][$room_feature_id])) {
											$room_type_features[$room_type_id][$room_feature_id] = $nbe->PropertyItemsRoomFeatures->allFeatureDetails[$room_feature_id];
										}
										$room_features[$room_feature_id] = $nbe->PropertyItemsRoomFeatures->allFeatureDetails[$room_feature_id];
									}
								}

								if (!isset($rooms_available[$hatPair])){
									$rt = $room["room_type"];
									unset($rt['room_class_id']);
									$rooms_available[$hatPair] = array (
										"room" => $room['room'],
										"room_features" => $room_features,
										"room_type" => $rt,
										'occupancy_levels' => $nbe->jomres_occupancy_levels[$room_type_id]
									);
								}
							}
							$tariff_set['dates'][$booking_date]['room_type_id'] = $room_type_id;

							// We'll remove room_id from here because it's not relevant and will confuse matters
							$tmp_arr = $tariff_set['dates'][$booking_date];
							foreach ($tmp_arr as $tariff_dates) {
								unset($tmp_arr['room_id']);
							}

							$rooms_available[$hatPair]['tariffs'][$booking_date] = $tmp_arr;
							$room_types[$room_type_id]['room_type_tariffs'][$counter]['tariffs'][$booking_date] = $tmp_arr;
						}
					}
				}
			}

			foreach ($room_types as $room_type_id => $room_type ) {
				$room_types[$room_type_id]['room_type_features'] = $room_type_features[$room_type_id];
			}

			return [ 'room_types' => $room_types , 'rooms' => $rooms_available ];
		}

		public static function extractPricesFromTariffSets( $rooms )
		{
		//	$nbe->NBE_FilterTariffsOrganiseByRoomType->rooms

			if (empty($rooms)){
				return [ 'success' => false , 'reason' => 'Rooms array is empty'];
			}

			foreach ($rooms as $room_id=>$room_data){
				if (empty($room_data["tariff_sets"])){
					return [ 'success' => false , 'reason' => 'No data in tariff sets'];
				}

				foreach ( $room_data["tariff_sets"] as $key=>$tariff_set) {

					foreach ( $tariff_set['dates'] as $date=>$tariff_data){
						$tariff_set_replacement = [ 'adult_price'=> $tariff_data['adult_price'] , 'date' => $tariff_data['date'] , 'checkin_date'=> $tariff_data['next_checkin_date'] , 'min_days' => $tariff_data['mindays'] ];
						$rooms[$room_id]['tariff_sets'][$key]['dates'][$date] = $tariff_set_replacement;
					}
				}
			}
			return $rooms;


		}

		public static function calculateDeposit( $nbe )
		{
			$RoomIdTariffIdHatPair = $nbe->TempBookingHandler->getBookingData('requestedRoom');
			$arrivalDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
			$departureDate = $nbe->TempBookingHandler->getNBEData('arrivalDate');
			$number_of_adults = $nbe->TempBookingHandler->getNBEData('adults');
			$number_of_children = $nbe->TempBookingHandler->getNBEData('total_children');
			$stay_days = $nbe->TempBookingHandler->getBookingData('stayDays');
			$accommodation_booking_total = (float)$nbe->TempBookingHandler->getBookingData('room_total');

			if ($arrivalDate == '') {
				return ['error_number' => '006' , 'error_message' => 'Arrival date not set' ];
			}

			if ($departureDate == '') {
				return ['error_number' => '007' , 'error_message' => 'Departure date not set' ];
			}

			if (!apiBookingUtilitiesValidation::validateDate($arrivalDate)) {
				return ['error_number' => '008' , 'error_message' => 'Arrival date invalid '.$arrivalDate ];
			}

			if (!apiBookingUtilitiesValidation::validateDate($departureDate)) {
				return ['error_number' => '009' , 'error_message' => 'DepartureDate date invalid '.$departureDate ];
			}

			$response = apiBookingUtilitiesValidation::validateDateOrder($arrivalDate , $departureDate );
			if (isset($response['success']) && $response['success'] === false ) {
				return ['error_number' => '008' , 'error_message' => 'Arrival/Departure date order invalid '.$arrivalDate.' '.$departureDate ];
			}

			$response = apiBookingUtilitiesValidation::validateAdultNumbers($number_of_adults , $nbe);
			if (isset($response['success']) && $response['success'] === false ) {
				return ['error_number' => '011' , 'error_message' =>  $response['message'] ];
			}

			$response = apiBookingUtilitiesValidation::validateChildNumbers($number_of_children , $nbe);
			if (isset($response['success']) && $response['success'] === false ) {
				return ['error_number' => '012' , 'error_message' =>  $response['message'] ];
			}

			$bang = explode(",",$RoomIdTariffIdHatPair);
			foreach ( $bang as $hatPair) {
				$response = apiBookingUtilitiesValidation::validateHatPair ( $hatPair , $nbe->NBE_FilterTariffsOrganiseByRoomType->rooms );
				if (isset($response['success']) && $response['success'] === false ) {
					return ['error_number' => '013' , 'error_message' =>  $response['message'] ];
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
			return $deposit_required;
		}

		public static function calculateCityTax( $nbe )
		{
			$accommodation_booking_total = $nbe->TempBookingHandler->getBookingData('room_total');
			$stay_days = $nbe->TempBookingHandler->getBookingData('stay_days');
			$adults = (int)$nbe->TempBookingHandler->getNBEData('adults');
			$children = (int)$nbe->TempBookingHandler->getNBEData('children');

			$accommodation_booking_total = (float)$accommodation_booking_total;
			$stay_days = (int)$stay_days;
			$number_of_guests = $adults + $children;
			$mrConfig = $nbe->PropertyConfiguration->mrConfig;

			$city_tax = 0;
			$city_tax_model_string = '';

			if ($mrConfig['city_tax_value'] > 0 ) {
				if (!isset($mrConfig[ 'city_tax_models' ])) {
					$mrConfig[ 'city_tax_models' ] = 'single';
				}

				if ( (float)$mrConfig[ 'city_tax_value' ] > 0 ) {

					switch ($mrConfig[ 'city_tax_models' ]) {
						case 'single' :
							$city_tax = (float)$mrConfig[ 'city_tax_value' ];
							$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_SINGLE', 'JOMRES_CITY_TAX_MODEL_SINGLE', false);
							break;
						case 'pernight' :
							$city_tax = (float)$mrConfig[ 'city_tax_value' ] * $stay_days ;
							$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_PER_NIGHT', 'JOMRES_CITY_TAX_MODEL_PER_NIGHT', false) ;
							break;
						case 'perguest' :
							$city_tax = (float)$mrConfig[ 'city_tax_value' ] * $number_of_guests ;
							$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_PER_GUEST', 'JOMRES_CITY_TAX_MODEL_PER_GUEST', false) ;
							break;
						case 'perguestpernight' :
							$city_tax = ((float)$mrConfig[ 'city_tax_value' ]  * $stay_days)  * $number_of_guests ;
							$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_PER_GUEST_PER_NIGHT', 'JOMRES_CITY_TAX_MODEL_PER_GUEST_PER_NIGHT', false) ;
							break;
						case 'percentbookingtotal' :
							$city_tax = $accommodation_booking_total * ((float)$mrConfig[ 'city_tax_value' ] / 100);
							$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_PERCENTAGE_OF_BOOKING_TOTAL', 'JOMRES_CITY_TAX_MODEL_PERCENTAGE_OF_BOOKING_TOTAL', false);
							break;
					}
				}
			}

			return [ 'tax' => $city_tax , 'label' => $city_tax_model_string ];
		}

		/*
		 *
		 * Every price stored within the booking engine should be passed through this calculateExTaxPrice method before being stored
		 * This method will take into account the prices_inclusive setting and only remove tax before returning it if the property is configured to have prices stored ex-tax
		 *
		 * The NBE Common functionality that finds room prices has already calculated the ex-tax price while they are being generated
		 *
		 */
		public static function calculateExTaxPrice( $nbe , $price , $tax_rate_id )
		{
			$tax_rates = $nbe->PropertyItemsTaxRates->taxrates;
			if (!array_key_exists(  $tax_rate_id , $tax_rates)) {
				return ['error_number' => '101' , 'error_message' => 'Tax rate id does not exist' ];
			}

			$tax_rate = $tax_rates[$tax_rate_id]['rate'];
			$mrConfig = $nbe->PropertyConfiguration->mrConfig;

			if ($mrConfig[ 'prices_inclusive' ] == 1) {
				$divisor = ($tax_rate / 100) + 1;
				$price = $price / $divisor;
			}

			return $price;
		}

		/*
		 *
		 * Within the booking engine prices should be stored as the ex-tax price
		 * So for displaying prices, we need to add tax again.
		 *
		 * This method does not take into account the prices_inclusive setting value because it assumes that any prices handed to it have already been subjected to the calculateExTaxPrice method previously.
		 *
		 *
		 */
		public static function calculateInclTaxPrice( $nbe , $price , $tax_rate_id )
		{
			$tax_rates = $nbe->PropertyItemsTaxRates->taxrates;
			if (!array_key_exists(  $tax_rate_id , $tax_rates)) {
				return ['error_number' => '101' , 'error_message' => 'Tax rate id does not exist' ];
			}
			$tax_rate = $tax_rates[$tax_rate_id]['rate'];
			$tax_percentage = $tax_rate/100;
			$tax = $price * $tax_percentage;
			$price = $price + $tax;
			return $price;
		}

	}
