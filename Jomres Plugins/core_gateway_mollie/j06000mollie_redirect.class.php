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

class j06000mollie_redirect
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

		$eLiveSite = get_showtime('eLiveSite');
		$ePointFilepath = get_showtime('ePointFilepath');

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$mrConfig = getPropertySpecificSettings($tmpBookingHandler->tmpbooking['property_uid']);

		$settingArray = [];
		$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = ".$tmpBookingHandler->tmpbooking['property_uid']." AND plugin = 'mollie' ";
		$settingsList = doSelectSql( $query );
		if ( count ($settingsList) > 0)
		{
			foreach ( $settingsList as $set )
			{
				$settingArray[ $set->setting ] = trim($set->value);
			}
		}

		$test_mode = false;
		$api_token = trim($settingArray[ 'api_token' ]); // Copy pasta from browsers can introduce spaces
		if ( $settingArray[ 'test_mode' ] == '1' ) {
			$test_mode = true;
			$api_token = trim($settingArray[ 'test_api_token' ]);
		}

		$redirectUrl = JOMRES_SITEPAGE_URL_NOSEF.'&task=mollie_callback&booking_id='.$tmpBookingHandler->tmpbooking['booking_number'];
		$webhookUrl  = JOMRES_SITEPAGE_URL_NOSEF.'&task=mollie_callback&booking_id='.$tmpBookingHandler->tmpbooking['booking_number'];
		if ( $settingArray[ 'test_mode' ] == '1' && strstr(JOMRES_SITEPAGE_URL_NOSEF , 'localhost' ) ) {
//			$redirectUrl = JOMRES_SITEPAGE_URL_NOSEF.'&task=mollie_callback&booking_id='.$tmpBookingHandler->tmpbooking['booking_number'];
			$webhookUrl  = 'https://app.jomres.net/fake_webhook_response.php';
		}

		// Try to fall back to test mode
		if ( $settingArray[ 'api_token' ] == '' ) {
			$test_mode = true;
			$api_token = trim($settingArray[ 'test_api_token' ]);
		}

		if ( $test_mode && $settingArray[ 'test_api_token' ] =='' ) {
			$test_mode = true;
		}

		$mollie = new \Mollie\Api\MollieApiClient();
		$mollie->setApiKey($api_token);

		$CURRENCY = $mrConfig[ 'property_currencycode' ];
		if ( $jrConfig[ 'useGlobalCurrency' ] == "1" )  {
			$CURRENCY = $jrConfig[ 'globalCurrencyCode' ];
		}

		$deposit = number_format( round( (float)$tmpBookingHandler->tmpbooking['deposit_required'] , 2 ) , 2 ) ;

		$payment = $mollie->payments->create([
			"amount" => [
				"currency" => $CURRENCY,
				"value" => $deposit
			],
			"description" => (string)$tmpBookingHandler->tmpbooking['booking_number'],
			"redirectUrl" => $redirectUrl,
			"webhookUrl"  => $webhookUrl,
		]);

		$tmpBookingHandler->tmpbooking['mollie_invoice_id'] = $payment->id;
		$tmpBookingHandler->close_jomres_session();  // Make sure that the mollie payment id is saved

		header("Location: " . $payment->getCheckoutUrl(), true, 303);
		exit;
	}


	public function getRetVals()
	{
		return null;
	}
}
