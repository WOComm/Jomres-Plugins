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

class j06001reject_enquiry {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$property_uid = getDefaultProperty();
		$cancellationSuccessful = false;
		
		$contract_uid = (int)jomresGetParam($_REQUEST,'contractUid','0');
		if ($contract_uid == 0)
			return;
		
		jr_import( 'jomres_generic_booking_cancel' );
		$bkg = new jomres_generic_booking_cancel();
		
		//OK, let`s move on and set the booking details
		//approval statuses: 0 - enquiry; 1 - approved; 2 - rejected
		$bkg->property_uid 		= $property_uid;
		$bkg->contract_uid 		= $contract_uid;
		$bkg->reason	 		= "Booking enquiry rejected";
		$bkg->note				= "Booking enquiry rejected";
		$bkg->approved			= 2;

		//Finally let`s cancel the booking
		$cancellationSuccessful = $bkg->cancel_booking();
		
		$query = "UPDATE `#__jomres_contracts` SET `rejected` = 1 WHERE `contract_uid` =  ".$contract_uid;
		doInsertSql($query);
		
		if ($cancellationSuccessful === true)
			{
			$componentArgs = array ();
			$componentArgs['property_uid'] = $property_uid;
			$componentArgs['contract_uid'] = $contract_uid;

			$MiniComponents->specificEvent( '03120', 'send_email_guest_enquiryrejection', $componentArgs );
			
			//add a booking note that the booking enquiry has been rejected
			$query = "INSERT INTO #__jomcomp_notes (`contract_uid`,`note`,`timestamp`,`property_uid`) VALUES ('" . (int) $contract_uid . "','" . "Booking enquiry rejected" . "','".date( "Y-m-d H-i-s" )."','" . (int) $property_uid . "')";
			doInsertSql( $query, "" );

			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=list_bookings"), "" );
			}
		else
			echo "Error. Booking can`t be cancelled.";
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
