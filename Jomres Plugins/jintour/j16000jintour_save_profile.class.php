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

class j16000jintour_save_profile
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$defaultProperty=0;
		
		$profile_id 	= (int)jomresGetParam( $_REQUEST, 'id', 0 );
		$title 			= (string)jomresGetParam( $_REQUEST, 'title', '' );
		$description 	= (string)jomresGetParam( $_REQUEST, 'description', '' );
		$spaces_adults 		= (int)jomresGetParam( $_REQUEST, 'spaces_adults', 0 );
		$spaces_kids 		= (int)jomresGetParam( $_REQUEST, 'spaces_kids', 0 );
		$spaces 		= (int)jomresGetParam( $_REQUEST, 'spaces', 0 );
		$tax_rate 		= (int)jomresGetParam( $_REQUEST, 'taxrate', 0 );
		$start_date 	= JSCalConvertInputDates($_POST['validfrom']);
		$end_date 		= JSCalConvertInputDates($_POST['validto']);
		$monday 		= (int)jomresGetParam( $_REQUEST, 'monday', '' );
		$tuesday 		= (int)jomresGetParam( $_REQUEST, 'tuesday', '' );
		$wednesday 		= (int)jomresGetParam( $_REQUEST, 'wednesday', '' );
		$thursday 		= (int)jomresGetParam( $_REQUEST, 'thursday', '' );
		$friday 		= (int)jomresGetParam( $_REQUEST, 'friday', '' );
		$saturday 		= (int)jomresGetParam( $_REQUEST, 'saturday', '' );
		$sunday 		= (int)jomresGetParam( $_REQUEST, 'sunday', '' );
		$price_adults 	= (float)jomresGetParam( $_REQUEST, 'price_adults', 0.0 );
		$price_kids 	= (float)jomresGetParam( $_REQUEST, 'price_kids', 0.0 );
		
		
		$days_of_week = $monday.",".$tuesday.",".$wednesday.",".$thursday.",".$friday.",".$saturday.",".$sunday;
		
		if ($profile_id == 0)
			{
			$query = "
				INSERT INTO #__jomres_jintour_profiles SET 
					`title`='".$title."',
					`description`='".$description."',
					`spaces_adults`='".$spaces_adults."',
					`spaces_kids`='".$spaces_kids."',
					`start_date`='".$start_date."',
					`end_date`='".$end_date."',
					`days_of_week`='".$days_of_week."',
					`price_adults`='".$price_adults."',
					`price_kids`='".$price_kids."',
					`property_uid`=".$defaultProperty.",
					`tax_rate`=".$tax_rate."
				";
			}
		else
			{
			$query = "
				UPDATE #__jomres_jintour_profiles SET 
					`title`='".$title."',
					`description`='".$description."',
					`spaces_adults`='".$spaces_adults."',
					`spaces_kids`='".$spaces_kids."',
					`start_date`='".$start_date."',
					`end_date`='".$end_date."',
					`days_of_week`='".$days_of_week."',
					`price_adults`='".$price_adults."',
					`price_kids`='".$price_kids."',
					`tax_rate`='".$tax_rate."'
				WHERE id = ".$profile_id." AND property_uid = ".$defaultProperty."
				";
			}
		if (!doInsertSql($query,$auditMessage))
			trigger_error ("Unable to create tour profile, mysql db failure", E_USER_ERROR);
		else
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=jintour"), '' );

		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
	
