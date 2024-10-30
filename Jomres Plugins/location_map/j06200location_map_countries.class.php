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

class j06200location_map_countries
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$countries = mega_menu_get_countries_and_regions();
		
		foreach ($countries as $country_name=>$regions)
			{
			$o = array();
			$po = array();
			if (isset($country_name) )
				{
				$o['TITLE_TEXT'] = $country_name;
				$o['TITLE_URL'] = jomresURL(JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&country='.$regions['country_code']);
				$rows=array();
				ksort($regions);
				foreach ($regions as $region_id=>$region)
					{
					$r = array();
					if ($region != "" && $region_id != "country_code" )
						{
						$r['TEXT'] = $region;
						$r['URL'] = jomresURL(JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&region='.$region_id );
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
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'wrapper.html');
		$tmpl->addRows( 'links', $links );
		$content = $tmpl->getParsedTemplate();
		$this->ret_vals = array('content'=>$content,"title"=>jr_gettext('_JOMRES_MEGA_MENU_COUNTRIES',"Countries",false,false) );
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_MEGA_MENU_COUNTRIES',"Countries"); // Not going to bother creating a language file just for one string that v few people will see, instead we'll let the site admin, using Label Editing, translate an english string

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
