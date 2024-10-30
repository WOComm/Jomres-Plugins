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

class j06005stripe_subscription_form
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) {
			$this->template_touchable = false;
			return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');

		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );

		if (!isset($thisJRUser->params['subscription_system_stripe_customer_id'])) {
			throw new exception ("Stripe customer id not set");
		}
		$stripe_cus_id = $thisJRUser->params['subscription_system_stripe_customer_id'];
		if (trim($stripe_cus_id) == '' ) {
			throw new exception ("Stripe customer id blank");
		}

		$profile_check_pass = false;

		if ( $thisJRUser->profile_id > 0 ) {
			if (
				$thisJRUser->firstname != "" &&
				$thisJRUser->surname != "" &&
				$thisJRUser->house != "" &&
				$thisJRUser->street != "" &&
				$thisJRUser->town != "" &&
				$thisJRUser->postcode != "" &&
				$thisJRUser->country != "" &&
				$thisJRUser->email != ""
				)
				$profile_check_pass = true;
			}


		if (!$profile_check_pass) {
			echo '<div class="alert alert-warning">'.jr_gettext( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', false ).'</div>';

			
			$componentArgs = array();
			$componentArgs['return_url'] = jr_base64url_encode(jomresURL( JOMRES_SITEPAGE_URL . "&task=save_subscription&package_id=".(int) jomresGetParam( $_REQUEST, 'id', 0 )));
			$MiniComponents->specificEvent( '06005', 'edit_my_account', $componentArgs );
			}
		else {
			if (isset($_REQUEST['invoice_id'])) {
				$query = "SELECT package_id FROM #__jomresportal_subscriptions WHERE invoice_id = ".(int)$_REQUEST['invoice_id'];
				$package_id = doSelectSql($query,1);
			}
			else {
				$package_id = jomresGetParam($_REQUEST , 'package_id' , 0);
			}
			$payment_intent_id = jomresGetParam($_REQUEST , 'payment_intent' , '');
			$client_secret = jomresGetParam($_REQUEST , 'client_secret' , '');

			if ($package_id == 0) {
				throw new Exception("Package id not set");
			}

			$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );
			$basic_subscription_package_details->gatherData($package_id);
			if (!isset($basic_subscription_package_details->id)) {
				throw new Exception("Invalid package id");
			}

			$settingArray = get_site_stripe_standard_gateway_settings();
			if ($settingArray["test_mode"] == '1') {
				$public_key = $settingArray["test_publishable_key"];
				}
			else {
				$public_key = $settingArray["live_publishable_key"];
				}

			$basic_subscription_details = jomres_singleton_abstract::getInstance( 'basic_subscription_details' );
			$basic_subscription_details->gatherData($thisJRUser->id);

			$query = "SELECT `stripe_sub_id` FROM #__jomresportal_subscriptions WHERE `cms_user_id` = ".(int)$thisJRUser->id;
			$stripe_sub_id =doSelectSql($query,1);

			if ($settingArray["test_mode"] == '1') {
				echo "<p class='alert alert-warning'>".jr_gettext('_JOMRES_COM_A_GATEWAYLIST_TEST_MODE_STR', '_JOMRES_COM_A_GATEWAYLIST_TEST_MODE_STR', false)."</p>";
			}


			if ($stripe_sub_id != '') {
				$query = "UPDATE #__jomresportal_subscriptions SET payment_intent_id = '".$payment_intent_id."' WHERE cms_user_id = ".(int)$thisJRUser->id;
				doInsertSql($query, '');

				$pageoutput[] = [
					"PUBLIC_KEY" => $public_key ,
					"CLIENT_SECRET" => $client_secret,
					"PRICE" => output_price($basic_subscription_package_details->full_amount, $basic_subscription_package_details->currencycode , true , true , false),
					"PACKAGE_NAME" => $basic_subscription_package_details->name,
					"RETURN_URL" => JOMRES_SITEPAGE_URL_NOSEF.'&task=my_subscriptions',
				];

				$tmpl          = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'stripe_subscription_form.html' );
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->displayParsedTemplate();
				}
			}
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}