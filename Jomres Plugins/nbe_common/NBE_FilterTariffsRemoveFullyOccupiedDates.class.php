<?php


	class NBE_FilterTariffsRemoveFullyOccupiedDates
	{
		public function __construct( $fullyOccupiedDates = array() , $tariffSets = array() )
		{

			if (empty($tariffSets)) {
				throw new NBE_BookingEngineException ("Tariff set array (tariffSets) empty");
			}

			if ( empty($fullyOccupiedDates)) {
				$this->filteredTariffSets = $tariffSets;
			} else {
				foreach ($fullyOccupiedDates as $fullyOccupiedDate) {
					foreach ($tariffSets as $key => $tariffSet) {
						if (isset($fullyOccupiedDate, $tariffSet['dates'])) {
							unset($tariffSets[$key]['dates'][$fullyOccupiedDate]);
						}
					}
				}
				$this->filteredTariffSets = $tariffSets;
			}
		}

		function __destruct()
		{

		}
	}

/*

  [19]=>
  array(10) {
    ["rate_title"]=>
    string(6) "Tariff"
    ["rate_description"]=>
    string(0) ""
    ["tariff_type_id"]=>
    string(2) "19"
    ["mindays"]=>
    string(1) "1"
    ["maxdays"]=>
    string(3) "365"
    ["extra_guests_price"]=>
    string(4) "0.00"
    ["minpeople"]=>
    string(1) "1"
    ["maxpeople"]=>
    string(1) "6"
    ["roomclass_uid"]=>
    string(1) "7"
    ["dates"]=>
    array(601) {
      ["2022-05-10"]=>
      array(5) {
        ["rate_id"]=>
        string(3) "234"
        ["adult_price"]=>
        float(83.33333333333334)
        ["child_price"]=>
        float(83.33333333333334)
        ["seven_day_price"]=>
        float(75.00000000000001)
        ["thirty_day_price"]=>
        float(70.83333333333334)
      }
      ["2022-05-11"]=>
      array(5) {
        ["rate_id"]=>
        string(3) "234"
        ["adult_price"]=>
        float(83.33333333333334)
        ["child_price"]=>
        float(83.33333333333334)
        ["seven_day_price"]=>
        float(75.00000000000001)
        ["thirty_day_price"]=>
        float(70.83333333333334)
      }

 */