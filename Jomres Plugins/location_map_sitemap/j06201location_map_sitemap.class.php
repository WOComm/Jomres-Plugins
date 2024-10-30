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

class j06201location_map_sitemap {
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$query="SELECT propertys_uid FROM #__jomres_propertys WHERE published = 1";
		$all_properties = doSelectSql($query);
		$property_ids = array();
		foreach ($all_properties as $p)
			{
			$property_ids[]=$p->propertys_uid;
			}
		
		$current_property_details =jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data_multi($property_ids);
		//
		$properties = array();
		foreach ($current_property_details->multi_query_result as $p)
			{
			//$properties[$p['property_region']][$p['property_town']][$p['property_name']][$p['propertys_uid']]=$p;
			$properties[$p['property_region_id']][$p['property_town']][$p['propertys_uid']]=$p['property_name'];
			}

		$regions = mega_menu_get_regions_and_towns();
		
		$output = array();
		
		foreach ($regions as $region_id=>$towns)
			{
			$o = array();
			$po = array();
			if (isset($region_id) )
				{
				if ( is_numeric( $region_id ) )
					{
					$jomres_regions = jomres_singleton_abstract::getInstance( 'jomres_regions' );
					$region = jr_gettext( "_JOMRES_CUSTOMTEXT_REGIONS_" . $region_id, $jomres_regions->get_region_name($region_id), false );
					}
				else
					$region = jr_gettext( '_JOMRES_CUSTOMTEXT_PROPERTY_REGION', $region_id, false );
				
				$o['TITLE_TEXT'] = $region;
				$o['TITLE_URL'] = jomresURL(JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&region='.$region_id);
				$rows=array();
				ksort($towns);
				foreach ($towns as $town)
					{
					if (isset($properties[$region_id][$town])) {
						$this_town_properties = $properties[$region_id][$town];
						natsort($this_town_properties);
						
						$r = array();
						if ($town != "")
							{
							$r['TEXT'] = $town;
							$r['URL'] = jomresURL(JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&region='.$region_id.'&town='.jomres_decode($town) );
							if (!empty($this_town_properties))
								{
								$town_properties = array();
								
								foreach ($this_town_properties as $property_uid=>$property_name)
									{
									$tp = array();
									$tp['PROPERTY_NAME']=$property_name;
									$tp['URL']=get_property_details_url($property_uid);
									$town_properties[]=$tp;
									}
									
								$tmpl = new patTemplate();
								$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
								$tmpl->readTemplatesFromInput( 'town_properties.html');
								$tmpl->addRows( 'town_properties', $town_properties );
								$property_template = $tmpl->getParsedTemplate();
								}
							$r['PROPERTIES']=$property_template;
							$rows[] = $r;
							}
						}

					}

				$po[]=$o;
				$tmpl = new patTemplate();
				if (using_bootstrap())
					$tmpl->setRoot( $ePointFilepath.JRDS."templates".JRDS."bootstrap" );
				else
					$tmpl->setRoot( $ePointFilepath.JRDS."templates".JRDS."jquery_ui" );
				$tmpl->readTemplatesFromInput( 'links.html');
				$tmpl->addRows( 'pageoutput', $po );
				$tmpl->addRows( 'rows', $rows );
				$links[] = array('LINK'=>$tmpl->getParsedTemplate() );
				}
			}
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates' );
		if (using_bootstrap())
			$tmpl->setRoot( $ePointFilepath.JRDS."templates".JRDS."bootstrap" );
		else
			$tmpl->setRoot( $ePointFilepath.JRDS."templates".JRDS."jquery_ui" );
		$tmpl->readTemplatesFromInput( 'wrapper.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'links', $links );
		$content = $tmpl->getParsedTemplate();
		$this->ret_vals = array('content'=>$content,"title"=>jr_gettext('_JOMRES_LOCATION_MAP_SITEMAP','_JOMRES_LOCATION_MAP_SITEMAP',false,false) );
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_LOCATION_MAP_SITEMAP','_JOMRES_LOCATION_MAP_SITEMAP');

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
