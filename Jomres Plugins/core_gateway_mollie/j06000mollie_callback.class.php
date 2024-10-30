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

class j06000mollie_callback
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

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');

		$ePointFilepath = get_showtime('ePointFilepath');

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

		$payment = $mollie->payments->get($tmpBookingHandler->tmpbooking['mollie_invoice_id']);

		if ($payment->isPaid()) {
				insertInternetBooking(get_showtime('jomressession'),true,true);
		} else {
			property_header($tmpBookingHandler->tmpbooking['property_uid']);

			$booking_form_url = get_booking_url($tmpBookingHandler->tmpbooking['property_uid']);

			$pageoutput	= [];
			$output 		= [];

			$output['MOLLIE_PAYMENT_FAILED']=jr_gettext('MOLLIE_PAYMENT_FAILED', 'MOLLIE_PAYMENT_FAILED', false);
			$output['MOLLIE_PAYMENT_FAILED_BLURB']=jr_gettext('MOLLIE_PAYMENT_FAILED_BLURB', 'MOLLIE_PAYMENT_FAILED_BLURB', false);
			$output['MOLLIE_PAYMENT_FAILED_BUTTON']=jr_gettext('MOLLIE_PAYMENT_FAILED_BUTTON', 'MOLLIE_PAYMENT_FAILED_BUTTON', false);

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
