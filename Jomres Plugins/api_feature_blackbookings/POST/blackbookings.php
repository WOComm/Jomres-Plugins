<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Add Black Booking
	** Description | Create a black booking after sending the property uid, date and room uid. Responds with N where N = the contract uid of the black booking. Date must be sent in Y-m-d format.
	** Plugin | api_feature_properties
	** Scope | properties_set
	** URL | blackbookings
 	** Method | POST
	** URL Parameters | blackbookings/@id/@roomid/@date
	** Data Parameters | 
	** Success Response | {
  "data": {
    "addblackbookings": 90
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | {"meta":{"code":204,"error_message":"Room already booked this date"}}
	** Sample call |jomres/api/blackbookings/8/79/2017-08-05
	** Notes | 
*/

Flight::route('POST /blackbookings/@id/@room_uid/@date', function($property_uid, $room_uid , $StartDate) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$start=date_format(date_create($StartDate),"Y/m/d");
	$end=date_format(date_add(date_create($StartDate), date_interval_create_from_date_string('1 days')),"Y/m/d");
    
    $query = "SELECT room_uid FROM #__jomres_rooms WHERE propertys_uid = ".(int)$property_uid." AND room_uid = ".(int)$room_uid." LIMIT 1";
    $result =doSelectSql($query);

    if (empty($result)) {
        Flight::halt(204, "Room does not exist");
        }
	
    $query = "SELECT room_bookings_uid FROM #__jomres_room_bookings WHERE property_uid = ".(int)$property_uid." AND room_uid = ".(int)$room_uid." AND date = '".$start."' LIMIT 1";
    $result =doSelectSql($query);
    if (!empty($result)) {
        Flight::halt(204, "Room already booked this date");
        }
    
	$keeplooking  = true;
	while ( $keeplooking ):
		$cartnumber = mt_rand( 10000000, 99999999 );
		$query  = "SELECT contract_uid FROM #__jomres_contracts WHERE tag = '" . $cartnumber . "' LIMIT 1";
		$bklist = doSelectSql( $query );
		if ( count( $bklist ) == 0 ) 
			$keeplooking = false;
	endwhile;

	$numberOfAdults="0";
	$numberOfChildren="0";
	$arrivalDate=$start;
	$departureDate=$end;
	$dateRangeString=$start;
    
	$guests_uid="0";
	$rates_uid="0";
	$cotRequired="0";
	$rate_rules="0";
	$single_person_suppliment="0";
	$deposit_required="0";
	$contract_total="0";
	$specialReqs='';
	$cot_suppliment="0";
	$extras="0";
	$extrasValue="0";

	$query="INSERT INTO #__jomres_contracts (
			`arrival`,`departure`,`rates_uid`,
			`guest_uid`,`contract_total`,`special_reqs`,
			`adults`,`children`,`deposit_paid`,`deposit_required`,
			`date_range_string`,`booked_in`,`booked_out`,`rate_rules`,
			`property_uid`,`single_person_suppliment`,`extras`,`extrasvalue`,`tag`)
			VALUES (
			'$arrivalDate','$departureDate','".(int)$rates_uid."',
			'".(int)$guests_uid."','".(float)$contract_total."','$specialReqs',
			'$numberOfAdults','$numberOfChildren','0','".(float)$deposit_required."',
			'$dateRangeString','0','0','$rate_rules',
			'".(int)$property_uid."','".(float)$single_person_suppliment."','$extras','".(float)$extrasValue."' , '".$cartnumber."')";
    
	$contract_uid=doInsertSql($query,'');

    $userid = Flight::get("user_id");
    
    $username = jomres_cmsspecific_getCMS_users_frontend_userdetails_by_id($userid);
    $message =  $username[$userid]['name']." ".jr_gettext("_JOMRES_MR_AUDIT_BLACKBOOKING","_JOMRES_MR_AUDIT_BLACKBOOKING",false,false);
    addBookingNote($contract_uid, $property_uid, $message );
      
	if ( !$contract_uid ) {
		error_logging ("Unable to insert into contracts table, mysql db failure", E_USER_ERROR);
        }
	else {
		set_showtime('last_added_contract_uid' , $contract_uid ); // For the beds24 plugin to add the booking to beds24
		jomres_audit($query,jr_gettext('_JOMRES_MR_AUDIT_BLACKBOOKING','_JOMRES_MR_AUDIT_BLACKBOOKING',FALSE));
		if ($contract_uid)
			{
			$dateRangeArray=explode(",",$dateRangeString);
			$query="INSERT INTO #__jomres_room_bookings
					(`room_uid`,
					`date`,
					`contract_uid`,
					`black_booking`,
					`internet_booking`,
					`reception_booking`,
					`property_uid`)
					VALUES ";
					for ($i=0, $n=count($dateRangeArray); $i < $n; $i++)
						{
						$internetBooking=0;
						$receptionBooking=0;
						$blackBooking=1;
						$roomBookedDate=$dateRangeArray[$i];

						$query.= ($i>0) ? ', ':'';
						$query.="('".(int)$room_uid."','$roomBookedDate','".(int)$contract_uid."','".(int)$blackBooking."','".(int)$internetBooking."','".(int)$receptionBooking."','".(int)$property_uid."')";
						}
			if (!doInsertSql($query,'')) {
				error_logging ("Unable to insert into room bookings table, mysql db failure", E_USER_ERROR);
			} else {
				// An advantage here of not using the jomres_generic_black_booking_insert class.
				// The afore mentioned class was created some time after the original version of this api script. In theory I could (some might argue, should) convert this script to use that class (code re-use and all that) however I can envision times where you would want the watcher to be triggered in the class, but not in this script (for example recursion going to other services, perhaps). By manually calling the watcher here, instead of using the class, anybody who doesn't want this script to trigger the watcher simply has to remove it from here. If we used the class, the class would have to be modified to explicitly NOT set the webhook details in circumstances where you don't want to create a recusive situation. 
				
				$webhook_notification								= new stdClass();
				$webhook_notification->webhook_event				= 'blackbooking_added';
				$webhook_notification->webhook_event_description	= 'Logs when black bookings are created.';
				$webhook_notification->webhook_event_plugin			= 'black_bookings';
				$webhook_notification->data							= new stdClass();
				$webhook_notification->data->property_uid			= $property_uid;
				$webhook_notification->data->contract_uid			= $contract_uid;
				add_webhook_notification($webhook_notification);
		
				$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
				$MiniComponents->triggerEvent('99994');
			}
				
			}
		else
			error_logging ("Error after inserting to contracts table, no contract uid returned.", E_USER_ERROR);
		}
	
	Flight::json( $response_name = "addblackbookings" , $contract_uid );
	});	
