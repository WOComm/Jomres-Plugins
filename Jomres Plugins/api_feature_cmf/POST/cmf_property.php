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

Flight::route('POST /cmf/property', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$property_name		= filter_var( $_POST['property_name'], FILTER_SANITIZE_SPECIAL_CHARS);
	$remote_uid			= (int)filter_var( $_POST['remote_uid'], FILTER_SANITIZE_SPECIAL_CHARS);
	$country_code		= strtoupper(filter_var( $_POST['country'], FILTER_SANITIZE_SPECIAL_CHARS));
	$region_id			= (int)filter_var( $_POST['region_id'], FILTER_SANITIZE_SPECIAL_CHARS);
	$ptype_id			= (int)filter_var( $_POST['ptype_id'], FILTER_SANITIZE_SPECIAL_CHARS);

	$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

	$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
	$jrConfig = $siteConfig->get();
	
	$query = "SELECT id FROM `#__jomres_channelmanagement_framework_property_uid_xref` WHERE `remote_property_uid` = ".$remote_uid." AND `channel_id` =  ".Flight::get('channel_id') ;
	$result = doSelectSql($query);
	if (!empty($result)) {
		Flight::halt(204, "That Remote ID already exists in the system.");
	}
	
	$jomres_countries = jomres_singleton_abstract::getInstance('jomres_countries');
	$jomres_countries->get_all_countries();
	if ( !array_key_exists( $country_code , $jomres_countries->countries ) ) {
		Flight::halt(204, "Country incorrect");
	}
	
	$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
	$jomres_regions->get_all_regions();
	if ( !array_key_exists ($region_id , $jomres_regions->regions ) ) {
		Flight::halt(204, "Region id incorrect");
	}
	
	$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
	$jomres_property_types->get_all_property_types();
	if (!array_key_exists( $ptype_id , $jomres_property_types->property_types ) ) {
		Flight::halt(204, "Property type id incorrect");
	}
	
	$jomres_properties = jomres_singleton_abstract::getInstance('jomres_properties');
	
	$jomres_properties->property_name		= $property_name;
	$jomres_properties->ptype_id			= $ptype_id;
	
	if ($jrConfig['limit_property_country'] == '0') {
		$jomres_properties->property_country = $country_code;
		$jomres_properties->property_region		= $region_id;
	} else {
		$jomres_properties->property_country = $jrConfig['limit_property_country_country'];
		$jomres_properties->property_region		= $region_id;
	}
	
	
	$jomres_properties->commit_new_property();

	if ($jomres_properties->propertys_uid > 0 )  {  // Ok, the property has been created successfully, we'll add the property id and the channel and the remote property id too

		// Before we can do anything else, we need to link the property to the channel
		$query = "INSERT INTO `#__jomres_channelmanagement_framework_property_uid_xref` ( `channel_id`, `property_uid`, `remote_property_uid`, `cms_user_id`, `remote_data`) VALUES ( ".Flight::get('channel_id')." , ".$jomres_properties->propertys_uid." , ".$remote_uid.", ".(int)$thisJRUser->userid." , NULL)" ;
		$id = doInsertSql($query);
        logging::log_message( "Create property, added to __jomres_channelmanagement_framework_property_uid_xref id ".$id , 'API', 'INFO' , '' );

		// Finally we'll ensure that api privacy is enabled and managers will be prevented from administering locally
		$settings = array();
		$settings['api_privacy_off'] = "0";							// By default API privacy is on although channels and managers can disable it
		$settings['allow_channel_property_local_admin'] = "0";		// Managers cannot administer properties locally, they'll be presented with the remote admin url

		$elements = array(
			"method"=>"PUT",
			"request"=>"cmf/property/settings",
			"data"=>array ("property_uid" => $jomres_properties->propertys_uid , "params" => json_encode($settings)),
			"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);

		$call_self = new call_self( );
		$setting_response = $call_self->call($elements);

	} else {
		Flight::halt(204, "Failed to create property");
	}

	
	Flight::json( $response_name = "response" , $jomres_properties->propertys_uid ); 
	});
	
	