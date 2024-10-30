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
* Delete all property tariffs
*
*/

Flight::route('DELETE /cmf/property/extra/@id/@extra_id', function($property_uid , $extra_id )
	{
	require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$extra_id = (int)$extra_id;
	
	$query="SELECT `uid` FROM `#__jomres_extras` WHERE `uid` = ".$extra_id." AND  `property_uid` = ".(int)$property_uid;
	$extras =doSelectSql($query);
	
	if (empty($extras)) {
		Flight::halt(204, "Extra id is not valid");
	}
	
	$query="DELETE FROM #__jomres_extras WHERE `uid` = ".(int)$extra_id." AND `property_uid` = ".(int)$property_uid;
	doInsertSql($query);
	
	$query="DELETE FROM #__jomcomp_extrasmodels_models WHERE `extra_id` = ".(int)$extra_id." AND `property_uid` = ".(int)$property_uid;
	doInsertSql($query);
	
	$webhook_notification								= new stdClass();
	$webhook_notification->webhook_event				= 'extra_deleted';
	$webhook_notification->webhook_event_description	= 'Logs when optional extras are deleted.';
	$webhook_notification->webhook_event_plugin			= 'optional_extras';
	$webhook_notification->data							= new stdClass();
	$webhook_notification->data->property_uid			= $property_uid;
	$webhook_notification->data->extras_uid				= $extra_id;
	add_webhook_notification($webhook_notification);

	$response = true;
	
	Flight::json( $response_name = "response" ,$response );
	});