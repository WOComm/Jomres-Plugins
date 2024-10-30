<?php
/**
 * Connect plugin
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.22.0
 *
 * @copyright	2005-2020 Vince Wooll
 *
 * This file is NOT open source and you are not allowed to distribute it, for any reason.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j03200western_union
{
	function __construct($componentArgs)
	{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; return;
			}

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		if (!isset($tmpBookingHandler->tmpbooking['western_union_gateway_selected'])) {
			return;
		}

		$property_uid = $tmpBookingHandler->tmpbooking['property_uid'];
		$contract_uid = $componentArgs[ 'contract_uid' ];
		$booking_note = jr_gettext('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN','JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN' , false );

		addBookingNote( $contract_uid , $property_uid , $booking_note );

	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
