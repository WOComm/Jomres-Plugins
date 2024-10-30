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

Flight::route('GET /cmf/list/tax/rates', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
	
	$response = array();
	
	foreach ( $jrportal_taxrate->taxrates as $rate ) {
		$response[] = array (
			"id" => $rate["id"],
			"code" => $rate["code"],
			"description" => $rate["description"],
			"rate" => $rate["rate"],
			"is_eu_country" => $rate["is_eu_country"]
			);
	}
	

	Flight::json( $response_name = "response" , $response ); 
	});
	
	