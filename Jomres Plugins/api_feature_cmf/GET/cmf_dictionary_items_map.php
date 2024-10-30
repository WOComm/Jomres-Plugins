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

	
Flight::route('GET /cmf/dictionary/items/map/@local_type', function( $local_type )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$local_type = filter_var($local_type, FILTER_SANITIZE_SPECIAL_CHARS);
	
	$query = "SELECT `id` , `params` FROM #__jomres_channelmanagement_framework_mapping WHERE `type` = '".(string)$local_type."' AND `channel_name` = '".Flight::get('channel_name')."' LIMIT 1";
	$result = doSelectSql($query , 2 );

	if (empty($result)) {
		$response = false;
	} else {
		$response = $result;
	}

	Flight::json( $response_name = "response" , $response );
	});
	
	