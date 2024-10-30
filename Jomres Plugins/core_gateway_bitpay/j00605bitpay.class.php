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


class j00605bitpay {
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

		$settingArray = [];
		$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = ".$tmpBookingHandler->tmpbooking['property_uid']." AND plugin = 'bitpay' ";
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

		// Try to fall back to test mode
		if ( $settingArray[ 'api_token' ] == '' ) {
			$test_mode = true;
			$api_token = trim($settingArray[ 'test_api_token' ]);
		}

			if ( $test_mode && $settingArray[ 'test_api_token' ] =='' ) {
			$test_mode = true;
		}

		if ($test_mode) {
			$bitpay = new BitPaySDKLight\Client($api_token, BitPaySDKLight\Env::Test);
		} else {
			$bitpay = new BitPaySDKLight\Client($api_token, BitPaySDKLight\Env::Prod);
		}

		$CURRENCY = $mrConfig[ 'property_currencycode' ];
		if ( $jrConfig[ 'useGlobalCurrency' ] == "1" )  {
			$CURRENCY = $jrConfig[ 'globalCurrencyCode' ];
		}

		$deposit = (float)$tmpBookingHandler->tmpbooking['deposit_required'] ;
		$invoice = new \BitPaySDKLight\Model\Invoice\Invoice( $deposit , $CURRENCY);
		$invoice->setToken($api_token);
		$invoice->setOrderId($tmpBookingHandler->tmpbooking['booking_number']);
		$invoice->setFullNotifications(true);
		$invoice->setExtendedNotifications(true);
		$invoice->setNotificationURL(JOMRES_SITEPAGE_URL_NOSEF.'&task=bitpay_callback&booking_id='.$tmpBookingHandler->tmpbooking['booking_number']);
		$invoice->setRedirectURL(JOMRES_SITEPAGE_URL_NOSEF.'&task=bitpay_callback&booking_id='.$tmpBookingHandler->tmpbooking['booking_number']);
		$invoice->setItemDesc(jr_gettext('_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL' , '_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL' , false ));
		$invoice->setNotificationEmail("");

		$buyer = new \BitPaySDKLight\Model\Invoice\Buyer();
		$buyer->setName($tmpBookingHandler->_tmpguest['firstname']." ".$tmpBookingHandler->tmpguest['surname']);
		$buyer->setEmail($tmpBookingHandler->tmpguest["email"]);
		$buyer->setAddress1($tmpBookingHandler->_tmpguest['house']." ".$tmpBookingHandler->_tmpguest['street']);
		$buyer->setAddress2("");
		$buyer->setCountry($tmpBookingHandler->_tmpguest['country']);
		$buyer->setLocality($tmpBookingHandler->_tmpguest['town']);
		$buyer->setNotify(true);
		$buyer->setPhone($tmpBookingHandler->_tmpguest['tel_mobile']);
		$buyer->setPostalCode($tmpBookingHandler->_tmpguest['postcode']);
		$region_name = find_region_name($tmpBookingHandler->_tmpguest[ 'region' ]);
		$buyer->setRegion($region_name);

		$invoice->setBuyer($buyer);

		try {
			$basicInvoice = $bitpay->createInvoice($invoice);
		} catch (Exception $e) {
				echo "Error ".$e->getMessage();
				return;
		}


		$reflection = new ReflectionClass($basicInvoice);
		$property = $reflection->getProperty('_url');
		$property->setAccessible(true);
		$url = $property->getValue($basicInvoice);

		$property = $reflection->getProperty('_id');
		$property->setAccessible(true);
		$bitpay_invoice_id = $property->getValue($basicInvoice);

		$tmpBookingHandler->tmpbooking['bitpay_invoice_id'] = $bitpay_invoice_id;
		$tmpBookingHandler->close_jomres_session();  // Make sure that the bitpay invoice id is saved

		$output = [];
		$page_output = [];

		$output['REDIRECT_URL'] = JOMRES_SITEPAGE_URL_NOSEF.'&task=bitpay_callback';
		$output['INVOICE_ID'] = $bitpay_invoice_id;
		$output['TEST_MODE'] = (bool)$test_mode;
		$output['BITPAY_PAYMENT_FAILED_BLURB']=jr_gettext('BITPAY_PAYMENT_FAILED_BLURB', 'BITPAY_PAYMENT_FAILED_BLURB', false);

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'payment_javascript.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
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

