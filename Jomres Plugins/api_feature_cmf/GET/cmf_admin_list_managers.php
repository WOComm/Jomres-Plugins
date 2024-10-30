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

Flight::route('GET /cmf/admin/list/managers', function()
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
	
	Flight::json( $response_name = "response" , $managers ); 
	});
	