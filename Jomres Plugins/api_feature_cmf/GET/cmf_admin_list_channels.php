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

Flight::route('GET /cmf/admin/list/channels', function()
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();

	$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
	$jomres_users->get_users();

	$managers = array();
	foreach ($jomres_users->users as $user) {
		$id = (int)$user['cms_user_id'];
		$managers[$id] = array (
			"id"					=> (int)$user['id'] ,
			"cms_user_id"			=> $id ,
			"username"				=> $user['username'] ,
			"access_level"			=> (int)$user['access_level'] ,
			"suspended"				=> (bool)$user['suspended'] ,
			"authorised_properties"	=> $user['authorised_properties']
		);
	}
	

	$property_managers = array();
	foreach ($managers as $manager) {
		$manager = (array)$manager;
		$id = $manager['cms_user_id'];
		$property_managers[$id] = $manager;
	}

	// A little hacky (looking for ids less than at the end) :( 
	$query = "SELECT `id` , `cms_user_id` , `channel_name` , `channel_friendly_name` FROM #__jomres_channelmanagement_framework_channels WHERE cms_user_id < 999999999";
	$result = doSelectSql($query );

	$channels = array();
	if (!empty($result)) {
		foreach ($result as $channel) {
			$id = $channel->id;
			if ( !isset($property_managers[$channel->cms_user_id])) {
				$property_managers[$channel->cms_user_id]['username'] = "MANAGER NO LONGER EXISTS";
			}

			$channels[$id] = array (
				"id"						=> $channel->id , 
				"cms_user_id"				=> $channel->cms_user_id ,
				"cms_user_name"				=> $property_managers[$channel->cms_user_id]['username'] ,
				"channel_name"				=> $channel->channel_name , 
				"channel_friendly_name"		=> jomres_decode($channel->channel_friendly_name)
				);
		}
	}

	
	Flight::json( $response_name = "response" , $channels ); 
	});
	