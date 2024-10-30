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

Return the property types

*/

Flight::route('GET /cmf/list/property/statuses', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	
	$statuses = array(
		"0" => array ( "status" => 0 , "text" => "Does not exist, or the channel does not have rights to access it"),
		"1" => array ( "status" => 1 , "text" => "Published"),
		"2" => array ( "status" => 2 , "text" => "Approved (but not published)"),
		"3" => array ( "status" => 3 , "text" => "Not approved (but complete)"),
		"4" => array ( "status" => 4 , "text" => "Not approved (incomplete)"),
		"5" => array ( "status" => 5 , "text" => "Approved (but incomplete)"),
	);

	Flight::json( $response_name = "response" , $statuses ); 
	});
