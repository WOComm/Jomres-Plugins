<?php


	class NBE_PropertyItemsTaxRates
	{
		public function __construct( $mrConfig = array() )
		{
			if (empty($mrConfig)) {
				throw new NBE_BookingEngineException("Property configuration array is empty");
			}

			if ( !isset($mrConfig[ 'accommodation_tax_code' ]) ) {
				throw new NBE_BookingEngineException("accommodation_tax_code is not set");
			}

			$jrportal_taxrate = jomres_singleton_abstract::getInstance('jrportal_taxrate');
			$this->taxrates = $jrportal_taxrate->taxrates;

			$this->accommodation_tax_rate = 0.0;
			if (isset($mrConfig[ 'accommodation_tax_code' ]) && (int) $mrConfig[ 'accommodation_tax_code' ] > 0) {
				$jrportal_taxrate = jomres_singleton_abstract::getInstance('jrportal_taxrate');
				$cfgcode = $mrConfig[ 'accommodation_tax_code' ];
				$this->accommodation_tax_code = $cfgcode;
				$this->accommodation_tax_rate = (float) $jrportal_taxrate->taxrates[ $cfgcode ][ 'rate' ];
			}

			$jrportal_taxrate = jomres_singleton_abstract::getInstance('jrportal_taxrate');
			$this->taxrates = $jrportal_taxrate->taxrates;

		}

		function __destruct()
		{

		}
	}

