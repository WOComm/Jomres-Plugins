<?php


	class NBE_PropertyItemsRooms
	{
		public function __construct($property_uid = 0 )
		{

			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property uid not set");
			}

			$this->allPropertyRooms = array();

			$basic_room_details = jomres_singleton_abstract::getInstance('basic_room_details');
			$basic_room_details->get_all_rooms($property_uid);

			if (empty($basic_room_details->rooms)) {
				throw new NBE_BookingEngineException('Property has no rooms.');
			}

			$jomres_markdown = new jomres_markdown();

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
			$images = $jomres_media_centre_images->get_images($property_uid, array('rooms')); // Gets the rooms images
			//$room_images
			$room_images = $images [ 'rooms' ];

			if (!empty($basic_room_details->all_room_features)) {
				foreach ($basic_room_details->all_room_features as $f) {
					$this->allRoomFeatures[ $f['room_features_uid'] ] = $f['feature_description'];
				}
			}

			foreach ($basic_room_details->rooms as $r) {
				$small_image = $jomres_media_centre_images->multi_query_images['noimage-small'];
				$medium_image = $jomres_media_centre_images->multi_query_images['noimage-medium'];
				$large_image = $jomres_media_centre_images->multi_query_images['noimage-large'];
				if (isset($room_images [ $r['room_uid'] ] [0] ['small'])) {
					$small_image = $room_images [ $r['room_uid'] ] [0] ['small'];
				}
				if (isset($room_images [ $r['room_uid'] ] [0] ['medium'])) {
					$medium_image = $room_images [ $r['room_uid'] ] [0] ['medium'];
				}
				if (isset($room_images [ $r['room_uid'] ] [0] ['large'])) {
					$large_image = $room_images [ $r['room_uid'] ] [0] ['large'];
				}

				$this->allPropertyRooms[ $r['room_uid'] ] = array(
					'room_uid' => $r['room_uid'],
					'room_classes_uid' => $r['room_classes_uid'],
					'propertys_uid' => $r['propertys_uid'],
					'room_features_uid' => $r['room_features_uid'],
					'room_name' => $r['room_name'],
					'room_number' => $r['room_number'],
					'room_floor' => $r['room_floor'],
					'max_people' => $r['max_people'],
					'singleperson_suppliment' => $r['singleperson_suppliment'],
					'tagline' => $r['tagline'],
					'description' => $jomres_markdown->get_markdown($r['description']),
					'surcharge' => $r['surcharge'],
					'small_room_image' => $small_image,
					'medium_room_image' => $medium_image,
					'large_room_image' => $large_image,
				);

				$this->allPropertyRoomUids[ ] = $r['room_uid'];
			}
			if (!empty($basic_room_details->all_room_features)) {
				$this->allFeatureIds = array_keys($basic_room_details->all_room_features);
			}
		}

		function __destruct()
		{

		}
	}

