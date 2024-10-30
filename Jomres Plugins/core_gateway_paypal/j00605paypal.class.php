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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
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

class j00605paypal {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		$property_uid=$tmpBookingHandler->getBookingPropertyId();
		$mrConfig		  = getPropertySpecificSettings($property_uid);
		$jomresConfig_sitename = get_showtime('sitename');

		$settings = get_plugin_settings("paypal",$property_uid);
		
		// This is purely for Paypal, as the SDK offers it's own logging functionality
		$log_path = JOMRES_SYSTEMLOG_PATH . "gateway_logs";
		if ( !is_dir( $log_path ) )
			{
			mkdir ( $log_path );
			}

		$mode = "sandbox";
		$log_level = "DEBUG";
		
		$clientID = $settings['client_id_sandbox'];
		$secret = $settings['secret_sandbox'];

		if ( $settings['usesandbox'] == "0")
			{
			if (file_exists($log_path . "gateway_logs".JRDS.'PayPal.log')) // We don't want to leave log files lying around that might disclose information. Once set to live we'll remove the log file.
				{
				unlink($log_path . "gateway_logs".JRDS.'PayPal.log');
				}
			$log_level = "FINE";
			$mode = "live";
			$clientID = $settings['client_id'];
			$secret = $settings['secret'];
			}

		if ( $clientID != "" && $secret != "")
			{
			$booking_number = get_booking_number();

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
			
			$payer = new Payer();
			$payer->setPaymentMethod("paypal");
			
			$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig           = $siteConfig->get();
			if ($jrConfig['useGlobalCurrency'] == 1)
				$ccode = $jrConfig['globalCurrencyCode'];
			else
				$ccode = $mrConfig['property_currencycode'];
			
			if ($ccode == "JPY" ) {
				$deposit_required = (int)$tmpBookingHandler->tmpbooking['deposit_required'];
			} else {
				$deposit_required = $tmpBookingHandler->tmpbooking['deposit_required'];
			}
			
			$amount = new Amount();
			$amount->setCurrency($ccode)
				->setTotal($deposit_required);
			
			$transaction = new Transaction();
			$transaction->setAmount($amount)
				->setDescription( $jomresConfig_sitename." ".jr_gettext("_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED",'_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED',false,false)." :".jr_gettext("_JOMRES_BOOKING_NUMBER",'_JOMRES_BOOKING_NUMBER',false,false)." ".$tmpBookingHandler->tmpbooking['booking_number']." ".output_price($deposit_required,"",false) );
            $transaction->setInvoiceNumber($booking_number);

			$baseUrl = JOMRES_SITEPAGE_URL_NOSEF;
			$redirectUrls = new RedirectUrls();

			$redirectUrls->setReturnUrl(JOMRES_SITEPAGE_URL_NOSEF.'&task=completebk&success=true&plugin=paypal&jsid='.get_showtime('jomressession')."&booking_number=".$booking_number)
				->setCancelUrl(JOMRES_SITEPAGE_URL_NOSEF.'&task=completebk&success=false&plugin=paypal&jsid='.get_showtime('jomressession'));

			$payment = new Payment();
			$payment->setIntent("sale")
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions(array($transaction));
				
			// This check can probably be removed sometime from February 2018 onwards
			// Early commenting this check, users have had 6 months to get used to the idea, but the howsmyssl site is throttling calls, so we'll disable this for now. Might need to re-enable it at some point with caching.
 			/* $ch = curl_init('https://www.howsmyssl.com/a/check');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			curl_close($ch);
			$json = json_decode($data);
			if ($json->tls_version != "TLS 1.2")
				{
				echo "<p class=\"alert alert-danger\">Paypal requires TLS version 1.2, however your server is running ".$json->tls_version." meaning Paypal's server will not talk to yours. Please ask your web server hosts to upgrade the version of TLS on this server to TLS 1.2</p>";
				return;
				} */

			try 
				{
				$payment->create($apiContext);
				}
			catch (PayPal\Exception\PayPalConnectionException $ex) 
				{
				if ($mode == "sandbox")
					{
					logging::log_message('Paypal recorded a '.$ex->getCode().' error when trying to take a payment.', 'Core', 'WARNING' , serialize($ex->getData()) );
					logging::log_message('Paypal recorded a '.$ex->getCode().' error when trying to take a payment.', 'Gateway', 'WARNING' , serialize($ex->getData()) );
					
                    if ($ex->getCode() == 401 ) {
                        echo "<p class='alert alert-danger'>Sorry, it looks like your API credentials are incorrect, please check that you are using the correct API keys.</p>";
                        return;
                        }
                    else {
                        echo $ex->getCode(); // Prints the Error Code
                        echo $ex->getData(); // Prints the detailed error message 
                        die($ex);
                        }

					}
				
				}
			catch (Exception $ex) 
				{
				output_fatal_error( $e );
				}
			$approvalUrl = $payment->getApprovalLink();
			jomresRedirect( $approvalUrl );

			}
		else // The old way. Property manager hasn't updated their payment details since before the SDK functionality above was added to this gateway.
			{
			
			$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
			$jrConfig=$siteConfig->get();

			gateway_log(serialize($bookingdata));
			$bookingdata=$componentArgs['bookingdata'];
			$plugin="paypal";
			$query="SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = '".(int)$bookingdata['property_uid']."' AND plugin = '".$plugin."' ";
			$settingsList=doSelectSql($query);

			foreach ($settingsList as $set)
				{
				$settingArray[$set->setting]=$set->value;
				}
			if ($jrConfig['useGlobalCurrency'] =="1")
				{
				$settingArray['currencycode']=$jrConfig['globalCurrencyCode'];
				}
				
			$paypal_settings =jomres_getSingleton('jrportal_paypal_settings');
			$paypal_settings->get_paypal_settings();
			
			if ($paypal_settings->paypalConfigOptions['override'] == "1")
				{
				$this->messagelog[]="<b>Overriding old paypal settings</b>";
				$settingArray['usesandbox']=$paypal_settings->paypalConfigOptions['usesandbox'];
				$settingArray['currencycode']=$paypal_settings->paypalConfigOptions['currencycode'];
				$settingArray['paypalemail']=$paypal_settings->paypalConfigOptions['email'];
				$settingArray['pendingok'] = "0";
				$settingArray['receiveIPNemail'] = "1";
				}
				
			if (!empty($settingArray))
				{
				$this->ipn_log_file=JOMRESCONFIG_ABSOLUTE_PATH.'/media/ipn_log_file.txt';
				if ($settingArray['usesandbox']=="1")
					{
					$this->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';	// testing paypal url
					}
				else
					{
					$this->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
					}

				$this_script = JOMRES_SITEPAGE_URL_NOSEF.'&task=completebk&plugin='.$plugin.'&jsid='.get_showtime('jomressession');
				
				$bookingDeets=gettempBookingdata();

				$guestDeets=getbookingguestdata();
				$guestCountry=$guestDeets['country'];
				$paypalLang="EN";

				switch ($guestCountry) 
					{
					case "NL":
						$paypalLang="NL";
						break;
					case "DE":
					case "AT":
						$paypalLang="DE";
						break;
					case "IT":
						$paypalLang="IT";
						break;
					case "FR":
					case "CH":
					case "LU":
					case "BE":
						$paypalLang="FR";
						break;
					case "PL":
						$paypalLang="PL";
						break;
					case "ES":
					case "PT":
					case "MX":
						$paypalLang="ES";
						break;
					case "GB":
					case "US":
					default:
						$paypalLang="EN";
						break;
					}
				
				$deposit_required=$bookingDeets['deposit_required'];
				$booking_number=$bookingDeets['booking_number'];

				$transactionName='Paypal Transaction from '.$jomresConfig_sitename.' - '.$booking_number;
				if ($settingArray['usesandbox']=="1")
					$transactionName.=' Test payment';

				$this->add_field('lc', $paypalLang);
				$this->add_field('rm','2');			  // Return method = POST
				$this->add_field('cmd','_xclick');
				$this->add_field('business', $settingArray['paypalemail']);
				$this->add_field('return', $this_script.'&action=success');
				$this->add_field('cancel_return', $this_script.'&action=cancel');
				$this->add_field('notify_url', $this_script.'&action=ipn');
				$this->add_field('item_name', $transactionName);
				$this->add_field('payer_id', $guests_uid);
				$this->add_field('custom', get_showtime('jomressession'));
				$this->add_field('currency_code', $settingArray['currencycode']);
				$this->add_field('amount', number_format($deposit_required,2, '.', ''));
				$this->add_field('charset', 'utf-8'); 
				$this->submit_paypal_post();
				$this->log_ipn_results();
				}
			}
		}


	#
	/**
	#
	 * Logs results of the ipn activity
	#
	 */
	function log_ipn_results()
		{
		// Success or failure being logged?
		$text = 'MSG: Posting to paypal: '.$this->paypal_url."\n";
		// Log the POST variables
		foreach ($this->fields as $key=>$value)
			{
			$text .= "$key=$value,\n";
			}
		// Write to log
		gateway_log($text);
		}

	#
	/**
	#
	 * Adds a field and value to the 'fields' variable
	#
	 */
	function add_field($field, $value)
		{
		// adds a key=>value pair to the fields array, which is what will be
		// sent to paypal as POST variables.  If the value is already in the
		// array, it will be overwritten.
		$this->fields["$field"] = $value;
		}

	#
	/**
	#
	 * Submits the booking information to paypal
	#
	 */
	function submit_paypal_post()
		{
		?>
		<script>
		jomresJquery(document).ready(function() {
			document.forms['paypal_form'].submit();
		});
		</script>
		<?php
		echo "<center><h2>".jr_gettext('_JOMRES_PAYPAL_REDIRECTMESSAGE',_JOMRES_PAYPAL_REDIRECTMESSAGE,false,false)."</h2></center>\n";
		echo "<form method=\"post\" name=\"paypal_form\" onsubmit=\"document.paypal_form.submitbutton.disabled = true; return true;\" ";
		echo "action=\"".$this->paypal_url."\">\n";
		foreach ($this->fields as $name => $value) {
			echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
		}
		echo "<center><br/><br/>".jr_gettext('_JOMRES_PAYPAL_REDIRECTMESSAGE_IFNOTREDIRECTED',_JOMRES_PAYPAL_REDIRECTMESSAGE_IFNOTREDIRECTED,false,false)."<br/><br/>\n";
		echo "<input name=\"submitbutton\" type=\"submit\" value=\"".jr_gettext('_JOMRES_PAYPAL_REDIRECTMESSAGE_CLICKHERE',_JOMRES_PAYPAL_REDIRECTMESSAGE_CLICKHERE,false,false)."\"></center>\n";
		echo "</form>\n";
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
