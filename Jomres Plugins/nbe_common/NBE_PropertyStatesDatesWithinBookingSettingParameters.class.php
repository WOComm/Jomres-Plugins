<?php


	class NBE_PropertyStatesDatesWithinBookingSettingParameters
	{
		public function __construct( $mrConfig  = array() )
		{

			if (empty($mrConfig)) {
				throw new NBE_BookingEngineException ("config array is empty");
			}
			$interval = new DateInterval('P1D');

			$this->datesWithinBookingSettingParameters = array();

			$today = strtotime(date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y'))));

			$this->first_valid_date = strtotime(date('Y-m-d', mktime(0, 0, 0, date('m'), date('d')+(int)$mrConfig['mindaysbeforearrival'], date('Y'))));

			$this->dates_from_today_til_first_valid_date = NBE_Utilities::getPeriods( date ("Y-m-d" , $today), date ("Y-m-d" ,$this->first_valid_date), $interval , true );

			if ($mrConfig['limitAdvanceBookingsYesNo'] == "1" )
				$this->advanceBookingsLimit = (int)$mrConfig['advanceBookingsLimit'];
			else
				$this->advanceBookingsLimit = 365;

			$this->last_valid_date = mktime(0, 0, 0, date('m'), date('d')+(int)$this->advanceBookingsLimit+(int)$mrConfig['mindaysbeforearrival'], date('Y'));


			$this->datesWithinBookingSettingParameters = NBE_Utilities::getPeriods( date ("Y-m-d" ,$this->first_valid_date), date ("Y-m-d" ,$this->last_valid_date).' 23:59:59', $interval , $max_one_year = true );


		}

		function __destruct()
		{

		}
	}

