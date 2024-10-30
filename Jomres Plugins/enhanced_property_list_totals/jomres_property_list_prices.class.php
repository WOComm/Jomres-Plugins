<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class jomres_property_list_prices
	{
	// Store the single instance of Database
	private static $configInstance;

	public function __construct()
		{
		self::$configInstance         				= false;
		$this->lowest_prices      					= array();
		$this->totals      							= array();
		$this->totals_by_tariff_type_id				= array();
		$this->accommodation_total					= array();
		$this->today								= date("Y/m/d");
		$this->arrivalDate 							= date("Y/m/d", strtotime($this->today."+1 day"));
		$this->departureDate 						= date("Y/m/d", strtotime($this->arrivalDate."+1 day"));
		$this->allPropertiesTariffs					= array();
		$this->allPropertiesTariffsUids 			= array();
		$this->allPropertiesTariffTypes 			= array();
		$this->allPropertiesTariffTypeIds 			= array();
		$this->all_tariff_types_to_tariff_id_xref	= array();
		$this->all_tariff_id_to_tariff_type_xref	= array();
		$this->allPropertiesExtras					= array();
		$this->dateRangeString						= '';
		$this->stayDays								= 1;
		$this->total_in_party						= 1;
		$this->room_type_uids						= array();
		$this->selected_rooms						= array();
		}

	public static function getInstance()
		{
		if ( !self::$configInstance )
			{
			self::$configInstance = new jomres_property_list_prices();
			}

		return self::$configInstance;
		}

	public function __clone()
		{
		trigger_error( 'Cloning not allowed on a singleton object', E_USER_ERROR );
		}
	
	function gather_lowest_prices_multi( $property_uids = array (), $lowest_ever = false, $hide_rpn = false)
		{
		// First we need to extract those uids that are not already in the $this->lowest_prices var, this (may) reduce the number of properties we need to query
		$temp_array = array ();
		foreach ( $property_uids as $id )
			{
			if ( !array_key_exists( $id, $this->lowest_prices ) ) 
				$temp_array[ ] = $id;
			}
		$property_uids = $temp_array;
		unset ( $temp_array );
		
		if ( !empty( $property_uids ) )
			{
			//save the original property uid and type so we can reset this after we`re done
			$original_property_uid = get_showtime( 'property_uid' );
			$original_property_type = get_showtime( 'property_type' );
			
			$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
			
			$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
			$basic_property_details->gather_data_multi( $property_uids );
			
			$property_uids_to_query=array();
			foreach ($property_uids as $property_uid)
				{
				$plugin_will_provide_lowest_price = false;
				$MiniComponents->triggerEvent( '07015', array ( 'property_uid' => $property_uid ) ); // Optional
				$mcOutput = $MiniComponents->getAllEventPointsData( '07015' );
				if ( !empty( $mcOutput ) )
					{
					foreach ( $mcOutput as $key => $val )
						{
						if ( $val == true )
							{
							$plugin_will_provide_lowest_price = true;
							$controlling_plugin               = $key;
							}
						}
					}

				$output_lowest = false;
				if ( $plugin_will_provide_lowest_price )
					{
					$output_lowest = true;
					$plugin_price  = $MiniComponents->specificEvent( '07016', $controlling_plugin, array ( 'property_uid' => $property_uid ) );
					if ( !is_null( $plugin_price ) )
						{
						$this->lowest_prices[$property_uid]['PRE_TEXT'] = $plugin_price[ 'PRE_TEXT' ];
						$this->lowest_prices[$property_uid]['PRICE'] = $plugin_price[ 'PRICE' ];
						$this->lowest_prices[$property_uid]['POST_TEXT'] = $plugin_price[ 'POST_TEXT' ];
						$this->lowest_prices[$property_uid]['RAW_PRICE'] = preg_replace('/([^0-9\\.])/i', '', $plugin_price[ 'PRICE' ]);
						}
					}
				else
					{
					$property_uids_to_query[]=$property_uid;
					}
				}

			if (!empty($property_uids_to_query))
				{
				$pricesFromArray   = array ();
				
				$tmpBookingHandler = jomres_singleton_abstract::getInstance( 'jomres_temp_booking_handler' );
				
				//get arrival date
				if ( isset( $_REQUEST[ 'arrivalDate' ] ) && $_REQUEST[ 'arrivalDate' ] != "" )
					{
					$this->arrivalDate = JSCalConvertInputDates( jomresGetParam( $_REQUEST, 'arrivalDate', "" ) );
					}
				elseif ( !empty( $tmpBookingHandler->tmpsearch_data ) )
					{
					if (isset($tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ]) && trim($tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ])!='')
						{
						$this->arrivalDate = $tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ];
						}
					elseif (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate']) && trim($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'] != ''))
						{
						$this->arrivalDate = JSCalConvertInputDates($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'],$siteCal=true);
						}
					}
				
				//get departure date
				if ( isset( $_REQUEST[ 'departureDate' ] ) && $_REQUEST[ 'departureDate' ] != "" )
					{
					$this->departureDate = JSCalConvertInputDates( jomresGetParam( $_REQUEST, 'departureDate', "" ) );
					}
				elseif ( !empty( $tmpBookingHandler->tmpsearch_data ) )
					{
					if (isset($tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability_departure' ]) && trim($tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability_departure' ])!='')
						{
						$this->departureDate = $tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability_departure' ];
						}
					elseif (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['departureDate']) && trim($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['departureDate'] != ''))
						{
						$this->departureDate = JSCalConvertInputDates($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['departureDate'],$siteCal=true);
						}
					}
				
				$this->stayDays = dateDiff( "d", $this->arrivalDate, $this->departureDate );
				
				$this->setDateRangeString();
				
				$this->dateRangeArray = explode( ",", $this->dateRangeString );
				
				//get the number of guests or default to 1
				
				if ( isset( $_REQUEST[ 'guestnumber' ] ) && $_REQUEST[ 'guestnumber' ] != "" )
					{
					$total_in_party = array(jomresGetParam( $_REQUEST, 'guestnumber', '1' ));
					}
				if ( isset( $_REQUEST[ 'guestnumbers' ] ) && count($_REQUEST[ 'guestnumbers' ]) > 0 )
					{
					$total_in_party = jomresGetParam( $_REQUEST, 'guestnumbers', array() );
					}
				elseif ( !empty( $tmpBookingHandler->tmpsearch_data ) )
					{
					if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['guestnumbers']) && !empty($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['guestnumbers']))
						{
						$total_in_party = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['guestnumbers'];
						}
					else
						$total_in_party = array();
					}
				else
					$total_in_party = array();
				
				if (reset($total_in_party) == 0)
					$this->total_in_party = 1;
				else
					$this->total_in_party = reset($total_in_party);

				//get the searched room type uids
				if ( isset($_REQUEST[ 'room_type_uids' ]) )
					$this->room_type_uids = jomresGetParam( $_REQUEST, 'room_type_uids', array() );
				elseif ( isset($_REQUEST[ 'room_type' ]) )
					$this->room_type_uids = array ( jomresGetParam( $_REQUEST, 'room_type', 0 ) );
				elseif ( !empty( $tmpBookingHandler->tmpsearch_data ) )
					{
					if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['room_type_uids']) && !empty($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['room_type_uids']))
						{
						$this->room_type_uids = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['room_type_uids'];
						}
					}
				
				//get all tariffs
				$this->getAllTariffsData($property_uids_to_query);
				
				//get all tariffs type ids for properties that may use micromanage
				$this->getAllTariffTypeIds($property_uids_to_query);
				
				//get all forced extras
				$this->getAllForcedExtras($property_uids_to_query);
				
				foreach ($property_uids_to_query as $property_uid)
					{
					$this->simple_tariff_to_date_map          	= array ();
					$this->micromanage_tarifftype_to_date_map 	= array ();
					$valid_rates= array();
					$price 		= 0.00;
					$pre_text 	= "";
					$post_text 	= "";
					$rpn 		= 0;
					$total 		= 0.00;
					$grand_total= 0.00;
					$tmp_grand_total=0.00;
					$tmp_total 	= array();
					$extras_total= 0.00;
					$selected_rooms = array();
					
					set_showtime( 'property_uid', $property_uid );
					set_showtime( 'property_type', $basic_property_details->multi_query_result[ $property_uid ]['property_type'] );
					
					$basic_property_details->gather_data( $property_uid );
					
					$mrConfig = getPropertySpecificSettings( $property_uid );
					
					$multiplier = 1;
					if ( !isset( $mrConfig[ 'booking_form_daily_weekly_monthly' ] ) ) // This shouldn't be needed, as the setting is automatically pulled from jomres_config.php, but there's always one weird server...
						$mrConfig[ 'booking_form_daily_weekly_monthly' ] = "D";
				
					switch ( $mrConfig[ 'booking_form_daily_weekly_monthly' ] )
						{
						case "D":
							$multiplier = 1;
							break;
						case "W":
							if ( $mrConfig[ 'tariffChargesStoredWeeklyYesNo' ] != "1" ) $multiplier = 7;
							break;
						case "M":
							$multiplier = 30;
							break;
						}
					
					if (isset($this->allPropertiesTariffs[$property_uid]) && !empty($this->allPropertiesTariffs[$property_uid]))
						{
						//estimate the average rate per night
						$this->estimate_AverageRate($property_uid);
						
						//assign guests to rooms and make sure they can all be accommodated
						if ($this->assign_guests_to_rooms($property_uid))
							{
							$selected_rooms = $this->selected_rooms[$property_uid];
							
							if (array_key_exists($property_uid, $this->allPropertiesTariffTypeIds))
								{
								foreach ($this->allPropertiesTariffTypes[$property_uid] as $t)
									{
									if ( in_array($t['roomclass_uid'], $selected_rooms ) )
										{
										$all_rooms_of_this_type = array_keys($selected_rooms, $t['roomclass_uid']);
										if ($this->totals_by_tariff_type_id[$t['tarifftype_id']] > 0 && !empty($all_rooms_of_this_type))
											{
											$number_of_rooms_of_this_type = count($all_rooms_of_this_type);
											$tmp_total[$t['roomclass_uid']] = ($this->totals_by_tariff_type_id[$t['tarifftype_id']] * $number_of_rooms_of_this_type);
											
											//set the pre text with the number of rooms of each type
											$pre_text .= $number_of_rooms_of_this_type.' x '.$basic_property_details->room_types[$t['roomclass_uid']]['abbv'].'<br />';
											
											//unset all rooms of this type
											foreach ($all_rooms_of_this_type as $k)
												{
												unset($selected_rooms[$k]);
												}
											}
										}
									}
								}
							else
								{
								foreach ($this->totals[$property_uid] as $k=>$v)
									{
									$all_rooms_of_this_type = array_keys($selected_rooms, $k);
									if ($v > 0 && !empty($all_rooms_of_this_type))
										{
										$number_of_rooms_of_this_type = count($all_rooms_of_this_type);
										$tmp_total[$k] = ($v * $number_of_rooms_of_this_type);
										
										//set the pre text with the number of rooms of each type
										$pre_text .= $number_of_rooms_of_this_type.' x '.$basic_property_details->room_types[$k]['abbv'].'<br />';
										
										//unset all rooms of this type
										foreach ($all_rooms_of_this_type as $r)
											{
											unset($selected_rooms[$r]);
											}
										}
									}
								}

							//calculate rooms total
							foreach ($tmp_total as $k=>$v)
								{
								if ( $mrConfig['perPersonPerNight'] == '1')
									{
									//this may fail if there are more rooms of the same type but with different max guests. as a compromise we pick the first value found.
									$total += ($v * reset($basic_property_details->rooms_max_people[$k]));
									}
								else
									$total += $v;
								}
							
							//average rate per night for all rooms combined
							$rpn = $total / $this->stayDays;
							if ( (int)$mrConfig['tariffChargesStoredWeeklyYesNo'] == '1' && (int)$mrConfig['tariffmode'] == '1' )
								{
								$rpn = $rpn / 7;
								}
							}
						else //not all guests are assigned to rooms because the property doesn`t have enough rooms..this should be handled by the seasch instead..
							$total = 0;
						
						$this->accommodation_total = $total;

						if ((int)$mrConfig['showExtras'] == 1 && $total > 0)
							{
							$extras_total = $this->getForcedExtrasTotal($property_uid, $total);
							}
						
						if ( $mrConfig[ 'is_real_estate_listing' ] == 0 )
							{
							if ( $total > 0 )
								{
								if ( $mrConfig[ 'prices_inclusive' ] == "0" ) 
									{
									$raw_price = $basic_property_details->get_gross_accommodation_price( $rpn, $property_uid ) * $multiplier;
									$price = output_price( $basic_property_details->get_gross_accommodation_price( $rpn, $property_uid ) * $multiplier, "", true, true );
									$price_no_conversion = output_price( $basic_property_details->get_gross_accommodation_price( $rpn, $property_uid ) * $multiplier, "", false, true );
									}
								else
									{
									$raw_price = $rpn * $multiplier;
									$price = output_price( $rpn * $multiplier, "", true, true );
									$price_no_conversion = output_price( $rpn * $multiplier, "", false, true );
									}

								//grand total including extras
								$tmp_grand_total = ($raw_price / $multiplier) * $this->stayDays;
								
								$grand_total = output_price($tmp_grand_total + $extras_total, '');
				
								if ( $mrConfig[ 'tariffChargesStoredWeeklyYesNo' ] == "1" && $mrConfig[ 'tariffmode' ] == "1" ) 
									$post_text = "&nbsp;" . jr_gettext( '_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK', '_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK' );
								else
									{
									if ( $mrConfig[ 'wholeday_booking' ] == "1" )
										{
										if ( $mrConfig[ 'perPersonPerNight' ] == "0" ) 
											$post_text = "&nbsp;" . jr_gettext( '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY', '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY' );
										else
											$post_text = "&nbsp;" . jr_gettext( '_JOMRES_FRONT_TARIFFS_PPPN_DAY_WHOLEDAY', '_JOMRES_FRONT_TARIFFS_PPPN_DAY_WHOLEDAY' );
										}
									else
										{
										switch ( $mrConfig[ 'booking_form_daily_weekly_monthly' ] )
											{
											case "D":
												if ( $mrConfig[ 'wholeday_booking' ] == "1" ) 
													$post_text = jr_gettext( '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY', '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY' );
												else
													{
													if ( $mrConfig[ 'perPersonPerNight' ] == "0" ) 
														$post_text = "&nbsp;" . jr_gettext( '_JOMRES_FRONT_TARIFFS_PN', '_JOMRES_FRONT_TARIFFS_PN' );
													else
														$post_text = "&nbsp;" . jr_gettext( '_JOMRES_FRONT_TARIFFS_PPPN', '_JOMRES_FRONT_TARIFFS_PPPN' );
													}
												break;
											case "W":
												$post_text = jr_gettext( '_JOMRES_BOOKINGFORM_PRICINGOUTPUT_WEEKLY', '_JOMRES_BOOKINGFORM_PRICINGOUTPUT_WEEKLY' );
												break;
											case "M":
												$post_text = jr_gettext( '_JOMRES_BOOKINGFORM_PRICINGOUTPUT_MONTHLY', '_JOMRES_BOOKINGFORM_PRICINGOUTPUT_MONTHLY' );
												break;
											}
										}
									}
								//testing
								//$pre_text = jr_gettext( '_JOMRES_TARIFFSFROM', _JOMRES_TARIFFSFROM, false, false );
								if($hide_rpn)
									{
									$post_text = '';
									$price = '';
									}
								}
							else
								{
								$pre_text  = '';
								$price     = jr_gettext( '_JOMRES_PRICE_ON_APPLICATION', '_JOMRES_PRICE_ON_APPLICATION', "", true, false );
								$post_text = '';
								}
							}
						else
							{
							$pre_text  = '';
							$price     = output_price( $basic_property_details->real_estate_property_price, "", false, false );
							$raw_price = $basic_property_details->real_estate_property_price;
							$price_no_conversion = output_price( $basic_property_details->real_estate_property_price, "", false, true );
							$post_text = '';
							}
						}
					else
						{
						if ($basic_property_details->real_estate_property_price == 0)
							{
							$pre_text  = '';
							$price     = jr_gettext( '_JOMRES_PRICE_ON_APPLICATION', '_JOMRES_PRICE_ON_APPLICATION', "", true, false );
							$post_text = '';
							}
						else
							{
							$pre_text  = '';
							$price     = output_price( $basic_property_details->real_estate_property_price );
							$raw_price = $basic_property_details->real_estate_property_price;
							$price_no_conversion = output_price( $basic_property_details->real_estate_property_price, "", false, true );
							$post_text = '';
							}
						}
					if ( $price == jr_gettext( '_JOMRES_PRICE_ON_APPLICATION', '_JOMRES_PRICE_ON_APPLICATION', "", true, false ) )
						{
						$raw_price = -1;
						$price_no_conversion = -1;
						}

					$this->lowest_prices[$property_uid]=array ( "PRE_TEXT" => $pre_text, "PRICE" => $price, "POST_TEXT" => $post_text , "RAW_PRICE" => $raw_price , "PRICE_NOCONVERSION" => $price_no_conversion, "PRICE_CUMULATIVE" => $grand_total);
					}
				}
			
			//set back the initial property type and property uid
			set_showtime( 'property_uid', $original_property_uid );
			set_showtime( 'property_type', $original_property_type );
			}
		}//end function gather_lowest_prices_multi
	
	//get all tariffs
	function getAllTariffsData($property_uids_to_query)
		{
		$interval = new DateInterval( 'P1D' );
		$clause = "";

		if (!empty($this->room_type_uids))
			$clause = "AND `roomclass_uid` IN (".implode(',',$this->room_type_uids).")";
		
		$query = "SELECT `rates_uid`,`property_uid`,`rate_title`,`rate_description`,`validfrom`,`validto`,
			`roomrateperday`,`mindays`,`maxdays`,`minpeople`,`maxpeople`,`roomclass_uid`,
			`ignore_pppn`,`allow_ph`,`allow_we`,`weekendonly`,`dayofweek`,`minrooms_alreadyselected`,`maxrooms_alreadyselected`
			FROM #__jomres_rates WHERE property_uid IN (".implode(",",$property_uids_to_query).") 
			AND DATE_FORMAT(`validto`, '%Y/%m/%d') >= DATE_FORMAT('" . $this->today . "', '%Y/%m/%d') 
			AND roomrateperday > 0 
			$clause 
			";

		$tariffs = doSelectSql( $query );
		
		foreach ( $tariffs as $t )
			{
			$dates = $this->get_periods( $t->validfrom, $t->validto . ' 23:59:59', $interval );
			
			$this->allPropertiesTariffs[$t->property_uid][ $t->rates_uid ] = array ( 'rates_uid' => $t->rates_uid, 'rate_title' => $t->rate_title, 'rate_description' => $t->rate_description, 'validfrom' => $t->validfrom, 'validto' => $t->validto, 'roomrateperday' => $t->roomrateperday, 'mindays' => $t->mindays, 'maxdays' => $t->maxdays, 'minpeople' => $t->minpeople, 'maxpeople' => $t->maxpeople, 'roomclass_uid' => $t->roomclass_uid, 'ignore_pppn' => $t->ignore_pppn, 'allow_ph' => $t->allow_ph, 'allow_we' => $t->allow_we, 'weekendonly' => $t->weekendonly, 'dayofweek' => $t->dayofweek, 'minrooms_alreadyselected' => $t->minrooms_alreadyselected, 'maxrooms_alreadyselected' => $t->maxrooms_alreadyselected, 'tariff_dates' => $dates);
			
			$this->allPropertiesTariffsUids[] = $t->rates_uid;
			}
		}
	
	//get all tariff type ids for properties that may use micromanage
	function getAllTariffTypeIds($property_uids_to_query)
		{
		if (empty($this->allPropertiesTariffsUids)) {
			return;
		}
		$query = "SELECT `tarifftype_id`, `tariff_id`, `roomclass_uid`, `property_uid` FROM #__jomcomp_tarifftype_rate_xref WHERE `tariff_id` IN (".implode(',',$this->allPropertiesTariffsUids).") ";
		$result = doSelectSql( $query );
		
		if ( !empty($result) )
			{
			foreach ($result as $r)
				{
				$this->allPropertiesTariffTypes[$r->property_uid][] = array("tariff_id"=>$r->tariff_id, "tarifftype_id"=>$r->tarifftype_id, "roomclass_uid"=>$r->roomclass_uid);
				$this->allPropertiesTariffTypeIds[$r->property_uid][] = $r->tarifftype_id;
				$this->all_tariff_types_to_tariff_id_xref[$r->property_uid][ $r->tarifftype_id ][] = $r->tariff_id;
				$this->all_tariff_id_to_tariff_type_xref[$r->property_uid][ $r->tariff_id ][] = $r->tarifftype_id;
				}
			}
		}
	
	//find valid tariffs for each day
	function estimate_AverageRate($property_uid)
		{
		$total = array();
		$mrConfig = getPropertySpecificSettings( $property_uid );
		
		if ( array_key_exists($property_uid, $this->allPropertiesTariffTypeIds) && !empty($this->allPropertiesTariffTypeIds[$property_uid]) )
			{
			$this->build_tariff_to_date_map($property_uid);
			
			foreach ( $this->allPropertiesTariffTypes[$property_uid] as $t )
				{
				$dates = $this->micromanage_tarifftype_to_date_map[ $t['tarifftype_id'] ];
				$cumulative_total = 0.00;
				$max_tariff_min_days = 1;
				$min_tariff_max_days = 1;
				foreach ( $this->dateRangeArray as $date ) {
                    if (isset($dates[ $date ][ 'price' ])) {
                        $cumulative_total += $dates[ $date ][ 'price' ];
                    if ($dates[ $date ][ 'mindays' ] > $max_tariff_min_days)
                         $max_tariff_min_days = $dates[ $date ][ 'mindays' ];
                    if ($dates[ $date ][ 'maxdays' ] > $min_tariff_max_days)
                        $min_tariff_max_days = $dates[ $date ][ 'maxdays' ];
                        }
					}
				
				if ($max_tariff_min_days <= $this->stayDays && $min_tariff_max_days >= $this->stayDays)
					$this->totals_by_tariff_type_id[$t['tarifftype_id']] = $cumulative_total;
				}
			}
		else
			{
			foreach ( $this->allPropertiesTariffs[$property_uid] as $rate )
				{
				$unixValidFromDate = $this->getMkTime( $rate['validfrom'] );
				$unixValidToDate   = $this->getMkTime( $rate['validto'] );

				foreach ( $this->dateRangeArray as $date )
					{
					$pass = false;
					$unixDay = $this->getMkTime( $date );
					
					//this won`t work between seasons...
					if ( 
						$unixDay <= $unixValidToDate && 
						$unixDay >= $unixValidFromDate && 
						( $this->stayDays >= $rate['mindays'] && $this->stayDays <= $rate['maxdays'] ) && 
						( $this->total_in_party >= $rate['minpeople'] && $this->total_in_party <= $rate['maxpeople'] ) 
						)
						{
						if (isset($total[$rate['roomclass_uid']]))
							$total[$rate['roomclass_uid']] += $rate['roomrateperday'];
						else
							$total[$rate['roomclass_uid']] = $rate['roomrateperday'];
						}
					}
				}
			$this->totals[$property_uid] = $total;
			}

		return true;
		}
	
	//build tariff to date map (set a tariff for each stay day)
	function build_tariff_to_date_map($property_uid)
		{
		$this->simple_tariff_to_date_map          = array ();
		$this->micromanage_tarifftype_to_date_map = array ();

		$mrConfig = getPropertySpecificSettings($property_uid);

		foreach ( $this->allPropertiesTariffs[$property_uid] as $tariff )
			{
			$tariff_uid = $tariff[ 'rates_uid' ];
			if ( array_key_exists($property_uid, $this->allPropertiesTariffTypeIds) )
				{
				$tariff_type_id = $this->all_tariff_id_to_tariff_type_xref[$property_uid][ $tariff_uid ][ 0 ];
				
				// Now we can get all of the tariff uids that are associated with this tariff type
				$all_associated_tariff_ids = $this->all_tariff_types_to_tariff_id_xref[$property_uid][ $tariff_type_id ];

				// We'll build a map of the dates in this booking, cross referenced to the tariff uids, and the prices
				foreach ( $all_associated_tariff_ids as $t_id )
					{
					$tariff_info = $this->allPropertiesTariffs[$property_uid][ $t_id ];

					if ( isset( $tariff_info[ 'tariff_dates' ] ) )
						{
						$dates = $tariff_info[ 'tariff_dates' ];
						foreach ( $dates as $d )
							{
							if ( in_array( $d, $this->dateRangeArray ) && isset( $tariff_info[ 'roomrateperday' ] ) ) 
								$this->micromanage_tarifftype_to_date_map[ $tariff_type_id ][ $d ] = array ( "price" => $tariff_info[ 'roomrateperday' ], "mindays" => $tariff_info[ 'mindays' ], "maxdays" => $tariff_info[ 'maxdays' ], "rates_uid" => $tariff_info[ 'rates_uid' ], "tariff_type_id" => $tariff_type_id );
							}
						}
					}
				}
			else
				{
				$tariff_info = $this->allPropertiesTariffs[$property_uid][ $tariff_uid ];
				if ( isset( $tariff_info[ 'tariff_dates' ] ) )
					{
					$dates = $tariff_info[ 'tariff_dates' ];
					foreach ( $dates as $d )
						{
						if ( in_array( $d, $this->dateRangeArray ) && isset( $tariff_info[ 'roomrateperday' ] ) ) 
							$this->simple_tariff_to_date_map[ $tariff_uid ] = array ( "price" => $tariff_info[ 'roomrateperday' ], "mindays" => $tariff_info[ 'mindays' ], "maxdays" => $tariff_info[ 'maxdays' ],"rates_uid" => $tariff_info[ 'rates_uid' ] );
						}
					}
				}
			}

		return true;
		}
	
	//assign guests to rooms and make sure they can all be accommodated
	function assign_guests_to_rooms($property_uid)
		{
		$rooms = array();
		
		$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$basic_property_details->gather_data( $property_uid );
		
		$mrConfig = getPropertySpecificSettings($property_uid);
		
		//available rooms returned by availability search
		$available_rooms = get_showtime('available_rooms'.$property_uid);
		
		if (is_null($available_rooms))
			$available_rooms = array();

		//create the rooms array that we`ll work with
		if ( !empty($available_rooms) )
			{
			foreach ($available_rooms as $r)
				{
				$rooms[$r['room_classes_uid']][$r['room_uid']] = $r['max_people'];
				}
			}
		else
			{
			//all property room max people values by room class uid and room uid
			$rooms = $basic_property_details->rooms_max_people;
			}

		//filter out the room types based on selection, if any
		if (!empty($this->room_type_uids))
			{
			foreach ($rooms as $k=>$v)
				{
				if (!in_array($k, $this->room_type_uids))
					unset($rooms[$k]);
				}
			}
		
		//count all rooms
		$i_rooms = 0;
		foreach ($rooms as $k=>$v)
			{
			$i_rooms += count($v);
			}

		//now we have the rooms that we can use to assign guests to
		//let`s assign the best rooms by capacity..first highest capacity found is used
		
		$i = $this->total_in_party;

		if ($i_rooms > 0)
			{
			while ($i > 0 && $i_rooms > 0)
				{
				$current_max_people = 0;
				$current_room_type = 0;
				$exact_match_found = false;
				$lowest_diff = 9999;
				$a = 0;
				$b = 0;
				$b = 0;
				
				foreach($rooms as $k=>$v1)
					{
					foreach ($v1 as $v2=>$v3)
						{
						if ($v3 == $i)
							{
							$current_max_people = $v3;
							$current_room_type = $k;
							$exact_match_found = true;
							$a = $k;
							$b = $v2;
							}
						elseif ($v3 > $current_max_people && !$exact_match_found)
							{
							//this may fail in some cases...to be rechecked
							if (abs($i - $v3) < $lowest_diff)
								{
								$lowest_diff = abs($i - $v3);
								$current_max_people = $v3;
								$current_room_type = $k;
								$a = $k;
								$b = $v2;
								}
							}
						}
					}
				
				$this->selected_rooms[$property_uid][] = $current_room_type;
				
				//testing
				//echo "property ".$property_uid." - room type ".$current_room_type." - unset ".$rooms[$a][$b]."<br>";
				
				unset($rooms[$a][$b]);
				
				$i = $i - $current_max_people;
				$i_rooms = $i_rooms - 1;
				}
			}
		else
			return false;
		
		if ($i > 0)
			{
			$this->selected_rooms[$property_uid] = array();
			return false;
			}
		else
			return true;
		}
	
	
	
	
	//get all extras
	function getAllForcedExtras($property_uids_to_query)
		{
		$query = "SELECT a.uid, 
						a.price, 
						a.property_uid,
						a.tax_rate,
						b.model,
						b.params 
					FROM #__jomres_extras a  
					LEFT JOIN #__jomcomp_extrasmodels_models b ON a.uid = b.extra_id 
					WHERE a.property_uid IN (".implode(",",$property_uids_to_query).") AND b.force = 1 ";

		$extras = doSelectSql( $query );

		foreach ( $extras as $e )
			{
			$this->allPropertiesExtras[$e->property_uid][ $e->uid ]=array ( 'uid' => $e->uid, 'price' => $e->price, 'tax_rate' => $e->tax_rate, 'model' => $e->model, 'params' => $e->params);
			}
		}
	
	function getForcedExtrasTotal($property_uid, $room_total = 0.00)
		{
		$extrasTotal = 0.00;
		
		if (array_key_exists($property_uid, $this->allPropertiesExtras))
			{
			$mrConfig = getPropertySpecificSettings($property_uid);
			
			$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
			
			foreach ($this->allPropertiesExtras[$property_uid] as $extra)
				{
				$tmpTotal = 0.00;

				switch ( $extra[ 'model' ] )
					{
					case '1': // Per week
						$numberOfWeeks                                               = ceil( $this->stayDays / 7 );
						$calc                                                        = $numberOfWeeks * $extra[ 'price' ];
						break;
					case '2': // per days
						$calc                                                        = $this->stayDays * $extra[ 'price' ];
						break;
					case '3': // per booking
						$calc                                                        = $extra[ 'price' ];
						break;
					case '4': // per person per booking
						$calc                                                        = $this->total_in_party * $extra[ 'price' ];
						break;
					case '5': // per person per day
						$calc                                                        = $this->total_in_party * $this->stayDays * $extra[ 'price' ];
						break;
					case '6': // per person per week
						$numberOfWeeks                                               = ceil( $this->stayDays / 7 );
						$calc                                                        = $this->total_in_party * $numberOfWeeks * $extra[ 'price' ];
						break;
					case '7': // per person per days min days
						$mindays = $extra[ 'params' ];
						if ( $this->stayDays < $mindays ) 
							$days = $mindays;
						else
							$days = $this->stayDays;
						$calc                                                        = $days * $extra[ 'price' ];
						break;
					case '8': // per days per room
						$num_rooms                                                   = count($this->selected_rooms[$property_uid]); //TODO
						$calc                                                        = ( $this->stayDays * $extra[ 'price' ] ) * $num_rooms;
						break;
					case '9': // per room
						$num_rooms                                                   = count($this->selected_rooms[$property_uid]); //TODO
						$calc                                                        = $extra[ 'price' ] * $num_rooms;
						break;
					case '100': // commission
						$calc                                                        =  ($this->accommodation_total/100)*$extra[ 'price' ];
						break;	
					}
					
				$quantity = 1;

				$tmpTotal = $quantity * $calc;
				
				if ( (int) $extra[ 'tax_rate' ] > 0 )
					{
					$jrportal_taxrate->gather_data($extra[ 'tax_rate' ]);
					
					$rate = $jrportal_taxrate->rate;

					if ( $mrConfig[ 'prices_inclusive' ] == 1 )
						{
						$divisor    = ( $rate / 100 ) + 1;
						$nett_price = $tmpTotal / $divisor;
						$thisTax    = $tmpTotal - $nett_price;
						$tmpTotal   = $nett_price;
						}
					else
						$thisTax = ( $tmpTotal / 100 ) * $rate;

					$tmpTotal = $tmpTotal + $thisTax;
					}
				
				$extrasTotal = $extrasTotal + $tmpTotal;
				}
			}

		return number_format( $extrasTotal, 2, '.', '' );
		}
	
	
	function findDateRangeForDates( $d1, $d2 )
		{
		$days            = (int) $this->findDaysForDates( $d1, $d2 );
		$dateRangeArray  = array ();
		$currentDay      = $d1;
		$date_elements   = explode( "/", $currentDay );
		$unixCurrentDate = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
		for ( $i = 0, $n = $days; $i <= $n; $i++ )
			{
			$currentDay        = date( "Y/m/d", $unixCurrentDate );
			$dateRangeArray[ ] = $currentDay;
			$date_elements     = explode( "/", $currentDay );
			$unixCurrentDate   = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ] + 1, $date_elements[ 0 ] );
			}

		return $dateRangeArray;
		}
	
	function findDaysForDates( $d1, $d2 )
		{
		$diff = dateDiff( "d", $d1, $d2 );

		return $diff;
		}
	
	function setDateRangeString()
		{
		$stayDays        = (int) $this->stayDays;
		$dateRangeArray  = array ();
		$currentDay      = $this->arrivalDate;
		$date_elements   = explode( "/", $currentDay );
		$unixCurrentDate = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
		for ( $i = 0, $n = $stayDays; $i < $n; $i++ )
			{
			$currentDay        = date( "Y/m/d", $unixCurrentDate );
			$dateRangeArray[ ] = $currentDay;
			$date_elements     = explode( "/", $currentDay );
			$unixCurrentDate   = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ] + 1, $date_elements[ 0 ] );
			}
		$this->dateRangeString = implode( ",", $dateRangeArray );

		return $this->dateRangeString;
		}
	
	
	private static $mktimes = array ();

	function getMkTime( $date )
		{
		if ( !isset( self::$mktimes[ $date ] ) )
			{
			$date_elements          = explode( "/", $date );
			self::$mktimes[ $date ] = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
			}

		return self::$mktimes[ $date ];
		}
	
	function get_periods( $start, $end, $interval = null )
		{
		if (!isset($this->previously_found_periods))
			{
			$this->previously_found_periods = array();
			}
			
		$start = new DateTime( $start );
		$end   = new DateTime( $end );
		if ( is_null( $interval ) ) 
			$interval = new DateInterval( 'P1D' );
		
		$period = new DatePeriod( $start, $interval, $end );
		$hash = md5(serialize($period));

		if (!isset($this->previously_found_periods[$hash])) // We have to hash the $period value and store the results of the $dates array in that variable. Without that, searches with manymanymany periods can cause out of memory errors. Saves going through the foreach loop so often. Bonus : performance improvement
			{
			$dates  = array ();
			foreach ( $period as $date )
				{
				$d        = $date->format( 'Y/m/d' );
				$dates[ ] = $d;
				}

			$this->previously_found_periods[$hash] = $dates;
			return $dates;
			}
		else
			{
			return $this->previously_found_periods[$hash];
			}
		}

	}//end class
