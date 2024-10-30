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


Flight::route('POST /cmf/channel/announce/@channel_name/@friendly_name', function($channel_name , $friendly_name )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	// We only do this here in Announce
	$scopes = Flight::get('scopes');
	if ( $scopes[0]  == '*' ) { // It's an administrator api client, we'll find the proxy id. In 99% of cases the api feature validates the channel for the user, but we don't do that here therefore we'll filch a bit of code from the channel validation to ensure that we've set the correct user id when announcing the channel
	
		$all_headers = getallheaders();
        if (!empty($all_headers)) {
            foreach ($all_headers as $key => $val ) {
                $new_index = strtoupper($key);
                unset($all_headers[$key]);
                $all_headers[$new_index] = $val;
            }
        }

		// Most calls will come from the channel management framework working on behalf of a user, we can tell if this is happening because the calling user with the * scope passes a proxy id. If it's set we'll initialise that user and work as them for the purpose of security
		// Sometimes however "system" will want to work as itself, which we will allow

		if ( isset($all_headers['X-JOMRES-PROXY-ID']) && (int)$all_headers['X-JOMRES-PROXY-ID'] > 0 ) {
			Flight::set('user_id' , (int)$all_headers['X-JOMRES-PROXY-ID'] );
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			$thisJRUser->init_user( (int)$all_headers['X-JOMRES-PROXY-ID'] );
		}

	}

	if (!isset( $_POST['params'])) {
		Flight::halt(204, "Params not sent");
	}
	
	$channel_name = filter_var($channel_name, FILTER_SANITIZE_SPECIAL_CHARS);
	$friendly_name = urldecode(filter_var($friendly_name, FILTER_SANITIZE_SPECIAL_CHARS));
	//$params = filter_var( $_POST['params'], FILTER_SANITIZE_SPECIAL_CHARS);
	$params = '';

	$query = "SELECT `id` FROM #__jomres_channelmanagement_framework_channels WHERE `cms_user_id` =".Flight::get('user_id')." AND `channel_name` = '".$channel_name."' LIMIT 1";
	$id = doSelectSql($query , 1 );

	if ( (int)$id == 0 && Flight::get('user_id') > 0 ) {

		$query = "INSERT INTO #__jomres_channelmanagement_framework_channels ( `cms_user_id` , `channel_name` , `channel_friendly_name` , `params` ) VALUES ( ".Flight::get('user_id')." , '".$channel_name."', '".$friendly_name."' , '".$params."' ) ";

		$id = doInsertSql($query);
		
	}
	
	Flight::json( $response_name = "response" ,(int)$id );
	});
	