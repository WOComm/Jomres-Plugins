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

class j06000popular_properties
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true;
				$this->shortcode_data = array(
					'task' => 'popular_properties',
					'arguments_distinct' => true,
					'info' => '_JOMRES_DESTINATIONS_MENUNAME'
				);

			return;
			}
		$thisJRUser = jomres_getSingleton('jr_user');
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$thisJRUser = jomres_getSingleton('jr_user');
		$ePointFilepath=get_showtime('ePointFilepath');	
		$data_only = false;

		$this->retVals = '';

		if ($jrConfig['use_reviews'] == "1")
			{
			$output = array();
			$pageoutput = array();
			$rows = array();
			$this_user_can_review = false;
			
			$original_property_uid = get_showtime('property_uid');
			
			jr_import('jrportal_property_functions');
			$propertyFunctions=new jrportal_property_functions();
			$jomresPropertyList=$propertyFunctions->getAllJomresProperties();

			$sql = "SELECT item_id,rating FROM #__jomres_reviews_ratings";
			$result = doSelectSql($sql);
			if (empty($result))
				return; // There aren't any reviews
			
			$ratings = array();
			$scores = array();
			
			$reviews_by_country = array();
			$reviews_by_region = array();
			$reviews_by_town = array();
			
			foreach ($result as $res)
				{
				if ( $jomresPropertyList[$res->item_id]['published'] == "1")
					{
					$ratings[$res->item_id]['property_uid'] 	= $res->item_id;
					$ratings[$res->item_id]['property_name'] 	= $jomresPropertyList[$res->item_id]['property_name'];
					$ratings[$res->item_id]['town'] 			= $jomresPropertyList[$res->item_id]['property_town'];
					$ratings[$res->item_id]['region'] 			= $jomresPropertyList[$res->item_id]['property_region'];
					$ratings[$res->item_id]['country'] 			= $jomresPropertyList[$res->item_id]['property_country'];
					$ratings[$res->item_id]['ratings'][]		= $res->rating;
					}
				}
			unset($jomresPropertyList);
			
			// Now we figure out the value of the scores of each property
			foreach ($ratings as $key=>$property)
				{
				$score = $this->calc_score($property['ratings']);
				$ratings[$key]['score']=$score;
				$scores[$property['property_uid']]=$score;
				}

			arsort($scores);
			
			foreach ($scores as $property_uid=>$score)
				{
				$country	= $ratings[$property_uid]['country'];
				$region		= $ratings[$property_uid]['region'];
				$town		= $ratings[$property_uid]['town'];
				$reviews_by_country[$country][$property_uid]=$ratings[$property_uid];
				$reviews_by_region[$region][$property_uid] = $ratings[$property_uid];
				$reviews_by_town[$town][$property_uid] = $ratings[$property_uid];
				}
			
			// Now that we've collected the data, we can do some useful stuff with it.

			$show_by=jomresGetParam( $_REQUEST, 'by',"" ); // eg GB
			$element_name=jomresGetParam( $_REQUEST, 'el',"GB" ); // Pembrokeshire
			
			switch ($show_by)
				{
				case "country";
					if (array_key_exists($element_name,$reviews_by_country))
						{
						$curr_arr[] = $reviews_by_country[$element_name];
						}
					else return;
					break;
				case "region";
					if (array_key_exists($element_name,$reviews_by_region))
						{
						$curr_arr[] = $reviews_by_region[$element_name];
						}
					else return;
					break;
				case "town";
					if (array_key_exists($element_name,$reviews_by_town))
						{
						$curr_arr[] = $reviews_by_town[$element_name];
						}
					else return;
					break;
				default;
					// Show them all
					foreach ($reviews_by_country as $key=>$property)
						{
						$curr_arr[$key]=$property;
						}
					break;
				}

			$current_property_details =jomres_getSingleton('basic_property_details');
			$customTextObj =jomres_getSingleton('custom_text');
			$output['_JOMRES_DESTINATIONS_ALLPROPERTIES']=jr_gettext('_JOMRES_DESTINATIONS_ALLPROPERTIES','_JOMRES_DESTINATIONS_ALLPROPERTIES',false,true) ;
			$output['LIVESITE']=JOMRES_SITEPAGE_URL;
			foreach ($curr_arr as $properties)
				{
				foreach ($properties as $property_uid=>$property)
					{
					set_showtime('property_uid', $property_uid);
					
					$r=array();
					
					$r['MOREINFORMATION']= jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',$editable=false,true) ;
					$r['MOREINFORMATIONLINK']=get_property_details_url($property_uid);
					$r['PROP_NAME'] =$current_property_details->get_property_name($property_uid);
					
					$r['TOWN_TEXT'] = $property['town'];
					$r['REGION_TEXT'] =$property['region'];
					$r['COUNTRY_TEXT'] =getSimpleCountry($property['country']);
					
					$r['TOWN'] = jomresURL( JOMRES_SITEPAGE_URL."&task=popular_properties&by=town&el=".jomres_decode($property['town'] ) );
					$r['REGION'] =jomresURL( JOMRES_SITEPAGE_URL."&task=popular_properties&by=region&el=".jomres_decode($property['region']));
					$r['COUNTRY'] =jomresURL( JOMRES_SITEPAGE_URL."&task=popular_properties&by=country&el=".jomres_decode($property['country']));
					$r['COUNTRYCODE']=$property['country'];
					$r['LIVESITE']=JOMRES_SITEPAGE_URL;

					$r['_JOMRES_DESTINATIONS_REVIEWS']			= jr_gettext('_JOMRES_DESTINATIONS_REVIEWS','_JOMRES_DESTINATIONS_REVIEWS',false,true) ;
					$r['_JOMRES_DESTINATIONS_SCORE']			= jr_gettext('_JOMRES_DESTINATIONS_SCORE','_JOMRES_DESTINATIONS_SCORE',false,true) ;
					
					$r['NUMBEROFREVIEWS']=count($property['ratings']);
					$r['SCORE']=$property['score'];
					
					$rows[]=$r;
					}
				}

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tmpl->setRoot( $ePointFilepath.JRDS."templates" . JRDS . find_plugin_template_directory());
			$tmpl->readTemplatesFromInput( 'popular_properties.html');
			$this->retVals = $tmpl->getParsedTemplate();
			echo $this->retVals;
			
			set_showtime('property_uid', $original_property_uid );
			}
		}

	function calc_score($k)
		{
		$score = 0;
		$score = array_sum($k)+count($k)/count($k);
		return $score;
		}
		
		
	function touch_template_language()
		{
		$output=array();

		$output[]						=jr_gettext('_JOMRES_DESTINATIONS_REVIEWS','_JOMRES_DESTINATIONS_REVIEWS');
		$output[]						=jr_gettext('_JOMRES_DESTINATIONS_SCORE','_JOMRES_DESTINATIONS_SCORE');
		$output[]						=jr_gettext('_JOMRES_DESTINATIONS_ALLPROPERTIES','_JOMRES_DESTINATIONS_ALLPROPERTIES');
		
		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}

	function getRetVals()
		{
		return $this->retVals;
		}
	}