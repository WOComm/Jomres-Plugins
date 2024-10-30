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

class j06000stripe_standard_callback
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
		$ePointFilepath = get_showtime('ePointFilepath');

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		$mrConfig = getPropertySpecificSettings((int)$tmpBookingHandler->tmpbooking['property_uid']);

		if ($jrConfig['useGlobalCurrency'] == '1') {
			$currency_code = $jrConfig['globalCurrencyCode'];
		} else {
			$currency_code = $mrConfig['property_currencycode'];
		}

		$settingArray = [];
		$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = ".$tmpBookingHandler->tmpbooking['property_uid']." AND plugin = 'stripe_standard' ";
		$settingsList = doSelectSql( $query );
		if ( count ($settingsList) > 0)
		{
			foreach ( $settingsList as $set )
			{
				$settingArray[ $set->setting ] = trim($set->value);
			}
		}

		\Stripe\Stripe::setAppInfo("Jomres Stripe Standard", "1.0", "https://www.jomres.net");

		if ( !isset($settingArray[ 'test_mode' ]) || $settingArray[ 'test_mode' ] == '1' ) {
			$secret_key = trim($settingArray[ 'test_secret_key' ]);
		} else {
			$secret_key = trim($settingArray[ 'live_secret_key' ]);
		}

		$stripe = new \Stripe\StripeClient(
			$secret_key
		);

		if (!isset($tmpBookingHandler->tmpbooking['stripe_standard_payment_intent'])) {
			throw new Exception('Error, Payment intent not set');
		}

		$payment_intent = $stripe->paymentIntents->retrieve(
			$tmpBookingHandler->tmpbooking['stripe_standard_payment_intent'],
			[]
		);

		if ($payment_intent->status == 'succeeded') {
			$message = "Deposit payment of " . floor($payment_intent->amount_received) . " " . $currency_code . " paid";
			logging::log_message($message, "Stripe Standard", "INFO");
			logging::log_message($message, "Core", "INFO");

			$tmpBookingHandler->updateBookingField('depositpaidsuccessfully', true);

			$transaction_id = $payment_intent->id;
			$management_url = 'https://dashboard.stripe.com/';
			if ($settingArray[ 'test_mode' ] == '1')
				$management_url .= 'test/';
			$management_url .= 'payments/' . $payment_intent->id;
			$payment_method = 'stripe';

			set_showtime("gateway_payment_method", $payment_method);
			set_showtime("gateway_management_url", $management_url);
			set_showtime("gateway_transaction_id", $transaction_id);

			$result = insertInternetBooking(get_showtime('jomressession'), true, true);
		} else {
			property_header($tmpBookingHandler->tmpbooking['property_uid']);

			$booking_form_url = get_booking_url($tmpBookingHandler->tmpbooking['property_uid']);

			$pageoutput	= [];
			$output 	= [];

			$output['STRIPE_STANDARD_PAYMENT_FAILED']=jr_gettext('STRIPE_STANDARD_PAYMENT_FAILED', 'STRIPE_STANDARD_PAYMENT_FAILED', false);
			$output['STRIPE_STANDARD_PAYMENT_FAILED_BLURB']=jr_gettext('STRIPE_STANDARD_PAYMENT_FAILED_BLURB', 'STRIPE_STANDARD_PAYMENT_FAILED_BLURB', false);
			$output['STRIPE_STANDARD_PAYMENT_FAILED_BUTTON']=jr_gettext('STRIPE_STANDARD_PAYMENT_FAILED_BUTTON', 'STRIPE_STANDARD_PAYMENT_FAILED_BUTTON', false);

			$output['BOOKING_FORM_URL'] =  $booking_form_url ;

			$pageoutput[]=$output;
			$tmpl = new patTemplate();

			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'payment_failed.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->displayParsedTemplate();

		}
	}


	public function getRetVals()
	{
		return null;
	}
}
