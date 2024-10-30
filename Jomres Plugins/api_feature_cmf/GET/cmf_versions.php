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

Return the statuses returned by the system

*/

Flight::route('GET /cmf/versions', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$jomres_version = get_jomres_current_version();
	

	$versions = array ( "Jomres" => $jomres_version );
	
	if (is_dir(JOMRES_COREPLUGINS_ABSPATH)) {
		$d = @dir(JOMRES_COREPLUGINS_ABSPATH);
		while (false !== ($entry = $d->read())) {
			if (substr($entry, 0, 1) != '.') {
				$plugin_paths[ ] =JOMRES_COREPLUGINS_ABSPATH.$entry.JRDS;
			}
		}
		$installed_plugins = array();
		
		foreach ($plugin_paths as $plugin_dir) {
			$pathinfo = pathinfo($plugin_dir);
			$plugin_name = $pathinfo['basename'];

			if ($plugin_name == "channelmanagement_framework" || $plugin_name == "api_feature_cmf" || substr($plugin_name , 0 , 17 ) == 'channelmanagement' ) {
				if (file_exists($plugin_dir.'plugin_info.php')) {
					include_once($plugin_dir.'plugin_info.php');
					$cname = 'plugin_info_'.$plugin_name;
					if (class_exists($cname)) {
						$info = new $cname();
						$installed_plugins[ $info->data[ 'name' ] ] = $info->data;
					}
				}
			}

		
		}
		
		// I want the CMF main plugins at the beginning of the arr
		$versions ['channelmanagement_framework'] = (string)$installed_plugins['channelmanagement_framework']['version'];
		$versions ['api_feature_cmf'] = (string)$installed_plugins['api_feature_cmf']['version'];

		foreach ( $installed_plugins as $key=>$val) {
			if ( $key != 'channelmanagement_framework' && $key != 'api_feature_cmf' ) {
				$versions [$key] = (string)$val['version'];
			}
		}
	}
	
	

	Flight::json( $response_name = "response" , $versions ); 
	});
	
	