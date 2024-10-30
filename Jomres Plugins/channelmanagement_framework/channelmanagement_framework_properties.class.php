<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


class channelmanagement_framework_properties
{
	
	function __construct()
	{
		
	}

	public static function get_local_property_ids_for_channel( $channel_id = 0 )
	{
		// Normally we'd do this as a query to the local server, however the properties/ids endpoint can't return the remote_data for all properties so instead we'll run the query here

		if ( (int)$channel_id == 0 ) {
			$query = "SELECT `property_uid` , `remote_property_uid` , `cms_user_id` , `remote_data` FROM #__jomres_channelmanagement_framework_property_uid_xref";
		} else {
			$query = "SELECT `property_uid` , `remote_property_uid` , `cms_user_id` , `remote_data` FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE `channel_id` = ".(int)$channel_id;
		}

		$properties = doSelectSql($query);

		$property_uids = array();
		if (!empty($properties)) {
			foreach ($properties as $property ) {
				$property_uids[] = array ( "local_property_uid" => $property->property_uid , "remote_property_uid" => $property->remote_property_uid ,  "local_cms_user_id" => $property->cms_user_id , "remote_data" => unserialize(base64_decode($property->remote_data)));
			}
		}
		return $property_uids;
	}
	
	
	function check_remote_id_already_exists ($remote_id = 0 )
	{
		
	}


	private function validate_property_settings_array( $settings ) 
	{
		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton'); 
		$response = $channelmanagement_framework_singleton->rest_api_communicate( $channel , 'GET' , 'cmf/property/validate/settings/' , $settings );
		var_dump($response);exit;
/* 		$mrConfig = getPropertySpecificSettings($property_id);
		foreach ($settings as $key=>$val) {
			if (!array_key_exists($key , $mrConfig )) {
				throw new Exception( jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION','CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION',false) ).$key;
			}
		} */
	}

	/*
	
	$property_id The id of the property
	*/
	private function set_property_settings( $property_id , $settings ) 
	{
		importSettings($property_id, 0);
		$this->validate_property_settings_array($settings);
		
		$mrConfig = getPropertySpecificSettings($property_id);  // Sets up the mrConfig array that holds the property settings
		
		foreach ($settings as $key=>$val) {
			if (array_key_exists($key , $mrConfig )) {
				$clean_val = trim(filter_var($val, FILTER_SANITIZE_SPECIAL_CHARS));
				insertSetting($property_id, $key, $clean_val);
			}
		}
	}
	

}
