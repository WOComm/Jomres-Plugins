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

Confirm that settings to be passed are valid mrConfig indecies

*/

Flight::route('PUT /cmf/property/guesttype', function()
	{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$_PUT['property_uid'];

	cmf_utilities::validate_property_uid_for_user($property_uid);

	jr_import( 'jrportal_guest_types' );
	$jrportal_guest_types = new jrportal_guest_types();

	$jrportal_guest_types->id			    = (int)$_PUT['id'];
	$jrportal_guest_types->type				= filter_var($_PUT['type'], FILTER_SANITIZE_SPECIAL_CHARS);
	$jrportal_guest_types->notes			= filter_var($_PUT['notes'], FILTER_SANITIZE_SPECIAL_CHARS);
	$jrportal_guest_types->maximum			= (int)$_PUT['maximum'];
	$jrportal_guest_types->is_percentage	= (int)$_PUT['is_percentage'];
	$jrportal_guest_types->is_child			= (int)$_PUT['is_child'] ;
	$jrportal_guest_types->posneg			= (int)$_PUT['posneg'];
	$jrportal_guest_types->order			= (int)$_PUT['order'];
	$jrportal_guest_types->variance			= (float)$_PUT['variance'];
	$jrportal_guest_types->property_uid		= $property_uid;

	if ($jrportal_guest_types->id == 0 ) {
		$jrportal_guest_types->commit_new_guest_type();
	} else {
		$jrportal_guest_types->commit_update_guest_type();
	}

	Flight::json( $response_name = "response" , array ( "id" => $jrportal_guest_types->id ) );
	});
	
	