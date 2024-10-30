<?php
/**
 * Core file
 *
 * @author
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | update Coupon
	** Description | Edit a coupon
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | coupon
 	** Method | PUT
	** URL Parameters | coupon/update/@id/@couponid/@coupon_code/@valid_from/@valid_to/@amount/@is_percentage/@booking_valid_from/@booking_valid_to/@guest_uid
	** Data Parameters |
	** Success Response |
	** Error Response |
	** Sample call |jomres/api/coupon/update/1/8/hGiDQVtvpGhRdiv/2017-03-01/2017-03-30/10/1/2017-03-05/2017-03-25/1
	** Notes |

*/

Flight::route('PUT /coupon/@id/@couponid/@coupon_code/@valid_from/@valid_to/@amount/@is_percentage/@booking_valid_from/@booking_valid_to(/@guest_uid)', function($property_uid, $couponid, $coupon_code, $valid_from, $valid_to, $amount, $is_percentage, $booking_valid_from, $booking_valid_to, $guest_uid)
	{

	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	require_once("../framework.php");

	if (!isset($guest_uid)) {
		$guest_uid = 0;
	}

	$is_percentage = (int)(bool)$is_percentage;

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");

	$query="UPDATE ".Flight::get("dbprefix")."jomres_coupons SET `coupon_code`=:coupon_code,`valid_from`=:valid_from, `valid_to`=:valid_to,`amount`=:amount,`is_percentage`=:is_percentage,`booking_valid_from`=:booking_valid_from,`booking_valid_to`=:booking_valid_to,`guest_uid`=:guest_uid WHERE coupon_id = :couponid AND property_uid = :property_uid";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 	'property_uid' 		=> $property_uid,
						'couponid' 			=> $couponid,
						'coupon_code'		=> $coupon_code,
						'valid_from' 		=> $valid_from,
						'valid_to' 			=> $valid_to,
						'amount' 			=> $amount,
						'is_percentage' 	=> $is_percentage,
						'booking_valid_from'	=> $booking_valid_from,
						'booking_valid_to' 	=> $booking_valid_to,
						'guest_uid' 		=> $guest_uid
					]);


		$updatecoupon = array();
		$updatecoupon[] = array (
				"property_uid"		=> $property_uid,
				"coupon_id"			=> $couponid,
				"coupon_code"		=> $coupon_code,
				"valid_from" 		=> $valid_from,
				"valid_to" 			=> $valid_to,
				"amount" 			=> $amount,
				"is_percentage" 	=> $is_percentage,
				"booking_valid_from" => $booking_valid_from,
				"booking_valid_to" 	=> $booking_valid_to,
				"guest_uid" 		=> $guest_uid
			);

	Flight::json( $response_name = "updatecoupon" ,$updatecoupon);
	});

