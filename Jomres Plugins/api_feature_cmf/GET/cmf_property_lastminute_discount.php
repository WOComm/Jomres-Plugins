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

Flight::route('GET /cmf/property/lastminute/discount/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	$lastminute_settings = array();
	
	if ($mrConfig['singleRoomProperty'] == "0"  ) {
		$settings = array (
			"wiseprice10discount",
			"wiseprice25discount",
			"wiseprice50discount",
			"wiseprice75discount",
			"wisepricethreshold",
			"wisepriceactive"
			);
	} else {
		$settings = array (
			"lastminutediscount",
			"lastminutethreshold",
			"lastminuteactive"
			);
	}
	
	foreach ( $mrConfig as $key=>$val ) {
		if (in_array($key , $settings ) ) {
			$lastminute_settings[$key] = $val;
		}
	}
	
	
	cmf_utilities::cache_write( $property_uid , "response" , $lastminute_settings );
	
	Flight::json( $response_name = "response" , $lastminute_settings ); 
	});
	
	