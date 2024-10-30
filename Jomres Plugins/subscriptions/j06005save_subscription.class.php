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

class j06005save_subscription
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );

		$package_id = (int) jomresGetParam( $_REQUEST, 'package_id', 0 );
		
		//some checks
		if ( $package_id == 0 )
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		if (
			$thisJRUser->firstname == "" &&
			$thisJRUser->surname == "" &&
			$thisJRUser->house == "" &&
			$thisJRUser->street == "" &&
			$thisJRUser->town == "" &&
			$thisJRUser->postcode == "" &&
			$thisJRUser->country == "" &&
			$thisJRUser->email == ""
			)
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=subscribe&id=" . $package_id ), "" );
			exit;
			}

		if (!isset($thisJRUser->params['subscription_system_stripe_customer_id'])) {
			throw new exception ("Stripe customer id not set");
		}
		$stripe_cus_id = $thisJRUser->params['subscription_system_stripe_customer_id'];
		if (trim($stripe_cus_id) == '' ) {
			throw new exception ("Stripe customer id blank");
		}

		//get subscription package details
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		$jrportal_subscriptions->package['id'] = $package_id;

		if ( !$jrportal_subscriptions->getSubscriptionPackage() ){
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		// Now we need to check and see if this is a freebie package (costs 0). If so, we then need to see if the subscriber is already subscribed to it.
		$subscribing_to_freebie = false;
		if ($jrportal_subscriptions->package['full_amount'] == 0.00)
			$subscribing_to_freebie = true;

		//get this user existing subscriptions
		$jrportal_subscriptions->getSubscriptionsForCmsUserId( $thisJRUser->id );

		jr_import('jrportal_invoice');
		if ( !empty($jrportal_subscriptions->userSubscriptions) ) {
			foreach ( $jrportal_subscriptions->userSubscriptions as $sub ) {
/*				if ( $package_id == $sub->package_id ){ //user is already subscribed to this package, no matter if it`s free or not, so we`ll recommend renewals instead.
					$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
					$jomres_messaging->set_message( jr_gettext( '_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', '_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', false ) );
					jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
					exit;
					}*/
				// User is already subscribed to a package so we will cancel the old sub before subscribing them to the new one
				if ( $package_id != $sub->package_id )	{
					jr_import('jrportal_subscriptions');
					$jrportal_subscriptions                     = new jrportal_subscriptions();
					$jrportal_subscriptions->subscription['id'] = $sub->id;
					$invoice_id                                 = $jrportal_subscriptions->subscription['invoice_id'];

					//delete subscription
					$jrportal_subscriptions->deleteSubscription();

					//cancel invoice

					$jrportal_invoice     = new jrportal_invoice();
					$jrportal_invoice->id = $invoice_id;
					$jrportal_invoice->getInvoice();
					$jrportal_invoice->mark_invoice_cancelled();
					}
				}
			}

		//set the new subscription details
		$jrportal_subscriptions                     = new jrportal_subscriptions();
		$jrportal_subscriptions->package['id'] = $package_id;
		$jrportal_subscriptions->getSubscriptionPackage();

		$jrportal_subscriptions->subscription['cms_user_id']    = $thisJRUser->id;
		$jrportal_subscriptions->subscription['package_id']     = $package_id;
		$jrportal_subscriptions->subscription['raised_date'] 	= date("Y-m-d H:i:s");
		$jrportal_subscriptions->subscription['expiration_date']= date("Y-m-d H:i:s", strtotime("+" . (string)$jrportal_subscriptions->package['frequency'] . " days"));
		$jrportal_subscriptions->subscription['status']         = 0;

		//commit the new subscription
		$jrportal_subscriptions->commitSubscription();

		$settingArray = get_site_stripe_standard_gateway_settings();

		if ($settingArray["test_mode"] == '1'){
			$secret_key = $settingArray["test_secret_key"];
		}
		else{
			$secret_key = $settingArray["live_secret_key"];
		}
		$stripe = new \Stripe\StripeClient($secret_key);


		//set the new invoice details
		unset($jrportal_invoice);	// Let's make doubly sure
		$jrportal_invoice     = new jrportal_invoice();
		
		$invoice_data = array();
		$invoice_data['cms_user_id'] 		= $thisJRUser->id;
		$invoice_data['currencycode'] 		= $jrportal_subscriptions->package['currencycode'];
		$invoice_data['subscription']		= 1;
		$invoice_data['subscription_id'] 	= $jrportal_subscriptions->subscription['id'];
		$invoice_data['status']			 	= 3; //pending
		
		//set the price depending if it includes tax or not
		$tax_rate = (float)$jrportal_taxrate->taxrates[ $jrportal_subscriptions->package['tax_code_id'] ][ 'rate' ];
		
		if ((int)$jrConfig[ 'subscriptionPackagePriceIncludesTax' ] == 1) {
			$divisor = ( $tax_rate / 100 ) + 1;
			$price = $jrportal_subscriptions->package['full_amount'] / $divisor ;
			}
		else {
			$price = $jrportal_subscriptions->package['full_amount'];
		}


		$line_items = array();
		$line_item_data = array ( 
								 'tax_code_id' => $jrportal_subscriptions->package['tax_code_id'], 
								 'name' => '_JRPORTAL_INVOICES_SUBSCRIPTION', 
								 'description' => '('.$jrportal_subscriptions->package['name'].')', 
								 'init_price' => $price, 
								 'init_qty' => 1, 
								 'init_discount' => 0
								 );
		$line_items[] = $line_item_data;

		$jrportal_invoice->create_new_invoice( $invoice_data, $line_items );

		//update the subscription with the new invoice id
		$jrportal_subscriptions->subscription['invoice_id'] = $jrportal_invoice->id;

		if ($subscribing_to_freebie) {
			$jrportal_subscriptions->subscription['status'] = 1;
			$jrportal_invoice->mark_invoice_paid();
		}
		
		//update the subscription with the new invoice id and status (if changed)
		$jrportal_subscriptions->commitUpdateSubscription();

		if (!$subscribing_to_freebie) {
			if ($stripe_cus_id != '') {
				//create the subscription
				$jrportal_subscriptions->getSubscriptionPackage();
				$query = "SELECT `stripe_price_id` FROM #__jomresportal_subscriptions_packages WHERE `id` = ".$package_id." LIMIT 1";
				$stripe_price_id =doSelectSql($query,1);
				$subscription = $stripe->subscriptions->create([
					'customer' => $stripe_cus_id,
					'payment_behavior' => 'default_incomplete',
					'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
					'expand' => ['latest_invoice.payment_intent'],
					'items' => [
						['price' => $stripe_price_id],
					],
				]);

				if (isset($subscription->id) && isset($subscription->latest_invoice["payment_intent"]->id) ) {
					$query = "UPDATE #__jomresportal_subscriptions SET stripe_sub_id = '".$subscription->id."' , stripe_cus_id = '".$stripe_cus_id."' WHERE cms_user_id = ".(int)$thisJRUser->id;
					doInsertSql($query, '');
					jomresRedirect( jomresURL(
						JOMRES_SITEPAGE_URL . "&task=stripe_subscription_form&package_id=".$package_id.'&payment_intent='.$subscription->latest_invoice["payment_intent"]->id.'&client_secret='.($subscription->latest_invoice["payment_intent"]->client_secret), ""
					));
					exit;
				}
			}
		}
		else {
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}