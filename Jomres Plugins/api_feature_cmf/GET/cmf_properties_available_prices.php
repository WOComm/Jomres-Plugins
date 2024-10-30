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

Flight::route('GET /cmf/properties/available/prices/@start_date/@end_date/@number_of_people', function( $start_date , $end_date , $number_of_people )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$potential_booking_date_ranges = array_keys (cmf_utilities::get_date_ranges( $start_date , $end_date ));
	
	$call_self = new call_self( );
	
	$query = "SELECT `property_uid` , `remote_property_uid` FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE `cms_user_id` = ".(int)Flight::get('user_id')." AND `channel_id` = ".(int) Flight::get('channel_id')." ";
	$result = doSelectSql($query);
	
	$properties = array();
	if (!empty($result)) {
		foreach ( $result as $r ) {
			$properties[] =$r->property_uid ;
		}
	}

	$prices_responses = array();
	
	if (!empty($properties)) {
		foreach ($properties as $property_uid ) {
			$blocks_found = false;
			$prices_response = false;
			$elements = array(
				"method"=>"GET",
				"request"=>"cmf/property/availability/blocks/".$property_uid."/".$start_date."/".$end_date,
				"data"=>array(),
				"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
				);
			
			$blocks = json_decode(stripslashes($call_self->call($elements)));

			if (!empty($blocks->data->response)) {
				foreach ($potential_booking_date_ranges as $date ) {
					if ( in_array($date , $blocks->data->response ) ) {
						$blocks_found = true;
					}
				}
			}

			if (!$blocks_found) {
				$elements = array(
					"method"=>"GET",
					"request"=>"cmf/property/price/".$property_uid."/".$start_date."/".$end_date."/".$number_of_people,
					"data"=>array(),
					"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
					);
				$prices_response = json_decode(stripslashes($call_self->call($elements)));
				
			}
			if ( $prices_response != false ) {
				$prices_responses[] = array ("property_uid" => $property_uid , "prices" => $prices_response);
			}
			
		}
	}
	
	Flight::json( $response_name = "response" , $prices_responses ); 
	});
	
	