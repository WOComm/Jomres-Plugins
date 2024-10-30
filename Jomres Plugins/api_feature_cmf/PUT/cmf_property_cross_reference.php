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

Offers the creation of cross referencing local to remote ids

Send the item type (e.g. extra), the local id and the remote id.

If the remote_id does not exist then it is added.
If the remote_id exists, then it will be overwritten.

If the local id is not sent then it is removed.

Bookings and rooms have their own cross reference tables, this feature is for any arbitrary item that needs cross referencing between local and remote systems
Returns all cross references

*/

Flight::route('PUT /cmf/property/cross/reference', function()
	{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid						= (int)$_PUT['property_uid'];
	$item_type							= filter_var($_PUT['item_type'], FILTER_SANITIZE_SPECIAL_CHARS);
	$local_id							= (int)$_PUT['local_id'];
	$remote_id							= (int)$_PUT['remote_id'];

	cmf_utilities::validate_property_uid_for_user($property_uid);

	if ( $item_type == '' ) {
		Flight::halt(204, "Item type not sent");
	}
	
	if ( $remote_id == 0 ) {
		Flight::halt(204, "Remote id not sent.");
	}

	$property = cmf_utilities::get_property_object_for_update($property_uid);

	if (!isset($property->remote_data->cross_references)) {
		$property->remote_data->cross_references = array();
	}

	if (!isset($property->remote_data->cross_references[$item_type])) {
		$property->remote_data->cross_references[$item_type] = array();
	}

	if ( isset($property->remote_data->cross_references[$item_type][$remote_id]) && $local_id == 0 ) {
		unset($property->remote_data->cross_references[$item_type][$remote_id]);
	} else {
		$property->remote_data->cross_references[$item_type][$remote_id] = array(
			"remote_id"						=> $remote_id,
			"local_id"						=> $local_id
		);
	}


	cmf_utilities::set_property_remote_data($property);

	Flight::json( $response_name = "response" , $property->remote_data->cross_references );
	});
	
	