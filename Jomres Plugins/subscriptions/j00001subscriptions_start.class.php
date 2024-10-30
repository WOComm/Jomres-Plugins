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

class j00001subscriptions_start
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		// Minicomponent to ensure that the get_site_stripe_standard_gateway_settings() function is available to all other minicomponents


		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

	if (!function_exists('get_site_stripe_standard_gateway_settings'))
	{
		function get_site_stripe_standard_gateway_settings()
		{
			$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig   = $siteConfig->get();

			if (!isset($jrConfig['stripe_standard'])) {
				$jrConfig['stripe_standard']['active']="0";
				$jrConfig['stripe_standard']['test_mode']="1";
				$jrConfig['stripe_standard']['test_publishable_key']="";
				$jrConfig['stripe_standard']['test_secret_key']="";
				$jrConfig['stripe_standard']['test_signing_secret']="";

				$jrConfig['stripe_standard']['live_publishable_key']="";
				$jrConfig['stripe_standard']['live_secret_key']="";
				$jrConfig['stripe_standard']['live_signing_secret']="";
				return $jrConfig['stripe_standard'];
			} else {
				return unserialize(base64_decode($jrConfig['stripe_standard']));
			}
		}
	}

	if (!function_exists('subscriptions_unpublish_all_manager_properties'))
	{
		function subscriptions_unpublish_all_manager_properties( $cms_user_id = 0 )
		{
			if ( $cms_user_id ==0) {
				throw new exception ("No cms_user_id passed to function");
			}

			jr_import( 'jomres_suspensions' );
			$jomres_suspensions = new jomres_suspensions();
			$jomres_suspensions->set_manager_id( $cms_user_id );
			$jomres_suspensions->unpublish_managers_properties();
		}
	}

	if (!function_exists('subscriptions_publish_all_manager_properties'))
	{
		function subscriptions_publish_all_manager_properties( $cms_user_id = 0 )
		{
			if ( $cms_user_id ==0) {
				throw new exception ("No cms_user_id passed to function");
			}

			jr_import( 'jomres_suspensions' );
			$jomres_suspensions = new jomres_suspensions();
			$jomres_suspensions->set_manager_id( $cms_user_id );
			$jomres_suspensions->publish_managers_properties();
		}
	}

