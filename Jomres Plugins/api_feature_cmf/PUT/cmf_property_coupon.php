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

Flight::route('PUT /cmf/property/coupon', function()
	{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	cmf_utilities::validate_property_uid_for_user((int)$_PUT['property_uid']);

	if ( !cmf_utilities::validate_date($_PUT['valid_from']) ) {
		Flight::halt(204, "valid_from incorrect, must be in Y-m-d format");
	}

	if ( !cmf_utilities::validate_date($_PUT['valid_to']) ) {
		Flight::halt(204, "valid_to incorrect, must be in Y-m-d format");
	}

	if ( !cmf_utilities::validate_date($_PUT['booking_valid_from']) ) {
		Flight::halt(204, "booking_valid_from incorrect, must be in Y-m-d format");
	}

	if ( !cmf_utilities::validate_date($_PUT['booking_valid_to']) ) {
		Flight::halt(204, "booking_valid_to, incorrect must be in Y-m-d format");
	}

	jr_import( 'jrportal_coupons' );
	$jrportal_coupons = new jrportal_coupons();

	$jrportal_coupons->id					= (int)jomresGetParam( $_PUT, 'coupon_id', 0 );
	$jrportal_coupons->property_uid			= (int)$_PUT['property_uid'];
	$jrportal_coupons->coupon_code			= jomresGetParam( $_PUT, 'coupon_code', '' );
	$jrportal_coupons->valid_from			= jomresGetParam( $_PUT, 'valid_from', '');
	$jrportal_coupons->valid_to				= jomresGetParam( $_PUT, 'valid_to', '');
	$jrportal_coupons->amount				= jomresGetParam( $_PUT, 'amount', 0.00 );
	$jrportal_coupons->is_percentage		= (int)jomresGetParam( $_PUT, 'is_percentage', 1 );
	$jrportal_coupons->booking_valid_from	= jomresGetParam( $_PUT, 'booking_valid_from', '');
	$jrportal_coupons->booking_valid_to		= jomresGetParam( $_PUT, 'booking_valid_to', '');
	$jrportal_coupons->guest_uid			= (int)jomresGetParam( $_PUT, 'guest_uid', 0 );

	if ($jrportal_coupons->id > 0) {
		$jrportal_coupons->commit_update_coupon();
	} else {
		$jrportal_coupons->commit_new_coupon();
	}

	Flight::json( $response_name = "response" , array ( "coupon_id" => $jrportal_coupons->id ) );
	});
	
	