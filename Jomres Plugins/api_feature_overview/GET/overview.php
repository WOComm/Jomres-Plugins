<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Get bookings due to be checked in
	** Description | Lists the bookings that are due to be checked in today
	** Plugin | api_feature_overview
	** Scope | properties_get
	** URL | overview
 	** Method | GET
	** URL Parameters | overview/@id/checkin
	** Data Parameters | None
	** Success Response |{
  "data": {
    "checkin": [
      {
        "contract_uid": 92,
        "arrival": "2017/02/22",
        "departure": "2017/02/23",
        "deposit_paid": 0,
        "tag": "52257877",
        "booked_in": 0,
        "bookedout": 0,
        "cancelled": 0,
        "invoice_uid": 47,
        "firstname": "Peter",
        "surname": "Griffin",
        "property_uid": 1
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/overview/85/checkin/
	** Notes |
*/

Flight::route('GET /overview/@id/checkin', function( $property_uid )
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	jr_import('jomres_encryption');
	$jomres_encryption = new jomres_encryption();
	
	$today=date("Y/m/d");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT SQL_CALC_FOUND_ROWS a.`contract_uid`, a.`arrival`,  a.`departure`, a.`deposit_paid`, a.`tag`, a.`booked_in`, a.`bookedout`,
		  a.`cancelled`, a.`invoice_uid`, a.`property_uid`, b.`enc_firstname`, b.`enc_surname` FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE a.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND a.`cancelled` = '0' AND DATE_FORMAT(a.`arrival`, '%Y/%m/%d') = DATE_FORMAT('" . $today . "', '%Y/%m/%d') ORDER BY a.`arrival` desc";


	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
	$property_uids = array();

	$checkin = array();
	while ($row = $stmt->fetch())
		{
		$checkin[] = array (
			"contract_uid"=> 	$row['contract_uid'] ,
			"arrival"=> 		$row['arrival'] ,
			"departure"=> 		$row['departure'] ,
			"deposit_paid"=> 	$row['deposit_paid'] ,
			"tag"=> 			$row['tag'] ,
			"booked_in"=> 		$row['booked_in'] ,
			"bookedout"=> 		$row['bookedout'] ,
			"cancelled"=> 		$row['cancelled'] ,
			"invoice_uid"=> 	$row['invoice_uid'],
			"firstname"=> 		$jomres_encryption->decrypt($row['enc_firstname']),
			"surname"=> 		$jomres_encryption->decrypt($row['enc_surname']),
			"property_uid"=> 	$row['property_uid']
			);
		}
	$conn = null;

	Flight::json( $response_name = "checkin" ,$checkin);
	});



/*
	** Title | Get check-out for a specific property
	** Description | Get check-out by property uid
	** Plugin | api_feature_overview
	** Scope | properties_get
	** URL | overview
 	** Method | GET
	** URL Parameters | overview/@id/checkout
	** Data Parameters | None
    ** Success Response |{
  "data": {
    "checkout": [
      {
        "contract_uid": 59,
        "arrival": "2017/02/20",
        "departure": "2017/02/22",
        "deposit_paid": 0,
        "tag": "15981974",
        "booked_in": 0,
        "bookedout": 0,
        "cancelled": 0,
        "invoice_uid": null,
        "firstname": null,
        "surname": null,
        "property_uid": 1
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/overview/85/checkout/
	** Notes | Black bookings will be included in this list. In the above example you can see that the name details are null, hence this was a black booking.


*/

Flight::route('GET /overview/@id/checkout', function( $property_uid )
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	jr_import('jomres_encryption');
	$jomres_encryption = new jomres_encryption();

	$today=date("Y/m/d");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT SQL_CALC_FOUND_ROWS a.`contract_uid`, a.`arrival`,  a.`departure`, a.`deposit_paid`, a.`tag`, a.`booked_in`, a.`bookedout`,
		  a.`cancelled`, a.`invoice_uid`, a.`property_uid`, b.`enc_firstname`, b.`enc_surname`
			FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE a.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND a.`cancelled` = '0' AND DATE_FORMAT(a.`departure`, '%Y/%m/%d') = DATE_FORMAT('" . $today . "', '%Y/%m/%d') ORDER BY a.`arrival` desc ";


	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
	$property_uids = array();

	$checkout = array();
	while ($row = $stmt->fetch())
		{
		$checkout[] = array (
			"contract_uid"=> 	$row['contract_uid'] ,
			"arrival"=> 		$row['arrival'] ,
			"departure"=> 		$row['departure'] ,
			"deposit_paid"=> 	$row['deposit_paid'] ,
			"tag"=> 			$row['tag'] ,
			"booked_in"=> 		$row['booked_in'] ,
			"bookedout"=> 		$row['bookedout'] ,
			"cancelled"=> 		$row['cancelled'] ,
			"invoice_uid"=> 	$row['invoice_uid'],
			"firstname"=> 		$jomres_encryption->decrypt($row['enc_firstname']),
			"surname"=> 		$jomres_encryption->decrypt($row['enc_surname']),
			"property_uid"=> 	$row['property_uid']
			);
		}
	$conn = null;

	Flight::json( $response_name = "checkout" ,$checkout);
	});


/*
	** Title | Get residents for a specific property
	** Description | Lists contracts where the guests have been booked in but not booked out
	** Plugin | api_feature_overview
	** Scope | properties_get
	** URL | overview
 	** Method | GET
	** URL Parameters | overview/@id/resident
	** Data Parameters | None
    ** Success Response |{
  "data": {
    "resident": [
      {
        "contract_uid": 38,
        "arrival": "2016/12/29",
        "departure": "2016/12/30",
        "deposit_paid": 0,
        "tag": "97342851",
        "booked_in": 1,
        "bookedout": 0,
        "cancelled": 0,
        "invoice_uid": 29,
        "firstname": "Tom",
        "surname": "Smith",
        "property_uid": 1
      },
      {
        "contract_uid": 40,
        "arrival": "2016/12/29",
        "departure": "2016/12/30",
        "deposit_paid": 0,
        "tag": "23867262",
        "booked_in": 1,
        "bookedout": 0,
        "cancelled": 0,
        "invoice_uid": 31,
        "firstname": "test",
        "surname": "test",
        "property_uid": 1
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/overview/85/resident/
	** Notes |

*/

Flight::route('GET /overview/@id/resident', function( $property_uid )
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	jr_import('jomres_encryption');
	$jomres_encryption = new jomres_encryption();
	
	$today=date("Y/m/d");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT SQL_CALC_FOUND_ROWS a.`contract_uid`, a.`arrival`,  a.`departure`, a.`deposit_paid`, a.`tag`, a.`booked_in`, a.`bookedout`,
		  a.`cancelled`, a.`invoice_uid`, a.`property_uid`, b.`enc_firstname`, b.`enc_surname`
			FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE a.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND a.`cancelled` = '0' AND a.`booked_in` = '1' AND a.`bookedout` = '0' ORDER BY a.`arrival` desc";
	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
	$property_uids = array();

	$resident = array();
	while ($row = $stmt->fetch())
		{
		$resident[] = array (
			"contract_uid"=> 	$row['contract_uid'] ,
			"arrival"=> 		$row['arrival'] ,
			"departure"=> 		$row['departure'] ,
			"deposit_paid"=> 	$row['deposit_paid'] ,
			"tag"=> 			$row['tag'] ,
			"booked_in"=> 		$row['booked_in'] ,
			"bookedout"=> 		$row['bookedout'] ,
			"cancelled"=> 		$row['cancelled'] ,
			"invoice_uid"=> 	$row['invoice_uid'],
			"firstname"=> 		$jomres_encryption->decrypt($row['enc_firstname']),
			"surname"=> 		$jomres_encryption->decrypt($row['enc_surname']),
			"property_uid"=> 	$row['property_uid']
			);
		}
	$conn = null;

	Flight::json( $response_name = "resident" ,$resident);
	});

/*
	** Title | Get statistic for a specific property
	** Description | Get statistic by property uid
	** Plugin | api_feature_overview
	** Scope | properties_get
	** URL | overview
 	** Method | GET
	** URL Parameters | overview/@id/statistic
	** Data Parameters | None
    ** Success Response |{
  "data": {
    "statistic": [
      {
        "sts_checkin": 1,
        "sts_checkin_bookin": 0,
        "sts_checkout": 1,
        "sts_checkout_bookout": 0,
        "sts_resident": 2
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/overview/85/statistic/
	** Notes |
*/

Flight::route('GET /overview/@id/statistic', function( $property_uid )
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	$today=date("Y/m/d");



	/////////// checkin ////////////////
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT COUNT( * ) AS checkin
				FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE b.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND a.`cancelled` = '0' AND DATE_FORMAT(a.`arrival`, '%Y/%m/%d') = DATE_FORMAT('" . $today . "', '%Y/%m/%d')";


	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
        $row= $stmt->fetch();
	$checkin = $row['checkin'];
	$conn = null;

	/////////// checkin_bookin ////////////////
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT COUNT( * ) AS checkin_bookin
				FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE a.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND a.`cancelled` = '0' AND a.`booked_in` = '1' AND DATE_FORMAT(a.`arrival`, '%Y/%m/%d') = DATE_FORMAT('" . $today . "', '%Y/%m/%d') ";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
        $row= $stmt->fetch();
	$checkin_bookin = $row['checkin_bookin'];
	$conn = null;


	/////////// checkout ////////////////
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT COUNT( * ) AS checkout
			FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE a.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND a.`cancelled` = '0' AND DATE_FORMAT(a.departure, '%Y/%m/%d') = DATE_FORMAT('" . $today . "', '%Y/%m/%d')";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
        $row= $stmt->fetch();
	$checkout = $row['checkout'];
	$conn = null;

	/////////// checkout_bookout ////////////////
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT COUNT( * ) AS checkout_bookout
			FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE a.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND a.`cancelled` = '0' AND a.`bookedout` = '1' AND DATE_FORMAT(a.departure, '%Y/%m/%d') = DATE_FORMAT('" . $today . "', '%Y/%m/%d')";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
        $row= $stmt->fetch();
	$checkout_bookout = $row['checkout_bookout'];
	$conn = null;

	/////////// resident ////////////////
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT COUNT( * ) AS resident
			FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE a.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND a.`cancelled` = '0' AND a.`booked_in` = '1' AND a.`bookedout` = '0' ";


	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
        $row= $stmt->fetch();
	$resident = $row['resident'];
	$conn = null;


	$statistic = array();
		$statistic[] = array (
			"sts_checkin"=> $checkin,
			"sts_checkin_bookin"=> $checkin_bookin,
			"sts_checkout" => $checkout,
			"sts_checkout_bookout"=> $checkout_bookout,
			"sts_resident" => $resident
			);
	$conn = null;

	Flight::json( $response_name = "statistic" ,$statistic);
	});

