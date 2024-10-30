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

Return regions used by properties

*/

Flight::route('GET /cmf/list/city/currencies', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$query = "SELECT a.propertys_uid as property_uid , a.property_town as town, a.property_region as region_id, b.value as currency_code
		FROM #__jomres_propertys a 
		LEFT JOIN #__jomres_settings b
		ON (a.propertys_uid = b.property_uid )
		WHERE  b.akey = 'property_currencycode' ORDER BY property_town ASC";
	$activeTownList = doSelectSql($query);
	
	$regions_found = array();
	
	$towns = array();
	if (!empty($activeTownList)) {
		foreach ($activeTownList as $town ) {
			if (!in_array($town->region_id , $regions_found) ) {
				$region_name = find_region_name($town->region_id);
				$regions_found[$town->region_id] = $region_name;
			} else {
				$region_name = $regions_found[$town->region_id];
			}
				
			
			if (trim($town->town) != '' ) {
				$towns[$town->town][$town->currency_code] = array ( "city" => $town->town ,"city_currency_code" => $town->currency_code , "region" => $region_name );
			}
		}
	}

	
	Flight::json( $response_name = "response" , $towns ); 
	});
	
	
