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

class j03108braintree
	{
	function __construct ()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$this->gatewayname	='';
		$this->filepath		='';

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');

		if (isset($tmpBookingHandler->tmpbooking['property_uid']) && $tmpBookingHandler->tmpbooking['property_uid'] > 0 ) {

			$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = ".$tmpBookingHandler->tmpbooking['property_uid']." AND plugin = 'braintree' ";
			$settingsList = doSelectSql( $query );
			if ( count ($settingsList) > 0) {
				foreach ( $settingsList as $set ) {
					$settingArray[ $set->setting ] = trim($set->value);
				}
			}

			if (!isset($settingArray)){
				return false;
			}

			if ($settingArray['active'] == '0') {
				return false;
			}

			if ($settingArray['test_mode'] =='1') {
				$merchant_id = $settingArray['test_merchant_id'];
				$public_key = $settingArray['test_public_key'];
				$private_key = $settingArray['test_private_key'];
			} else {
				$merchant_id = $settingArray['merchant_id'];
				$public_key = $settingArray['public_key'];
				$private_key = $settingArray['private_key'];
			}

			if ($merchant_id == '' ) { // We can't use this gateway, but we are not going to throw an exception
				return false;
			}

			if ($public_key == '' ) { // We can't use this gateway, but we are not going to throw an exception
				return false;
			}

			if ($private_key == '' ) { // We can't use this gateway, but we are not going to throw an exception
				return false;
			}

			$this->filepath		= get_showtime('ePointFilepath');
			$this->gatewayname	= jr_gettext('BRAINTREE_TITLE',"BRAINTREE_TITLE",false,false);
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
		return array('filepath'=>$this->filepath,'gatewayname'=>$this->gatewayname);
		}
	}
