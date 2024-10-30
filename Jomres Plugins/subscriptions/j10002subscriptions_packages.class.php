<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j10002subscriptions_packages
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$htmlFuncs =jomres_getSingleton('html_functions');
		$this->cpanelButton = '';
		if ($jrConfig['useSubscriptions']=="0")
			return;

		$this->cpanelButton=$htmlFuncs->cpanelButton(JOMRES_SITEPAGE_URL_ADMIN.'&task=list_subscription_packages', 'ViewDatabase.png',jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',FALSE) ,"/".JOMRES_ROOT_DIRECTORY."/images/jomresimages/small/",jr_gettext( "_JOMRES_CUSTOMCODE_MENUCATEGORIES_INCOME_GENERATION" , '_JOMRES_CUSTOMCODE_MENUCATEGORIES_INCOME_GENERATION' ,false,false));
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->cpanelButton;
		}	
	}
