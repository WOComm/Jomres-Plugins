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

class j03108cheque
	{
	function __construct ()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		if (isset($tmpBookingHandler->tmpbooking['cheque_gateway_selected'])) {
			unset($tmpBookingHandler->tmpbooking['cheque_gateway_selected']); // Unset this option if it was previously set, guest went to another gateway after previously choosing chequeue? If so, we don't want this gateway's 03200 script recording that payment will be via cheue when that's not true
		}


		$this->filepath=get_showtime('ePointFilepath');
		$this->gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'."cheque","cheque",false,false);
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return array('filepath'=>$this->filepath,'gatewayname'=>$this->gatewayname);
		}
	}
