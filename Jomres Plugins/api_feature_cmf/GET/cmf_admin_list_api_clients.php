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

Flight::route('GET /cmf/admin/list/api/clients', function( )
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();
	
	$query = "SELECT client_id , scope , user_id , identifier FROM #__jomres_oauth_clients ORDER BY user_id , identifier";
	$clients = doSelectSql($query);
		
	Flight::json( $response_name = "response" , $clients ); 
	});
	