<?php


	class NBE_FilterTariffsOrganiseByRoomType
	{
		public function __construct( $allRoomClasses = array() , $tariffSets = array() , $rooms = array() )
		{

			if (empty($allRoomClasses)) {
				throw new NBE_BookingEngineException ("Room type array (allRoomClasses) empty");
			}

			if (empty($tariffSets)) {
				throw new NBE_BookingEngineException ("filteredTariffSets array empty");
			}

			if (empty($rooms)) {
				throw new NBE_BookingEngineException ("rooms array empty");
			}

			$this->rooms = array();

			foreach ($rooms as $index => $room) {
				$room_uid = $room['room_uid'];
				$room_type_id = $room['room_classes_uid'];
				$this->rooms[$room_uid]['room'] = $room;

				foreach ( $allRoomClasses as $key => $roomType ) {
					if ( !isset($this->rooms[$room_uid]['room_type']) && ($roomType["room_class_id"] == $room_type_id) ) {
						$this->rooms[$room_uid]['room_type'] = $roomType;
					}

					if (!isset($this->rooms[$room_uid]['tariff_sets'])) {
						foreach ($tariffSets as $key=>$tariffSet) {
							if ($tariffSet['roomclass_uid'] == $room_type_id) {
								foreach($tariffSet['dates'] as $k=>$val) {
									$tariffSet['dates'][$k]['room_id'] = $room_uid;
								}
								$this->rooms[$room_uid]['tariff_sets'][] = $tariffSet;
							}
						}
					}


					// The room doesn't have any tariffs at all, we should unset it altogether, no point in showing rooms that can't be booked
					if (!isset($this->rooms[$room_uid]['tariff_sets'])) {
						unset($this->rooms[$index]);
					}
				}

			}
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