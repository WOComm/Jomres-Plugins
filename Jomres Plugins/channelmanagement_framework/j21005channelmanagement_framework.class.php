<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j21005channelmanagement_framework {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
			$this->retVals = array();
			
			$this->retVals[] = array ( 
				"title"	=> jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE','CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',false),
				"description"	=> jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC','CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC',false),
				"task"	=> "channelmanagement_framework_resource_sanity_checks"
				);
			
			$this->retVals[] = array ( 
				"title"	=> jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',false),
				"description"	=> jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC',false),
				"task"	=> "channelmanagement_framework_resource_mapping_choose_channel"
				);
			

				
				
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
