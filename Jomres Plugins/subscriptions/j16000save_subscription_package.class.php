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

class j16000save_subscription_package {
	function __construct()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents = jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
		{
			$this->template_touchable = false;

			return;
		}

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig   = $siteConfig->get();

		if ((int) $jrConfig['useSubscriptions'] != 1)
			return;

		$id            = (int) jomresGetParam($_POST, 'id', 0);
		$published     = (int) jomresGetParam($_POST, 'published', 0);
		$name          = (string) jomresGetParam($_POST, 'name', "");
		$description   = (string) jomresGetParam($_POST, 'description', "");
		$frequency     = (int) jomresGetParam($_POST, 'frequency', 0);
		$full_amount   = convert_entered_price_into_safe_float(jomresGetParam($_POST, 'full_amount', 0.00));
		$tax_code_id   = (int) jomresGetParam($_POST, 'taxrate', 0);
		$currencycode  = (string) jomresGetParam($_POST, 'currencycode', "GBP");
		$renewal_price = convert_entered_price_into_safe_float(jomresGetParam($_POST, 'renewal_price', 0.00));

		$params = array();

		//TODO security concern when getting the param name
		foreach ($_POST as $k => $v)
		{
			if (strpos($k, 'subscriptions_') !== false)
			{
				$value      = (int) jomresGetParam($_POST, $k, 0);
				$params[$k] = $value;
			}
		}

		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();

		if ($id > 0)
		{
			$jrportal_subscriptions->package['id'] = $id;
			$jrportal_subscriptions->getSubscriptionPackage();
		}

		$jrportal_subscriptions->package['name']          = $name;
		$jrportal_subscriptions->package['description']   = $description;
		$jrportal_subscriptions->package['published']     = $published;
		$jrportal_subscriptions->package['frequency']     = $frequency;
		$jrportal_subscriptions->package['full_amount']   = $full_amount;
		$jrportal_subscriptions->package['tax_code_id']   = $tax_code_id;
		$jrportal_subscriptions->package['currencycode']  = $currencycode;
		$jrportal_subscriptions->package['renewal_price'] = $renewal_price;
		$jrportal_subscriptions->package['params']        = $params;


		$settingArray = get_site_stripe_standard_gateway_settings();

		if ($settingArray["test_mode"] == '1'){
			$secret_key = $settingArray["test_secret_key"];
		}
		else{
			$secret_key = $settingArray["live_secret_key"];
		}
		$stripe = new \Stripe\StripeClient($secret_key);

/*		$product_name = str_replace(" " , "" ,$name).'_'.$id;
		$stripe_product_id = '';
		// Let's check to see if the product exists, if it doesn't, we'll reset the id to 0 and create a new product
		if ($id > 0) {
			$products = $stripe->products->all(['limit' => 3]);
			if (isset($products->data) && count($products->data) > 0) {
				foreach ($products->data as $product) {
					if ($product["name"] == $product_name) {
						$stripe_product_id = $product["id"];
					}
				}
			}
		}*/

		if ($id > 0 ) {
			$jrportal_subscriptions->commitUpdateSubscriptionPackage();
			$query = "SELECT stripe_product_id FROM #__jomresportal_subscriptions_packages WHERE `id` = ".$id;
			$stripe_product_id =doSelectSql($query,1);

			$query = "SELECT stripe_price_id FROM #__jomresportal_subscriptions_packages WHERE `id` = ".$id;
			$old_stripe_price_id =doSelectSql($query,1);

			if ($full_amount >0){
				$stripe->prices->update($old_stripe_price_id,
					['active' => false]
				);

				$stripe_reply =$stripe->prices->create([
					'unit_amount' => (string)$full_amount * 100,
					'currency' => strtolower($currencycode),
					'recurring' => ['interval' => 'month'],
					'product' => $stripe_product_id,
				]);


				$query = "UPDATE #__jomresportal_subscriptions_packages SET `stripe_price_id` = '".$stripe_reply->id."' WHERE `id` = ".$id;
				doInsertSql($query, '');
			}

			}
		else {
				$jrportal_subscriptions->commitSubscriptionPackage();
				$id = $jrportal_subscriptions->package['id'];
				if ($full_amount >0) {
					$response = $stripe->products->create([
						'name' => str_replace(" " , "" ,$name).'_'.$id,
					]);

					$stripe_reply = $stripe->prices->create([
						'unit_amount' => (string)$full_amount * 100,
						'currency' => strtolower($currencycode),
						'recurring' => ['interval' => 'month'],
						'product' => $response->id,
					]);

					$query = "UPDATE #__jomresportal_subscriptions_packages SET stripe_product_id = '". $response->id."' , `stripe_price_id` = '".$stripe_reply->id."' WHERE `id` = ".$id;
					doInsertSql($query, '');
			}
		}


		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscription_packages"),"");
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
