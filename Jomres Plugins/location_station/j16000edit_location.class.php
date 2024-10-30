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

class j16000edit_location
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$country = jomresGetParam( $_REQUEST, 'location_country','' );
		$region = jomresGetParam( $_REQUEST, 'location_region','' );
		$town = jomresGetParam( $_REQUEST, 'location_town','' );
		
		$output['LOCATION_COUNTRY'] = $country;
		$output['LOCATION_REGION'] = $region;
		$output['LOCATION_TOWN'] = $town;
		
		$output['PAGETITLE']=jr_gettext('_JOMRES_CUSTOMCODE_LOCATION_STATION_EDIT_TITLE',"Editing location ",false,false).' '.$town;
		
		$location_information='';

		$query = "SELECT location_information FROM #__jomres_location_data WHERE `country` = '".$country."' AND `region` = '".$region."' AND `town` = '".$town."'";
		$result = doSelectSql($query);
		if (!empty($result))
			{
			$location_information=jomres_decode($result[0]->location_information);
			}

		$width="95%";
		$height="250";
		$col="20";
		$row="10";
		
		$output['LOCATION_INFORMATION']=editorAreaText( 'location_information',$location_information, 'location_information', $width, $height, $col, $row );

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN."&task=location_station",'');
		$image = $jrtbar->makeImageValid(JOMRES_IMAGES_RELPATH.'jomresimages/small/Save.png');
		$link = JOMRES_SITEPAGE_URL_ADMIN;
		$jrtb .= $jrtbar->customToolbarItem('save_location_station',$link,jr_gettext("_JOMRES_COM_MR_SAVE",'_JOMRES_COM_MR_SAVE',false),$submitOnClick=true,$submitTask="save_location_station",$image);
		
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_location.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_CUSTOMCODE_LOCATION_STATION_EDIT_TITLE',"Editing location ");

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}