<?php


	class NBE_PropertyStatesFullyBookedDates
	{
		public function __construct($property_uid = 0 , $allBookings = array() , $allPropertyRooms = array() , $allPropertyTariffs = array() , $NBE_PropertyStatesDatesWithinBookingSettingParameters = array())
		{

			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property uid not set");
			}

			if (empty($allPropertyRooms)) {
				throw new NBE_BookingEngineException ("allPropertyRooms array is empty");
			}

			if (empty($allPropertyTariffs)) {
				throw new NBE_BookingEngineException ("allPropertyTariffs array is empty");
			}

			$this->fully_booked_dates = $NBE_PropertyStatesDatesWithinBookingSettingParameters->dates_from_today_til_first_valid_date;
			$MiniComponents = jomres_getSingleton('mcHandler');
			$result = array();
			if ($MiniComponents->eventFileExistsCheck('05060')) {
				$result = $MiniComponents->triggerEvent('05060', $this);
				if (isset($result[ 'plugin_manages_fully_booked_dates' ]) && $result[ 'plugin_manages_fully_booked_dates' ]) {
					$booked_dates = $result[ 'fully_booked_dates' ];
					foreach ($booked_dates as $date) {
						$tmpdate = date('Y-m-d', strtotime($date));
						$this->fully_booked_dates[ ] = $tmpdate;
					}
				}
			}

			if (!isset($result[ 'plugin_manages_fully_booked_dates' ])) {
				$total_number_of_rooms = count($allPropertyRooms);

				foreach ($allBookings as $date => $bookings) {
					$number_of_bookings_this_date = count($bookings);
					if ($number_of_bookings_this_date == $total_number_of_rooms) {
						$this->fully_booked_dates[ ] = $date;
					}
				}

				$all_tariffs_are_specific_days_of_week = true;
				foreach ($allPropertyTariffs as $tariff) {
					if ($tariff[ 'dayofweek' ] == 7) {
						$all_tariffs_are_specific_days_of_week = false;
					}
				}
				if ($all_tariffs_are_specific_days_of_week) {
					$days_of_week_allowed = array();
					foreach ($allPropertyTariffs as $tariff) {
						$days_of_week_allowed[ ] = $tariff[ 'dayofweek' ];
					}
					$days_of_week_allowed = array_unique($days_of_week_allowed);
					$start = date('Y-m-d');
					$end = date('Y-m-d', strtotime('+4 years'));
					$dates = NBE_Utilities::findDateRangeForDates($start, $end);
					$count = count($dates);
					for ($i = 0; $i <= $count; ++$i) {
						$date = $dates[ $i ];
						$day_of_week_of_date = $this->getDayOfWeek($date);
						if (in_array($day_of_week_of_date, $days_of_week_allowed)) {
							unset($dates[ $i ]);
						}
					}
					foreach ($dates as $d) {
						$tmpdate = date('Y-m-d', strtotime($d));
						$this->fully_booked_dates[ ] = $tmpdate;
					}
				}
			}
			return $this->fully_booked_dates;
		}

		function __destruct()
		{

		}
	}

