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


Flight::route('POST /cmf/admin/channel/@manager_id/@channel_name/@friendly_name', function( $manager_id , $channel_name , $friendly_name )
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();
	
	$manager_id = (int)$manager_id;
	$channel_name = filter_var($channel_name, FILTER_SANITIZE_SPECIAL_CHARS);
	$friendly_name = urldecode(filter_var($friendly_name, FILTER_SANITIZE_SPECIAL_CHARS));
	

	$query = "SELECT `id` FROM #__jomres_channelmanagement_framework_channels WHERE `cms_user_id` =".(int)$manager_id." AND `channel_name` = '".$channel_name."' LIMIT 1";
	$id = doSelectSql($query , 1 );

	if ( (int)$id == 0 ) {
		
		$query = "INSERT INTO #__jomres_channelmanagement_framework_channels ( `cms_user_id` , `channel_name` , `channel_friendly_name` ) VALUES ( ".(int)$manager_id." , '".$channel_name."', '".$friendly_name."' ) ";

		$id = doInsertSql($query);
		
	}
	
	Flight::json( $response_name = "response" ,(int)$id );
	});
	