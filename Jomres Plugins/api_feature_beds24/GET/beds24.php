<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Get the property uid in Jomres for a beds24 propId
	** Description | To save Beds24 needing to keep a cross reference table of their propIds to our property uids, this api feature will receive a beds24 propId and respond with the corresponding property uid
	** Plugin | api_feature_beds24
	** Scope | properties_get
	** URL | beds24
 	** Method | GET
	** URL Parameters | None
	** Data Parameters | None
	** Success Response | {
  "data": {
    "property_uid": "2"
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | {"data":{"property_uid":"0"}}
	** Sample call |beds24/property_uid/29215
	** Notes | The property uid isn't a secret number, it's visible in urls anywhere so there's no requirement to perform a security check to ensure that a user has the rights to access a property. We will not attempt to cross reference the calling api key owner with the property uid in question. A response of 0 means that either the property hasn't been linked with Beds24, or it simply doesn't exist.
*/


Flight::route('GET /beds24/property_uid/@id', function($propId) 
	{
	validate_scope::validate('properties_get');
    
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query = 'SELECT property_uid FROM '.Flight::get("dbprefix").'jomres_beds24_property_uid_xref WHERE beds24_property_uid = :id LIMIT 1';
	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'id' => $propId ]);
	$property = $stmt->fetch();
	$conn = null;
    
    Flight::json( $response_name = "property_uid" , (int) trim($property['property_uid']));

	});
