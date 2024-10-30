<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.2.2
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j06000braintree_callback
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$mrConfig = getPropertySpecificSettings($tmpBookingHandler->tmpbooking['property_uid']);
		$property_uid = $tmpBookingHandler->tmpbooking['property_uid'];
		$settingArray = [];
		$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = ".$property_uid." AND plugin = 'braintree' ";
		$settingsList = doSelectSql( $query );
		if ( count ($settingsList) > 0)
		{
			foreach ( $settingsList as $set )
			{
				$settingArray[ $set->setting ] = trim($set->value);
			}
		}

		if ($settingArray['test_mode'] =='1') {
			$environment = 'sandbox';
			$merchant_id = $settingArray['test_merchant_id'];
			$public_key = $settingArray['test_public_key'];
			$private_key = $settingArray['test_private_key'];
		} else {
			$environment = 'production';
			$merchant_id = $settingArray['merchant_id'];
			$public_key = $settingArray['public_key'];
			$private_key = $settingArray['private_key'];
		}

		$gateway = new Braintree\Gateway([
			'environment' => $environment,
			'merchantId' => $merchant_id,
			'publicKey' => $public_key,
			'privateKey' => $private_key
		]);

		$CURRENCY = $mrConfig[ 'property_currencycode' ];
		if ( $jrConfig[ 'useGlobalCurrency' ] == "1" )  {
			$CURRENCY = $jrConfig[ 'globalCurrencyCode' ];
		}

		$region_name = find_region_name($tmpBookingHandler->_tmpguest[ 'region' ]);
		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data($property_uid);

		$result = $gateway->transaction()->sale([
			'amount' => $tmpBookingHandler->tmpbooking['deposit_required'] ,
			'paymentMethodNonce' => $_POST['payment_method_nonce'],
			'deviceData' => $_POST['device_data'],
			'orderId'		=> $tmpBookingHandler->tmpbooking['booking_number'],
			'channel'		=> 'Jomres',
			'customer' => [
				'firstName'		=> $tmpBookingHandler->_tmpguest['firstname'],
				'lastName'		=> $tmpBookingHandler->tmpguest['surname'],
				'email'			=> $tmpBookingHandler->tmpguest["email"],
				'phone'			=> $tmpBookingHandler->_tmpguest['tel_mobile'],
			],
			'options' => [
				'submitForSettlement' => True,
			]
		]);


		if ($result->success === true) {
			insertInternetBooking(get_showtime('jomressession'),true,true);
		} else {

		}



	}


	public function getRetVals()
	{
		return null;
	}
}
