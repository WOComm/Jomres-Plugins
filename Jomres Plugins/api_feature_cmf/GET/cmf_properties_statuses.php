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

Flight::route('GET /cmf/properties/statuses', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/list/property/statuses/",
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
	
	$property_statuses_texts = json_decode(stripslashes($call_self->call($elements)));
	
	 $property_status_texts_array = array();
	if ( isset($property_statuses_texts->data->response)) {
		$tmp = (array)$property_statuses_texts->data->response;
		foreach ($tmp as $key => $val ) { // Convert the keys to integers
			$property_status_texts_array[ (int) $key] = $val->text;
		}
	}
	
	$query = "SELECT `property_uid` , `remote_property_uid` FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE `cms_user_id` = ".(int)Flight::get('user_id')." AND `channel_id` = ".(int) Flight::get('channel_id')." ";
	$result = doSelectSql($query);
	
	$property_uids = array();
	if (!empty($result)) {
		foreach ( $result as $r ) {
			$property_uids[] = $r->property_uid;
		}
	}

	$query = "SELECT  
		propertys_uid, published, approved, completed
		FROM #__jomres_propertys WHERE propertys_uid IN (".jomres_implode($property_uids).")";
	$property_statuses = doSelectSql($query);
	
	$all_property_statuses = array();
	
	foreach ($property_statuses as $property_status ) {
		if ( $property_status->completed == "1" && $property_status->approved == "1" && $property_status->published == "1" ) {
			$status = "1";
		} elseif ( $property_status->completed == "1" && $property_status->approved == "1" && $property_status->published == "0"  ){
			$status = "2";
		} elseif ( $property_status->completed == "1" && $property_status->approved == "0" && $property_status->published == "0" ) {
			$status = "3";
		} elseif ( $property_status->completed == "0" && $property_status->approved == "0" && $property_status->published == "0" ) {
			$status = "4";
		} elseif ( $property_status->completed == "0" && $property_status->approved == "1" && $property_status->published == "0" ) {
			$status = "5";
		}

		$status_text = "No description";
		if (isset($property_status_texts_array[$status])) {
			$status_text = $property_status_texts_array[$status];
		}
		
		$all_property_statuses[] = array ( "status_code" => $status , "status_text" => $status_text , "property_uid" => $property_status->propertys_uid );
	}
	
	Flight::json( $response_name = "response" , $all_property_statuses ); 
	});
	
	