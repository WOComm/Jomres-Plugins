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
	** Title | Add Coupon
	** Description | Create a coupon
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | coupon
 	** Method | POST
	** URL Parameters | coupon/@id/@valid_from/@valid_to/@amount/@is_percentage/@booking_valid_from/@booking_valid_to/@guest_uid
	** Data Parameters |
	** Success Response |
	** Error Response |
	** Sample call |jomres/api/coupon/1/2017-01-01/2017-01-30/10/1/2017-01-05/2017-01-25/1
	** Notes |

*/

Flight::route('POST /coupon/@id/@valid_from/@valid_to/@amount/@is_percentage/@booking_valid_from/@booking_valid_to(/@guest_uid)', function($property_uid, $valid_from, $valid_to, $amount, $is_percentage, $booking_valid_from, $booking_valid_to, $guest_uid)
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	require_once("../framework.php");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");

	if (!isset($guest_uid)) {
		$guest_uid = 0;
	}
	
	$is_percentage = (int)(bool)$is_percentage;
	
	$coupon_code			= generateJomresRandomString(15);

	$query="INSERT INTO ".Flight::get("dbprefix")."jomres_coupons (`property_uid`,`coupon_code`,`valid_from`,`valid_to`,`amount`,`is_percentage`,`booking_valid_from`,`booking_valid_to`,`guest_uid`)
	VALUES
	(:property_uid,'$coupon_code',:valid_from,:valid_to,:amount,:is_percentage,:booking_valid_from,:booking_valid_to,:guest_uid)";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 	'property_uid' 		=> $property_uid,
						'valid_from' 		=> $valid_from,
						'valid_to' 			=> $valid_to,
						'amount' 			=> $amount,
						'is_percentage' 	=> $is_percentage,
						'booking_valid_from'	=> $booking_valid_from,
						'booking_valid_to' 	=> $booking_valid_to,
						'guest_uid' 		=> $guest_uid
					]);


		$addcoupon = array (
				"property_uid"		=> $property_uid,
				"coupon_code"		=> $coupon_code,
				"valid_from" 		=> $valid_from,
				"valid_to" 			=> $valid_to,
				"amount" 			=> $amount,
				"is_percentage" 	=> $is_percentage,
				"booking_valid_from" => $booking_valid_from,
				"booking_valid_to" 	=> $booking_valid_to,
				"guest_uid" 		=> $guest_uid
			);

	Flight::json( $response_name = "addcoupon" ,$addcoupon);
	});

