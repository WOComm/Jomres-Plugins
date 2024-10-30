<?php


	class NBE_PropertyItemsTariffs
	{
		public function __construct($property_uid = 0 , $accommodation_tax_rate  = 0.00 , $mrConfig = array() , $tariff_type_id_xref = array() )
		{

			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property uid not set");
			}

			if (empty($mrConfig)) {
				throw new NBE_BookingEngineException ("Property configuration array (mrConfig) not set");
			}

			if (empty($tariff_type_id_xref)) {
				throw new NBE_BookingEngineException ("Tariff type cross reference array empty");
			}

			$this->today = date('Y/m/d', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
			$this->minest_days = 1000;

			$this->allPropertyTariffs = array();
			$this->allPropertyTariffSets = array();

			$query = "SELECT `rates_uid`,`rate_title`,`rate_description`,`validfrom`,`validto`,
			`roomrateperday`, `extra_guests_price`,  `modifiers`, `mindays`,`maxdays`,`minpeople`,`maxpeople`,`roomclass_uid`,
			`ignore_pppn`,`allow_ph`,`allow_we`,`weekendonly`,`dayofweek`,`minrooms_alreadyselected`,`maxrooms_alreadyselected`
			FROM #__jomres_rates WHERE property_uid = '$property_uid'
			AND DATE_FORMAT(`validto`, '%Y/%m/%d') >= DATE_FORMAT('".$this->today."', '%Y/%m/%d')
			";

			$tariffs = doSelectSql($query);

			$modifiers_calculated = array();

			$interval = new DateInterval('P1D');
			foreach ($tariffs as $t) {
				$roomrate = NBE_Utilities::getNettPrice($t->roomrateperday, $mrConfig , $accommodation_tax_rate);

				$dates = NBE_Utilities::getPeriods($t->validfrom, $t->validto.' 23:59:59', $interval , $max_one_year = true );

				$tariff_type_id = $tariff_type_id_xref->all_tariff_id_to_tariff_type_xref[$t->rates_uid][0];

				$modifiers = json_decode(base64_decode($t->modifiers));

				if ( $t->mindays < $this->minest_days) { // Yes, I know minest day isn't a word. I could've gone with lowest days, but minest stays congruent with mindays, and congruence is really useful when you're juggling mental balls.
					$this->minest_days = $t->mindays;
				}

				$this->allPropertyTariffs[ $t->rates_uid ] = array(
					'rates_uid'				=> $t->rates_uid,
					'tariff_type_id'		=> $tariff_type_id ,
					'rate_title'			=> $t->rate_title,
					'rate_description'		=> $t->rate_description,
					'validfrom'				=> $t->validfrom,
					'validto'				=> $t->validto,
					'roomrateperday'		=> $roomrate,
					'extra_guests_price'	=> $t->extra_guests_price ,
					'modifiers'				=> $modifiers ,
					'mindays'				=> $t->mindays,
					'maxdays'				=> $t->maxdays,
					'minpeople'				=> $t->minpeople,
					'maxpeople'				=> $t->maxpeople,
					'roomclass_uid'			=> $t->roomclass_uid,
					'ignore_pppn'			=> $t->ignore_pppn,
					'allow_ph'				=> $t->allow_ph,
					'allow_we'				=> $t->allow_we,
					'weekendonly'			=> $t->weekendonly,
					'dayofweek'				=> $t->dayofweek,
					'minrooms_alreadyselected' => $t->minrooms_alreadyselected,
					'maxrooms_alreadyselected' => $t->maxrooms_alreadyselected,
					'tariff_dates'			=> $dates,
				);

				// Currently there's no distinction between adult and child prices, but once that's added (if it's added, which it probably will be,) we've got the scope to use them

				// There is the potential for having a he..ck of a lot of prices, so we'll cache calculation results so that we're not constantly doing the same calculations
				if (!isset($modifiers_calculated[(int)$roomrate])) {
					$discount = 0;
					if ( isset($modifiers->modifier_7_days) && $modifiers->modifier_7_days > 0 ) {
						if ($modifiers->modifier_is_percentage == 1) {
							$rate = (int)$modifiers->modifier_7_days / 100;
							$discount = $rate * $roomrate;
						} else {
							$discount = $modifiers->modifier_7_days;
						}
					}
					$seven_day_price = $roomrate - $discount;
					$modifiers_calculated[(int)$roomrate]['seven_day_price'] = $seven_day_price;

					if ( isset($modifiers->modifier_30_days) && $modifiers->modifier_30_days > 0 ) {
						if ($modifiers->modifier_is_percentage == 1) {
							$rate = (int)$modifiers->modifier_30_days / 100;
							$discount = $rate * $roomrate;
						} else {
							$discount = $modifiers->modifier_30_days;
						}
					}
					$thirty_day_price = (int)$roomrate - $discount;
					$modifiers_calculated[(int)$roomrate]['thirty_day_price'] = $thirty_day_price;
				} else {
					$seven_day_price = $modifiers_calculated[$roomrate]['seven_day_price'];
					$thirty_day_price = $modifiers_calculated[$roomrate]['thirty_day_price'];
				}


				foreach ($dates as $date) {

					$this->allPropertyTariffSets[$tariff_type_id]['rate_title']				= $t->rate_title;
					$this->allPropertyTariffSets[$tariff_type_id]['rate_description']		= $t->rate_description;
					$this->allPropertyTariffSets[$tariff_type_id]['tariff_type_id']			= $tariff_type_id;
					$this->allPropertyTariffSets[$tariff_type_id]['maxdays']				= $t->maxdays;
					$this->allPropertyTariffSets[$tariff_type_id]['extra_guests_price']		= $t->extra_guests_price;
					$this->allPropertyTariffSets[$tariff_type_id]['minpeople']				= $t->minpeople;
					$this->allPropertyTariffSets[$tariff_type_id]['maxpeople']				= $t->maxpeople;
					$this->allPropertyTariffSets[$tariff_type_id]['roomclass_uid']			= $t->roomclass_uid;

					$next_checkin_date = date("Y-m-d" , strtotime($date. '+'.($t->mindays).' days'));

					$this->allPropertyTariffSets[$tariff_type_id]['dates'][$date]			= array (  'date' => $date , 'rate_id' => $t->rates_uid ,  'adult_price' => $roomrate , 'seven_day_price' => $seven_day_price , 'thirty_day_price' => $thirty_day_price , 'mindays' => $t->mindays , 'next_checkin_date' => $next_checkin_date);
				}
			}
		}

		function __destruct()
		{

		}
	}

	/*
	 *

object(NBE_PropertyItemsTariffTypes)#991 (2) {
  ["all_tariff_types_to_tariff_id_xref"]=>
  array(1) {
    [19]=>
    array(175) {
      [0]=>
      string(2) "56"
      [1]=>
      string(2) "57"
      [2]=>
      string(2) "58"
      [3]=>
      string(2) "59"
    }
  }
  ["all_tariff_id_to_tariff_type_xref"]=>
  array(175) {
    [56]=>
    array(1) {
      [0]=>
      string(2) "19"
    }
    [57]=>
    array(1) {
      [0]=>
      string(2) "19"
    }
    [58]=>
    array(1) {
      [0]=>
      string(2) "19"
    }
    [59]=>
    array(1) {
      [0]=>
      string(2) "19"
    }
  }
}


	 *
	 */
