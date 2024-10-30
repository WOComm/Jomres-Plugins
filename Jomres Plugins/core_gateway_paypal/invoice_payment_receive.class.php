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

use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

class invoice_payment_receive
	{
	function __construct($invoice_obj)
		{
		// The bank/gateway will need to return the payment reference so that Jomres can associate the correct gateway and invoice id when marking the payment as received
		$this->invoice_obj = $invoice_obj;
		}
	
	// Do gateway magic here to confirm that the payment has been received successfully
	function confirm_payment()
		{
		$log_level = "DEBUG";
		$mode = "sandbox";
		$clientID = $this->invoice_obj['gateway_settings']['client_id_sandbox'];
		$secret = $this->invoice_obj['gateway_settings']['secret_sandbox'];
		
		if ($this->invoice_obj['gateway_settings']['usesandbox'] == "0")
			{
			$log_level = "FINE";
			$mode = "live";
			if (file_exists(JOMRES_SYSTEMLOG_PATH . "gateway_logs".JRDS.'PayPal.log')) // We don't want to leave log files lying around that might disclose information. Once set to live we'll remove the log file.
				{
				unlink(JOMRES_SYSTEMLOG_PATH . "gateway_logs".JRDS.'PayPal.log');
				}
			$clientID = $this->invoice_obj['gateway_settings']['client_id'];
			$secret = $this->invoice_obj['gateway_settings']['secret'];
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
		
		// Determine if the user approved the payment or not
		if (isset($_GET['success']) && $_GET['success'] == 'true') 
			{
			// Get the payment Object by passing paymentId payment id was previously stored in session in CreatePaymentUsingPayPal.php
			$paymentId = $_GET['paymentId'];
			$payment = Payment::get($paymentId, $apiContext);

			// Payment Execute
			// PaymentExecution object includes information necessary to execute a PayPal account payment. The payer_id is added to the request query parameters when the user is redirected from paypal back to your site
			$execution = new PaymentExecution();
			$execution->setPayerId($_GET['PayerID']);
			
			set_showtime("gateway_transaction_id" , $paymentId );
			
			try 
				{
				// Execute the payment (See bootstrap.php for more on ApiContext)
				$result = $payment->execute($execution, $apiContext);

				try 
					{
					$payment = Payment::get($paymentId, $apiContext);
					}
				catch (Exception $e) 
					{
					output_fatal_error( $e );
					}
				}
			catch (Exception $e) 
				{
				output_fatal_error("Executed Payment ". $e );
				}
			return $payment;
			}
		else 
			{
			echo "Payment cancelled.";
			return false;
			}
		}
	}

/*
$invoice_data example :

jrportal_payment_reference Object
(
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

    [gateway] => 
    [invoice_id] => 
)
*/
