<?php
/**
 * Core file
 *
 * @author  
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################



/*
*
* Set the changeover policy
*
* 
*
*/

Flight::route('PUT /cmf/property/changeover/day', function() 
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid				= (int)$_PUT['property_uid'];
	$changeover_day_of_week		= (int)$_PUT['changeover_day_of_week'];
	$enable_changeover_day		= (int)(bool)$_PUT['enable_changeover_day'];

	cmf_utilities::validate_property_uid_for_user($property_uid);

	if ($changeover_day_of_week > 6 || $changeover_day_of_week < 0 ) {
		Flight::halt(204, "Changeover day invalid");
	}

	$settings = array( "fixedPeriodBookingsNumberOfDays" => 7 , "fixedArrivalDateYesNo" => 1 , "fixedArrivalDatesRecurring" => 12 );
	if ($enable_changeover_day == 1) {
		$settings['fixedPeriodBookings'] = 1;
		$settings['fixedArrivalDay'] = $changeover_day_of_week;
	} else {
		$settings['fixedPeriodBookings'] = 0;
		$settings['fixedArrivalDay'] = $changeover_day_of_week;
	}
	
	$settings['fixedPeriodBookingsShortYesNo'] = 0;
	
	foreach ($settings as $k=>$v) {
		$query = "SELECT uid FROM #__jomres_settings WHERE property_uid = '".(int) $property_uid."' and akey = '".$k."'";
		$result = doSelectSql($query);
		if (empty($result)) {
			$query = "INSERT INTO #__jomres_settings (property_uid,akey,value) VALUES ('".(int) $property_uid."','".$k."','".$v."')";
			$updated_settings[$k] = $v;
		} else {
			$query = "UPDATE #__jomres_settings SET `value`='".$v."' WHERE property_uid = '".(int) $property_uid."' and akey = '".$k."'";
			$updated_settings[$k] = $v;
		}
		doInsertSql($query);
	}
	
	$webhook_notification								= new stdClass();
	
	if ($enable_changeover_day == 1 ) {
		$webhook_notification->webhook_event				= 'changeover_day_enabled';
		$webhook_notification->webhook_event_description	= 'Changeover day has been enabled';
	} else {
		$webhook_notification->webhook_event				= 'changeover_day_disabled';
		$webhook_notification->webhook_event_description	= 'Changeover day has been disabled';
	}

	$webhook_notification->webhook_event_plugin						= 'core';
	$webhook_notification->data										= new stdClass();
	$webhook_notification->data->property_uid						= $property_uid;
	$webhook_notification->data->changeover_day_of_week				= $changeover_day_of_week;
	add_webhook_notification($webhook_notification);
	
	Flight::json( $response_name = "response" , true );
	});	

