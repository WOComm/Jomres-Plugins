<?php


	class NBE_PropertyItemsImages
	{
		public function __construct( $property_uid = 0 )
		{
			if ($property_uid == 0) {
				throw new NBE_BookingEngineException("Property uid not set");
			}


			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
			$jomres_media_centre_images->get_images($property_uid, array('property'));

			$this->images = $jomres_media_centre_images->multi_query_images[$property_uid];
		}

		function __destruct()
		{

		}
	}

