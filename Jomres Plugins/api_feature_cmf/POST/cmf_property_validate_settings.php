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

Confirm that settings to be passed are valid mrConfig indecies

*/

Flight::route('POST /cmf/property/validate/settings/keys', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$params		= json_decode($_POST['params']);

	$valid = true;
	$invalid_keys = array();
	$mrConfig = getPropertySpecificSettings(0);

	foreach ($params as $key=>$val) {
		if (!array_key_exists($key , $mrConfig )) {
			$valid = false;
			$invalid_keys[] = $key;
		}
	}
	
	Flight::json( $response_name = "response" , array ("valid" => $valid , "invalid_keys" => $invalid_keys ) ); 
	});
	
	