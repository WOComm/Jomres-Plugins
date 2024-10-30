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

class j03200idev_affiliates {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if (trim($jrConfig[ 'idev_affiliates_pathtosalephp' ]) == '' || trim($jrConfig[ 'idev_affiliates_profile' ]) =='') {
			return;
		}
		
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');

		$contract_total = $tmpBookingHandler->getBookingFieldVal("contract_total");
		$bookingNum = $componentArgs['cartnumber'];
		
		echo '<img border="" src="http://'.$jrConfig[ 'idev_affiliates_pathtosalephp' ].'sale.php?profile='.$jrConfig[ 'idev_affiliates_profile' ].'&idev_saleamt='.$contract_total.'&idev_ordernum='.$bookingNum.'" width="1" height="1">';
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
