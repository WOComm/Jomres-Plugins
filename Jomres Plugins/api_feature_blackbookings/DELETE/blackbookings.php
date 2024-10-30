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
	** Title | Delete Black Booking
	** Description | Send property uid and contract uid.
	** Plugin | api_feature_blackbookings
	** Scope | properties_set
	** URL | blackbookings
 	** Method | DELETE
	** URL Parameters | blackbookings/:ID/:CONTRACTID
	** Data Parameters | None
	** Success Response |{
  "data": {
    "blackbookingsdeleted": "63"
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 
	** Sample call |jomres/api/blackbookings/2/216
	** Notes | None
*/

Flight::route('DELETE /blackbookings/@id/@contractid', function($property_uid, $contract_uid) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);
    
	require_once("../framework.php");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	if ($contract_uid != 0)
	{
        $query = "SELECT room_bookings_uid FROM #__jomres_room_bookings WHERE property_uid = ".(int)$property_uid." AND contract_uid = ".(int)$contract_uid;
        $result =doSelectSql($query);
        if (empty($result)) {
            Flight::halt(204, "Black booking does not exist");
            }

		$query="DELETE FROM ".Flight::get("dbprefix")."jomres_room_bookings WHERE contract_uid = :contract_uid AND property_uid = :property_uid ";
		$stmt = $conn->prepare( $query );
		$stmt->execute([ 'property_uid' => $property_uid, 'contract_uid' => $contract_uid ]);
		$stmt->fetch();

		$query="DELETE FROM ".Flight::get("dbprefix")."jomres_contracts WHERE contract_uid = :contract_uid AND property_uid = :property_uid ";
		$stmt = $conn->prepare( $query );
		$stmt->execute([ 'property_uid' => $property_uid, 'contract_uid' => $contract_uid ]);
		$stmt->fetch();
	}

	Flight::json( $response_name = "blackbookingsdeleted" , $contract_uid);
	}); 
