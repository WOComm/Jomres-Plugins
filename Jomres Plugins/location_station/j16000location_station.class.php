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

class j16000location_station
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$editIcon	='<img src="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" alt="editicon"/>';

		$query = "SELECT `property_town`,`property_region`,`property_country` FROM #__jomres_propertys WHERE `property_town` != '' AND `property_region` != '' AND `property_country` != '' ";
		$locations = doSelectSql($query);

		$locations_array = array();
		foreach ($locations as $location)
			{
			$country_name = getSimpleCountry($location->property_country);
			if ($country_name != "")
				$locations_array[$country_name][$location->property_country][$location->property_region][$location->property_town]="BLANK";
			}
		ksort($locations_array);
		
		$query = "SELECT `country`,`region`,`town`,`location_information` FROM #__jomres_location_data";
		$result = doSelectSql($query);
		if (!empty($result))
			{
			foreach ($result as $res)
				{
				$country_name = getSimpleCountry($res->country);
				if ($country_name != "")
					{
					$locations_array[$country_name][$res->country][$res->region][$res->town]=jomres_decode($res->location_information);
					}
				}
			}

		foreach ($locations_array as $country_name=>$country_code)
			{
			foreach ($country_code as $c_code=>$reg)
				{
				foreach ($reg as $region=>$towns)
					{
					foreach ($towns as $town=>$location_information)
						{
						$r=array();
							
						$r['country_name']= $country_name;
						$r['country_code']= $c_code;
						if (is_numeric($region))
							{
							$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
							$r['region']=jr_gettext("_JOMRES_CUSTOMTEXT_REGIONS_".$region,$jomres_regions->get_region_name($region),false,false);
							}
						else
							$r['region']=jr_gettext('_JOMRES_CUSTOMTEXT_PROPERTY_REGION',$region,false,false);
						$r['town']= $town;
						$r['location_information']= $location_information;
						
						if (!using_bootstrap())
							{
							$r['EDITLINK']= '<a href="'.JOMRES_SITEPAGE_URL_ADMIN.'&task=edit_location&location_country='.$c_code.'&location_region='.urlencode ($region).'&location_town='.urlencode ($town).'"  >'.$editIcon.'</a>';
							}
						else
							{
							$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
							$toolbar->newToolbar();
							$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=edit_location&location_country=' . $c_code.'&location_region='.urlencode ($region).'&location_town='.urlencode ($town) ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
							
							$r['EDITLINK'] = $toolbar->getToolbar();
							}
						
						$rows[]=$r;
						}
					}
				}
			}
		
		$output=array();
		$output['PAGETITLE']=jr_gettext('_JOMRES_LOCATION_STATION_TITLE','_JOMRES_LOCATION_STATION_TITLE',false,false);
		$output['_JOMRES_LOCATION_STATION_TITLE']=jr_gettext('_JOMRES_LOCATION_STATION_TITLE','_JOMRES_LOCATION_STATION_TITLE',false,false);
		
		$output['_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN','_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN',false,false);
		$output['_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION','_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION',false,false);
		$output['_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY','_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY',false,false);
		$output['_JOMRES_LOCATION_STATION_INFORMATION']=jr_gettext('_JOMRES_LOCATION_STATION_INFORMATION','_JOMRES_LOCATION_STATION_INFORMATION',false,false);
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_locations.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}