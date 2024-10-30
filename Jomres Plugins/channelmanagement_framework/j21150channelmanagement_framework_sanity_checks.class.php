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

class j21150channelmanagement_framework_sanity_checks
{
	function __construct($componentArgs) {
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$channel_sanity_checks_errors = get_showtime('channel_sanity_checks_errors');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		if (!isset($MiniComponents->registeredClasses['00005']['extras'])) {
			 jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', 'CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', false);
		}
		
		
		
		set_showtime('channel_sanity_checks_errors' , $channel_sanity_checks_errors );
	}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
