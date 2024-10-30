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


Flight::route('GET /cmf/property/payment/methods/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);

	cmf_utilities::cache_read($property_uid);
	
	$payment_methods = array();
	
	jr_import("gateway_plugin_settings");
	$plugin_settings = new gateway_plugin_settings();
	$plugin_settings->get_settings_for_property_uid( $property_uid );

	if (!empty($plugin_settings->gateway_settings) ) {
		foreach ($plugin_settings->gateway_settings as $gateway_name=>$gateway ) {
			if ($gateway['active'] == '1') {
				$payment_methods[] = $gateway_name;
			}
			
		}
	}


	cmf_utilities::cache_write( $property_uid , "response" , $payment_methods );
	
	Flight::json( $response_name = "response" , $payment_methods );
	});

