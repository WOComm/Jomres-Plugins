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

class j06201location_map_regions
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$regions = mega_menu_get_regions_and_towns();

		foreach ($regions as $region_id => $towns)
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
					$r = array();
					if ($town != "")
						{
						$r['TEXT'] = $town;
						$r['URL'] = jomresURL(JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&region='.$region_id.'&town='.jomres_decode($town) );
						$rows[] = $r;
						}
					}

				$po[]=$o;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'links.html');
				$tmpl->addRows( 'pageoutput', $po );
				$tmpl->addRows( 'rows', $rows );
				$links[] = array('LINK'=>$tmpl->getParsedTemplate() );
				}
			}

		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates' );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'wrapper.html');
		$tmpl->addRows( 'links', $links );
		$content = $tmpl->getParsedTemplate();
		$this->ret_vals = array('content'=>$content,"title"=>jr_gettext('_JOMRES_MEGA_MENU_REGIONS',"Regions",false,false) );
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_MEGA_MENU_REGIONS',"Regions");

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
