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

/**
#
 * Deletes a black booking
 #
* @package Jomres
#
 */
class j06001delete_multiple_blackbookings {
	/**
	#
	 * Constructor: Deletes a black booking
	#
	 */
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$defaultProperty=getDefaultProperty();
		
		$idarray = jomresGetParam( $_REQUEST, 'idarray', array() );
		$completed_successfully = true;
		
		$jomres_messaging =jomres_getSingleton('jomres_messages');
		$jomres_messaging->set_message(jr_gettext('_JOMRES_MR_AUDIT_BLACKBOOKING_DELETE','_JOMRES_MR_AUDIT_BLACKBOOKING_DELETE',FALSE));
		foreach ($idarray as $uid)
			{
			jr_import('jomres_generic_booking_cancel');
			$bkg = new jomres_generic_booking_cancel();

			$bkg->property_uid = $defaultProperty;
			$bkg->contract_uid = $uid;
			$bkg->reason = '';
			$bkg->note = '';

			$cancellationSuccessful = $bkg->cancel_booking();
			}
		
		if ($completed_successfully)
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=list_black_bookings"),jr_gettext('_JOMRES_MR_AUDIT_BLACKBOOKING_DELETE','_JOMRES_MR_AUDIT_BLACKBOOKING_DELETE',FALSE) );
		else
			trigger_error ("Error: Failed to delete all black bookings", E_USER_ERROR);
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
		return null;
		}
	}
