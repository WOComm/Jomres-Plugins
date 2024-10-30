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

class j06001approve_enquiry {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$property_uid = getDefaultProperty();
		$approvalSuccessful = true;
		
		$contract_uid = (int)jomresGetParam($_REQUEST,'contractUid','0');
		if ($contract_uid == 0)
			return;
		
		$current_contract_details = jomres_singleton_abstract::getInstance( 'basic_contract_details' );
		$current_contract_details->gather_data($contract_uid, $property_uid);

		$rooms_tariffs = $current_contract_details->contract[$contract_uid]['contractdeets']['rooms_tariffs'];
		$date_range_string = $current_contract_details->contract[$contract_uid]['contractdeets']['date_range_string'];
		
		// Now to double check that the rooms haven't been booked while this person was paying
		$dateRangeArray = explode( ",", $date_range_string );
		$n = count( $dateRangeArray );

		for ( $i = 0, $n; $i < $n; $i++ )
			{
			$roomBookedDate = $dateRangeArray[ $i ];
			$selected       = explode( ",", $rooms_tariffs );
			foreach ( $selected as $roomsRequested )
				{
				$rm            = explode( "^", $roomsRequested );
				$rmuid         = $rm[ 0 ];
				$rates_uids[ ] = $rm[ 1 ];
				$query         = "SELECT room_bookings_uid FROM #__jomres_room_bookings WHERE `room_uid` = '" . (int) $rmuid . "' AND `date` = '" . $roomBookedDate . "'";
				$result        = doSelectSql( $query );
				if ( !empty( $result ) )
					{
					echo '<p class="alert alert-error">This booking can`t be approved because '.$roomBookedDate.' is booked for the selected room uid '.$rmuid.'</p>';
					$approvalSuccessful = false;
					}
				}
			}

		if ($approvalSuccessful === true)
			{
			//insert in _jomres_room_bookings table
			$rates_uids = array ();
			for ( $i = 0, $n; $i < $n; $i++ )
				{
				$roomBookedDate = $dateRangeArray[ $i ];
				$selected = explode( ",", $rooms_tariffs );
				foreach ( $selected as $roomsRequested )
					{
					$rm            = explode( "^", $roomsRequested );
					$rmuid         = $rm[ 0 ];
					$rates_uids[ ] = $rm[ 1 ];
					$query         = "INSERT INTO #__jomres_room_bookings (`room_uid`,`date`,`contract_uid`,`internet_booking`,`reception_booking`,`property_uid`) VALUES ('" . (int) $rmuid . "','$roomBookedDate','" . (int) $contract_uid . "','1','0','" . (int) $property_uid . "')";
					if ( !doInsertSql( $query, "" ) )
						{
						echo '<p class="alert alert-error">Failed to insert booking when inserting to room bookings table</p>';
						}
					}
				}
			
			//update _jomres_contracts table to set booking as approved
			$query = "UPDATE #__jomres_contracts SET `approved` = '1' WHERE contract_uid = '".(int)$contract_uid."' ";
			if ( !doInsertSql( $query, "", false ) )
				{
				trigger_error( "Failed to update contract details for booking approval ", E_USER_ERROR );
				}
			
			$webhook_notification = new stdClass();
			$webhook_notification->webhook_event = 'booking_added';
			$webhook_notification->webhook_event_description = 'Logs when a booking is added.';
			$webhook_notification->webhook_event_plugin = 'core';
			$webhook_notification->data = new stdClass();
			$webhook_notification->data->property_uid = $property_uid;
			$webhook_notification->data->contract_uid = $contract_uid;
			add_webhook_notification($webhook_notification);

			//set $componentArgs now, because later we`ll reset the $current_contract_details object
			$componentArgs = array ();
			$componentArgs['property_uid'] = $property_uid;
			$componentArgs['contract_uid'] = $contract_uid;
			$componentArgs['contract_total'] = $current_contract_details->contract[$contract_uid]['contractdeets']['contract_total'];
			$componentArgs['cartnumber'] = $current_contract_details->contract[$contract_uid]['contractdeets']['tag'];
			$componentArgs['approved'] = 1;
			$componentArgs['bypass_checks'] = 1;
			
			//add a booking note that the booking enquiry has been approved
			$query = "INSERT INTO #__jomcomp_notes (`contract_uid`,`note`,`timestamp`,`property_uid`) VALUES ('" . (int) $contract_uid . "','" . "Booking enquiry approved" . "','".date( "Y-m-d H-i-s" )."','" . (int) $property_uid . "')";
			doInsertSql( $query, "" );
			
			//data has been changed for this contract so before gathering it for the approval email, we`ll have to reset it
			$current_contract_details->__construct();
			
			$MiniComponents->specificEvent( '03120', 'send_email_guest_enquiryapproval', $componentArgs );
			
			if ( $MiniComponents->eventFileExistsCheck( '07010' ) )
				{
				$MiniComponents->triggerEvent( '07010', $componentArgs ); // Allows us to run post insertion functionality for importing into foreign systems. Currently used for inserting commission line items
				}

			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=list_bookings"), "" );
			}
		else
			echo '<p class="alert alert-error">Error. Booking can`t be approved</p>';
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
