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

Return property type flags

*/

Flight::route('GET /cmf/list/property_type/flags', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$response = array(
		"0" => "Multi-room property (eg Hotel, Bed and Breakfast) where individual rooms in the property can be booked",
		"1" => "Property such as Villa/Apartment where a booking occupies the entire property for the booking period",
		"3" => "Tours only, no room bookings",
		"4" => "Real estate, simple listing, no bookings"
	);
	

	Flight::json( $response_name = "response" , $response ); 
	});
	
	