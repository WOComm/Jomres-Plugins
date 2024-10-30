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

Flight::route('GET /cmf/property/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);

	
	$property = cmf_utilities::get_property_object_for_update($property_uid , true ); // Second arg allows the method to return more detailed information that otherwise is usually not included because pulling that information is slower

	// These shouldn't be editable via the CMF, so we'll unset them for the purpose of the REST API
	unset($property->all_property_uids);
	unset($property->apikey);
	unset($property->property_mappinglink);
	unset($property->property_site_id);

	// We will respond with a count of changelog items. If they don't exist then this property cannot be imported into a remove jomres2jomres site
    $call_self = new call_self( );
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

    $property->changelog_item_count = $changelog_item_count;

	Flight::json( $response_name = "response" , $property ); 
	});
