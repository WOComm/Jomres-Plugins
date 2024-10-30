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


class j02990x_bypass_cofirmation {
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if ($jrConfig['bypass_confirmation'] != '1') {
			return;
		}
		
		//if this is a secret key payment (for an approved booking enquiry) we don`t want to bypass confirmation
		$sk = jomresGetParam($_REQUEST, 'sk', '');

        if ($sk != '') {
            return;
        }

		$bypass_confirmation_plugin_name = get_showtime('bypass_confirmation_plugin_name');

		if ( is_null($bypass_confirmation_plugin_name) || $bypass_confirmation_plugin_name == '') {
			return;
		}

		$bookingDeets = gettempBookingdata();

		if (!$bookingDeets['ok_to_book'])
			return;
		else
			{
			$tmpBookingHandler = jomres_singleton_abstract::getInstance( 'jomres_temp_booking_handler' );
			echo '</div>';  // Prevents the confirmation form from being seen
			echo '<script>window.location.href = \''.JOMRES_SITEPAGE_URL_NOSEF.'&no_html=1&jrajax=1&task=processpayment&jsid='.$tmpBookingHandler->jomressession.'&plugin='.get_showtime('bypass_confirmation_plugin_name').'\'</script>';
			}
		}

	function getRetVals()
		{
		return null;
		}
	}
