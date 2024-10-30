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
* Delete coupon
*
*/

Flight::route('DELETE /cmf/property/coupon/@property_uid/@extra_id', function($property_uid , $coupon_id )
	{
	require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);

	$coupon_id = (int)$coupon_id;

	jr_import( 'jrportal_coupons' );
	$jrportal_coupons = new jrportal_coupons();
	$jrportal_coupons->id = $coupon_id;
	$jrportal_coupons->property_uid	= $property_uid;

	$jrportal_coupons->delete_coupon();

	$response = true;
	
	Flight::json( $response_name = "response" ,$response );
	});