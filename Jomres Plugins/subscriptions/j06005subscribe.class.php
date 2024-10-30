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

class j06005subscribe
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) {
			$this->template_touchable = false;
			return;
			}

		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;


		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );

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
			$componentArgs['return_url'] = jr_base64url_encode(jomresURL( JOMRES_SITEPAGE_URL . "&task=subscribe&id=".(int) jomresGetParam( $_REQUEST, 'id', 0 )));
			$MiniComponents->specificEvent( '06005', 'edit_my_account', $componentArgs );
			}
		else {
			$settingArray = get_site_stripe_standard_gateway_settings();

			if ($settingArray["test_mode"] == '1'){
				$secret_key = $settingArray["test_secret_key"];
			}
			else{
				$secret_key = $settingArray["live_secret_key"];
			}
			$stripe = new \Stripe\StripeClient($secret_key);

			if (!isset($thisJRUser->params['subscription_system_stripe_customer_id']) && $thisJRUser->id > 0 ) {
				jr_import('jomres_encryption');
				$jomres_encryption = new jomres_encryption();

				$query = 'SELECT enc_firstname,enc_surname,enc_house,enc_street,enc_town,enc_county,enc_country,enc_postcode,enc_tel_landline,enc_tel_mobile,enc_email FROM #__jomres_guest_profile WHERE cms_user_id = '.(int) $thisJRUser->id.' LIMIT 1';
				$managerData = doSelectSql($query);
				$data = $managerData[0];

				$firstname = $jomres_encryption->decrypt($data->enc_firstname);
				$surname = $jomres_encryption->decrypt($data->enc_surname);
				$house = $jomres_encryption->decrypt($data->enc_house);
				$street = $jomres_encryption->decrypt($data->enc_street);
				$town = $jomres_encryption->decrypt($data->enc_town);
				if (is_numeric($jomres_encryption->decrypt($data->enc_county))) {
					$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
					$region = jr_gettext('_JOMRES_CUSTOMTEXT_REGIONS_'.$data->enc_county, $jomres_regions->get_region_name($jomres_encryption->decrypt($data->enc_county)), false, false);
				} else {
					$region = jr_gettext('_JOMRES_CUSTOMTEXT_PROPERTY_REGION'.$jomres_encryption->decrypt($data->enc_county), $jomres_encryption->decrypt($data->enc_county), false, false);
				}
				$country = $jomres_encryption->decrypt($data->enc_country);
				$postcode = $jomres_encryption->decrypt($data->enc_postcode);
				$mobile = $jomres_encryption->decrypt($data->enc_tel_mobile);
				$email = $jomres_encryption->decrypt($data->enc_email);

				$stripe = new \Stripe\StripeClient($secret_key);
				$customer = $stripe->customers->create([
					'address' => [
						'city' => $town,
						'country' => $country,
						'line1' => $house,
						'line2' => $street,
						'postal_code' => $postcode,
						'state' => $region,
					],
					'email' => $email,
					'name' => $firstname.' '.$surname,
					'phone' => $mobile
				]);

				if (isset($customer->id)) {
					$stripe_cus_id = $customer->id;
					$query = "UPDATE #__jomresportal_subscriptions SET stripe_cus_id = '".$customer->id."' WHERE cms_user_id = ".(int)$thisJRUser->id."";
					doInsertSql($query, '');

					$thisJRUser->params['subscription_system_stripe_customer_id'] = $customer->id;
					$thisJRUser->update_params();
					}
				}


				jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=save_subscription&package_id=".(int) jomresGetParam( $_REQUEST, 'id', 0 )), "");
			}
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}