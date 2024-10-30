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
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	#[AllowDynamicProperties]
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j06000stripe_standard_subscriptions_callback
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

		$payload = @file_get_contents("php://input");
		$event_json = json_decode($payload);

		if (!isset($event_json->data->object->client_reference_id) || trim($event_json->data->object->client_reference_id) != '' ) {

			$settingArray =	get_site_stripe_standard_gateway_settings();

			\Stripe\Stripe::setAppInfo("Jomres Stripe Standard", "1.0", "https://www.jomres.net");

			if ( !isset($settingArray[ 'test_mode' ]) || $settingArray[ 'test_mode' ] == '1' ) {
				$secret_key = trim($settingArray[ 'test_secret_key' ]);
				$endpoint_secret = trim($settingArray[ 'test_signing_secret' ]);
			} else {
				$secret_key = trim($settingArray[ 'live_secret_key' ]);
				$endpoint_secret = trim($settingArray[ 'live_signing_secret' ]);
			}


			$stripe = new \Stripe\StripeClient([
				"api_key" => $secret_key,
				"stripe_version" => STRIPE_API_VERSION
			]);

			try {
				$event = \Stripe\Event::constructFrom(
					json_decode($payload, true)
				);
			} catch(\UnexpectedValueException $e) {
				// Invalid payload
				echo '⚠️  Webhook error while parsing basic request.';
				http_response_code(400);
				exit();
			}

			$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
			try {
				$event = \Stripe\Webhook::constructEvent(
					$payload, $sig_header, $endpoint_secret
				);
			} catch(\Stripe\Exception\SignatureVerificationException $e) {
				// Invalid signature
				echo '⚠️  Webhook error while validating signature.';
				http_response_code(400);
				exit();
			}

				// Handle the event
			switch ($event->type) {
				case 'payment_intent.succeeded':
					$payment_intent = $event->data->object; // contains a \Stripe\PaymentIntent

					$message = "Subscription payment " . floor($payment_intent->amount) . " paid";
					logging::log_message($message, "Stripe Standard", "INFO");
					logging::log_message($message, "Core", "INFO");

					$payment_intent_id =filter_var( $payment_intent->id, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
					logging::log_message("Payment intent ".$payment_intent_id, "Core", "INFO");
					$status = (string)$payment_intent->status;

					if ($status == 'succeeded') {
						$query = "UPDATE #__jomresportal_subscriptions SET `status` = '1' WHERE `payment_intent_id` = '" . $payment_intent_id . "' LIMIT 1";
						doInsertSql($query, "Updated subscription status to 1");

						$query = "SELECT * FROM #__jomresportal_subscriptions  WHERE `payment_intent_id` = '" . $payment_intent_id . "' LIMIT 1";
						$subscription_details = doSelectSql($query, 2);
						logging::log_message("Invoice id ".$subscription_details['invoice_id'], "Core", "INFO");

						jr_import('jrportal_invoice');
						$invoice = new jrportal_invoice();
						$invoice->id = $subscription_details['invoice_id'];
						$invoice->getInvoice();
						$invoice->mark_invoice_paid();
						$query = "SELECT `cms_user_id` FROM #__jomresportal_subscriptions WHERE `payment_intent_id` = '" . $payment_intent_id . "' LIMIT 1";
						$cms_user_id = doSelectSql($query, 1);

						subscriptions_publish_all_manager_properties($cms_user_id);
					}
					break;
				case 'customer.subscription.deleted':
					$subscription = $event->data->object;
					$subscription_id = $subscription->id;
					$query = "UPDATE #__jomresportal_subscriptions SET `status` = '0' WHERE `stripe_sub_id` = '" . $subscription_id . "' LIMIT 1";
					doInsertSql($query, "Updated subscription status to 0");
					$query = "SELECT `cms_user_id` FROM #__jomresportal_subscriptions WHERE `stripe_sub_id` = '" . $subscription_id . "' LIMIT 1";
					$cms_user_id = doSelectSql($query, 1);
					subscriptions_unpublish_all_manager_properties($cms_user_id);
					break;

				default:
					echo 'Received unknown event type ' . $event->type;
					http_response_code(400);
				}
		}
	}


	public function getRetVals()
	{
		return null;
	}
}
