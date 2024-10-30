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

class j00010reception_option_13_cleaning_schedule {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$property_uid=getDefaultProperty();
		$mrConfig=getPropertySpecificSettings($property_uid);
		$this->cpanelButton = '';
		
		if ($mrConfig['is_real_estate_listing']==1 || get_showtime('is_jintour_property' ))
			return;
		
		$this->cpanelButton=jomres_mainmenu_option(JOMRES_SITEPAGE_URL."&task=cleaning_schedule", 'cleaning_schedule.png', jr_gettext('_JOMRES_CLEANING_SCHEDULE','_JOMRES_CLEANING_SCHEDULE',false,false),null,jr_gettext( "_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_MISC" ,'_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_MISC' ,false,false) );
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->cpanelButton;
		}
	}
