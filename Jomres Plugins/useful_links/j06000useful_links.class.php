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


class j06000useful_links {
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; 
			$this->shortcode_data = array (
				"task" => "useful_links",
				"info" => "_JOMRES_SHORTCODES_06000USEFULLINKS",
				"arguments" => array ()
				);
			return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		$country = jomresGetParam($_REQUEST, 'country', '');
		$region = jomresGetParam($_REQUEST, 'region', '');
		$town = jomresGetParam($_REQUEST, 'town', '');
		
		if ($country == '' && $region == '' && $town == '')
			return;
		
		if ($country != '')
			$searchtype = "country";
		elseif ($region != '')
			$searchtype = "region";
		elseif ($town != '')
			$searchtype = "town";
		
		$countryName='';
		$regionName='';
		if ($country != '')
			{
			$location = $country;
			$countryName = getSimpleCountry($country);
			}
		elseif ($region != '')
			{
			$location = $region;

			if ( is_numeric( $region ) )
				{
				$jomres_regions = jomres_singleton_abstract::getInstance( 'jomres_regions' );
				$regionName = jr_gettext( "_JOMRES_CUSTOMTEXT_REGIONS_" . $region, $jomres_regions->get_region_name($region), false, false );
				}
			else
				$regionName = jr_gettext( '_JOMRES_CUSTOMTEXT_PROPERTY_REGION', $region, false, false );
			}
		elseif ($town != '') {
			$location = $town;
		}

		$output = array();
		$pageoutput = array();
		
		$language = explode('-',get_showtime('lang'));
		$lang = $language[0];
		
		$output['WIKIPEDIA_URL']= "http://".$lang.".wikipedia.org/wiki/";
		
		$output['USEFUL_LINKS_FORSALE']=jr_gettext('USEFUL_LINKS_FORSALE','USEFUL_LINKS_FORSALE',false,false);
		$output['FORSALE']=htmlspecialchars(JOMRES_SITEPAGE_URL.'&calledByModule=jomSearch_m0&ptype='.$jrConfig[ 'useful_links_realestate' ]."&".$searchtype."=".$location);
		$output['USEFUL_LINKS_HOTELS']=jr_gettext('USEFUL_LINKS_HOTELS','USEFUL_LINKS_HOTELS',false,false);
		$output['HOTELS']=htmlspecialchars(JOMRES_SITEPAGE_URL.'&calledByModule=jomSearch_m0&ptype='.$jrConfig[ 'useful_links_mrp' ]."&".$searchtype."=".$location);
		$output['USEFUL_LINKS_VILLAS']=jr_gettext('USEFUL_LINKS_VILLAS','USEFUL_LINKS_VILLAS',false,false);
		$output['VILLAS']=htmlspecialchars(JOMRES_SITEPAGE_URL.'&calledByModule=jomSearch_m0&ptype='.$jrConfig[ 'useful_links_srp' ]."&".$searchtype."=".$location);
		$output['USEFUL_LINKS_WIKIPEDIA']=jr_gettext('USEFUL_LINKS_WIKIPEDIA','USEFUL_LINKS_WIKIPEDIA',false,false);
		
		if ($countryName!='')
			$output['LOCATION']=jr_ucwords($countryName);
		elseif ($regionName!='')
			$output['LOCATION']=jr_ucwords($regionName);
		else
			$output['LOCATION']=jr_ucwords($town);
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( "useful_links.html" );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
