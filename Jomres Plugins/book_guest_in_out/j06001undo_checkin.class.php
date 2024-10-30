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

class j06001undo_checkin 
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$defaultProperty = getDefaultProperty();
		
		$contract_uid = (int)jomresGetParam( $_REQUEST, 'contract_uid', 0 );
		
		jr_import('jrportal_booking_manager');
        $jrportal_booking_manager = new jrportal_booking_manager();
		$jrportal_booking_manager->contract_uid = (int)$contract_uid;
		$jrportal_booking_manager->property_uid = (int)$defaultProperty;
		$jrportal_booking_manager->undo_guest_checkin();

		$jomres_messaging =jomres_getSingleton('jomres_messages');
		$jomres_messaging->set_message("Undone guest checkin");
		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=edit_booking&contract_uid=".$contract_uid),  "Undone guest checkin" );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
