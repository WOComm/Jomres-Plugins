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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06110ajax_search_composite
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$tmpBookingHandler =jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
		
		$nearest_matches = array();
		$filters = array();

        $this->searchAll = jr_gettext('_JOMRES_SEARCH_ALL', '_JOMRES_SEARCH_ALL', false, false);

		$property_prefilter = jomresGetParam( $_REQUEST, 'property_prefilter', '' );
		if ($property_prefilter!='' && $property_prefilter!=0)
			{
			$tmp = array();
			$property_uid_bang = explode (",",$property_prefilter);
			foreach ($property_uid_bang as $id)
				{
				if ((int)$id != 0 )
					$tmp[]=(int)$id;
				}
			$filters['property_uids'] = $tmp;
			}
		
		$ptype_prefilter = jomresGetParam( $_REQUEST, 'ptype_prefilter', '' );
		if ($ptype_prefilter!='' && $ptype_prefilter!=0)
			{
			$tmp = array();
			$ptype_prefilter = explode (",",$ptype_prefilter);
			foreach ($ptype_prefilter as $id)
				{
				if ((int)$id != 0 )
					$tmp[]=(int)$id;
				}
			$filters['ptypes'] = $tmp;
			}
		
		$arguments = jomresGetParam( $_REQUEST, 'region_prefilter', '' );
		if ($arguments!='')
			{
			$region_bang = explode (",",$arguments);
			foreach ($region_bang as $region)
				$filters['regions'][] =$region;
			}
		
		$this->get_all_published_properties($filters);
		
		$search_performed = false;
		
		//////////////////////////////////// STARS /////////////////////////////////////////////////////////
		$stars = jomresGetParam( $_REQUEST, 'stars', array() );
		$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['stars']=$stars;
		if(!empty($stars))
			{
			$query="SELECT `propertys_uid` FROM #__jomres_propertys WHERE `stars` IN (".implode(',',$stars).") AND propertys_uid IN (".implode(',',$this->search_results).") AND `published` = 1 ";
			$result=doSelectSql($query);
			$arr = array();
			if (!empty($result))
				{
				foreach ($result as $r)
					$arr[]=$r->propertys_uid;
				}
			$this->search_results = $arr;
			if (!empty($arr))
				$nearest_matches = $arr;
			$search_performed = true;
			}

		//////////////////////////////////// Price ranges /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$pricerange_value_from = (int)jomresGetParam( $_REQUEST, 'pricerange_value_from', 0 );
			$pricerange_value_to = (int)jomresGetParam( $_REQUEST, 'pricerange_value_to', 0 );
			
			//get arrival date
			$arrivalDate 				= date("Y/m/d", strtotime(date("Y/m/d")."+1 day"));
			
			if ( isset( $_REQUEST[ 'asc_arrivalDate' ] ) && $_REQUEST[ 'asc_arrivalDate' ] != "" )
				{
				$arrivalDate = JSCalConvertInputDates( jomresGetParam( $_REQUEST, 'asc_arrivalDate', "" ) );
				}
			elseif (!empty( $tmpBookingHandler->tmpsearch_data))
				{
				if (isset($tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ]) && trim($tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ])!='')
					{
					$arrivalDate = $tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ];
					}
				elseif (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate']) && trim($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'] != ''))
					{
					$arrivalDate = JSCalConvertInputDates($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'],$siteCal=true);
					}
				}
			
			$clause = "AND DATE_FORMAT('" . $arrivalDate . "', '%Y/%m/%d') BETWEEN DATE_FORMAT(a.validfrom, '%Y/%m/%d') AND DATE_FORMAT(a.validto, '%Y/%m/%d') ";
			
			$priceranges = jomresGetParam( $_REQUEST, 'priceranges', array() );
			if (!empty($priceranges))
				{
				$all_ranges = array();
				foreach ($priceranges as $ranges)
					{
					$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['priceranges'][]=$ranges;
					$bang = explode("-",$ranges);
					$all_ranges[]=(int)$bang[0];
					$all_ranges[]=(int)$bang[1];
					}
				$pricerange_value_from = min ($all_ranges);
				$pricerange_value_to =  max ($all_ranges);
				}

			if ( $pricerange_value_from == 0 ) {
                $pricerange_value_from++; // Tariffs with 0 prices, because of days where bookings aren't wanted can still appear so to improve returns we'll set min price to 1
            }


			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['pricerange_value_from']=$pricerange_value_from;
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['pricerange_value_to']=$pricerange_value_to;
			if ($pricerange_value_to > 0)
				{			
				$query="SELECT a.property_uid FROM #__jomres_rates a, #__jomres_propertys b WHERE a.roomrateperday >= ".$pricerange_value_from." AND a.roomrateperday <= ".$pricerange_value_to." AND a.property_uid = b.propertys_uid AND a.property_uid IN (".implode(',',$this->search_results).") AND b.published = 1 $clause ";
				$result=doSelectSql($query);

				$arr = array();
				if (!empty($result))
					{
					foreach ($result as $r)
						$arr[]=$r->property_uid;
					
					}

				$query = "SELECT `propertys_uid`, `property_key` FROM #__jomres_propertys WHERE `published` = 1 AND `propertys_uid` IN (".implode(',',$this->search_results).") ORDER BY `property_key` ";
				$realestateList = doSelectSql($query);
				if (!empty($realestateList))
					{
					foreach ($realestateList as $rate)
						{
						if ( (float)$rate->property_key > $pricerange_value_from && (float)$rate->property_key <= $pricerange_value_to )
							$arr[]=$rate->propertys_uid;
						}
					
					}
				
				$this->search_results=array_unique($arr);
				if (!empty($arr))
					$nearest_matches = $arr;
				$search_performed = true;
				}
			}

		//////////////////////////////////// FEATURES /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$feature_uids = jomresGetParam( $_REQUEST, 'feature_uids', array() );
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['feature_uids']=$feature_uids;
			if( !empty($feature_uids) )
				{
				$gor='';
				if (isset($arr) && !empty($arr))
					$gor = " AND `propertys_uid` IN (".implode(',',$arr).") ";

				$st="";
				foreach ($feature_uids as $id)
					{
					$st.="'%,".(int)$id.",%' AND `property_features` LIKE ";
					}
				$st=substr($st,0,-30);
				$query="SELECT `propertys_uid` FROM #__jomres_propertys WHERE `property_features` LIKE $st $gor AND `propertys_uid` IN (".implode(',',$this->search_results).") AND `published` = 1 ";
				$result = doSelectSql($query);
				$arr = array();
				if (!empty($result))
					{
					foreach ($result as $r)
						$arr[]=$r->propertys_uid;
					}
				$this->search_results=array_unique($arr);
				if (!empty($arr))
					$nearest_matches = $arr;
				$search_performed = true;
				}
			}
		
		//////////////////////////////////// COUNTRIES /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$countries = jomresGetParam( $_REQUEST, 'countries', array() );
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['countries']=$countries;
			$real_countries = countryCodesArray();
			$tmp = array();
			foreach ($countries as $country)
				{
				$cc = filter_var($country,FILTER_SANITIZE_SPECIAL_CHARS);
				if (array_key_exists($cc,$real_countries))
					$tmp[]=$cc;
				}
			$countries = $tmp;
			
			if(!empty($countries))
				{
				$query="SELECT `propertys_uid` FROM #__jomres_propertys WHERE `property_country` IN ('".implode('\',\'',$countries)."') AND propertys_uid IN (".implode(',',$this->search_results).") AND `published` = 1 ";
				$result=doSelectSql($query);
				$arr = array();
				if (!empty($result))
					{
					foreach ($result as $r)
						$arr[]=$r->propertys_uid;
					}
				$this->search_results = $arr;
				if (!empty($arr))
				$nearest_matches = $arr;
				$search_performed = true;
				}
			}

		//////////////////////////////////// REGIONS /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$regions = jomresGetParam( $_REQUEST, 'regions', array() );
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['regions']=$regions;
			$tmp = array();
			foreach ($regions as $region)
				{
				$cc = jomres_cmsspecific_stringURLSafe($region);
				if (!is_numeric($cc))
					$tmp[]=$cc;
				if (function_exists('find_region_id'))
					{
					$region_id = find_region_id($cc);
					$tmp[]=$region_id;
					}
				else
					$tmp[]=$cc;
				
				}
			$regions = $tmp;
			
			if( !empty($regions) )
				{
				$query="SELECT `propertys_uid` FROM #__jomres_propertys WHERE `property_region` IN ('".implode('\',\'',$regions)."') AND `propertys_uid` IN (".implode(',',$this->search_results).") AND `published` = 1 ";
				$result=doSelectSql($query);
				$arr = array();
				if (!empty($result))
					{
					foreach ($result as $r)
						$arr[]=$r->propertys_uid;
					}
				$this->search_results = $arr;
				if (!empty($arr))
					$nearest_matches = $arr;
				$search_performed = true;
				}
			}

			//////////////////////////////////// TOWNS /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$towns = jomresGetParam( $_REQUEST, 'towns', array() );
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['towns']=$towns;
			$tmp = array();
			foreach ($towns as $town)
				{
				$cc = jomres_cmsspecific_stringURLSafe($town);
				$cc = str_replace("-","%",$cc);
				$tmp[]=$cc;
				}
			$towns = $tmp;
			
			if( !empty($towns) )
				{
				$gor1 = genericLike($towns,'property_town',false);
				$gor2 = genericLike($towns,'customtext',false);
				
				$query = "SELECT DISTINCT a.propertys_uid  
							FROM #__jomres_propertys a
							LEFT JOIN #__jomres_custom_text b ON (
																a.propertys_uid = b.property_uid 
																AND b.constant = '_JOMRES_CUSTOMTEXT_PROPERTY_TOWN' 
																AND b.language = '".get_showtime('lang')."'
																)
							WHERE a.published = 1  
								AND ( $gor1 OR $gor2 ) 
								AND a.propertys_uid IN (".implode(',',$this->search_results).") ";
											
				$result=doSelectSql($query);
				$arr = array();
				if (!empty($result))
					{
					foreach ($result as $r)
						$arr[]=$r->propertys_uid;
					}
				$this->search_results = $arr;
				if (!empty($arr))
					$nearest_matches = $arr;
				$search_performed = true;
				}
			}

		//////////////////////////////////// ROOM TYPES /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$room_type_uids = jomresGetParam( $_REQUEST, 'room_type_uids', array() );
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['room_type_uids']=$room_type_uids;

			if( !empty($room_type_uids) && $room_type_uids[0] != $this->searchAll)
				{
				$query="SELECT a.propertys_uid FROM #__jomres_rooms a, #__jomres_propertys b WHERE a.room_classes_uid IN (".implode(',',$room_type_uids).") AND a.propertys_uid IN (".implode(',',$this->search_results).") AND ( a.propertys_uid = b.propertys_uid AND b.published = 1 ) ";
				$result=doSelectSql($query);
				$arr = array();
				if (!empty($result))
					{
					foreach ($result as $r)
						$arr[]=$r->propertys_uid;
					}
				$this->search_results = $arr;
				if (!empty($arr))
					$nearest_matches = $arr;
				$search_performed = true;
				}
			}

		//////////////////////////////////// PROPERTY TYPES /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$property_type_uids = jomresGetParam( $_REQUEST, 'property_type_uids', array() );
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['property_type_uids']=$property_type_uids;

			if( !empty($property_type_uids) && $property_type_uids[0] != $this->searchAll )
				{
				$query="SELECT `propertys_uid` FROM #__jomres_propertys WHERE `ptype_id` IN (".implode(',',$property_type_uids).") AND `propertys_uid` IN (".implode(',',$this->search_results).") AND `published` = 1 ";
				$result=doSelectSql($query);
				$arr = array();
				if (!empty($result))
					{
					foreach ($result as $r)
						$arr[]=$r->propertys_uid;
					}
				$this->search_results = $arr;
				if (!empty($arr))
					$nearest_matches = $arr;
				$search_performed = true;
				}
			}
		
		//////////////////////////////////// GUEST NUMBERS /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$guestnumbers = jomresGetParam( $_REQUEST, 'guestnumbers', array() );
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['guestnumbers']=$guestnumbers;
			if( !empty($guestnumbers) && $guestnumbers[0] != '' )
				{
				$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
				$jrConfig=$siteConfig->get();
				if (!isset( $jrConfig['guestnumbersearch']))
					$jrConfig['guestnumbersearch'] = "equal";
				
				$guestnumbers_count = count($guestnumbers);
				
				$clause = ($guestnumbers_count > 1) ? ' (a.maxpeople ' : ' a.maxpeople ';
				$counter = 0;
				foreach ($guestnumbers as $num)
					{
					switch ($jrConfig['guestnumbersearch'])
						{
						case 'lessthan':
							$clause .= '<= ';
							break;
						case 'equal':
							$clause .= '= ';
							break;
						case 'greaterthan':
							$clause .= '>= ';
							break;
						}
					$counter++;
					if ($counter == $guestnumbers_count)
						$clause .=(int)$num. " ";
					else
						$clause .=(int)$num. " OR a.maxpeople ";
					}
				$clause .= ($guestnumbers_count > 1) ? ') ' : '';

				$query="SELECT a.property_uid FROM #__jomres_rates a, #__jomres_propertys b WHERE ".$clause." AND a.property_uid IN (".implode(',',$this->search_results).") AND ( b.propertys_uid = a.property_uid AND b.published = 1 ) ";
				$result=doSelectSql($query);
				$arr = array();
				foreach ($result as $r)
					{
					$arr[]=$r->property_uid;
					}

				$this->search_results = array_unique($arr);
				if (!empty($arr))
					$nearest_matches = $arr;
				$search_performed = true;
				}
			}
		
		//////////////////////////////////// DATES /////////////////////////////////////////////////////////
		if (!empty($this->search_results))
			{
			$all_property_rooms = array ();
			$all_property_bookings = array ();
		
			$arrivalDate	=jomresGetParam( $_REQUEST, 'asc_arrivalDate', "");
			$departureDate	=jomresGetParam( $_REQUEST, 'asc_departureDate', "");
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate']=$arrivalDate;
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['departureDate']=$departureDate;
			if ($arrivalDate != "" && $departureDate !="")
				{
				$arrivalDate	=JSCalConvertInputDates(jomresGetParam( $_REQUEST, 'asc_arrivalDate', "" ),$siteCal=true);
				$departureDate	=JSCalConvertInputDates(jomresGetParam( $_REQUEST, 'asc_departureDate', "" ),$siteCal=true);
				
				$tmpBookingHandler =jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
				$tmpBookingHandler->tmpsearch_data['jomsearch_availability']= $arrivalDate;
				$tmpBookingHandler->tmpsearch_data['jomsearch_availability_departure']= $departureDate;

				$stayDays=dateDiff("d",$arrivalDate,$departureDate);
				$dateRangeArray=array();
				$date_elements  = explode("/",$arrivalDate);
				$unixCurrentDate= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
				$secondsInDay = 86400;
				$currentUnixDay=$unixCurrentDate;
				$currentDay=$arrivalDate;
				for ($i=0, $n=$stayDays; $i < $n; $i++)
					{
					$currentDay=date("Y/m/d",$unixCurrentDate);
					$dateRangeArray[]=$currentDay;
					$unixCurrentDate=$unixCurrentDate+$secondsInDay;
					}
				$propertiesWithFreeRoomsArray=array();
				
				$all_property_rooms = array();
				$query="SELECT propertys_uid,room_uid,room_classes_uid,max_people FROM #__jomres_rooms WHERE propertys_uid IN (".implode(',',$this->search_results).") ";
				$roomsLists=doSelectSql($query);
				if (!empty($roomsLists))
					{
					foreach ($roomsLists as $room)
						{
						$all_property_rooms[$room->propertys_uid][$room->room_uid]=array("room_classes_uid"=>$room->room_classes_uid,"room_uid"=>$room->room_uid, "max_people" => $room->max_people);
						}
					}
				$all_property_bookings = array();
				$query="SELECT property_uid,room_uid,`date` FROM #__jomres_room_bookings WHERE property_uid IN (".implode(',',$this->search_results).") AND `date` IN ('".implode('\',\'',$dateRangeArray)."') ";
				$datesList=doSelectSql($query);
				if (!empty($datesList))
					{
					foreach ($datesList as $date)
						{
						$all_property_bookings[$date->property_uid][]=$date->room_uid;
						}
					}

				foreach ($this->search_results as $property)
					{
					$propertyHasFreeRooms=FALSE;
					$available_rooms = array();
					$max_capacity = 0;
					$roomsList = array();
				
					if (isset($all_property_rooms[ (int) $property ]))
						$roomsList = $all_property_rooms[ (int) $property ];
					
					foreach ($roomsList as $room)
						{
						$ok=true;
						if (isset($_REQUEST[ 'room_type' ]) && $_REQUEST['room_type'] != $this->searchAll)
							{
							if (!empty($_REQUEST['room_type'] ) && $room['room_classes_uid'] != $this->filter['room_type'])
								$ok=false;
							}
						if ($ok)
							{
							if (!isset($all_property_bookings[ $property ]) || (isset($all_property_bookings[ $property ]) && !in_array ( $room['room_uid'], $all_property_bookings[$property]) ) )
								{
								$propertyHasFreeRooms=true;
								$available_rooms[$room[ 'room_uid' ]] = $room;
								}
							}
						}
					if ($propertyHasFreeRooms)
						{
						foreach ($available_rooms as $r)
							{
							$max_capacity += $r['max_people'];
							}

						$total_in_party = array_sum(jomresGetParam( $_REQUEST, 'guestnumbers', array() ));

						if ((int)$total_in_party == 0)
							$total_in_party = 1;
						
						if ($total_in_party <= $max_capacity)
							{
							$propertiesWithFreeRoomsArray[ ] = $property;
							set_showtime('available_rooms'.$property, $available_rooms);
							}
						}
					}
				if (!empty($propertiesWithFreeRoomsArray))
					{
					$propertiesWithFreeRoomsArray = array_unique($propertiesWithFreeRoomsArray);
					$this->search_results = $propertiesWithFreeRoomsArray;
					if (!empty($propertiesWithFreeRoomsArray))
						$nearest_matches = $propertiesWithFreeRoomsArray;
					$search_performed = true;
					}
				else 
					$this->search_results = array();
				}
			else
				$search_performed = true;
			}
		
		if ($search_performed && !empty($this->search_results))
			$this->ret_vals = $this->search_results;
		else
			{
			// jomres 8.1.11 this section causes problems when no results at all found, so disabled for now.
/* 			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig=$siteConfig->get();
			$randomsearchlimit = (int)$jrConfig['randomsearchlimit'];
			if (count($this->all_published_properties)<=$randomsearchlimit)
				$randomsearchlimit = count($this->all_published_properties);
			
			if (count($nearest_matches)>1)
				$alternative_results = array_rand ( $nearest_matches , $randomsearchlimit);
			else
				$alternative_results =  $nearest_matches;

			set_showtime("alternative_search_results",$alternative_results); */
			$this->ret_vals = array();
			}
		}
	
	function get_all_published_properties($filters)
		{
		$property_id_clause = "";
		if (isset($filters['property_uids']))
			{
			$property_id_clause = "`propertys_uid` IN (".implode(',',$filters['property_uids']).")";
			}
		$ptype_clause = "";
		if (isset($filters['ptypes']))
			{
			$ptype_clause = "`ptype_id` IN (".implode(',',$filters['ptypes']).")";
			}
		
		$and_str1 = "";
		if ( $property_id_clause != "" || $ptype_clause != "")
			$and_str1 = " AND ";
			
		$and_str2 = "";
		if ( $property_id_clause != "" && $ptype_clause != "")
			$and_str2 = " AND ";
		
		$property_uids = array();

		$query = "SELECT `propertys_uid` FROM #__jomres_propertys WHERE `published` = 1 ".$and_str1.$property_id_clause.$and_str2.$ptype_clause;
		$result = doSelectSql($query);
		
		if (!empty($result))
			{
			foreach ($result as $r)
				{
				$property_uids[] = (int)$r->propertys_uid;
				}
			}
		$this->all_published_properties = $property_uids;
		$this->search_results = $property_uids;
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
