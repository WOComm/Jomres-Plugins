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

class j00005stripe
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}

		if (!defined("STRIPE_JS_LOADED")) {
			jomres_cmsspecific_addcustomtag( '<script src="https://js.stripe.com/v3/"></script>' );
			define('STRIPE_JS_LOADED' , 1 );
		}

		
		require_once($ePointFilepath.'sdk'.JRDS.'vendor'.JRDS.'autoload.php');
		
		// Ensure that we reset the stripe cart data if we go to a new page
		if (get_showtime('task') != 'processpayment' && get_showtime('task') != 'invoice_payment_send' ) {
			$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
			$tmpBookingHandler->tmpbooking['stripe'] = array();
		}
		
		
		}

		
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
