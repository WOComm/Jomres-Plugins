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
	** Title | Get property blocks
	** Description | Get dates when the property is not available
*/


Flight::route('GET /cmf/property/base/price/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	$basic_price =  get_property_price_for_display_in_lists($property_uid);
	
	$pricing_response = cmf_utilities::get_pricing_response( $property_uid , $basic_price['price_excluding_vat'] );
	
	cmf_utilities::cache_write( $property_uid , "response" , $pricing_response );
	
	Flight::json( $response_name = "response" , $pricing_response );
	});

