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

class j00006location_station
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$task = jomresGetParam($_REQUEST, 'task', '');

		if ( (isset($_REQUEST['no_html']) && isset($_REQUEST['popup']) ) || isset($_REQUEST['jrajax']) && ($task!='viewproperty' ))
			return;
			
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$output = array();
		$property_uid = (int)get_showtime('property_uid');
		if ($property_uid ==0 || get_showtime('task') != "viewproperty")
			return;
		
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data($property_uid);

		$query = "SELECT location_information FROM #__jomres_location_data WHERE `country` = '".$current_property_details->property_country_code."' AND `region` = '".$current_property_details->property_region_id."' AND `town` = '".$current_property_details->property_town."'";
		$result = doSelectSql($query);
		if (!empty($result) && jomres_decode($result[0]->location_information)!="")
			{
			$location_information=jomres_decode($result[0]->location_information);
			}
		else return;
			
		$output['LOCATION_INFORMATION'] = $location_information;
		$output['LOCATION_TOWNNAME'] = $current_property_details->property_town;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'location_station.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
