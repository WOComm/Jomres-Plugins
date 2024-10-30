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

class j16000save_subscription {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;

		$id							= (int)jomresGetParam( $_POST, 'id', 0 );
		$cms_user_id				= (int)jomresGetParam( $_POST, 'cms_user_id', 0 );
		$package_id					= (int)jomresGetParam( $_POST, 'package_id', 0 );
		$raised_date				= str_replace('/','-',jomresGetParam( $_POST, 'raised_date', '' ));
		$expiration_date			= str_replace('/','-',jomresGetParam( $_POST, 'expiration_date', '' ));
		
		$subscription_status		= (int)jomresGetParam( $_POST, 'subscription_status', 0 );
		//if the expiration date is in the past, we`ll override the status and set it to 0: not active
		if (strtotime($expiration_date) <= strtotime(date('Y-m-d')))
			$subscription_status = 0;
			
		$invoice_id 				= (int)jomresGetParam( $_POST, 'invoice_id', 0 );

		//invoice status values are as follows
		//0 unpaid
		//1 paid
		//2 cancelled
		//3 pending
		$invoice_status				= (int)jomresGetParam( $_POST, 'invoice_status', 3 );
		
		if ( $raised_date != '')
			$raised_date = date('Y-m-d H:i:s', strtotime($raised_date));
		else
			$raised_date = date('Y-m-d H:i:s');
			
		if ( $expiration_date != '')
			$expiration_date = date('Y-m-d H:i:s', strtotime($expiration_date));
		else
			$expiration_date = date('Y-m-d H:i:s');
			

		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		
		jr_import('jrportal_invoice');
		$jrportal_invoice = new jrportal_invoice();
		
		//some checks
		if ($id > 0)
			{
			$jrportal_subscriptions->subscription['id'] = $id;
			if ($jrportal_subscriptions->getSubscription() === false)
				{
				$jrportal_subscriptions->subscription['id'] = 0;
				$id = 0;
				}
			}
		
		if ($invoice_id > 0)
			{
			$jrportal_invoice->id = $invoice_id;
			if ($jrportal_invoice->getInvoice() === false)
				{
				$jrportal_invoice->id = 0;
				$invoice_id = 0;
				}
			}
		
		if ($package_id > 0)
			{
			$jrportal_subscriptions->package['id'] = $package_id;
			if ($jrportal_subscriptions->getSubscriptionPackage() === false)
				{
				$jrportal_subscriptions->package['id'] = 0;
				$package_id = 0;
				}
			}
		
		//if there`s no subscription package selected or the package id is not available, we can`t continue. 
		if ($package_id == 0)
			{
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=edit_subscription&id=".$id),"");
			}
		
		//if the cms_user_id is 0, we can`t continue. 
		if ($cms_user_id == 0)
			{
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=edit_subscription&id=".$id),"");
			}
		
		//set the price depending if it includes tax or not
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
		$tax_rate = (float)$jrportal_taxrate->taxrates[ $jrportal_subscriptions->package['tax_code_id'] ][ 'rate' ];
		
		if ((int)$jrConfig[ 'subscriptionPackagePriceIncludesTax' ] == 1)
			{
			$divisor = ( $tax_rate / 100 ) + 1;
			$price = $jrportal_subscriptions->package['full_amount'] / $divisor ;
			}
		else
			$price = $jrportal_subscriptions->package['full_amount'];
		
		//subscription
		$jrportal_subscriptions->subscription['id']			 			= $id;
		$jrportal_subscriptions->subscription['cms_user_id'] 			= $cms_user_id;
		$jrportal_subscriptions->subscription['package_id'] 			= $package_id;
		$jrportal_subscriptions->subscription['raised_date'] 			= $raised_date;
		$jrportal_subscriptions->subscription['expiration_date'] 		= $expiration_date;
		$jrportal_subscriptions->subscription['status'] 				= $subscription_status;
		$jrportal_subscriptions->subscription['invoice_id'] 			= $invoice_id;
		
		if ($id > 0)
			$jrportal_subscriptions->commitUpdateSubscription();
		else
			$jrportal_subscriptions->commitSubscription();

		//invoice
		$invoice_data = array();
		$invoice_data['id'] 				= $invoice_id;
		$invoice_data['cms_user_id'] 		= $cms_user_id;
		$invoice_data['currencycode'] 		= $jrportal_subscriptions->package['currencycode'];
		$invoice_data['subscription']		= 1;
		$invoice_data['subscription_id'] 	= $jrportal_subscriptions->subscription['id'];
		$invoice_data['status']			 	= 3; //pending at first, we`ll update the status later
		
		$line_items = array();
		$line_item_data = array(
							  'tax_code_id'=> $jrportal_subscriptions->package['tax_code_id'],
							  'name'=> '_JRPORTAL_INVOICES_SUBSCRIPTION',
							  'description'=> '('.$jrportal_subscriptions->package['name'].')',
							  'init_price'=> $price,
							  'init_qty'=> 1,
							  'init_discount'=> 0
							  );
		$line_items[] = $line_item_data;
		
		if ($invoice_id > 0)
			{
			if (
				$cms_user_id != $jrportal_subscriptions->subscription['cms_user_id'] ||
				$package_id != $jrportal_subscriptions->subscription['package_id'] ||
				$raised_date != $jrportal_subscriptions->subscription['raised_date'] ||
				$expiration_date != $jrportal_subscriptions->subscription['expiration_date'] || 
				$jrportal_subscriptions->package['currencycode'] != $jrportal_invoice->currencycode 
				)
				{
				$jrportal_invoice->update_invoice($invoice_data, $line_items);
				}
			}
		else
			{
			$jrportal_invoice->create_new_invoice($invoice_data, $line_items);
			
			$jrportal_subscriptions->subscription['invoice_id'] = $jrportal_invoice->id;
			$jrportal_subscriptions->commitUpdateSubscription();
			}
		
		if ($invoice_status != $jrportal_invoice->status)
			{
			switch($invoice_status) 
				{
				case 0:
					$jrportal_invoice->mark_invoice_unpaid();
					break;
				case 1:
					$jrportal_invoice->mark_invoice_paid();
					break;
				case 2:
					$jrportal_invoice->mark_invoice_cancelled();
					break;
				case 3:
					$jrportal_invoice->mark_invoice_pending();
					break;
				}
			}

		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscriptions"),"");
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
