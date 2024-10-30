<?php
/**
 * Core file
 *
 * @author  
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2017
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Get Last Active (X minutes) for a specific property
	** Description | Get Last Active (X minutes) by property uid
	** Plugin | api_feature_lastactive
	** Scope | lastactive_get
	** URL | lastactive
 	** Method | GET
	** URL Parameters | lastactive/@id/@minutes
	** Data Parameters | None
	** Success Response | {
  "data": {
    "lastactive_bookings": 3
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/lastactive/1/30
	** Notes |
*/

Flight::route('GET /lastactive/@id/@minutes', function( $property_uid , $minutes ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	
	$last_active = date("Y-m-d H:i:s", (time() - (60*$minutes)) );

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query = "SELECT count(`contract_uid`) as bookings, `property_uid` 
			FROM ".Flight::get("dbprefix")."jomres_contracts 
			WHERE `property_uid` = :property_uid 
			AND DATE_FORMAT(`timestamp`, '%Y-%m-%d %H:%i:%s') > DATE_FORMAT('" . $last_active . "', '%Y-%m-%d %H:%i:%s') 
			GROUP BY `property_uid`";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);

    $row= $stmt->fetch();
	$booking_count = $row['bookings'];
				
	$conn = null;
	Flight::json( $response_name = "lastactive_bookings" ,(int)$booking_count);
	});