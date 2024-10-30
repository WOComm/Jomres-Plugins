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

class j16000save_location_station
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilePath = get_showtime('ePointFilepath');
		
		$country = jomresGetParam( $_POST, 'location_country','' );
		$region = jomresGetParam( $_POST, 'location_region','' );
		$town = jomresGetParam( $_POST, 'location_town','' );
		$location_information = jomresGetParam( $_POST, 'location_information','' );
		
		if (trim($location_information) == '') {
			$query = "DELETE FROM #__jomres_location_data WHERE `country` = '".$country."' AND `region` = '".$region."' AND `town` = '".$town."'";
			$result = doInsertSql($query);
		} else {
			$query = "SELECT location_information FROM #__jomres_location_data WHERE `country` = '".$country."' AND `region` = '".$region."' AND `town` = '".$town."'";
			$result = doSelectSql($query);
			if (empty($result))
				$query = "INSERT INTO #__jomres_location_data (`country`,`region`,`town`,`location_information`) VALUES ('".$country."','".$region."','".$town."','".$location_information."')";
			else
				$query = "UPDATE #__jomres_location_data SET `location_information` = '".$location_information."' WHERE `country` = '".$country."' AND `region` = '".$region."' AND `town` = '".$town."'";

			$result = doInsertSql($query);
		}
		
		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=location_station"), "" );
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