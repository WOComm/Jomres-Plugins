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


class j06000tag_cloud
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');	
		$no_html			= (int)jomresGetParam( $_REQUEST, 'no_html', 0 );
		if ($no_html==1)
			return;
		$search_on = "property_town";
		//$search_on = "property_region";
		//$search_on = "property_country";
		
		switch ($search_on)
			{
			case "property_town":
				$query = "SELECT property_town,propertys_uid FROM #__jomres_propertys WHERE published = 1";
				$url = JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&town=';
				break;
			case "property_region":
				$query = "SELECT property_region,propertys_uid FROM #__jomres_propertys WHERE published = 1";
				$url = JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&region=';
				break;
			case "property_country":
				$query = "SELECT property_country,propertys_uid FROM #__jomres_propertys WHERE published = 1";
				$url = JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&country=';
				break;
			}
		
		//$url = jomresURL($url);
		
		$result = doSelectSql($query);
		if (empty($result))
			return;
			
		$searchWords = array();
		
		$original_property_uid = get_showtime('property_uid');
		
		foreach ($result as $r)
			{
			set_showtime('property_uid',$r->propertys_uid);
			$searchWords[]=jr_gettext( '_JOMRES_CUSTOMTEXT_PROPERTY_TOWN', $r->$search_on, false );
			}
		
		set_showtime('property_uid', $original_property_uid);
		
		jr_import('jomres_tag_cloud');
		$cloud = new jomres_tag_cloud($searchWords);
		$cloud->template_path = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
		$cloud->setURL($url);
		$cloud->setSearchon($search_on);
		
		
		$output=array("cloud"=>$cloud->showCloud());
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( "cloud.html" );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();

		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}


	}

