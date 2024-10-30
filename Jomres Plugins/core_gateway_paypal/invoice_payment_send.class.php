<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ShippingAddress;

class invoice_payment_send
	{
	function __construct($invoice_obj)
		{
		// Do gateway magic here to send invoice data to the gateway service
		// The bank/gateway will need to return the payment reference so that Jomres can associate the correct gateway and invoice id when marking the payment as received
		
		// Set the return url to JOMRES_SITEPAGE_URL_AJAX if you intend to return no output, or JOMRES_SITEPAGE_URL_NOSEF 
		
		// http://www.appypie.com/faqs/how-to-obtain-api-client-id-and-secret-key-within-your-paypal-account
		// https://developer.paypal.com/docs/integration/admin/manage-apps/
		
		// http://paypal.github.io/PayPal-PHP-SDK/sample/
		
		$jomresConfig_sitename = get_showtime('sitename');
		
		if ($invoice_obj === false )
			return;

		$log_path = JOMRES_SYSTEMLOG_PATH . "gateway_logs";
		if ( !is_dir( $log_path ) )
			{
			mkdir ( $log_path );
			}
			
		$log_level = "DEBUG";
		$mode = "sandbox";
		$clientID = $invoice_obj['gateway_settings']['client_id_sandbox'];
		$secret = $invoice_obj['gateway_settings']['secret_sandbox'];
		
		if ($invoice_obj['gateway_settings']['usesandbox'] == "0")
			{
			$log_level = "FINE";
			$mode = "live";
			if (file_exists(JOMRES_SYSTEMLOG_PATH . "gateway_logs".JRDS.'PayPal.log')) // We don't want to leave log files lying around that might disclose information. Once set to live we'll remove the log file.
				{
				unlink(JOMRES_SYSTEMLOG_PATH . "gateway_logs".JRDS.'PayPal.log');
				}
			$clientID = $invoice_obj['gateway_settings']['client_id'];
			$secret = $invoice_obj['gateway_settings']['secret'];
			}

		$apiContext = new \PayPal\Rest\ApiContext(
			new \PayPal\Auth\OAuthTokenCredential(
				trim($clientID),     // ClientID
				trim($secret)      // ClientSecret
			)
		);
		
 		$apiContext->setConfig(
			array(
				'mode' => $mode,
				'log.LogEnabled' => true,
				'log.FileName' =>  $log_path.JRDS.'PayPal.log',
				'log.LogLevel' => $log_level, // PLEASE USE `FINE` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
				'validation.level' => 'log',
				'cache.enabled' => true
				)
			);
		
		// ### Payer
		// A resource representing a Payer that funds a payment
		// For paypal account payments, set payment method
		// to 'paypal'.
		$payer = new Payer();
		$payer->setPaymentMethod("paypal");
		
		
 		$shippingAddress = new ShippingAddress();
		$shippingAddress->setLine1($invoice_obj['invoice_data']['payer']['house']." ".$invoice_obj['invoice_data']['payer']['street'])
		->setCity($invoice_obj['invoice_data']['payer']['town'])
		->setState($invoice_obj['invoice_data']['payer']['county'])
		->setPostalCode($invoice_obj['invoice_data']['payer']['postcode'])
		->setCountryCode($invoice_obj['invoice_data']['payer']['country_code'])
		->setRecipientName($invoice_obj['invoice_data']['payer']['firstname']." ".$invoice_obj['invoice_data']['payer']['surname']);

		 $itemList = new ItemList();
		 $itemList->setItems($itemsarr); //my array of items
		 $itemList->setShippingAddress($shippingAddress);
 
		// ### Itemized information
		// (Optional) Lets you specify item wise
		// information

		$line_items = array();
		foreach ($invoice_obj['invoice_data']['line_items'] as $line_item)
			{
			$item = new Item();
			$item->setName(jr_gettext($line_item['name'],$line_item['name'],false,false)." ".$line_item['description'])
				->setCurrency($invoice_obj['invoice_data']['currencycode'])
				->setQuantity(round($line_item['init_qty']))
				->setPrice($line_item['init_total_inclusive']);
			$line_items[]=$item;
			}
		$itemList = new ItemList();
		$itemList->setItems($line_items);

		
		// ### Amount
		// Lets you specify a payment amount.
		// You can also specify additional details
		// such as shipping, tax.
		$amount = new Amount();
		$amount->setCurrency($invoice_obj['invoice_data']['currencycode'])
			->setTotal($invoice_obj['invoice_data']['balance']);

		// ### Transaction
		// A transaction defines the contract of a
		// payment - what is the payment for and who
		// is fulfilling it. 
		$booking_number_string = '';
		if ( trim($invoice_obj['booking_number']) != "")
			{
			$booking_number_string = " - ".jr_gettext("_JOMRES_BOOKING_NUMBER",'_JOMRES_BOOKING_NUMBER',false,false).": ".$invoice_obj['booking_number'];
			}
		
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($itemList)
			->setDescription($jomresConfig_sitename." - ".jr_gettext("_JOMRES_AJAXFORM_BILLING_BALANCE_PAYMENT",'_JOMRES_AJAXFORM_BILLING_BALANCE_PAYMENT',false,false).": ".$invoice_obj['invoice_data']['balance'].$booking_number_string)
			->setInvoiceNumber($invoice_obj['invoice_id']);

		// ### Redirect urls
		// Set the urls that the buyer must be redirected to after 
		// payment approval/ cancellation.
		$baseUrl = JOMRES_SITEPAGE_URL_NOSEF;
		$redirectUrls = new RedirectUrls();

		$payment_reference = $invoice_obj['payment_reference'];
		$redirectUrls->setReturnUrl("$baseUrl&task=invoice_payment_receive&success=true&payment_reference=$payment_reference")
			->setCancelUrl("$baseUrl&task=invoice_payment_receive&success=false&payment_reference=$payment_reference");

		// ### Payment
		// A Payment Resource; create one using
		// the above types and intent set to 'sale'
		$payment = new Payment();
		$payment->setIntent("sale")
			->setPayer($payer)
			->setRedirectUrls($redirectUrls)
			->setTransactions(array($transaction));
			
		try {
			$payment->create($apiContext);
			$approvalUrl = $payment->getApprovalLink();
			//$_SESSION['paypal_payment_id'] = $payment->getId();
			jomresRedirect( $approvalUrl );
			} 
		catch (Exception $e) 
			{
			$data =$e->getData();
			$message = serialize($data);
			
			$inv_total = "Invoice total = ".$invoice_obj['invoice_data']['balance'];
			$message .= $inv_total;
			throw new Exception($message);
			}

		// The API response provides the url that you must redirect the buyer to. Retrieve the url from the $payment->getApprovalLink() method
		$approvalUrl = $payment->getApprovalLink();

		}
	}

/*
$invoice_data example :

jrportal_payment_reference Object
(
    [gateway] => paypal
    [invoice_id] => 37
    [gateway_settings] => Array
        (
            [active] => 1
            [usesandbox] => 1
            [pendingok] => 0
            [useipn] => 1
            [paypalemail] => test@test.com
            [currencycode] => AED
            [receiveIPNemail] => 1
        )

    [invoice_data] => Array
        (
		[invoice_number] => 37
            [currencycode] => GBP
            [balance] => 144
        )

    [payment_reference] => 3
)
*/

