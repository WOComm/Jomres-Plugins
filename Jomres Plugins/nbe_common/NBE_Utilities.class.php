<?php

class NBE_Utilities
{

	public static function getSessionIdFromHeaders()
	{
		foreach (getallheaders() as $name => $value) {
			if ($name == 'session_id') {
				$session_id = $value;
			}
		}
		if (!isset($session_id)) {
			throw new Exception("Session id not set");
		}
		return $session_id;
	}


	public static function findDateRangeForDates($d1, $d2)
	{
		$days = (int)self::findDaysForDates($d1, $d2);

		$dateRangeArray = array();
		$currentDay = $d1;
		$date_elements = explode('-', $currentDay);
		$unixCurrentDate = mktime(0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ]);
		for ($i = 0, $n = $days; $i <= $n; ++$i) {
			$currentDay = date('Y-m-d', $unixCurrentDate);
			$dateRangeArray[ ] = $currentDay;
			$date_elements = explode('-', $currentDay);
			$unixCurrentDate = mktime(0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ] + 1, $date_elements[ 0 ]);
		}
		return $dateRangeArray;
	}

	public static function findDaysForDates($d1, $d2)
	{
		$diff = self::dateDiff('d', $d1, $d2);

		return $diff;
	}

	public static function getNettPrice( $price = 0.00 , $mrConfig = array() , $tax_rate = 0.00 )
	{
		if ($price == 0.00) {
			throw new NBE_BookingEngineException ("Price not set");
		}

		if (empty($mrConfig)) {
			throw new NBE_BookingEngineException ("Property configuration array (mrConfig) not set");
		}

		if (!isset($mrConfig[ 'prices_inclusive' ])){
			$mrConfig[ 'prices_inclusive' ] = 1;
		}

		if ($mrConfig[ 'prices_inclusive' ] == 1) {
			$divisor = ($tax_rate / 100) + 1;
			$price = $price / $divisor;
		}

		return $price;
	}

	public static function getPeriods($start = '', $end = '', $interval = null , $max_one_year = true )
	{
		if ($start == '') {
			throw new NBE_BookingEngineException ("Period start not set");
		}

		if ($start == '') {
			throw new NBE_BookingEngineException ("Period end not set");
		}

		$start = new DateTime($start);
		$end = new DateTime($end);
		if (is_null($interval)) {
			$interval = new DateInterval('P1D');
		}

		$next_year = strtotime("+ 1 year");

		if ($max_one_year == true && $end->getTimestamp() > $next_year) {
			$end = new DateTime( date("Y-m-d" , $next_year) );
		}

		$period = new DatePeriod($start, $interval, $end);
		$dates = array();
		foreach ($period as $date) {
			$d = $date->format('Y-m-d');
			$dates[ ] = $d;
		}

		return $dates;
	}


	public static function dateDiff($interval, $first_date, $second_date)
	{
		$a = explode('-', $first_date);
		$b = explode('-', $second_date);

		if (strlen($a[0]) < 4 || strlen($b[0]) < 4) {
			return 1;
		}

		if (checkdate($a[1], $a[2], $a[0]) && checkdate($b[1], $b[2], $b[0])) {
			$datetime1 = new DateTime($first_date);
			$datetime2 = new DateTime($second_date);
			$diff = $datetime1->diff($datetime2);

			switch ($interval) {
				case 'd':
					return $diff->days;
					break;
				case 'w':
					return $diff->weeks;
					break;
				default:
					return $diff->days;
					break;
			}
		}

		return 1;
	}

}
