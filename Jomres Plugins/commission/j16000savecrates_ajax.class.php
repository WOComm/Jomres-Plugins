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

class j16000savecrates_ajax
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$property_uid = (int)jomresGetParam( $_GET, 'property_uid', 0 );
		$crate_id = (int)jomresGetParam( $_GET, 'crate_id', 0 );

		if ($property_uid > 0 && $crate_id > 0)
			{
			$query = "DELETE FROM #__jomresportal_properties_crates_xref WHERE `property_id` = ".$property_uid;
			doInsertSql($query);
			
			$query = "INSERT INTO #__jomresportal_properties_crates_xref (`property_id`,`crate_id`) VALUES (" . $property_uid . "," . $crate_id . ") ";
			if (!doInsertSql($query))
				{
				echo "Error inserting property uid crate id xref";
				exit;
				}
			}
		echo "Successfully assigned commission rate to property";
		exit;
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}