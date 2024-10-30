<?php


	class NBE_PropertyItemsRoomFeatures
	{
		public function __construct($property_uid = 0 )
		{

			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property uid not set");
			}
			$this->allFeatureDetails = array();
			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
			$jomres_media_centre_images->get_images($property_uid, array('room_features'));

			$basic_room_details = jomres_singleton_abstract::getInstance('basic_room_details');
			$basic_room_details->get_all_rooms($property_uid);

			foreach ($basic_room_details->all_room_features as $f) {
				$this->allFeatureDetails[ $f['room_features_uid'] ] = array('room_features_uid' => $f['room_features_uid'], 'feature_description' => $f['feature_description'], 'image' => $f['image']);
			}
		}

		function __destruct()
		{

		}
	}

