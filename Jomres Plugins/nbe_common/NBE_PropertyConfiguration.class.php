<?php


class NBE_PropertyConfiguration
	{
		public function __construct( $property_uid = 0 )
		{
			if ($property_uid == 0) {
				throw new NBE_BookingEngineException('Property UID cannot be found');
			}

			$this->mrConfig = getPropertySpecificSettings($property_uid);
			return $this->mrConfig;
		}

		function __destruct()
		{
		}
	}

