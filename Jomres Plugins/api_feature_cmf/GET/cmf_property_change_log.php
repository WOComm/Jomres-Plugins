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


/*
	** Title | Get property blocks
	** Description | Get dates when the property is not available
*/


Flight::route('GET /cmf/property/change/log/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);

	$query = 'SELECT id , property_uid , user_performing_action , channel_data , date_added , webhook_event_title ,webhook_event 
		FROM #__jomres_webhook_events WHERE property_uid = '.$property_uid.' 
		AND date_added BETWEEN date_sub(now(),INTERVAL 2 WEEK) AND now() 
		ORDER BY id ASC';
	$events_list = doSelectSql($query);

	$events = array();
	
	if (!empty($events_list)) {
		$count = count($events_list);
		for ( $i = 0 ; $i < $count ; $i++ ) {
			$event = $events_list[$i];
			$events[] = array (
				"event_id" => $event->id,
				"property_uid" => $event->property_uid,
				"user_id" => $event->user_performing_action,
				"action" => $event->webhook_event_title,
				"date" => $event->date_added,
				"user_id" => $event->user_performing_action,
				"webhook_event" => unserialize($event->webhook_event),
				"channel_data" => unserialize($event->channel_data)
				) ;
		}
	}

	Flight::json( $response_name = "response" , $events ) ;
	});

