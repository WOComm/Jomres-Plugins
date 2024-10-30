<?php


	class NBE_PropertyItemsRoomTypes
	{
		public function __construct($property_uid = 0 )
		{

			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property uid not set");
			}
			$this->allRoomClasses = array();

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
			$jomres_media_centre_images->get_images($property_uid);
			$jomres_media_centre_images->get_site_images('rmtypes'); // These are administrator created room type images. If the property manager doesn't upload images for a room type (which is quite possible if they aren't given the option) then we'll "fallback" to admin created images instead

			$basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');

			if (is_null($basic_property_details->multi_query_result[$property_uid]["room_types"])) {
				throw new NBE_BookingEngineException ("Property has no room types");
			}

			$this->allRoomClassIds = array_keys($basic_property_details->multi_query_result[$property_uid]["room_types"]);

			$resource_type = 'room_types';

			$query = 'SELECT room_classes_uid,room_class_abbv,room_class_full_desc,image FROM #__jomres_room_classes WHERE room_classes_uid IN ('.jomres_implode($this->allRoomClassIds).') ';
			$roomClasses = doSelectSql($query);
			foreach ($roomClasses as $c) {
				$roomtype_abbv = jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPES_ABBV'.(int) $c->room_classes_uid, stripslashes($c->room_class_abbv), false, false);
				$roomtype_desc = jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPES_DESC'.(int) $c->room_classes_uid, stripslashes($c->room_class_full_desc), false, false);

				$resource_id = $c->room_classes_uid;

				if (isset($jomres_media_centre_images->images [$resource_type] [$resource_id])) {
					$images = $jomres_media_centre_images->images [$resource_type] [$resource_id];
				} else {
					if ( isset($basic_property_details->this_property_room_classes[$resource_id]['image']) && file_exists(JOMRES_IMAGELOCATION_ABSPATH.'rmtypes/'.$basic_property_details->this_property_room_classes[$resource_id]['image'])) {
						$images = array( array ( "large" => JOMRES_IMAGELOCATION_RELPATH.'rmtypes/'.$basic_property_details->this_property_room_classes[$resource_id]['image']) );
					} else {
						$images = array ( array(
							"large" => $jomres_media_centre_images->multi_query_images['noimage-large'],
							"medium" => $jomres_media_centre_images->multi_query_images['noimage-medium'],
							"small" => $jomres_media_centre_images->multi_query_images['noimage-small']
						) );
					}
				}

				$this->allRoomClasses[ $c->room_classes_uid ] = array( 'room_class_id' => $c->room_classes_uid, 'room_class_abbv' => $roomtype_abbv, 'room_class_full_desc' => $roomtype_desc, 'image' => $c->image , 'images' => $images);
			}
		}

		function __destruct()
		{

		}
	}

