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

class j00001channelmanagement_framework {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		if (!defined('JOMRES_API_CMS_ROOT') ) {
			jr_import('channelmanagement_framework_utilities');
			jr_import('channelmanagement_framework_properties');
			jr_import('channelmanagement_framework_singleton'); 
		}
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
