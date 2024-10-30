<?php


	class NBE_PropertyItemsExtras
	{
		public function __construct($property_uid = 0 , $taxrates = array() , $mrConfig = array() )
		{

			if ($property_uid == 0) {
				throw new NBE_BookingEngineException ("Property uid not set");
			}

			if (empty($taxrates)) {
				throw new NBE_BookingEngineException ("taxrates array is empty");
			}

			if (empty($mrConfig)) {
				throw new NBE_BookingEngineException ("Property configuration array (mrConfig) not set");
			}

			$this->extras = array();
			
			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
			$jomres_media_centre_images->get_images($property_uid, array('extras'));

			$thisJRUser = jomres_getSingleton('jr_user');

			$extra_models_explanation = array(
				'1' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK',false),
				'2' =>jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS' , false ),
				'3' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING' , false),
				'4' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING' , false),
				'5' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY' , false),
				'6' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK' , false),
				'7' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS' , false),
				'8' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM' , false),
				'9' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING' , false),
				'100' =>jr_gettext('_JOMRES_COMMISSION', '_JOMRES_COMMISSION' , false)
			);

			$extra_details = array();


			$query = "SELECT `uid`,`name`,`desc`,`maxquantity`,`price`,`auto_select`,`tax_rate`,`chargabledaily`,`property_uid`,`published`,`validfrom`,`validto`,`limited_to_room_type` FROM `#__jomres_extras` where property_uid = '".(int)$property_uid."' AND published = '1' ORDER BY name";
			$exList = doSelectSql($query);

			foreach ($exList as $ex) {
				$show_extra = true;

				$validfrom_ts = strtotime($ex->validfrom);
				$validto_ts = strtotime($ex->validto);

				$this->today = date('Y/m/d', mktime(0, 0, 0, date('m'), date('d'), date('Y')));

				if ($ex->validfrom > '1970-01-01 00:00:01' && !is_null($ex->validfrom) && $ex->validfrom != '1999-11-30 00:00:00') { // takes into account older optional extras
					if (!(($this->today >= $validfrom_ts) && ($this->today <= $validto_ts))) {
						$show_extra = false;
					}
				}

				// add checks for room types

				if (!$show_extra) {
					$extra_details[ 'uid' ] = $ex->uid;
					$query = "SELECT `force`,`model` FROM #__jomcomp_extrasmodels_models WHERE extra_id = '$ex->uid'";
					$model = doSelectSql($query, 2);

					switch ($model[ 'model' ]) {
						case '1': // Per week
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK',false);
							break;
						case '2': // per days
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS' , false );
							break;
						case '3': // per booking
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING' , false);
							break;
						case '4': // per person per booking
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING' , false);
							break;
						case '5': // per person per day
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY' , false);
							break;
						case '6': // per person per week
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK' , false);
							break;
						case '7': // per person per days min days
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS' , false);
							break;
						case '8': // per days per room
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM' , false);
							break;
						case '9': // per room
							$model_text = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING' , false);
							break;
						case '100': // commission
							$model_text = jr_gettext('_JOMRES_COMMISSION', '_JOMRES_COMMISSION' , false);
							break;
					}

					$extra_details[ 'tax_rate' ]	= array (
						'rate'			=> $taxrates[ $ex->tax_rate ][ 'rate' ] ,
						'tax_code'		=> $taxrates[ $ex->tax_rate ][ 'code' ],
						'description'	=> $taxrates[ $ex->tax_rate ][ 'description' ]
						);

					$extra_details[ 'model' ]		= $model;


					$extra_details[ 'price' ]		= $ex->price;
					$extra_details[ 'limited_to_room_type' ]		= $ex->limited_to_room_type;

					$extra_details[ 'validfrom' ]		= $ex->validfrom;
					$extra_details[ 'validto' ]		= $ex->validto;

					$extra_details[ 'name' ] = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRANAME'.$ex->uid, jomres_decode($ex->name));
					$extra_details[ 'modeltext' ] = $model_text;

					$extra_details[ 'extra_image' ] = $jomres_media_centre_images->multi_query_images['noimage-small'];
					if (isset($jomres_media_centre_images->images['extras'][$ex->uid][0]['small'])) {
						$extra_details[ 'extra_image' ] = $jomres_media_centre_images->images['extras'][$ex->uid][0]['small'];
					}

					/*if ($mrConfig[ 'wholeday_booking' ] == '1') {
						if ($ex->chargabledaily == '1') {
							$extra_details[ 'pernight' ] = jr_gettext('_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY', '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY', false, true);
						} else {
							$extra_details[ 'pernight' ] = '';
						}
					} else {
						if ($ex->chargabledaily == '1') {
							$extra_details[ 'pernight' ] = jr_gettext('_JOMRES_COM_PERDAY', '_JOMRES_COM_PERDAY', false, true);
						} else {
							$extra_details[ 'pernight' ] = '';
						}
					}*/
					$extra_details[ 'description' ] = jr_gettext('_JOMRES_CUSTOMTEXT_EXTRADESC'.$ex->uid, jomres_decode($ex->desc));

					$extra_details['forced'] = 0;
					if ($model[ 'force' ] == '1') {
						$extra_details['forced'] = 1;
					}

					$extra_details['forced'] = (bool)$ex->maxquantity;

					$extra_details[ 'AJAXFORM_EXTRAS' ] = jr_gettext('_JOMRES_AJAXFORM_EXTRAS', '_JOMRES_AJAXFORM_EXTRAS');
					$extra_details[ 'AJAXFORM_EXTRAS_DESC' ] = jr_gettext('_JOMRES_AJAXFORM_EXTRAS_DESC', '_JOMRES_AJAXFORM_EXTRAS_DESC', false);
					$extra_details[ 'EXTRAS_TOTAL' ] = jr_gettext('_JOMRES_AJAXFORM_EXTRAS_TOTAL', '_JOMRES_AJAXFORM_EXTRAS_TOTAL');

					$this->extras['extras'][] = $extra_details;
				}
			}
			$this->extras['extra_models_explanation'] = array(
				'1' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK',false),
				'2' =>jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS' , false ),
				'3' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING' , false),
				'4' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING' , false),
				'5' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY' , false),
				'6' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK' , false),
				'7' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS' , false),
				'8' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM' , false),
				'9' => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING', '_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING' , false),
				'100' =>jr_gettext('_JOMRES_COMMISSION', '_JOMRES_COMMISSION' , false)
			);
		}

		function __destruct()
		{

		}
	}

