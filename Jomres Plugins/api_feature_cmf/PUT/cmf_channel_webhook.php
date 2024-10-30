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

Flight::route('PUT /cmf/channel/webhook', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$settings_string		= (string)$_PUT['settings'];
	$enabled				= (int)(bool)$_PUT['enabled'];
	
	$settings_json_decoded = json_decode(stripslashes($settings_string));
	
	if ( $settings_json_decoded == false ) {
		Flight::halt(204, "Cannot decode settings");
	}
	
	if (is_object($settings_json_decoded)){
		$settings_json_decoded = (array)$settings_json_decoded;
	}

	// Filtering the settings
	$settings = array();
	$url = '';
 	foreach ($settings_json_decoded as $key=>$val) {
		if ( $key == 'url' ) {
			$val = filter_var($val, FILTER_VALIDATE_URL );
			$url = $val;
		} else {
			$key = filter_var($key, FILTER_SANITIZE_FULL_SPECIAL_CHARS );
			$val = filter_var($val, FILTER_SANITIZE_FULL_SPECIAL_CHARS );
			}
		$settings[$key] = $val;
		}

	if (empty($settings)) {
		Flight::halt(204, "No settings found, cannot continue");
	}
	
	$manager_uid = (int)Flight::get('user_id');
		
	jr_import("webhooks");
	$webhooks = new webhooks( $manager_uid );
	$all_webhooks = $webhooks->get_all_webhooks();
	$webhook_already_exists = false;
	
	if ($url != '' ) {
		if (!empty($all_webhooks)) {
			foreach ( $all_webhooks as $key=>$val ) {
				if ( isset($val['manager_id']) && $val['manager_id'] == $manager_uid ) {
					if ($val['settings']['url'] == $url ) {
						$webhook_already_exists = true; // A webhook for this site already exists, we will not create a new one
					}
				}
			}
		}
	}

	if ($webhook_already_exists) {
		Flight::halt(204, "Webhook already exists");
	}
	
	$integration_id = 0;

	foreach ( $settings as $key => $val ) {
		$webhooks->set_setting( $integration_id , $key , $val );
	}
		
	$webhooks->webhooks[$integration_id ]['enabled'] = $enabled;

	$new_webhook_id = $webhooks->commit_integration($integration_id);

	Flight::json( $response_name = "response" , $new_webhook_id ); 
	});
	
	