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

class j06001super_dashboard_ajax {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$show_date_dropdown = false;
		if (isset($_REQUEST['show_date_dropdown']))
			$show_date_dropdown = (bool) $_REQUEST['show_date_dropdown'];

		$thisJRUser=jomres_singleton_abstract::getInstance('jr_user');
		$property_ids=$thisJRUser->authorisedProperties;
		
		$property_uid = (int)jomresGetParam($_REQUEST,'property_uid',0);
		
		$result = $MiniComponents->specificEvent('06001','super_dashboard_ajax_oldcalendar',array('property_uid'=>$property_uid,'show_date_dropdown'=>$show_date_dropdown));
		echo $result;
		}


	
	function getRetVals()
		{
		return null;
		}
	}