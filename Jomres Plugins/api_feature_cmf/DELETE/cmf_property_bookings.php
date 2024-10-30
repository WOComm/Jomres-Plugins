<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


/**
*
* Delete (cancel) all property bookings
*
*/

Flight::route('DELETE /cmf/property/bookings/@id', function($property_uid)
	{
    require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
		$cancellationSuccessful = false;

		jr_import('jomres_generic_booking_cancel');
		$bkg = new jomres_generic_booking_cancel();

		$bookings = cmf_utilities::get_property_bookings( $property_uid );
		
		if (!empty($bookings)) {
			$contract_uids = array();
			foreach ($bookings as $booking ) {
				$contract_uids[]= $booking['contract_uid'];
			}
			
		}
		$contract_uids = array_unique($contract_uids);
		
		if (!empty($contract_uids)) {
			jr_import('jomres_generic_booking_cancel');
			foreach ($contract_uids as $contract_uid) {
				$bkg = new jomres_generic_booking_cancel();
				
				$bkg->property_uid = $property_uid;
				$bkg->contract_uid = $contract_uid;
				$bkg->reason = '';
				$bkg->note = jr_gettext('_CMF_CANCELLED_BOOKING', '_CMF_CANCELLED_BOOKING', false);

				//Finally let`s cancel the booking
				$cancellationSuccessful = $bkg->cancel_booking();
			}
		}

	
	$response = true;
	
	Flight::json( $response_name = "response" ,$response );
	});