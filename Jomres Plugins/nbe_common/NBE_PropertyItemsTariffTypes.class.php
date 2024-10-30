<?php


	class NBE_PropertyItemsTariffTypes
	{
		public function __construct($property_uid = 0 , $mrConfig = array() )
		{
			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property Uid not set");
			}

			if (empty($mrConfig)) {
				throw new NBE_BookingEngineException ("Property configuration array (mrConfig) not set");
			}

			$this->all_tariff_types_to_tariff_id_xref = array();
			$this->all_tariff_id_to_tariff_type_xref = array();
			if ($mrConfig[ 'tariffmode' ] == '2' || $mrConfig[ 'tariffmode' ] == '5') {
				$query = "SELECT tarifftype_id,tariff_id FROM #__jomcomp_tarifftype_rate_xref  WHERE property_uid = '".(int)$property_uid."'";
				$tariff_type_list = doSelectSql($query);
				if (!empty($tariff_type_list)) {
					foreach ($tariff_type_list as $type) {
						$this->all_tariff_types_to_tariff_id_xref[ $type->tarifftype_id ][ ] = $type->tariff_id;
						$this->all_tariff_id_to_tariff_type_xref[ $type->tariff_id ][ ] = $type->tarifftype_id;
					}
				}
			}
		}

		function __destruct()
		{

		}
	}

