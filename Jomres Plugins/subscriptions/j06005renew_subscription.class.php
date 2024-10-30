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

class j06005renew_subscription
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

		$package_id = (int) jomresGetParam( $_REQUEST, 'id', 0 );
		
		$today = date("Y-m-d H:i:s");
		
		//check if package id is set
		if ( $package_id == 0 )
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		//check if account details are still available for this user
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
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=edit_my_account" ), "" );
			exit;
			}

		//get the current subscription package details
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		$jrportal_subscriptions->package['id'] = $package_id;

		if ( !$jrportal_subscriptions->getSubscriptionPackage() )
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}
		
		//check if the subscription package is still published, otherwise don`t allow renewals
		if ($jrportal_subscriptions->package['published'] == 0)
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED', '_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		// Now we need to check and see if this is a freebie package (costs 0). If so, don`t allow renewals
		if ($jrportal_subscriptions->package['full_amount'] == 0.00)
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_ALREADYSUBSCRIBEDTOFREEBIE', '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_ALREADYSUBSCRIBEDTOFREEBIE', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		//get this user existing subscriptions
		$jrportal_subscriptions->getSubscriptionsForCmsUserId( $thisJRUser->id );

		//check if the user is really subscribed to this package id and get the highest expiration date from his subscription package and all renewals
		$user_is_subscribed = false;
		$renewal_raised_date = $today;
		
		if ( !empty($jrportal_subscriptions->userSubscriptions) )
			{
			foreach ( $jrportal_subscriptions->userSubscriptions as $sub )
				{
				if ( $package_id == $sub->package_id ) //user is already subscribed to this package.
					{
					$user_is_subscribed = true;
					}
				
				if ( strtotime($sub->expiration_date) > strtotime($renewal_raised_date) )
					$renewal_raised_date = $sub->expiration_date;
				}
			}

		if ($user_is_subscribed === false)
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID', '_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		//check if there`s a renewal price
		if ($jrportal_subscriptions->package['renewal_price'] == 0.00)
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED', '_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		//now we have the package details, let`s set the new subscription renewal details
		$jrportal_subscriptions->subscription['cms_user_id']    = $thisJRUser->id;
		$jrportal_subscriptions->subscription['package_id']     = $package_id;
		$jrportal_subscriptions->subscription['raised_date'] 	= $renewal_raised_date;
		$jrportal_subscriptions->subscription['expiration_date']= date("Y-m-d H:i:s", strtotime($renewal_raised_date . " +" . (string)$jrportal_subscriptions->package['frequency'] . " days"));
		$jrportal_subscriptions->subscription['status']         = 0;

		//commit the new subscription renewal
		$jrportal_subscriptions->commitSubscription();

		//set the new invoice details
		jr_import( 'jrportal_invoice' );
		$jrportal_invoice = new jrportal_invoice();
		
		$invoice_data = array();
		$invoice_data['cms_user_id'] 		= $thisJRUser->id;
		$invoice_data['currencycode'] 		= $jrportal_subscriptions->package['currencycode'];
		$invoice_data['subscription']		= 1;
		$invoice_data['subscription_id'] 	= $jrportal_subscriptions->subscription['id'];
		$invoice_data['status']			 	= 3; //pending
		
		//set the price depending if it includes tax or not
		$tax_rate = (float)$jrportal_taxrate->taxrates[ $jrportal_subscriptions->package['tax_code_id'] ][ 'rate' ];
		
		if ((int)$jrConfig[ 'subscriptionPackagePriceIncludesTax' ] == 1)
			{
			$divisor = ( $tax_rate / 100 ) + 1;
			$price = $jrportal_subscriptions->package['renewal_price'] / $divisor ;
			}
		else
			$price = $jrportal_subscriptions->package['renewal_price'];

		$line_items = array();
		$line_item_data = array ( 
								 'tax_code_id' => $jrportal_subscriptions->package['tax_code_id'], 
								 'name' => '_SUBSCRIPTIONS_HRENEWAL', 
								 'description' => '('.$jrportal_subscriptions->package['name'].')', 
								 'init_price' => $price, 
								 'init_qty' => 1, 
								 'init_discount' => 0
								 );
		$line_items[] = $line_item_data;
			
		$jrportal_invoice->create_new_invoice( $invoice_data, $line_items );
		
		//update the subscription with the new invoice id
		$jrportal_subscriptions->subscription['invoice_id'] = $jrportal_invoice->id;
		
		//update the subscription with the new invoice id and status (if changed)
		$jrportal_subscriptions->commitUpdateSubscription();
		
		//redirect to invoice payment gateways
		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=stripe_subscription_form&invoice_id=".$jrportal_invoice->id ), "" );
		exit;
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}