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

class invoice_payment_send
	{
	function __construct($invoice_array)
		{
		$eLiveSite = "/".JOMRES_ROOT_DIRECTORY."/core-plugins/core_gateway_stripe/";
		$ePointFilepath =  JOMRESCONFIG_ABSOLUTE_PATH . JRDS . JOMRES_ROOT_DIRECTORY . JRDS ."core-plugins". JRDS . "core_gateway_stripe".JRDS;

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$mrConfig = getPropertySpecificSettings($tmpBookingHandler->tmpbooking['property_uid']);

		$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = 0 AND plugin = 'stripe' ";
		$settingsList = doSelectSql( $query );
		if ( count ($settingsList) > 0)
			{
			foreach ( $settingsList as $set )
				{
				$settingArray[ $set->setting ] = trim($set->value);
				}
			}

		$is_test_key = false;
		if (substr($settingArray[ 'stripe_public_key' ] , 0 , 7 ) == "pk_test")
			$is_test_key = true;
		
		if ( !isset($settingArray[ 'stripe_secret_key' ]) || trim($settingArray[ 'stripe_secret_key' ]) =="" )
			{
			$message = "Stripe Secret key not set. Please set this in Administrator -> Jomres -> Payment methods -> Gateways -> Stripe";
			logging::log_message( $message , "Stripe" , "ERROR" );
			throw new Exception( $message );
			}
			
		if ( !isset($settingArray[ 'stripe_public_key' ]) || trim($settingArray[ 'stripe_public_key' ]) =="" )
			{
			$message = "Stripe Public key not set. Please set this in Administrator -> Jomres -> Payment methods -> Gateways -> Stripe";
			logging::log_message( $message , "Stripe" , "ERROR" );
			throw new Exception( $message );
			}

		$output = array();
		$pageoutput=array();
		
		$output['CURRENCY'] = $mrConfig[ 'property_currencycode' ];
		if ( $jrConfig[ 'useGlobalCurrency' ] == "1" )
			{
			$output['CURRENCY'] = $jrConfig[ 'globalCurrencyCode' ];
			}

		$deposit_required=(float)$tmpBookingHandler->tmpbooking['deposit_required'];
		$booking_total = $tmpBookingHandler->tmpbooking['contract_total']; 

		require_once($ePointFilepath."plugin_info.php");
		
		$core_gateway_stripe_info = new plugin_info_core_gateway_stripe();
		
		\Stripe\Stripe::setApiKey( trim( $settingArray[ 'stripe_secret_key' ]));
			
		\Stripe\Stripe::setAppInfo(
			"Jomres CoreGatewayStripe",
			$core_gateway_stripe_info->data['version'],
			"https://jomres.net"
			);
			
		\Stripe\Stripe::setApiVersion("2019-08-14");
		
		$property_manager_xref = get_showtime( 'property_manager_xref' );
		if ( is_null( $property_manager_xref ) ) {
			$property_manager_xref = build_property_manager_xref_array();
			}
	
		$manager_id = $property_manager_xref[ $invoice_array['invoice_data']['property_uid'] ];

		if ($invoice_array['invoice_data']['property_uid'] > 0 ) {
			jr_import("stripe_user");
			$stripe_user=new stripe_user();
			$stripe_user->getStripeUser($manager_id);
		}

		// Now to decided if we'll need to show the form, or actually check the payment intent has completed the charge
		if ( isset($tmpBookingHandler->_tmpbooking['stripe']['payment_intent_id']) && $tmpBookingHandler->_tmpbooking['stripe']['payment_intent_id'] != '' ) {

			$payment_intent_client_secret = $tmpBookingHandler->_tmpbooking['stripe']['client_secret'];

			$payment_intent = \Stripe\PaymentIntent::retrieve($tmpBookingHandler->_tmpbooking['stripe']['payment_intent_id']);

			if ($payment_intent->status == 'succeeded') {
				
					$transaction_id = $payment_intent->id;
					$management_url = 'https://dashboard.stripe.com/';
					if ($is_test_key)
						$management_url .='test/';
					$management_url .= 'payments/'.$payment_intent->id;
					$payment_method = 'stripe';
					
					set_showtime("gateway_payment_method" , $payment_method );
					set_showtime("gateway_management_url" , $management_url );
					set_showtime("gateway_transaction_id" , $transaction_id );
					
					jr_import("jrportal_payment_reference");
					$jrportal_payment_reference = new jrportal_payment_reference();
					$jrportal_payment_reference->get_invoice_details_for_reference ((int)$_GET['payment_reference']);
					$jrportal_payment_reference->mark_payment_reference_paid();

					jr_import( 'jrportal_invoice' );
					$invoice = new jrportal_invoice();
					$invoice->id = $jrportal_payment_reference->invoice_id;
					$invoice->getInvoice();
					$invoice->mark_invoice_paid(); 
					
					$message = "Balance payment of ".$invoice_array['invoice_data']['balance']." ".$invoice_array['invoice_data']['currencycode']." paid";
					logging::log_message( $message , "Stripe" , "INFO" );
					logging::log_message( $message , "Core" , "INFO" );
					
					jomresRedirect( JOMRES_SITEPAGE_URL_NOSEF . "&task=list_invoices" );
				}
			}
		else
			{
			logging::log_message( "Showing creditcard number payment form." , "Stripe" , "DEBUG" );
			jomres_cmsspecific_addheaddata( "css",$eLiveSite."/css/" ,'bootstrap-formhelpers-min.css' );
			jomres_cmsspecific_addheaddata( "css",$eLiveSite."/css/" ,'bootstrapValidator-min.css' );
			
			jomres_cmsspecific_addheaddata( "javascript", $eLiveSite.'js/' , "bootstrapValidator-min.js" );
			jomres_cmsspecific_addheaddata( "javascript", $eLiveSite.'js/' , "bootstrap-formhelpers-min.js" );

			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

			$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );

			$current_property_details					= jomres_singleton_abstract::getInstance( 'basic_property_details' );
			$mrConfig									= getPropertySpecificSettings($invoice_array['invoice_data']['property_uid']);


			$output['PROPERTY_NAME']											= $current_property_details->get_property_name($invoice_array['invoice_data']['property_uid']);
			$output['IMG_PATH']													= get_showtime('live_site')."/jomres/core-plugins/core_gateway_stripe/img/accepted_c22e0.png";
			$output['CONTRACT_TOTAL']											= $invoice_array['invoice_data']['balance']*100;
			$output['PUBLIC_KEY']												= $settingArray['stripe_public_key'];
			$output['_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL']						= jr_gettext('_JOMRES_AJAXFORM_BILLING_BALANCE_PAYMENT','_JOMRES_AJAXFORM_BILLING_BALANCE_PAYMENT',false,false);
			$output['STRIPE_PAYMENT_FORM_SECURE']								= jr_gettext('STRIPE_PAYMENT_FORM_SECURE','STRIPE_PAYMENT_FORM_SECURE',false,false);
			$output['PAYMENT_REFERENCE']										= $invoice_array['payment_reference'] ;
			$output['STRIPE_PAYMENT_FORM_HOLDER']								= jr_gettext('STRIPE_PAYMENT_FORM_HOLDER','STRIPE_PAYMENT_FORM_HOLDER',false,false);
			$output['STRIPE_PAYMENT_FORM_PAYNOW']								= jr_gettext('STRIPE_PAYMENT_FORM_PAYNOW','STRIPE_PAYMENT_FORM_PAYNOW',false,false);
			
			$output['STRIPE_PAYMENTFORM_EMAIL']									= $invoice_array['invoice_data']['payer']['email'];
			$output['CONFIRMATION_PAGE']										= JOMRES_SITEPAGE_URL_NOSEF . "&task=invoice_payment_send&gateway=stripe&invoice_id=".(int)$_GET['invoice_id']."&payment_reference=".$output['PAYMENT_REFERENCE'];
			
			$output['STRIPE_PAYMENT_ERROR_AUTH_FAILED']							= jr_gettext('STRIPE_PAYMENT_ERROR_AUTH_FAILED','STRIPE_PAYMENT_ERROR_AUTH_FAILED',false,false);

			$output['STRIPE_PAYMENTFORM_EMAIL']									= $tmpBookingHandler->tmpguest['email'];

			$output['STRIPE_PAYMENTFORM_NAME']									= $invoice_array['invoice_data']['payer']['firstname']." ".$invoice_array['invoice_data']['payer']['surname'];
			
			$output['CURRENCY'] = $invoice_array['invoice_data']['currencycode'];
			if ( $jrConfig[ 'useGlobalCurrency' ] == "1" )
				{
				$output['CURRENCY'] = $jrConfig[ 'globalCurrencyCode' ];
				}
				
			$intent = \Stripe\PaymentIntent::create([
				'amount' => $output['CONTRACT_TOTAL'],
				'currency' => $output['CURRENCY'],
				'transfer_data' => 
					[
					'destination' => $stripe_user->stripe_user_id,
					]
				]);

			$output['CLIENT_SECRET']	= $intent->client_secret;
			
			$tmpBookingHandler->tmpbooking['stripe']['client_secret'] = $output['CLIENT_SECRET'];
			$tmpBookingHandler->tmpbooking['stripe']['payment_intent_id'] = $intent->id;
			$tmpBookingHandler->tmpbooking['stripe']['amount'] = $output['CONTRACT_TOTAL'];
			$tmpBookingHandler->saveBookingData();

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'payment_form_simple.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->displayParsedTemplate();

			logging::log_message( "Creditcard number payment form shown" , "Stripe" , "DEBUG" );
			}
		}
	}


