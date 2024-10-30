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

Return the items for a given property type (e.g. property types) that currently exist in the system

*/

Flight::route('PUT /cmf/channel/webhook/enable/@id/@state', function( $integration_id , $webhook_new_state )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	if (  $integration_id == 0 ) {
		Flight::halt(204, "Webhook id not set");
	}
	
	$manager_uid = (int)Flight::get('user_id');
	$webhook_new_state = (int)(bool)$webhook_new_state;
		
	jr_import("webhooks");
	$webhooks = new webhooks( $manager_uid );
	$all_webhooks = $webhooks->get_all_webhooks();
	
	if (!isset($all_webhooks[$integration_id])) {
		Flight::halt(204, "Webhook does not exist");
	}
	
	if ( $webhooks->webhooks[$integration_id]['manager_id'] != $manager_uid ) {
		Flight::halt(204, "Manager does not have rights to this webhook");
	}
	
	
	$webhooks->webhooks[$integration_id]["enabled"] = $webhook_new_state;
	$new_webhook_id = $webhooks->commit_integration($integration_id);
	$webhooks->get_all_webhooks();
	
	
	Flight::json( $response_name = "response" , $webhooks->webhooks[$integration_id] ); 
	});
	
	