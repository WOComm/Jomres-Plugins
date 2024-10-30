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

Flight::route('PUT /cmf/property/status/review', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$_PUT['property_uid'];

    cmf_utilities::validate_property_uid_for_user($property_uid);

	jr_import('jomres_sanity_check');
	$jomres_sanity_check = new jomres_sanity_check( true , $property_uid );
	$jomres_sanity_check->do_sanity_checks( true );

	$warnings = array();
	if ( !empty($jomres_sanity_check->warnings_stack) ) {
		foreach ($jomres_sanity_check->warnings_stack as $warning ) {
			$warnings[] = $warning['MESSAGE'];
		}
		$response = false;
	} else {
		$response = true;
	}
	
	Flight::json( $response_name = "response" , array ( "property_complete" => $response , "warnings" => $warnings ) ); 
	});
	
	