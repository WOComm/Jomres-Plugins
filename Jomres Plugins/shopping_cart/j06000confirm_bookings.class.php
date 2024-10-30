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

class j06000confirm_bookings
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');

		if (empty($tmpBookingHandler->cart_data))
			{
			echo jr_gettext('_JOMRES_CART_NOBOOKINGS_SAVED','_JOMRES_CART_NOBOOKINGS_SAVED');
			}
		else
			{
			jr_import('jomres_cart');
			$cart = new jomres_cart();
			$cart->build_booking_form_data_for_payment_gateways();
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=processpayment", '' ));
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
