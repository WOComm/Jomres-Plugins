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

Flight::route('GET /cmf/property/managers/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$query = "SELECT manager_id FROM #__jomres_managers_propertys_xref WHERE `property_uid` = ".(int)$property_uid." ";
	$result = doSelectSql($query);
	
	$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
	$jomres_users->get_users();
		
	$managers = array();
	if (!empty($result)){
		foreach ( $result as $user  ) {
			$user_id = $user->manager_id;
			$managers[$user_id] = array ( 
				"user_id" => $user_id , 
				"user_name" => $jomres_users->users[$user_id]['username'] , 
				"access_level" => $jomres_users->users[$user_id]['access_level'] 
				);
		}
	}
	
	cmf_utilities::cache_write( $property_uid , "response" , $managers );
	
	Flight::json( $response_name = "response" , $managers ); 
	});
	
	