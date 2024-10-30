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
	** Title | Delete Coupon
	** Description | Delete a coupon
	** Plugin | api_feature_coupon
	** Scope | properties_set
	** URL | coupon
 	** Method | DELETE
	** URL Parameters | coupon/:ID/:COUPONID
	** Data Parameters | None
	** Success Response | {
  "data": {
    "coupondeleted": "1"
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 
	** Sample call |jomres/api/coupon/delete/1/4
	** Notes | None
*/

Flight::route('DELETE /coupon/@id/@coupon_id', function($property_uid, $coupon_id) 
	{
	validate_scope::validate('properties_set');

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	if ($coupon_id > 0) {
		$query="DELETE FROM ".Flight::get("dbprefix")."jomres_coupons WHERE coupon_id = :coupon_id AND property_uid = :property_uid ";
		$stmt = $conn->prepare( $query );
		$stmt->execute([ 'property_uid' => $property_uid, 'coupon_id' => $coupon_id ]);
	}

	Flight::json( $response_name = "coupondeleted" , $coupon_id);
	}); 
