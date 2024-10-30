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

class j00605stripe {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$eLiveSite = get_showtime('eLiveSite');
		$ePointFilepath = get_showtime('ePointFilepath');

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
			
		
		if ( !isset($settingArray[ 'application_fee' ]) || trim($settingArray[ 'application_fee' ]) =="" )
			{
			$message = "Application fee (Stripe Connect Commission) not set. Please set this in Administrator -> Jomres -> Payment methods -> Gateways -> Stripe. If you are not collecting Connect commission rates then a rate of 0 is acceptable.";
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
		
		$site_commission_rate = bcdiv ($settingArray['application_fee'] , 100 , 3 );

		if ($site_commission_rate > 0)
			{
			// We need to calculate the application fee. This is basically this website's commission.
			$site_commission = bcmul ($booking_total , $site_commission_rate , 3 );
			}
		else
			$site_commission = 0;

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
	
		$manager_id = $property_manager_xref[ $tmpBookingHandler->tmpbooking['property_uid'] ];

		jr_import("stripe_user");
		$stripe_user=new stripe_user();
		$stripe_user->getStripeUser($manager_id);

		// Now to decided if we'll need to show the form, or actually check the payment intent has completed the charge
		if ( isset($tmpBookingHandler->_tmpbooking['stripe']['payment_intent_id']) && $tmpBookingHandler->_tmpbooking['stripe']['payment_intent_id'] != '' ) {

			$payment_intent_client_secret = $tmpBookingHandler->_tmpbooking['stripe']['client_secret'];

			$payment_intent = \Stripe\PaymentIntent::retrieve($tmpBookingHandler->_tmpbooking['stripe']['payment_intent_id']);

			if ($payment_intent->status == 'succeeded') {
				$message = "Deposit payment of ".floor ($deposit_required)." ".$tmpBookingHandler->tmpbooking['property_currencycode']." paid";
				logging::log_message( $message , "Stripe" , "INFO" );
				logging::log_message( $message , "Core" , "INFO" );
					
				$tmpBookingHandler->updateBookingField('depositpaidsuccessfully',true);
					
				$transaction_id = $payment_intent->id;
				$management_url = 'https://dashboard.stripe.com/';
				if ($is_test_key)
					$management_url .='test/';
				$management_url .= 'payments/'.$payment_intent->id;
				$payment_method = 'stripe';
					
				set_showtime("gateway_payment_method" , $payment_method );
				set_showtime("gateway_management_url" , $management_url );
				set_showtime("gateway_transaction_id" , $transaction_id );
					
				$result=insertInternetBooking(get_showtime('jomressession'),true,true);
			 } else {
				$output['STRIPE_PAYMENT_FAILED'] = jr_gettext('STRIPE_PAYMENT_FAILED','STRIPE_PAYMENT_FAILED',false,false);
				$output['CONFIRMATION_PAGE'] =  JOMRES_SITEPAGE_URL . "&task=dobooking";
				$output['STRIPE_PAYMENT_TRY_AGAIN'] = jr_gettext('STRIPE_PAYMENT_TRY_AGAIN','STRIPE_PAYMENT_TRY_AGAIN',false,false);

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'payment_cancelled.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->displayParsedTemplate();
				}
			}
		else
			{
			logging::log_message( "Showing creditcard number payment form." , "Stripe" , "DEBUG" );
			jomres_cmsspecific_addheaddata( "css",$eLiveSite."/css/" ,'bootstrap-formhelpers-min.css' );
			jomres_cmsspecific_addheaddata( "css",$eLiveSite."/css/" ,'bootstrapValidator-min.css' );
			
			jomres_cmsspecific_addheaddata( "javascript", $eLiveSite.'js/' , "bootstrapValidator-min.js" );
			jomres_cmsspecific_addheaddata( "javascript", $eLiveSite.'js/' , "bootstrap-formhelpers-min.js" );

			$current_property_details					= jomres_singleton_abstract::getInstance( 'basic_property_details' );

			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
			$output['BOOKING_NUMBER']	= $tmpBookingHandler->tmpbooking['booking_number'];


			$output['PROPERTY_NAME']											= $current_property_details->get_property_name($tmpBookingHandler->tmpbooking['property_uid']);
			$output['CONTRACT_TOTAL']											= floor ($deposit_required*100);
			$output['CONTRACT_TOTAL_DISPLAY']									= output_price($deposit_required , $output['CURRENCY'] , false , false );
			$output['PUBLIC_KEY']												= $settingArray['stripe_public_key'];
			
			$output['IMG_PATH']													= $eLiveSite."img/accepted_c22e0.png";
			
			$output['_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL']						= jr_gettext('_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL','_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL',false,false);
			$output['STRIPE_PAYMENT_FORM_SECURE']								= jr_gettext('STRIPE_PAYMENT_FORM_SECURE','STRIPE_PAYMENT_FORM_SECURE',false,false);
			$output['STRIPE_PAYMENTFORM_NAME']									= $tmpBookingHandler->tmpguest['firstname']." ".$tmpBookingHandler->tmpguest['surname'];
			$output['STRIPE_PAYMENT_FORM_HOLDER']								= jr_gettext('STRIPE_PAYMENT_FORM_HOLDER','STRIPE_PAYMENT_FORM_HOLDER',false,false);
			$output['STRIPE_PAYMENT_FORM_PAYNOW']								= jr_gettext('STRIPE_PAYMENT_FORM_PAYNOW','STRIPE_PAYMENT_FORM_PAYNOW',false,false);
			$output['CONFIRMATION_PAGE']										=  JOMRES_SITEPAGE_URL_NOSEF . "&task=processpayment";
			
			$output['STRIPE_PAYMENTFORM_STREET']								= $tmpBookingHandler->tmpguest['house']." ".$tmpBookingHandler->tmpguest['street'];
			$output['STRIPE_PAYMENTFORM_TOWN']									= $tmpBookingHandler->tmpguest['town'];
			$output['STRIPE_PAYMENTFORM_REGION']								= find_region_name($tmpBookingHandler->tmpguest['region']);
			$output['STRIPE_PAYMENTFORM_POSTCODE']								= $tmpBookingHandler->tmpguest['postcode'];
			$output['STRIPE_PAYMENTFORM_COUNTRY']								= $tmpBookingHandler->tmpguest['country'];
			
			$output['STRIPE_PAYMENT_ERROR_AUTH_FAILED']							= jr_gettext('STRIPE_PAYMENT_ERROR_AUTH_FAILED','STRIPE_PAYMENT_ERROR_AUTH_FAILED',false,false);

			$output['STRIPE_PAYMENTFORM_EMAIL']									= $tmpBookingHandler->tmpguest['email'];

			$output['STRIPE_PAYMENT_FORM_TOPAY']							= jr_gettext('STRIPE_PAYMENT_FORM_TOPAY','STRIPE_PAYMENT_FORM_TOPAY',false,false);
			$output['_JOMRES_BOOKING_NUMBER']							= jr_gettext('_JOMRES_BOOKING_NUMBER','_JOMRES_BOOKING_NUMBER',false,false);

			$output['ALERT_STATE'] = "default";
			$output['TEST_MODE_TEXT'] = '';
			if ($is_test_key) {
				$output['ALERT_STATE'] = "warning";
				$output['TEST_MODE_TEXT'] = 'TEST MODE';
			}

			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

			$address_array = array();

			$address_array['line1']			= $tmpBookingHandler->_tmpguest['house'];
			$address_array['line2']			= $tmpBookingHandler->_tmpguest['street'];
			$address_array['city']			= $tmpBookingHandler->_tmpguest['town'];
			$address_array['state']			= $tmpBookingHandler->_tmpguest['region'];
			$address_array['postal_code']	= $tmpBookingHandler->_tmpguest['postcode'];
			$address_array['country']		= $tmpBookingHandler->_tmpguest['country'];

			if (!isset($thisJRUser->params['stripe']['customer']['id'] )) {
				$customer = \Stripe\Customer::create([
					'email'			=> $tmpBookingHandler->tmpguest["email"],
					'name'			=> $tmpBookingHandler->_tmpguest['firstname']." ".$tmpBookingHandler->_tmpguest['firstname'],
					'address'		=> $address_array
					]);
				$customer_id = $customer->id;
			} else {
				$customer_id = $thisJRUser->params['stripe']['customer']['id'];
			}

			$tmpBookingHandler->tmpbooking['stripe']['customer_id'] = $customer_id;

			$intent = \Stripe\PaymentIntent::create([
				'amount'			=> $output['CONTRACT_TOTAL'],
				'currency'			=> $output['CURRENCY'],
				'description'		=> $output['STRIPE_PAYMENTFORM_NAME']." - ".$output['_JOMRES_BOOKING_NUMBER']." : ".$output['BOOKING_NUMBER'],
				'transfer_data'		=>
					[
					'destination'	=> $stripe_user->stripe_user_id,
					],
				'metadata' => [
					'booking_number'	=> $output['BOOKING_NUMBER'],
				],
				'customer'			=> $customer_id
				]);

			if ($site_commission > 0) {
				\Stripe\PaymentIntent::update(
					$intent->id,
					[
					'application_fee_amount' => (int)$site_commission*100
					]
				);
			}

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

if (!function_exists(bcmul)) {
	function bcmul($_ro, $_lo, $_scale=0) {
		return round($_ro*$_lo, $_scale);
	}
}

if (!function_exists(bcdiv)) {
	function bcdiv($_ro, $_lo, $_scale=0) {
		return round($_ro/$_lo, $_scale);
	}
}
