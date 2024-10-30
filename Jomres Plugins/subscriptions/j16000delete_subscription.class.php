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

class j16000delete_subscription {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$id	= (int)jomresGetParam( $_REQUEST, 'id', 0 );
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		
		jr_import( 'jrportal_invoice' );
		$jrportal_invoice = new jrportal_invoice();
		
		if ($id > 0)
			{
			$jrportal_subscriptions->subscription['id'] = $id;
			$jrportal_subscriptions->getSubscription();
			
			$invoice_id = $jrportal_subscriptions->subscription['invoice_id'];

			//delete subscription
			if ($jrportal_subscriptions->deleteSubscription())
				{
				//cancel invoice
				$jrportal_invoice->id = $invoice_id;
				$jrportal_invoice->getInvoice();
				$jrportal_invoice->mark_invoice_cancelled();
				
				jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscriptions"),"");
				exit;
				}
			else
				echo "Error, couldn't delete subscription.";
			}
		else
			echo "Error, couldn't delete subscription, ID not found.";
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
