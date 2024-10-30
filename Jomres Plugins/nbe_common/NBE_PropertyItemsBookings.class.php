<?php


	class NBE_PropertyItemsBookings
	{
		public function __construct($property_uid = 0 ,$allPropertyRooms = array() , $tmpBookingHandler = object , $mrConfig = array() , $validDates = array() )
		{

			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property uid not set");
			}

			if (empty($allPropertyRooms)) {
				throw new NBE_BookingEngineException ("Property rooms array is empty");
			}

			if (empty($mrConfig)) {
				throw new NBE_BookingEngineException ("mrConfig is empty");
			}

			$this->allBookings = array();
			$this->occupationByDate = array();
			$this->capacityByDate = array();

			$contract_ids = array();
			$allPropertyRoomUids = array_keys($allPropertyRooms);
			$this->roomsBookedByDate = array();

			foreach ($validDates as $date) {
				$this->capacityByDate[$date] = ['adults' => (int)$mrConfig['accommodates_adults'] , 'children' => (int)$mrConfig['accommodates_children'] ];
			}

			$this->changeover_days = array();
			$query = "SELECT arrival FROM #__jomres_contracts WHERE property_uid = ".(int)$property_uid.' ORDER BY arrival ASC';
			$co_days = doSelectSql($query);
			if (!empty($co_days)){
				foreach ( $co_days as $co_day) {
					$this->changeover_days[] = str_replace ( "/" , "-" ,$co_day->arrival);
				}

			}

			$query = "SELECT room_uid,date,contract_uid FROM #__jomres_room_bookings WHERE property_uid = ".(int)$property_uid.' ORDER BY date ASC';
			$bookings = doSelectSql($query);
			if (!empty($bookings)) {
				foreach ($bookings as $c) {
					$date=str_replace("/","-",$c->date);
					$this->allBookings[ $date ][ $c->room_uid ] = array('room_uid' => $c->room_uid);
					if(!in_array($c->contract_uid , $contract_ids)){
						$contract_ids[] = $c->contract_uid;
					}

				}

				if (!empty($this->allBookings)) {
					ksort($this->allBookings);
				}

				// Here we are going to find the numbers booked on specific dates. Not really used by SRPs however MRPs will need it to ensure that we can offer X or N rooms for a given date bearing in mind the number of rooms already booked
				$query = "SELECT contract_uid,adults,children,date_range_string FROM #__jomres_contracts WHERE property_uid = '".(int)$property_uid."' AND contract_uid IN (".jomres_implode($contract_ids).') ';
				$contracts = doSelectSql($query);
				if (!empty($contracts)) {
					foreach ($contracts as $contract) {
						$dates = explode("," , $contract->date_range_string );

						if (!empty($dates)) {
							foreach ($dates as $date) {
								$date = date("Y-m-d" , strtotime($date));

								if (isset($contracts_dates[$date])){
									$this->occupationByDate[$date]['adults'] = $contracts_dates[$date]['adults'] + (int)$contract->adults;
									$this->occupationByDate[$date]['children'] = $contracts_dates[$date]['children'] + (int)$contract->children;

								} else {
									$this->occupationByDate[$date]['adults'] = (int)$contract->adults;
									$this->occupationByDate[$date]['children'] = (int)$contract->children;
								}
								if (isset($this->capacityByDate[$date]) ) {
									$this->capacityByDate[$date]['adults'] =  $this->capacityByDate[$date]['adults'] - (int)$contract->adults;
									$this->capacityByDate[$date]['children'] =  $this->capacityByDate[$date]['children'] - (int)$contract->children;
								}
							}
						}
					}
					if (!empty($this->occupationByDate)) {
						ksort($this->occupationByDate);
					}
				}
			}
		}

		function __destruct()
		{

		}
	}

