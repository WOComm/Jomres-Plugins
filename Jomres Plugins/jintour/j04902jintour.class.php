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

class j04902jintour {
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ptype_id 		= (int)jomresGetParam( $_POST, 'propertyType', 0 );
		$property_uid 	= $componentArgs['property_uid'];
		
		//get property type details
		$jomres_property_types = jomres_singleton_abstract::getInstance( 'jomres_property_types' );
		$jomres_property_types->get_property_type($ptype_id);
		
		// mrp_srp_flag:
		// 0 - hotel
		// 1 - villa/apartment
		// 2 - both - BC, resets to 0
		// 3 - tours
		// 4 - real estate
		if ($jomres_property_types->property_type['mrp_srp_flag'] == 3 )
			{
			$query = "INSERT INTO #__jomres_jintour_properties (`property_uid`) VALUES (".(int)$property_uid.")";
			if (!doInsertSql($query, '')) 
				trigger_error ("Sql error when adding new jintour property to database.", E_USER_ERROR);
			
			// We'll add on tariff to the rates table to supress the Jomres sanity check, however we will not actually use it
			$query = "INSERT INTO #__jomres_rates (`property_uid`) VALUES (".(int)$property_uid.")";
			if (!doInsertSql($query, '')) 
				trigger_error ("Sql error when adding new jintour tariff to database.", E_USER_ERROR);
			}
		else
			{
			$query="DELETE FROM #__jomres_jintour_properties WHERE `property_uid` = ".(int)$property_uid;
			if ( !doInsertSql($query,'') )
				trigger_error ("Could not delete from jintour properties table.", E_USER_ERROR);
			}
		}


	function getRetVals()
		{
		return null;
		}
	}
