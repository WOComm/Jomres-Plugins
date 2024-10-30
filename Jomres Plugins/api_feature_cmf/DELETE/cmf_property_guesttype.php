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


/**
*
* Delete all property tariffs
*
*/

Flight::route('DELETE /cmf/property/guesttype/@property_uid/@guesttype_id', function($property_uid , $guesttype_id )
	{
	require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);

	jr_import( 'jrportal_guest_types' );

	$jrportal_guest_types					= new jrportal_guest_types();
	$jrportal_guest_types->id				= (int)$guesttype_id;
	$jrportal_guest_types->property_uid		= (int)$property_uid;

	$success = $jrportal_guest_types->delete_guest_type();

	Flight::json( $response_name = "response" ,$success );
	});