<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j03108western_union
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		if (isset($tmpBookingHandler->tmpbooking['western_union_gateway_selected'])) {
			unset($tmpBookingHandler->tmpbooking['western_union_gateway_selected']); // Unset this option if it was previously set, guest went to another gateway after previously choosing wu? If so, we don't want this gateway's 03200 script recording that payment will be via wu when that's not true
			}

		$this->filepath=$ePointFilepath;
		$this->gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'."western_union","Western Union",false,false);
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return array('filepath'=>$this->filepath,'gatewayname'=>$this->gatewayname);
		}		
	}
