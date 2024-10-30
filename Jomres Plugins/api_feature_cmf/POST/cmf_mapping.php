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
	** Title | Announce
	** Description | Remote channels announce themselves to the system.
*/


Flight::route('POST /cmf/mapping/@channel_name/', function($channel_name , $dictionary_item )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user( $channel_name );  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$channel_name = filter_var($channel_name, FILTER_SANITIZE_SPECIAL_CHARS);
	$friendly_name = urldecode(filter_var($friendly_name, FILTER_SANITIZE_SPECIAL_CHARS));
	$params = filter_var( $_POST['params'], FILTER_SANITIZE_SPECIAL_CHARS);

	if (empty($params) || $params === '' ) {
		Flight::halt(204, "Parameters are empty, that can't be right. Halting.");
	}

	$query = "SELECT `id` FROM #__jomres_channelmanagement_framework_channels WHERE `cms_user_id` =".(int)Flight::get('user_id')." AND `channel_name` = '".$channel_name."' LIMIT 1";
	$id = doSelectSql($query , 1 );

	if ( (int)$id == 0 ) {
		
		$query = "INSERT INTO #__jomres_channelmanagement_framework_channels ( `cms_user_id` , `channel_name` , `channel_friendly_name` , `params` ) VALUES ( ".(int)Flight::get('user_id')." , '".$channel_name."', '".$friendly_name."' , '".serialize($params)."' ) ";

		$id = doInsertSql($query);
		
	}
	
	Flight::json( $response_name = "response" ,(int)$id );
	});
	