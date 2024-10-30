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

class j16000save_subscription_gateway_settings {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$settingArray = array();

		$settingArray['active'] = (int)jomresGetParam($_POST, 'active', 0);

		$settingArray['test_mode'] = (int)jomresGetParam($_POST, 'test_mode', 0);
		$settingArray['live_publishable_key'] = jomresGetParam($_POST, 'live_publishable_key', '');
		$settingArray['live_secret_key'] = jomresGetParam($_POST, 'live_secret_key', '');
		$settingArray['live_signing_secret'] = jomresGetParam($_POST, 'live_signing_secret', '');

		$settingArray['test_publishable_key'] = jomresGetParam($_POST, 'test_publishable_key', '');
		$settingArray['test_secret_key'] = jomresGetParam($_POST, 'test_secret_key', '');
		$settingArray['test_signing_secret'] = jomresGetParam($_POST, 'test_signing_secret', '');

		$settingArray = base64_encode(serialize($settingArray));

		saveSiteConfig(array('stripe_standard' => $settingArray));

		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=edit_subscription_gateway_settings"),"");

		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
