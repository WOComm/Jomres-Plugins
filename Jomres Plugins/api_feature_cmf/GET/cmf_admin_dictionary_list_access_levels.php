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

Flight::route('GET /cmf/admin/dictionary/list/access/levels', function()
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$response = array (
		
		"0" => "unregistered",
		"1" => "registered",
		"50" => "receptionist",
		"70" => "property manager",
		"90" => "super property manager"
		
		);

	Flight::json( $response_name = "response" , $response ); 
	});
	