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

class j16000edit_subscription_gateway_settings {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');

		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();


		$settingArray =	get_site_stripe_standard_gateway_settings();

			$yesno = array();
			$yesno[] = jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',FALSE) );
			$yesno[] = jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',FALSE) );

			$output = [];


			$output['LOGO'] = JOMRES_IMAGES_RELPATH."j00510stripe_standard.png";

			$output['JR_GATEWAY_CONFIG_ACTIVE']	= jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_ACTIVE'.$plugin,"Active");
			$output['ACTIVE']					= jomresHTML::selectList( $yesno, 'active', '', 'value', 'text', $settingArray['active'] );

			$output['TEST_PUBLISHABLE_KEY']		= $settingArray['test_publishable_key'];
			$output['TEST_SECRET_KEY']			= $settingArray['test_secret_key'];
			$output['LIVE_PUBLISHABLE_KEY']		= $settingArray['live_publishable_key'];
			$output['LIVE_SECRET_KEY']			= $settingArray['live_secret_key'];

			$output['LIVE_SIGNING_SECRET']			= $settingArray['live_signing_secret'];
			$output['TEST_SIGNING_SECRET']			= $settingArray['test_signing_secret'];

			$output['TEST_MODE']				= jomresHTML::selectList( $yesno, 'test_mode', '', 'value', 'text', $settingArray['test_mode']);

			$output['STRIPE_STANDARD_TITLE']					= jr_gettext('STRIPE_STANDARD_TITLE','STRIPE_STANDARD_TITLE');
			$output['STRIPE_STANDARD_MARKETING']				= jr_gettext('STRIPE_STANDARD_MARKETING','STRIPE_STANDARD_MARKETING');
			$output['STRIPE_STANDARD_API_TOKEN_DESC']		= jr_gettext('STRIPE_STANDARD_API_TOKEN_DESC','STRIPE_STANDARD_API_TOKEN_DESC');

			$output['STRIPE_STANDARD_API_TEST_MODE']	= jr_gettext('STRIPE_STANDARD_API_TEST_MODE','STRIPE_STANDARD_API_TEST_MODE');
			$output['STRIPE_STANDARD_API_TEST_MODE_DESC']		= jr_gettext('STRIPE_STANDARD_API_TEST_MODE_DESC','STRIPE_STANDARD_API_TEST_MODE_DESC');

			$output['STRIPE_STANDARD_API_LIVE_PUBLISHABLE_KEY_TITLE']			= jr_gettext('STRIPE_STANDARD_API_LIVE_PUBLISHABLE_KEY_TITLE','STRIPE_STANDARD_API_LIVE_PUBLISHABLE_KEY_TITLE');
			$output['STRIPE_STANDARD_API_LIVE_SECRET_KEY_TITLE']	= jr_gettext('STRIPE_STANDARD_API_LIVE_SECRET_KEY_TITLE','STRIPE_STANDARD_API_LIVE_SECRET_KEY_TITLE');
			$output['STRIPE_STANDARD_API_TEST_PUBLISHABLE_KEY_TITLE']			= jr_gettext('STRIPE_STANDARD_API_TEST_PUBLISHABLE_KEY_TITLE','STRIPE_STANDARD_API_TEST_PUBLISHABLE_KEY_TITLE');
			$output['STRIPE_STANDARD_API_TEST_SECRET_KEY_TITLE']	= jr_gettext('STRIPE_STANDARD_API_TEST_SECRET_KEY_TITLE','STRIPE_STANDARD_API_TEST_SECRET_KEY_TITLE');

			$output['COMMON_SUBMIT']				= jr_gettext('COMMON_SUBMIT','COMMON_SUBMIT');
			$output['GATEWAY']						= 'stripe_standard';

			$output['WEBHOOK_URL'] = JOMRES_SITEPAGE_URL_AJAX.'&task=stripe_standard_subscriptions_callback';
			$output['STRIPE_STANDARD_WEBHOOK_URL']	= jr_gettext('STRIPE_STANDARD_WEBHOOK_URL','STRIPE_STANDARD_WEBHOOK_URL');
			$output['STRIPE_STANDARD_WEBHOOK_URL_DESC']	= jr_gettext('STRIPE_STANDARD_WEBHOOK_URL_DESC','STRIPE_STANDARD_WEBHOOK_URL_DESC');


			$output['STRIPE_STANDARD_WEBHOOK_LIVE_SIGNING_SECRET']	= jr_gettext('STRIPE_STANDARD_WEBHOOK_LIVE_SIGNING_SECRET','STRIPE_STANDARD_WEBHOOK_LIVE_SIGNING_SECRET');
			$output['STRIPE_STANDARD_WEBHOOK_TEST_SIGNING_SECRET']	= jr_gettext('STRIPE_STANDARD_WEBHOOK_TEST_SIGNING_SECRET','STRIPE_STANDARD_WEBHOOK_TEST_SIGNING_SECRET');
			$output['STRIPE_STANDARD_WEBHOOK_SIGNING_SECRET_DESC']	= jr_gettext('STRIPE_STANDARD_WEBHOOK_SIGNING_SECRET_DESC','STRIPE_STANDARD_WEBHOOK_SIGNING_SECRET_DESC');


			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'edit_subscription_gateway_settings.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
