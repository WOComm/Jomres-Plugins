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


class j00605braintree {
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
		$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = ".$tmpBookingHandler->tmpbooking['property_uid']." AND plugin = 'braintree' ";
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

		$output = [];
		$pageoutput = [];

		$output['CLIENT_TOKEN'] = $gateway->clientToken()->generate([]);
		$output['_JRPORTAL_INVOICES_PAYNOW']=jr_gettext('_JRPORTAL_INVOICES_PAYNOW', '_JRPORTAL_INVOICES_PAYNOW', false);
		$output['CALLBACK_URL'] =  JOMRES_SITEPAGE_URL_NOSEF.'&task=braintree_callback';

		$tmpBookingHandler->tmpbooking['braintree_client_token'] = $output['CLIENT_TOKEN'];
		$tmpBookingHandler->tmpbooking['braintree_order_id'] = $tmpBookingHandler->tmpbooking['booking_number'];
		$tmpBookingHandler->close_jomres_session();  // Make sure that the bitpay invoice id is saved

		$output['DEPOSIT'] = 	output_price($tmpBookingHandler->tmpbooking['deposit_required'] , $CURRENCY , false ) ;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'payment_form.html');
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

