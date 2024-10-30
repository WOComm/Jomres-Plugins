<?php


class NBE_PropertyChildRates
	{
		public function __construct( $property_uid = 0 )
		{
			if ($property_uid == 0) {
				throw new NBE_BookingEngineException('Property UID cannot be found');
			}
			jr_import('jomres_child_rates');
			$this->child_rates = new jomres_child_rates($property_uid);

			return $this->child_rates;

		}

		function __destruct()
		{
		}
	}

