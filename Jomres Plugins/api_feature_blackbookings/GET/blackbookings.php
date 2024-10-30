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
	** Title | Get Bookings List for Black Bookings
	** Description | Send property uid and date, will respond with rooms black booked after that date
	** Plugin | api_feature_blackbookings
	** Scope | properties_get
	** URL | blackbookings
 	** Method | GET
	** URL Parameters | blackbookings/@ID/roomlist/@date
	** Data Parameters | None
	** Success Response |{
  "data": {
    "blackbooking": [
      {
        "room_uid": 53,
        "room_name": "",
        "room_number": "01",
        "room_floor": "",
        "contract_uid": 59,
        "black_booking": 1,
        "date": "2017/02/20"
      },
      {
        "room_uid": 54,
        "room_name": "",
        "room_number": "02",
        "room_floor": "",
        "contract_uid": 59,
        "black_booking": 1,
        "date": "2017/02/20"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/blackbookings/85/roomlist/2016-08-24
	** Notes |
*/

Flight::route('GET /blackbookings/@id/roomlist/@date(/@language)', function($property_uid, $start_date)
	{

	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

    require_once("../framework.php");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");

	// booking query
        $query = "SELECT a.`room_uid` , a.`contract_uid` , a.`black_booking` , a.`date` , b.`room_uid` , b.`room_name` , b.`room_number` FROM ".Flight::get("dbprefix")."jomres_room_bookings `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_rooms `b` ON a.`room_uid` = b.`room_uid` WHERE a. `black_booking` = 1 AND a.`property_uid` = :property_uid AND DATE_FORMAT(a.`date`, '%Y-%m-%d') >= :start_date OR a.`date` = NULL ";


	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid , 'start_date' => $start_date ]);

	$bookingslist = array();

	while ($row = $stmt->fetch())
		{
		$bookingslist[] = array (
			"room_uid"	=> $row['room_uid'],
			"room_name"	=> $row['room_name'],
			"room_number"   => $row['room_number'],
			"contract_uid"	=> $row['contract_uid'],
			"black_booking"	=> $row['black_booking'],
			"date"	        => $row['date']
			);
		}

    $roomlist = array();
    if (!empty($bookingslist)) {
        $found_rooms = array();
        foreach ( $bookingslist as $e ) {
            $found_rooms[] = $e['room_uid'];
            }
        
        // room list query
        $query2 = "SELECT room_uid,room_name,room_number, room_floor FROM ".Flight::get("dbprefix")."jomres_rooms WHERE propertys_uid = :property_uid ORDER BY room_number,room_name";

        $stmt2 = $conn->prepare( $query2 );
        $stmt2->execute([ 'property_uid' => $property_uid ]);
        
        while ($row = $stmt2->fetch())
            {
            $ruid =$row['room_uid'];

            $bbcontract_uid   = null;
            $bbblack_booking  = null;
            $bbdate	          = null;

            foreach ( $bookingslist as $e )
                    if ($e['room_uid'] == $ruid)
                     {
                     $bbcontract_uid   	= $e['contract_uid'];
                     $bbblack_booking  	= $e['black_booking'];
                     $bbdate	   		= $e['date'];
                     }

            if ( in_array($ruid , $found_rooms)) {
                // merge booking & rooms
                $roomlist[] = array (
                    "room_uid"	=> $ruid,
                    "room_name"	=> $row['room_name'],
                    "room_number"	=> $row['room_number'],
                    "room_floor"	=> $row['room_floor'],
                    "contract_uid"	=> $bbcontract_uid,
                    "black_booking"	=> $bbblack_booking,
                    "date"	        => $bbdate
                    );
                }
            }
        }
	$conn = null;
	Flight::json( $response_name = "blackbooking" ,$roomlist);
	$conn = close();
	});
