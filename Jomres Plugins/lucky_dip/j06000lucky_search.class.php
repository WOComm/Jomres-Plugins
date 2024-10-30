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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


class j06000lucky_search
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		
		$output=array();
		$output['FORM'] = $MiniComponents->specificEvent("06000","lucky_dip",array("return_template"=>true));
		
		$cost						= (float)jomresGetParam( $_REQUEST, 'cost', 0.00 );
		$requested_features			= jomresGetParam( $_REQUEST, 'luckydip_features', array() );

		// Now we need to find some properties

		$all_property_uids = get_showtime('published_properties_in_system');
		
		// Get the found properties details (that could get big fast)
		$current_property_details =jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data_multi($all_property_uids);
		$all_properties = $current_property_details->multi_query_result;
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images_multi($all_property_uids, array('property'));
		
		$filtered_properties = array();
		if (!empty($requested_features))
			{
			// Now we'll filter out the properties who's features don't match, if any features were selected
			foreach ($all_properties as $property_info)
				{
				$this_property_features = explode(",",$property_info['property_features']);
				
				if (!empty($this_property_features) && $property_info['published'] != 0 )
					{
					$count=0;
					foreach ($requested_features as $f)
						{
						if (in_array($f,$this_property_features))
							$count++;
						
						}
					// We're going to order the results based on the number of matching features
					if ($count >0)
						{
						$filtered_properties[$count][]=$property_info;
						}
					}
				}
			}
		else
			{
			$filtered_properties[9999] = $all_properties;
			}

		unset($current_property_details);
		
		// reverse the sort order, so those properties with the most matching features are bumped to the top of the list
		krsort ($filtered_properties);
		
		// Now we'll extract just the property uids of the filtered properties
		$property_uids = array();
		foreach ($filtered_properties as $propertys)
			{
			foreach ($propertys as $p)
				{
				$property_uids[] = $p['propertys_uid'];
				}
			}		
		
		$output['NO_COST']='';
		if ($cost == 0.00)
			{
			$output['NO_COST']=jr_gettext("_JOMRES_TAGS_LUCKY_DIP_COST_NO_COST",'_JOMRES_TAGS_LUCKY_DIP_COST_NO_COST');
			$cost = 500.00;
			}
		
		$query = "SELECT DISTINCT property_uid, roomrateperday as rate FROM #__jomres_rates WHERE roomrateperday < ".$cost." AND roomrateperday > 0 AND property_uid IN (".implode(',',$property_uids).") AND DATE_FORMAT( `validto` , '%Y/%m/%d' ) > DATE( NOW( ) ) ORDER BY FIND_IN_SET(property_uid, '".implode(",",$property_uids)."') ";

		$tariffList = doSelectSql($query);

		if (empty($tariffList))
			{
			echo jr_gettext("_JOMRES_TAGS_LUCKY_DIP_COST_NO_RESULTS_COST",'_JOMRES_TAGS_LUCKY_DIP_COST_NO_RESULTS_COST');
			
			$MiniComponents->triggerEvent('01004',$componentArgs); // optional
			$MiniComponents->triggerEvent('01005',$componentArgs); // optional
			$MiniComponents->triggerEvent('01006',$componentArgs); // optional
			$MiniComponents->triggerEvent('01007',$componentArgs); // optional
			
			$componentArgs=array();
			$componentArgs['propertys_uid']=$property_uids;
			$componentArgs['live_scrolling_enabled']=true;
			$MiniComponents->specificEvent('01010','listpropertys',$componentArgs);
			}
		else
			{

			
			$output['_JOMRES_TAGS_LUCKY_DIP_COST_YOUENTERED'] = jr_gettext("_JOMRES_TAGS_LUCKY_DIP_COST_YOUENTERED",'_JOMRES_TAGS_LUCKY_DIP_COST_YOUENTERED');
			$output['COST']=output_price($cost,$jrConfig['globalCurrencyCode']);
			
			$output['_JOMRES_TAGS_LUCKY_DIP_NOTE_GUESSTIMATE']=jr_gettext("_JOMRES_TAGS_LUCKY_DIP_NOTE_GUESSTIMATE",'_JOMRES_TAGS_LUCKY_DIP_NOTE_GUESSTIMATE');
			$tariffs = array();
			foreach ($tariffList as $tariff)
				{
				if (!isset($tariffs[$tariff->property_uid]))
					$tariffs[$tariff->property_uid]=$tariff->rate;
				elseif ($tariffs[$tariff->property_uid] > $tariff->rate)
					{
					$tariffs[$tariff->property_uid]=$tariff->rate;
					}
				}
			jr_import('jomSearch');
			$all_features = prepFeatureSearch();
			$tmp=array();
			foreach ($all_features as $f)
				{
				$id = $f['id'];
				if ($id>0)
					$tmp[$id]=$f['title'];
				}
			$all_features = $tmp;
			$no_image_image=JOMRES_IMAGES_RELPATH.'noimage.gif';
			foreach ($property_uids as $property_uid)
				{
				$r=array();
				
				$rate = 0.00;
				if (isset($tariffs[$property_uid]))
					{
					$rate = $tariffs[$property_uid];
					}
				
				$jomres_media_centre_images->get_images($property_uid, array('property'));
				$r[ 'IMAGETHUMB' ] = $jomres_media_centre_images->images ['property'][0][0]['small'];
				$r[ 'IMAGEMEDIUM' ] = $jomres_media_centre_images->images ['property'][0][0]['medium'];

				$r['FEATURES'] = '';

				$requested_features_count=count($requested_features);
				$property_features = explode(",",$all_properties[$property_uid]['property_features']);
				if (!empty($property_features))
					{
					foreach ($property_features as $feature)
						{
						if (trim($feature) != '')
							{
							if ($requested_features_count>0) // The user selected some features, so we'll make a point of only showing this properties features that matched their requirement
								{
								if (in_array($feature,$requested_features))
									{
									$r['_JOMRES_TAGS_LUCKY_DIP_RESULT_RELEVANT_FEATURES']= jr_gettext('_JOMRES_TAGS_LUCKY_DIP_RESULT_RELEVANT_FEATURES','_JOMRES_TAGS_LUCKY_DIP_RESULT_RELEVANT_FEATURES') ;
									$r['FEATURES'] .= '<span class="label label-info">'.$all_features[$feature].'</span> ';
									}
								}
							elseif ( $requested_features_count ==0) // The user didn't select any features, we'll show all of this property's features
								{
								$r['FEATURES'] .= '<span class="label label-info">'.$all_features[$feature].'</span> ';
								}
							}
						}
					}
				
				$r['NIGHTS'] = 1;

				if ($rate > 0)
					{
					$r['NIGHTS'] = floor($cost/$rate);
					}
				
				$r['PROPERTY_NAME']=$all_properties[$property_uid]['property_name'];
				$r['URL']=get_property_details_url($property_uid);
				
				$r['_JOMRES_TAGS_LUCKY_DIP_RESULT_1']=jr_gettext('_JOMRES_TAGS_LUCKY_DIP_RESULT_1','_JOMRES_TAGS_LUCKY_DIP_RESULT_1');
				$r['_JOMRES_TAGS_LUCKY_DIP_RESULT_2']=jr_gettext('_JOMRES_TAGS_LUCKY_DIP_RESULT_2','_JOMRES_TAGS_LUCKY_DIP_RESULT_2');
				if ($r['NIGHTS']>1)
					$r['_JOMRES_TAGS_LUCKY_DIP_RESULT_3']=jr_gettext('_JOMRES_TAGS_LUCKY_DIP_RESULT_PLURAL','_JOMRES_TAGS_LUCKY_DIP_RESULT_PLURAL');
				else
					$r['_JOMRES_TAGS_LUCKY_DIP_RESULT_3']=jr_gettext('_JOMRES_TAGS_LUCKY_DIP_RESULT_SINGULAR','_JOMRES_TAGS_LUCKY_DIP_RESULT_SINGULAR');
				
				$r['MOREINFORMATION']= jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',false,true) ;
				
				
				if ($r['NIGHTS']>0)
					$rows[]=$r;
				}
			
			//$all_properties
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'lucky_dip_results.html');
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			echo $tmpl->getParsedTemplate();
				
			
			}
		

		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
