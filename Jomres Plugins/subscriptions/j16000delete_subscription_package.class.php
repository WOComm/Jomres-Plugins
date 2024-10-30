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

class j16000delete_subscription_package {
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
		
		if ($id > 0)
			{

			$jrportal_subscriptions->package['id'] = $id;
			$jrportal_subscriptions->getSubscriptionPackage();
			$renewal_package_id = (int)$jrportal_subscriptions->package['renewal_package_id'];

			$settingArray =	get_site_stripe_standard_gateway_settings();

			if ($settingArray["test_mode"] == '1') {
				$secret_key = $settingArray["test_secret_key"];
			} else {
				$secret_key = $settingArray["live_secret_key"];
			}
			$stripe = new \Stripe\StripeClient($secret_key);

			try {
				$query = "SELECT `stripe_product_id` FROM #__jomresportal_subscriptions_packages WHERE `id` = ".$id;
				$stripe_product_id =doSelectSql($query,1);
				$query = "SELECT stripe_price_id FROM #__jomresportal_subscriptions_packages WHERE `id` = ".$id;
				$old_stripe_price_id =doSelectSql($query,1);

				$stripe->prices->update($old_stripe_price_id,
					['active' => false]
				);

				$result = $stripe->products->update(
					$stripe_product_id,
					['active' => false]
				);
			} catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}

			if ($jrportal_subscriptions->subscriptionPackageIsUsed() === false )
				{
				if ($jrportal_subscriptions->deleteSubscriptionPackage())
					{
					if ( $renewal_package_id == 0 )
						jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscription_packages" ),"");
					else
						jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscription_renewal_packages" ),"");
					}
				else
					echo "Error, couldn't delete package.";
				}
			else
				{
				echo "Error, package is already in use so can`t be deleted. Please unpublish it instead.";
				
				if ( $renewal_package_id == 0 )
					jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscription_packages" ),"");
				else
					jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscription_renewal_packages" ),"");
				}
			}
		else
			echo "Error, couldn't delete package, ID not found.";
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
