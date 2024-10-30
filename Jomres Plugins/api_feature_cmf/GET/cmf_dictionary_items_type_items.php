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

Flight::route('GET /cmf/dictionary/items/type/items/@type', function( $type )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
 	$type = filter_var($type, FILTER_SANITIZE_SPECIAL_CHARS);

	jr_import('channelmanagement_framework_local_item_types');
	$channelmanagement_framework_local_item_types = new channelmanagement_framework_local_item_types();
	
	if (!array_key_exists ( $type , $channelmanagement_framework_local_item_types->local_item_types) ) {
		Flight::halt(204, "Item type unrecognised");
	}
	
	jr_import('channelmanagement_framework_local_items');
	$channelmanagement_framework_local_items = new channelmanagement_framework_local_items();

	$local_items = $channelmanagement_framework_local_items->get_local_items($type);
			
	$response = new stdClass();
	$response->item_type = $type;
	$response->items = $local_items;
	
	Flight::json( $response_name = "response" , $response ); 
	});
	
	