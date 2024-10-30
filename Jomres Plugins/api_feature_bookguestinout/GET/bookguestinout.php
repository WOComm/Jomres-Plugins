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
	** Title | Get check-in/out status for a contract
	** Description | Get check-in status by property uid and contract uid
	** Plugin | api_feature_bookguestinout
	** Scope | properties_set
	** URL | bookguestinout
 	** Method | GET
	** URL Parameters | bookguestinout/:ID/:CONTRACTID/
	** Data Parameters | property_uid, contract_uid
	** Success Response |{
  "data": {
    "booking_status": {
      "booked_in": 1,
      "booked_in_date": "2016-12-28",
      "booked_out": 1,
      "booked_out_date": "2017-02-20"
    }
  },
  "meta": {
    "code": 200
  }
}

	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/bookguestinout/1/226
	** Notes |
*/

Flight::route('GET /bookguestinout/@id/@contractid/', function($property_uid, $contract_uid) 
	{

	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
    require_once("../framework.php");
	
	$today=date("Y/m/d");
	if ($contract_uid == 0)
		{
		Flight::halt(204, "Contract uid not sent");
		}

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$stmt = $conn->prepare( "SELECT `booked_in` , `true_arrival` , `bookedout` , `bookedout_timestamp` FROM ".Flight::get("dbprefix")."jomres_contracts WHERE `contract_uid` = :contract_uid AND `property_uid` = :property_uid LIMIT 1" );
	$stmt->execute(['property_uid' => $property_uid, 'contract_uid' =>$contract_uid ]);

	$status = array();
	while ($row = $stmt->fetch())
		{
 
		$status['booked_in'] = $row['booked_in'];
        if ($row['booked_in'] == "1" ) {
            $status['booked_in_date'] = str_replace( "/" , "-" , $row['true_arrival']);
            } 
        else {
            $status['booked_in_date'] = '';
            }

        $status['booked_out'] = $row['bookedout'];

        if ($row['bookedout'] == "1" ) {
            $status['booked_out_date'] = date("Y-m-d" , strtotime ( $row['bookedout_timestamp']) );
            } 
        else {
            $status['booked_out_date'] = '';
            }
  
		}
       
	if (empty($status)) {
		Flight::halt(204, "Contract uid not found");
		}
        
	$conn = null;
	Flight::json( $response_name = "booking_status" ,array( "booked_in" => $status['booked_in'] , "booked_in_date" => $status['booked_in_date'] , "booked_out" => $status['booked_out'] , "booked_out_date" => $status['booked_out_date'] ));
	$conn = close();
	});
