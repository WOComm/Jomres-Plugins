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

class j06002saveCoupon {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$defaultProperty = getDefaultProperty();
		
		jr_import( 'jrportal_coupons' );
		$jrportal_coupons = new jrportal_coupons();
		
		$jrportal_coupons->id = (int)jomresGetParam( $_REQUEST, 'coupon_id', 0 );
		$jrportal_coupons->property_uid	= (int)$defaultProperty;
		$jrportal_coupons->coupon_code = jomresGetParam( $_POST, 'coupon_code', '' );
		$jrportal_coupons->valid_from = JSCalConvertInputDates(jomresGetParam( $_POST, 'valid_from', ''));
		$jrportal_coupons->valid_to = JSCalConvertInputDates(jomresGetParam( $_POST, 'valid_to', ''));
		$jrportal_coupons->amount = jomresGetParam( $_POST, 'amount', 0.00 );
		$jrportal_coupons->is_percentage = (int)jomresGetParam( $_POST, 'is_percentage', 1 );
		$jrportal_coupons->booking_valid_from = JSCalConvertInputDates(jomresGetParam( $_POST, 'booking_valid_from', ''));
		$jrportal_coupons->booking_valid_to = JSCalConvertInputDates(jomresGetParam( $_POST, 'booking_valid_to', ''));
		$jrportal_coupons->guest_uid = (int)jomresGetParam( $_POST, 'guest_uid', 0 );

		if ($jrportal_coupons->id > 0) {
			$jrportal_coupons->commit_update_coupon();
		} else {
			$jrportal_coupons->commit_new_coupon();
		}

		$jomres_messaging =jomres_singleton_abstract::getInstance('jomres_messages');
		$jomres_messaging->set_message(jr_gettext('_JOMRES_MR_AUDIT_UPDATE_COUPON','_JOMRES_MR_AUDIT_UPDATE_COUPON',FALSE));
			
		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=listCoupons"), jr_gettext('_JOMRES_MR_AUDIT_UPDATE_COUPON','_JOMRES_MR_AUDIT_UPDATE_COUPON',FALSE));
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
