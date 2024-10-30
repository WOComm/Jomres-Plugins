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

Return all properties in the system for this user, including those not created by this channel

*/

Flight::route('GET /cmf/properties/all', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
	$thisJRUser->init_user(Flight::get('user_id'));

	$call_self = new call_self( );

	$properties = array();
	if (!empty($thisJRUser->authorisedProperties)) {
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		//$property_names = $current_property_details->get_property_name_multi($thisJRUser->authorisedProperties);
		$all_properties = $current_property_details->gather_data_multi($thisJRUser->authorisedProperties);

		if (!empty($all_properties)) {
			foreach ($all_properties as $property_uid => $property ) {


                $elements = array(
                    "method"=>"GET",
                    "request"=>'cmf/property/change/log/'.$property_uid,
                    "data"=>array(),
                    "headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
                );

                $existing_changelog_items = json_decode(stripslashes($call_self->call($elements)));

                $changelog_item_count = 0;
                if (isset($existing_changelog_items->data->response) && is_array($existing_changelog_items->data->response) ) {
                    $changelog_item_count = count($existing_changelog_items->data->response);
                }

				$mrConfig = getPropertySpecificSettings($property_uid);

				$property_name			            = '';
				$property_town			            = '';
				$property_region		            = '';
				$property_country		            = '';
				$property_type_title	            = '';
                $property_published                 = '0';

				if (!isset($mrConfig['api_privacy_off'])) {
					$mrConfig['api_privacy_off'] = 0;
				}

				if ( $mrConfig['api_privacy_off'] == 1 ) {
					$property_name			= str_replace('&#39;' , "'", $property['property_name']);
					$property_town			= str_replace('&#39;' , "'", $property['property_town']);
					$property_region		= str_replace('&#39;' , "'", $property['property_region']);
					$property_country		= str_replace('&#39;' , "'", $property['property_country']);
					$property_type_title	= str_replace('&#39;' , "'", $property['property_type_title']);
                    $property_published     = str_replace('&#39;' , "'", $property['published']);
				}

				$properties[] = array (
					"property_id" => $property_uid ,
					"property_name" => $property_name,
					"property_town" => $property_town,
					"property_region" => $property_region,
					"property_country" => $property_country,
					"property_type_title" => $property_type_title,
					"api_privacy_off" =>  $mrConfig['api_privacy_off'],
                    "published" =>  $property_published,
                    "changelog_item_count" =>  $changelog_item_count,
				) ;
			}
		}
	}

	Flight::json( $response_name = "response" , $properties );
	});
	
	