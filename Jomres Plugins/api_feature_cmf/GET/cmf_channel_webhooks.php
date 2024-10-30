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
	** Title | Mapping, get local item types
	** Description | Get the local item types, e.g. room types etc
*/


Flight::route('GET /cmf/channel/webhooks/', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$manager_uid = (int)Flight::get('user_id');
	
	jr_import("webhooks");
	$webhooks = new webhooks( $manager_uid );
	$all_webhooks = $webhooks->get_all_webhooks();
	
	$manager_webhooks = array();
	foreach ($all_webhooks as $webhook) {
		if ($webhook['manager_id'] == $manager_uid ) {
			$manager_webhooks[] = $webhook;
		}
	}
	
	
	Flight::json( $response_name = "response" ,$manager_webhooks );
	});

