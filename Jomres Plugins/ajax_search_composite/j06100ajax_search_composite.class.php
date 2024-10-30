<?php
	/**
	 * Jomres CMS Agnostic Plugin
	 * @author Woollyinwales IT <sales@jomres.net>
	 * @version Jomres 9
	 * @package Jomres
	 * @copyright	2005-2015 Woollyinwales IT
	 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
	 **/

// ################################################################
	defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

	class j06100ajax_search_composite
	{
		function __construct($componentArgs)
		{
			$MiniComponents =jomres_getSingleton('mcHandler');
			if ($MiniComponents->template_touch)
			{
				$this->template_touchable=false; return;
			}

			$ePointFilepath = get_showtime('ePointFilepath');


			$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			$tmpBookingHandler =jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
			if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']))
				$previous_selections = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections'];

			$by_stars 			= true;
			$by_price 			= true;
			$by_features 		= true;
			$by_country 		= true;
			$by_region 			= true;
			$by_town 			= true;
			$by_roomtype		= true;
			$by_propertytype 	= true;
			$by_guestnumber 	= true;
			$by_date 			= true;
			$template_style		= $jrConfig['asc_template_style'];

			if ( !isset($jrConfig['asc_by_stars']) || $jrConfig['asc_by_stars'] == '0' || jomresGetParam($_REQUEST,'asc_by_stars','') == '0')
				$by_stars = false;
			if ( !isset($jrConfig['asc_by_price']) || $jrConfig['asc_by_price'] == '0' || jomresGetParam($_REQUEST,'asc_by_price','') == '0')
				$by_price = false;
			if ( !isset($jrConfig['asc_by_features']) || $jrConfig['asc_by_features'] == '0' || jomresGetParam($_REQUEST,'asc_by_features','') == '0')
				$by_features = false;
			if ( !isset($jrConfig['asc_by_country']) || $jrConfig['asc_by_country'] == '0' || jomresGetParam($_REQUEST,'asc_by_country','') == '0')
				$by_country = false;
			if ( !isset($jrConfig['asc_by_region']) || $jrConfig['asc_by_region'] == '0' || jomresGetParam($_REQUEST,'asc_by_region','') == '0')
				$by_region = false;
			if ( !isset($jrConfig['asc_by_town']) || $jrConfig['asc_by_town'] == '0' || jomresGetParam($_REQUEST,'asc_by_town','') == '0')
				$by_town = false;
			if ( !isset($jrConfig['asc_by_roomtype']) || $jrConfig['asc_by_roomtype'] == '0' || jomresGetParam($_REQUEST,'asc_by_roomtype','') == '0')
				$by_roomtype = false;
			if ( !isset($jrConfig['asc_by_propertytype']) || $jrConfig['asc_by_propertytype'] == '0' || jomresGetParam($_REQUEST,'asc_by_propertytype','') == '0')
				$by_propertytype = false;
			if ( !isset($jrConfig['asc_by_guestnumber']) || $jrConfig['asc_by_guestnumber'] == '0' || jomresGetParam($_REQUEST,'asc_by_guestnumber','') == '0')
				$by_guestnumber = false;
			if ( !isset($jrConfig['asc_by_date']) ||  $jrConfig['asc_by_date'] == '0' || jomresGetParam($_REQUEST,'asc_by_date','0') == '')
				$by_date = false;

			if (isset($_REQUEST['asc_template_style']))
			{
				if ( $_REQUEST['asc_template_style'] == "buttons" )
					$template_style = "buttons";
				if ( $_REQUEST['asc_template_style'] == "modals" )
					$template_style = "modals";
				if ( $_REQUEST['asc_template_style'] == "accordion" )
					$template_style = "accordion";
				if ( $_REQUEST['asc_template_style'] == "multiselect" )
					$template_style = "multiselect";
			}

			if ( jomres_bootstrap_version() == 5) {
				$template_style = "multiselect";
			}
			$task = jomresGetParam($_REQUEST, 'task', '');

			if ($task == "viewproperty" )
			{
				if (isset($_REQUEST['view_on_property_details']) )
				{
					if ( (int)$_REQUEST['view_on_property_details'] == 0)
						return;
				}
			}

			$pageoutput = array();
			$output = array();
			$rows = array();
			$stars_head = array();
			$features_head = array();
			$price_head = array();
			$country_head = array();
			$region_head = array();
			$town_head = array();
			$room_type_head = array();
			$property_type_head = array();
			$guestnumber_head = array();
			$date_head = array();
			$stars_rows = array();
			$features_rows = array();
			$price_rows = array();
			$country_rows = array();
			$region_rows = array();
			$town_rows = array();
			$room_type_rows = array();
			$property_type_rows = array();
			$guestnumber_rows = array();
			$date_rows = array();

			switch ($template_style)
			{
				case "buttons" :
				case "modals" :
					break;
				case "accordion" :
					break;
				case "multiselect" :
					jomres_cmsspecific_addheaddata( "css", JOMRES_NODE_MODULES_RELPATH.'bootstrap-multiselect/dist/css/', "bootstrap-multiselect.css" );
					jomres_cmsspecific_addheaddata( "javascript", JOMRES_NODE_MODULES_RELPATH.'bootstrap-multiselect/dist/js/', "bootstrap-multiselect.js" );
					break;
			}


			$output['FORM_NAME']=$componentArgs['FORM_NAME'];

			$output['PROPERTY_PREFILTER']='';
			$arguments = jomresGetParam( $_REQUEST, 'property_uids', '' );
			if ($arguments!='')
			{
				$property_uid_bang = explode (",",$arguments);
				foreach ($property_uid_bang as $pid)
					$output['PROPERTY_PREFILTER'].=(int)$pid.",";
			}

			$output['PTYPE_PREFILTER']='';
			$ptype_bang =array();
			$arguments = jomresGetParam( $_REQUEST, 'ptypes', '' );
			if ($arguments!='')
			{
				$ptype_bang = explode (",",$arguments);
				foreach ($ptype_bang as $pid)
					$output['PTYPE_PREFILTER'].=(int)$pid.",";
			}

			$country_prefilter = array();
			$arguments = jomresGetParam( $_REQUEST, 'prefilter_country_code', '' );
			if ( $arguments !='' )
			{
				$country_code_bang = explode (",",$arguments);
				foreach ($country_code_bang as $country_code)
					$country_prefilter[]=$country_code;
			}

			$region_prefilter = array();
			$arguments = jomresGetParam( $_REQUEST, 'region', '' );
			if ($arguments!='')
			{
				$region_bang = explode (",",$arguments);
				$output['REGION_PREFILTER'] = '';
				foreach ($region_bang as $region)
				{
					$output['REGION_PREFILTER'].=(int)$region.",";
					$region_prefilter[] =find_region_name($region);
				}
			}

			if ( count($ptype_bang) == 1 )
				$by_propertytype = false;

			//////////////////////////////////// STARS /////////////////////////////////////////////////////////
			if ($by_stars)
			{
				$stars_head[] = array('_JOMRES_COM_A_INTEGRATEDSEARCH_BYTARS'=>jr_gettext('_JOMRES_COM_A_INTEGRATEDSEARCH_BYTARS','_JOMRES_COM_A_INTEGRATEDSEARCH_BYTARS',false,false));

				$stars_array=array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0);
				$query = "SELECT stars FROM #__jomres_propertys WHERE published = 1";
				$result = doSelectSql($query);

				if (!empty($result))
				{
					foreach ($result as $s)
					{
						$no = $s->stars;
						if (!isset($stars_array[$no]))
							$stars_array[$no] = 0;
						$stars_array[$no]++;
					}
				}

				$stars_rows = array();

				foreach ($stars_array as $key=>$st)
				{
					$s=array();
					$s['NUMBER']=$key;
					$s['DISABLED']='';
					if ((int)$st == 0)
						$s['DISABLED']='disabled="disabled"';
					$s['COUNT'] = (int)$st;
					if ( jomres_bootstrap_version() == 5) {
						$s['IMAGE']='<div class="row">';
						$colstart = '<div class="col">';
						$colend = '</div>';
					} else {
						$s['IMAGE']='';
						$colstart = '';
						$colend = '';
					}

					$s['CHECKED']='';
					$s['SELECTED']='';
					if (isset($previous_selections['stars']))
					{
						if (in_array($key,$previous_selections['stars']))
						{
							$s['CHECKED']='checked="checked"';
							$s['SELECTED']=' selected ';
						}
					}

					$s['STAR_ICON'] = '';
					for ($i=1;$i<=(int)$key;$i++)
					{
						$s['IMAGE'] .=  $colstart.'<img src="'.JOMRES_IMAGES_RELPATH.'star.png" class="no-resize" alt="star"/>'.$colend;
						$s['STAR_ICON'] .= simple_template_output(JOMRES_TEMPLATEPATH_FRONTEND, $template = 'show_property_star.html', '');
					}

					$s['RANDOM_ID']=generateJomresRandomString(10);
					$stars_rows[] = $s;
				}
			}

			//////////////////////////////////// FEATURES /////////////////////////////////////////////////////////
			if ($by_features)
			{
				$features_head[] = array('_JOMRES_COM_A_INTEGRATEDSEARCH_BYFEATURES'=>jr_gettext('_JOMRES_COM_A_INTEGRATEDSEARCH_BYFEATURES','_JOMRES_COM_A_INTEGRATEDSEARCH_BYFEATURES',false,false));
				$features_array = prepFeatureSearch();

				$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );

				if ($output['PTYPE_PREFILTER'] != "")
				{
					$filtered = array();
					$ptype_prefilter_ids = explode (',',$output['PTYPE_PREFILTER']);
					foreach ($ptype_prefilter_ids as $p_id)
					{
						if ((int)$p_id > 0 )
						{
							foreach ($features_array as $f)
							{
								if ($f['ptype_xref'] != "")
								{
									$ptype_xref = $f['ptype_xref'];
									if ( $ptype_xref !== false )
									{
										if (in_array($p_id, $ptype_xref))
											$filtered[] = $f;
									}
									else
									{
										if ((int)$p_id == (int)$f['ptype_xref'])
											$filtered[] = $f;
									}
								}
							}
						}
					}
					$features_array =$filtered;
				}

				if (!empty($features_array))
				{
					foreach ($features_array as $feature)
					{
						$id=$feature['id'];
						if ($id > 0) // Need to not use the id 0 as that's a special "all" id that's used by jomsearch, but not by us here
						{
							$r=array();
							$image = '/'.$feature['image'];
							$feature_abbv = jr_gettext('_JOMRES_CUSTOMTEXT_FEATURES_ABBV'.(int)$feature['id'],		jomres_decode($feature['title']),false,false);
							$feature_desc = jr_gettext('_JOMRES_CUSTOMTEXT_FEATURES_DESC'.(int)$feature['id'],		jomres_decode($feature['description']),false,false);
							$r['TITLE']=$feature_abbv;
							$r['IMAGE']=JOMRES_IMAGELOCATION_RELPATH.'pfeatures/'.$image;
							$r['ICON']=jomres_makeTooltip($feature_abbv,$feature_abbv,$feature_desc,JOMRES_IMAGELOCATION_RELPATH.'pfeatures/'.$image,"","property_feature",array());
							$r['ID']=$id;
							$r['RANDOM_ID']=generateJomresRandomString(10);
							$r['CHECKED']='';
							$r['SELECTED']='';
							$r['ACTIVE_CLASS']='';
							if (isset($previous_selections['feature_uids']))
							{
								if (in_array($feature['id'],$previous_selections['feature_uids']))
								{
									$r['CHECKED']='checked="checked"';
									$r['SELECTED']=' selected ';
									$r['ACTIVE_CLASS']=' btn-success active ';
								}
								else
								{
									$r['ACTIVE_CLASS']=' btn-default ';
								}
							}
							$features_rows[]=$r;
						}
					}
				}
			}

			//////////////////////////////////// Price ranges /////////////////////////////////////////////////////////
			$prices_rows = array();
			if ($by_price)
			{
				$price_head[] = array('_JOMRES_SEARCH_PRICERANGES'=>jr_gettext('_JOMRES_SEARCH_PRICERANGES','_JOMRES_SEARCH_PRICERANGES',false,false));

				$currency_codes = jomres_singleton_abstract::getInstance('currency_codes');
				$symbols = $currency_codes->getSymbol($jrConfig['globalCurrencyCode']);

				$output['PREPRICE'] = $symbols['pre'];
				$output['POSTPRICE'] = $symbols['post'];

				$price_ranges = prepPriceRangeSearch();

				// To build the price ranges as buttons

				foreach ($price_ranges as $key=>$range)
				{
					if ($key != 0)
					{
						$r=array();
						$r['RANGE']=$range;
						$r['CHECKED']='';
						$r['SELECTED']='';
						$r['ACTIVE_CLASS']='';
						if (isset($previous_selections['priceranges']))
						{
							if (in_array($range,$previous_selections['priceranges']))
							{
								$r['CHECKED']='checked="checked"';
								$r['SELECTED']=' selected ';
								$r['ACTIVE_CLASS']=' btn-success active ';
							}
							else
							{
								$r['ACTIVE_CLASS']=' btn-default ';
							}
						}
						$r['RANDOM_ID']=generateJomresRandomString(10);
						$prices_rows[]=$r;
					}
				}


				// To build the sliders.
				$count = count($price_ranges);
				$exploded_ranges = array( 0 );
				for ($i=1;$i<=$count;$i++)
				{
					if(array_key_exists($i,$price_ranges))
					{
						$bang = explode("-",$price_ranges[$i]);
						if (is_array($bang))
						{
							if ( (int)$bang[0] > 0 )
								$exploded_ranges[]=(int)$bang[0];
							if ( (int)$bang[1] > 0 )
								$exploded_ranges[]=(int)$bang[1];
						}
					}
				}
				sort($exploded_ranges);
				$num=count($exploded_ranges);
				$output['MINPRICE'] = $exploded_ranges[0];
				$output['MAXPRICE'] = $exploded_ranges[$num-1];
			}
			else
			{
				$output['PREPRICE'] = '';
				$output['POSTPRICE'] = '';
				$output['MINPRICE'] = '0';
				$output['MAXPRICE'] = '1';
			}
			//////////////////////////////////// Geographic search /////////////////////////////////////////////////////////

			$locales = prepGeographicSearch();
			$countries = array();
			$regions = array();
			$towns = array();

			if (!empty($country_prefilter ))
			{
				$new_arr = array();
				$count = count($locales ['propertyLocations'] );
				for ($i=0;$i<$count;$i++)
				{
					$locale = $locales['propertyLocations'][$i];
					if ( in_array ( $locales['propertyLocations'][$i]['country'] , $country_prefilter ) )
					{
						$new_arr[] = $locales['propertyLocations'][$i];
					}
				}
				$locales['propertyLocations'] = $new_arr;
			}

			if (!empty($region_prefilter))
			{
				$new_arr = array();
				$count = count($locales ['propertyLocations'] );
				for ($i=0;$i<$count;$i++)
				{
					$locale = $locales['propertyLocations'][$i];
					if ( in_array ( $locales['propertyLocations'][$i]['region'] , $region_prefilter ) )
					{
						$new_arr[] = $locales['propertyLocations'][$i];
					}
				}
				$locales['propertyLocations'] = $new_arr;
			}

			foreach ($locales['propertyLocations'] as $locale)
			{
				$countrycode = $locale['country'];
				$region = $locale['region'];
				$town = $locale['property_town'];

				if ($locale['countryname'] != "" && $region != "" && $town != "")
				{
					$countries[$countrycode] = $locale['countryname'];
					$regions [$locale['countryname']][$region] =$region;
					$towns[$locale['countryname']][$region][$town] = $town;
				}
			}

			asort($countries,SORT_NATURAL);
			ksort($regions,SORT_NATURAL);
			ksort($towns,SORT_NATURAL);

			$new_arr = array();
			foreach ($regions as $country=>$region)
			{
				ksort($region,SORT_NATURAL);
				$new_arr[$country]=$region;
			}
			$regions =$new_arr;

			$new_arr = array();
			foreach ($towns as $country=>$town)
			{
				ksort($town,SORT_NATURAL);
				$new_arr[$country]=$town;
			}
			$towns =$new_arr;

			if ($by_country)
			{
				$country_head[] = array('_JOMRES_SEARCH_GEO_COUNTRYSEARCH'=>jr_gettext('_JOMRES_SEARCH_GEO_COUNTRYSEARCH','_JOMRES_SEARCH_GEO_COUNTRYSEARCH',false,false));
			}

			if ($by_region)
			{
				$region_head[] = array('_JOMRES_SEARCH_GEO_REGIONSEARCH'=>jr_gettext('_JOMRES_SEARCH_GEO_REGIONSEARCH','_JOMRES_SEARCH_GEO_REGIONSEARCH',false,false));
			}
			if ($by_town)
			{
				$town_head[] = array('_JOMRES_SEARCH_GEO_TOWNSEARCH'=>jr_gettext('_JOMRES_SEARCH_GEO_TOWNSEARCH','_JOMRES_SEARCH_GEO_TOWNSEARCH',false,false));
			}


			$country_rows = array();
			if ($by_country)
			{
				foreach ($countries as $country_code=>$country_name)
				{
					$r = array();
					$r['COUNTRYCODE']=$country_code;
					$r['COUNTRYNAME']=$country_name;
					$r['RANDOM_ID']=generateJomresRandomString(10);
					$r['CHECKED']='';
					$r['SELECTED']='';
					$r['ACTIVE_CLASS']='';
					if (isset($previous_selections['countries']))
					{
						if (in_array($country_code,$previous_selections['countries']))
						{
							$r['CHECKED']='checked="checked"';
							$r['SELECTED']=' selected ';
							$r['ACTIVE_CLASS']=' btn-success active ';
						}
						else
						{
							$r['ACTIVE_CLASS']=' btn-default ';
						}
					}
					$country_rows[] = $r;
				}
			}

			$region_rows = array();
			if ($by_region)
			{
				foreach ($regions as $country=>$regionz)
				{
					$sub_pageoutput = array();
					$sub_output = array( "COUNTRY_NAME" => $country );
					$rows = array();
					foreach ( $regionz as $region )
					{
						$r = array();
						$r['REGION']=$region;
						$r['RANDOM_ID']=generateJomresRandomString(10);
						$r['CHECKED']='';
						$r['SELECTED']='';
						$r['ACTIVE_CLASS']='';
						if (isset($previous_selections['regions']))
						{
							if (in_array($region,$previous_selections['regions']))
							{
								$r['CHECKED']='checked="checked"';
								$r['SELECTED']=' selected ';
								$r['ACTIVE_CLASS']=' btn-success active ';
							}
							else
							{
								$r['ACTIVE_CLASS']=' btn-default ';
							}
						}
						$rows[] = $r;
					}

					$tmpl = new patTemplate();
					$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );

					switch ($template_style)
					{
						case "buttons" :
							$template =  'regions.html';
							break;
						case "modals" :
							$template =  'regions.html';
							break;
						case "accordion" :
							$template =  'regions_accordion.html';
							break;
						case "multiselect" :
							$template =  'regions_multiselect.html';
							break;
						default :
							$template =  'regions_multiselect.html';
							break;
					}
					$tmpl->readTemplatesFromInput( $template );

					$sub_pageoutput[] = $sub_output;
					$tmpl->addRows( 'sub_pageoutput', $sub_pageoutput );
					$tmpl->addRows( 'region_rows', $rows );

					$region_rows[] = array ( "REGIONS" => $tmpl->getParsedTemplate());
				}

				$tmpArr = array();
				foreach ($region_rows as $lines) {
					$array = preg_split ('/$\R?^/m', $lines['REGIONS'] );
					foreach ($array as $r) {
						if (trim($r) != '' ) {
							$tmpArr[]= $r;
						}
					}
				}
				$tmpArr= array_unique ($tmpArr);
				unset($region_rows);
				natcasesort ($tmpArr);
				$str = '';
				foreach ($tmpArr as $t ) {
					$str .= $t;
				}
				$region_rows[0]["REGIONS"] = $str;

			}

			$town_country_rows = array();
			if ($by_town)
			{
				foreach ($towns as $country=>$regionz)
				{
					$town_country_rows[] = array ('COUNTRY'=>$country );
					foreach ($regionz as $region=>$townz)
					{
						$sub_pageoutput = array();
						$sub_output = array( "REGION_NAME" => $region );
						$rows = array();
						foreach ( $townz as $town )
						{
							$r = array();
							$r['TOWN']=$town;
							$r['RANDOM_ID']=generateJomresRandomString(10);
							$r['CHECKED']='';
							$r['SELECTED']='';
							$r['ACTIVE_CLASS']='';
							if (isset($previous_selections['towns']))
							{
								if (in_array($town,$previous_selections['towns']))
								{
									$r['CHECKED']='checked="checked"';
									$r['SELECTED']=' selected ';
									$r['ACTIVE_CLASS']=' btn-success active ';
								}
								else
								{
									$r['ACTIVE_CLASS']=' btn-default ';
								}
							}
							$rows[] = $r;
						}

						$tmpl = new patTemplate();
						$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );

						switch ($template_style)
						{
							case "buttons" :
								$template =  'towns.html';
								break;
							case "modals" :
								$template =  'towns.html';
								break;
							case "accordion" :
								$template =  'towns_accordion.html';
								break;
							case "multiselect" :
								$template =  'towns_multiselect.html';
								break;
						}
						$tmpl->readTemplatesFromInput( $template );

						$sub_pageoutput[] = $sub_output;
						$tmpl->addRows( 'sub_pageoutput', $sub_pageoutput );
						$tmpl->addRows( 'town_rows', $rows );

						$town_rows[] = array ( "TOWNS" => $tmpl->getParsedTemplate());
					}
				}

				$tmpArr = array();
				foreach ($town_rows as $lines) {
					$array = preg_split ('/$\R?^/m', $lines['TOWNS'] );
					foreach ($array as $r) {
						if (trim($r) != '' ) {
							$tmpArr[]= $r;
						}
					}
				}
				$tmpArr= array_unique ($tmpArr);
				unset($town_rows);
				natcasesort ($tmpArr);
				$str = '';
				foreach ($tmpArr as $t ) {
					$str .= $t;
				}
				$town_rows[0]["TOWNS"] = $str;
			}

			//////////////////////////////////// ROOM TYPES /////////////////////////////////////////////////////////
			if ($by_roomtype)
			{
				$room_type_head = array();
				$room_type_head[] = array('JOMRES_COM_A_ACCOMMODATES'=>jr_gettext('JOMRES_COM_A_ACCOMMODATES','JOMRES_COM_A_ACCOMMODATES',false,false));
				$room_type_array = prepRoomtypeSearch();

				if ($output['PTYPE_PREFILTER'] != "")
				{
					$filtered = array();
					$query = "SELECT roomtype_id FROM #__jomres_roomtypes_propertytypes_xref WHERE propertytype_id IN (".implode(',',$ptype_bang).") ";
					$filter = doSelectSql($query);
					if (!empty($filter))
					{
						foreach ($filter as $type)
						{
							foreach ($room_type_array as $room_type)
							{

								if ((int)$room_type['id'] == $type->roomtype_id)
								{

									$filtered[]=$room_type;
								}
							}
						}
					}
					$room_type_array =$filtered;
				}

				if (!empty($room_type_array))
				{
					foreach ($room_type_array as $room_type)
					{
						$id=$room_type['id'];
						if ($id > 0) // Need to not use the id 0 as that's a special "all" id that's used by jomsearch, but not by us here
						{
							$r=array();
							$image = '/'.$room_type['image'];
							$room_type_abbv = jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPES_ABBV'.(int)$room_type['id'],		jomres_decode($room_type['title']),false,false);
							$room_type_desc = jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPES_DESC'.(int)$room_type['id'],		jomres_decode($room_type['description']),false,false);
							$r['TITLE']=$room_type_abbv;
							$r['IMAGE']=$image;
							$r['ICON']=jomres_makeTooltip($room_type_abbv,$room_type_abbv,$room_type_desc,$image,"","room_type",array());
							$r['ID']=$id;
							$r['RANDOM_ID']=generateJomresRandomString(10);
							$r['CHECKED']='';
							$r['SELECTED']='';
							$r['ACTIVE_CLASS']='';
							if (isset($previous_selections['room_type_uids']))
							{
								if (in_array($room_type['id'],$previous_selections['room_type_uids']))
								{
									$r['CHECKED']='checked="checked"';
									$r['SELECTED']=' selected ';
									$r['ACTIVE_CLASS']=' btn-success active ';
								}
								else
								{
									$r['ACTIVE_CLASS']=' btn-default ';
								}
							}
							$room_type_rows[]=$r;
						}
					}
				}
			}

			//////////////////////////////////// PROPERTY TYPES /////////////////////////////////////////////////////////
			if ($by_propertytype)
			{
				$property_type_head[] = array('_JOMRES_SEARCH_PTYPES'=>jr_gettext('_JOMRES_SEARCH_PTYPES','_JOMRES_SEARCH_PTYPES',false,false));
				$property_type_array = prepPropertyTypeSearch();
				if (!empty($property_type_array))
				{
					foreach ($property_type_array as $property_type)
					{
						$id=$property_type['id'];
						if ($id > 0) // Need to not use the id 0 as that's a special "all" id that's used by jomsearch, but not by us here
						{
							$r=array();
							$r['TITLE']=jr_gettext('_JOMRES_CUSTOMTEXT_PROPERTYTYPE'.$property_type['id'],jomres_decode($property_type['ptype']),false,false);
							$r['ID']=$id;
							$r['RANDOM_ID']=generateJomresRandomString(10);
							$r['CHECKED']='';
							$r['SELECTED']='';
							$r['ACTIVE_CLASS']='';
							if (isset($previous_selections['property_type_uids']))
							{
								if (in_array($property_type['id'],$previous_selections['property_type_uids']))
								{
									$r['CHECKED']='checked="checked"';
									$r['SELECTED']=' selected ';
									$r['ACTIVE_CLASS']=' btn-success active ';
								}
								else
								{
									$r['ACTIVE_CLASS']=' btn-default ';
								}
							}
							$property_type_rows[]=$r;
						}
					}
				}
			}

			//////////////////////////////////// GUESTNUMBER /////////////////////////////////////////////////////////
			if ($by_guestnumber)
			{
				$guestnumber_head[] = array('_JOMRES_COM_A_INTEGRATEDSEARCH_BYGUESTNUMBER'=>jr_gettext('_JOMRES_COM_A_INTEGRATEDSEARCH_BYGUESTNUMBER','_JOMRES_COM_A_INTEGRATEDSEARCH_BYGUESTNUMBER',false,false));
				$guestnumber_array = prepGuestnumberSearch();
				if (!empty($guestnumber_array))
				{
					$counter = 0;
					foreach ($guestnumber_array as $guestnumber)
					{
						if ($counter == 0) {
							$r=array();
							$r['NUMBER']='';
							$r['RANDOM_ID']=generateJomresRandomString(10);
							$r['CHECKED']='';
							$r['SELECTED']='';
							$r['ACTIVE_CLASS']='';
							if ( isset($previous_selections['guestnumbers']) && in_array($guestnumber,$previous_selections['guestnumbers']))  {
								$r['CHECKED']='checked="checked"';
								$r['SELECTED']=' selected ';
								$r['ACTIVE_CLASS']=' btn-success active ';
							}
							else {
								$r['ACTIVE_CLASS']=' btn-default ';
							}
							$guestnumber_rows[]=$r;
						}
						$counter = 1;

						$r=array();
						$r['NUMBER']=$guestnumber;
						$r['RANDOM_ID']=generateJomresRandomString(10);
						$r['CHECKED']='';
						$r['SELECTED']='';
						$r['ACTIVE_CLASS']='';
						if (isset($previous_selections['guestnumbers']))
						{
							if (in_array($guestnumber,$previous_selections['guestnumbers']))
							{
								$r['CHECKED']='checked="checked"';
								$r['SELECTED']=' selected ';
								$r['ACTIVE_CLASS']=' btn-success active ';
							}
							else
							{
								$r['ACTIVE_CLASS']=' btn-default ';
							}
						}
						$guestnumber_rows[]=$r;
					}
				}
			}

			//////////////////////////////////// DATES /////////////////////////////////////////////////////////
			if ($by_date)
			{
				$date_head[] = array('_JOMRES_FRONT_AVAILABILITY'=>jr_gettext('_JOMRES_FRONT_AVAILABILITY','_JOMRES_FRONT_AVAILABILITY',false,false));
				$date_array = prepAvailabilitySearch();
				$r=array();

				if ($template_style == "accordion")
				{
					$current_custom_paths = get_showtime('custom_paths');
					$original_path = '';
					if (isset($current_custom_paths['js_calendar_input.html']))
						$original_path = $current_custom_paths['js_calendar_input.html'];
					$current_custom_paths['js_calendar_input.html'] = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
					set_showtime('custom_paths',$current_custom_paths);
				}
				if (!isset($date_array['arrival']))
				{
					$r['ARRIVALDATE']= generateDateInput("asc_arrivalDate",'',"ad",TRUE);
					$r['DEPARTUREDATE']= generateDateInput("asc_departureDate",'',FALSE,TRUE,false);
				}
				else
				{
					$r['ARRIVALDATE']= generateDateInput("asc_arrivalDate",$date_array['arrival'],"ad",TRUE);
					$r['DEPARTUREDATE']= generateDateInput("asc_departureDate",$date_array['departure'],FALSE,TRUE,false);
				}

				if ($template_style == "accordion")
				{
					if ($original_path != '')
						$current_custom_paths['js_calendar_input.html'] = $original_path;
					else
						unset ($current_custom_paths['js_calendar_input.html']);
					set_showtime('custom_paths',$current_custom_paths);
				}
				$r['_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE'] = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE','_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE');
				$r['_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL'] = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL','_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL');
				$date_rows[]=$r;
			}



			$output['_JOMRES_RETURN_TO_RESULTS']=jr_gettext('_JOMRES_RETURN_TO_RESULTS','_JOMRES_RETURN_TO_RESULTS',false);
			$output['_JOMRES_COM_A_RESET']=jr_gettext('_JOMRES_COM_A_RESET','_JOMRES_COM_A_RESET',false);
			$output['_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS']=jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS','_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',false);
			$output['_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS']=jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS','_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',false);

			$plugin_template_dir = find_plugin_template_directory();

			$pageoutput[]=$output;
			$tmpl = new patTemplate();

			$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.$plugin_template_dir );



			switch ($template_style)
			{
				case "buttons" :
					$template =  'ajax_search_composite.html';
					break;
				case "modals" :
					$template =  'ajax_search_composite_modals.html';
					break;
				case "accordion" :
					$template =  'ajax_search_composite_accordion.html';
					break;
				case "multiselect" :
					$template =  'ajax_search_composite_multiselect.html';
					break;
			}
			$tmpl->readTemplatesFromInput( $template );

			$tmpl->addRows( 'pageoutput', $pageoutput );

			$tmpl->addRows( 'stars_head', $stars_head );
			$tmpl->addRows( 'price_head', $price_head );
			$tmpl->addRows( 'country_head', $country_head );
			$tmpl->addRows( 'region_head', $region_head );
			$tmpl->addRows( 'town_head', $town_head );
			$tmpl->addRows( 'features_head', $features_head );
			$tmpl->addRows( 'room_type_head', $room_type_head );
			$tmpl->addRows( 'property_type_head', $property_type_head );
			$tmpl->addRows( 'guestnumber_head', $guestnumber_head );
			$tmpl->addRows( 'date_head', $date_head );

			$tmpl->addRows( 'stars_rows', $stars_rows );
			$tmpl->addRows( 'prices_rows', $prices_rows );
			$tmpl->addRows( 'features_rows', $features_rows );
			$tmpl->addRows( 'country_rows', $country_rows );
			$tmpl->addRows( 'region_rows', $region_rows );
			$tmpl->addRows( 'town_country_rows', $town_country_rows );
			$tmpl->addRows( 'town_rows', $town_rows );
			$tmpl->addRows( 'room_type_rows', $room_type_rows );
			$tmpl->addRows( 'property_type_rows', $property_type_rows );
			$tmpl->addRows( 'guestnumber_rows', $guestnumber_rows );
			$tmpl->addRows( 'date_rows', $date_rows );

			$this->ret_vals = $tmpl->getParsedTemplate();
		}

		// This must be included in every Event/Mini-component
		function getRetVals()
		{
			return array("SEARCHFORM"=>$this->ret_vals);
		}
	}
