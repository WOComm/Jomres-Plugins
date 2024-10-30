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

	
Flight::route('POST /cmf/dictionary/items/map/@remote_type/@local_type', function( $remote_type , $local_type )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$remote_type = filter_var($remote_type, FILTER_SANITIZE_SPECIAL_CHARS);
	$local_type = filter_var($local_type, FILTER_SANITIZE_SPECIAL_CHARS);

	$params =json_decode(stripslashes($_POST['params']) );

	$data_object = array(); // Not really an object :s
	foreach ($params as $param ) {

		$tmp = new stdClass();
		$tmp->remote_item_id	= (int)$param->remote_item_id;
		$tmp->jomres_id			= (int)$param->jomres_id;
		$tmp->remote_name		= (string)filter_var($param->remote_name, FILTER_SANITIZE_SPECIAL_CHARS);
		$tmp->remote_type		= $remote_type;

		$data_object[$tmp->remote_item_id] = $tmp ;
	}

	$query = "SELECT `id` FROM #__jomres_channelmanagement_framework_mapping WHERE `type` = '".(string)$local_type."' AND `channel_name` = '".Flight::get('channel_name')."' LIMIT 1";
	$result = doSelectSql($query , 2 );

	if (empty($result)) {
		$query = "INSERT INTO #__jomres_channelmanagement_framework_mapping ( `channel_name` ,  `type` , `params`) VALUES ( '".Flight::get('channel_name')."' , '".$local_type."' , '".serialize($data_object)."' )";
		$id = doInsertSql($query);
	} else {
		$id = (int)$result['id'];
		$query = "UPDATE #__jomres_channelmanagement_framework_mapping SET `params` = '".serialize($data_object)."' WHERE `id` = ".(int)$result['id']." ";
		$result = doInsertSql($query);
		
	}

 	if (empty($id)) {
		$response = false;
	} else {
		$response = $id;
	}

	Flight::json( $response_name = "response" , $id );
	});
	
	