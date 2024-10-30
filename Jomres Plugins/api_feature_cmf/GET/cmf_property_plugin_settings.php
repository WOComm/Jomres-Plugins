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

Return the settings for a given property's plugins

*/

Flight::route('GET /cmf/property/plugin/settings/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$query = "SELECT id , plugin , setting , value FROM #__jomres_pluginsettings WHERE prid = ".(int) $property_uid;
	$result = doSelectSql($query);
	$settings = array();
	if ( !empty($result) ) {
		foreach ($result as $r) {
			$plugin = $r->plugin;
			if ( $r->setting != 'no_html' && $r->setting != 'jomres_csrf_token' ) {
				$settings[$plugin][$r->setting] = $r->value;
			}
		}
	}
	
	
	Flight::json( $response_name = "response" , $settings ); 
	});
	
	