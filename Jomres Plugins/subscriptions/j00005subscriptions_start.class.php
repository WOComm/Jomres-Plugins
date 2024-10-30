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

class j00005subscriptions_start
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
	
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
		
		//if subscriptions are not enabled, no need to go any further
		if ( (int)$jrConfig[ 'useSubscriptions' ] == 0 )
			return;

		if ( get_showtime('task') == 'list_subscription_packages' || get_showtime('task') == 'my_subscriptions' ) {
			set_showtime('disable_sanity_checks' , true );
		}

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		
		//admin menu item
		if (jomres_cmsspecific_areweinadminarea())
			{
			$jomres_menu->add_admin_item(30, jr_gettext('_JOMRES_STATUS_SUBSCRIPTIONS', '_JOMRES_STATUS_SUBSCRIPTIONS', false), $task = 'list_subscriptions', 'fa-plus');
			$jomres_menu->add_admin_item(30, jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', false), $task = 'list_subscription_packages', 'fa-list');
			$jomres_menu->add_admin_item(30, jr_gettext('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', '_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', false), $task = 'edit_subscription_gateway_settings', 'fa-plus');
			}
		else
			{
			if ( $thisJRUser->accesslevel >= 1 && $thisJRUser->accesslevel < 90) 
				{
				$jomres_menu->add_item(10, jr_gettext('_SUBSCRIPTIONS_MY', '_SUBSCRIPTIONS_MY', false), 'my_subscriptions', 'fa-list');
				$jomres_menu->add_item(10, jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', false), 'list_subscription_packages', 'fa-list');
				}
			}

		if ( jomres_cmsspecific_areweinadminarea() && !AJAXCALL )
			{
			$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );
			
			if (empty($basic_subscription_package_details->allPackages))
				{
				$souput      = array ();
				$spageoutput = array ();
				
				$soutput[ 'SUBSCRIPTION_WARNING' ] = jr_gettext('_SUBSCRIPTION_WARNING', '_SUBSCRIPTION_WARNING', false);
	
				$spageoutput[] = $soutput;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'subscription_warning.html' );
				$tmpl->addRows( 'pageoutput', $spageoutput );
				$tmpl->displayParsedTemplate();
				}

			if (get_showtime('task') != 'edit_subscription_gateway_settings' && get_showtime('task') != 'cpanel'  && get_showtime('task') != 'rebuildregistry' && get_showtime('task') != 'save_subscription_gateway_settings' && get_showtime('task') != 'save_site_settings' ) {

				$settingArray =	get_site_stripe_standard_gateway_settings();

				if (!isset($settingArray['test_publishable_key']) || !isset($settingArray['live_publishable_key']) ) {
					jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=edit_subscription_gateway_settings"),"");
				}
			}

			}

		//apply the plugins subscription features restrictions for this cms user id
		if ( !jomres_cmsspecific_areweinadminarea() ) {
			if ( 
				($thisJRUser->userIsRegistered && !$thisJRUser->superPropertyManager && !$thisJRUser->userIsManager) || //new subscriber
				($thisJRUser->userIsManager && $thisJRUser->accesslevel > 50 && !$thisJRUser->superPropertyManager) //higher than receptionist but not super property manager
				) {
				$MiniComponents->triggerEvent( '00007' ); 
				}
			}

		$current_task = get_showtime('task');
		// All non-manager users must have a valid subscription to use the system
		if ( ($thisJRUser->userIsManager && !$thisJRUser->superPropertyManager) &&
			$current_task != 'list_subscriptions' &&
			$current_task != 'list_subscription_packages' &&
			$current_task != 'subscribe' &&
			$current_task != 'save_subscription' &&
			$current_task != 'stripe_subscription_form' &&
			$current_task != 'save_my_account' &&
			$current_task != 'edit_my_account' &&
			$current_task != 'listyourproperties' &&
			$current_task != 'listyourproperties_ajax'
		) {
			$basic_subscription_details = jomres_singleton_abstract::getInstance( 'basic_subscription_details' );
			$basic_subscription_details->gatherData($thisJRUser->id); // If a subscription isn't found, then nothing will be populated. Only subs with a status of 1 will appear here.
			if ( (int) $basic_subscription_details->subscription['id'] == 0 ) {
				jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=list_subscription_packages"),"");
			}

		}

		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
