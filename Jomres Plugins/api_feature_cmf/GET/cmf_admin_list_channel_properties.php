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

Return all countries 

*/

Flight::route('GET /cmf/admin/list/channel/properties/@channel_id', function( $channel_id )
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();
	
	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/admin/list/managers/",
		"data"=>array()
		);
			
	$response = json_decode(stripslashes($call_self->call($elements)));

	if (empty($response->data->response)) {
		Flight::halt(204, "No managers in system.");
	}
	
	$managers = (array)$response->data->response;
	
	$property_managers = array();
	foreach ($managers as $manager) {
		$manager = (array)$manager;
		$id = $manager['cms_user_id'];
		$property_managers[$id] = $manager;
	}

	// A little hacky (looking for ids less than at the end) :( 
	$query = "SELECT `id` , `channel_id` , `property_uid` , `remote_property_uid` , `cms_user_id`, `remote_data` FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE channel_id = ".(int)$channel_id." ORDER BY property_uid ";
	$result = doSelectSql($query );

	$channel_properties = array();
	if (!empty($result)) {
		$property_uids = array();
		foreach ($result as $channel) {
			$id = $channel->property_uid;
			$property_uids[]= $channel->property_uid ;
			if ( !isset($property_managers[$channel->cms_user_id])) {
				$property_managers[$channel->cms_user_id]['username'] = "MANAGER NO LONGER EXISTS";
			}

			$channel_properties[$id] = array (
				"id"						=> $channel->id ,
				"channel_id"				=> $channel->channel_id ,
				"cms_user_name"				=> $property_managers[$channel->cms_user_id]['username'] ,
				"cms_user_id"				=> $channel->cms_user_id ,
				"property_uid"				=> $channel->property_uid ,
				"remote_property_uid"		=> $channel->remote_property_uid,
				"remote_data"				=> unserialize(base64_decode($channel->remote_data))
			);
		}
		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$property_names = $current_property_details->get_property_name_multi($property_uids);
	
		foreach ($channel_properties as $key=>$val ) {
			if (isset($property_names[$key])) {
				$channel_properties[$key]['property_name'] = $property_names[$key];
			} else {
				$channel_properties[$key]['property_name'] = "Property name unknown";
			}

		}
	
	}
	

	
	Flight::json( $response_name = "response" , $channel_properties ); 
	});
	