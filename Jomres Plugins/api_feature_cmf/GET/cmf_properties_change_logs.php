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


Flight::route('GET /cmf/properties/change/logs/', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/properties/ids",
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
	);

	$response = json_decode(stripslashes($call_self->call($elements)));

	if ( !isset($response->data->response) ) {
		Flight::halt(204, "Cannot get manager's properties" );
	}

	$property_ids = array();
	foreach ($response->data->response as $property ) {
		$property_ids[] = $property->local_property_uid;
	}

	$query = 'SELECT id , property_uid , user_performing_action , channel_data , date_added , webhook_event_title ,webhook_event FROM #__jomres_webhook_events WHERE 
		property_uid IN ('.jomres_implode($property_ids).') 
		AND date_added BETWEEN date_sub(now(),INTERVAL 2 WEEK) AND now() 
		ORDER BY id ASC';

	$events_list = doSelectSql($query);

	$events = array();
	
	if (!empty($events_list)) {
		$count = count($events_list);
		for ( $i = 0 ; $i < $count ; $i++ ) {
			$event = $events_list[$i];

			$events[$event->property_uid][] = array (
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

