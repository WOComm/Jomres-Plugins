<?php


	class NBE_PropertyItemsThirdPartyExtras
	{
		public function __construct($property_uid = 0 )
		{

			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property uid not set");
			}

			$this->third_party_extras = array();

			$MiniComponents = jomres_getSingleton('mcHandler');
			if ($MiniComponents->eventFileExistsCheck('05030')) {
				$MiniComponents->triggerEvent('05030', $this);

				$mcOutput = $MiniComponents->getAllEventPointsData('05030');

				if (!empty($mcOutput)) {
					foreach ($mcOutput as $key => $val) {
						$tpe = array();
						$tpe[ 'THIRD_PARTY_EXTRA' ] = $val;
						$this->third_party_extras[ ] = $tpe;
					}
				}
			}
		}

		function __destruct()
		{

		}
	}

