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
	** Title | Get list guests for a specific property
	** Description | Get list guests by property uid
	** Plugin | api_feature_guests
	** Scope | properties_get
	** URL | guests
 	** Method | GET
	** URL Parameters | guests/@ID/list
	** Data Parameters | None
	** Success Response | {
  "data": {
    "listguests": [
      {
        "guests_uid": 15,
        "firstname": "test",
        "surname": "test",
        "house": "test",
        "street": "test",
        "town": "test",
        "county": "786",
        "country": "DE",
        "postcode": "test",
        "tel_landline": "test",
        "tel_mobile": "test",
        "email": "notify@jomres.net",
        "vat_number": "",
        "discount": 0,
        "property_uid": "1"
      },
      {
        "guests_uid": 16,
        "firstname": "Peter",
        "surname": "Griffin",
        "house": "31",
        "street": "Spooner Street",
        "town": "Quahog",
        "county": "3724",
        "country": "US",
        "postcode": "12345",
        "tel_landline": "555 11111",
        "tel_mobile": "555 33333",
        "email": "peter@example.com",
        "vat_number": "",
        "discount": 0,
        "property_uid": "1"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/guests/1/list
	** Notes |
	
*/

Flight::route('GET /guests/@id/list', function( $property_uid) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	

	jr_import('jomres_encryption');
	$jomres_encryption = new jomres_encryption();
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
			
    $query = 'SELECT SQL_CALC_FOUND_ROWS 
						a.guests_uid, 
						a.enc_firstname, 
						a.enc_surname, 
						a.enc_house, 
						a.enc_street, 
						a.enc_town, 
						a.enc_county, 
						a.enc_country, 
						a.enc_postcode, 
						a.enc_tel_landline, 
						a.enc_tel_mobile, 
						a.enc_email, 
						a.enc_vat_number, 
						a.discount,
						a.property_uid 
						FROM '.Flight::get("dbprefix").'jomres_guests a 
						LEFT JOIN '.Flight::get("dbprefix").'jomres_contracts b ON a.guests_uid = b.guest_uid 
						WHERE a.property_uid = :property_uid
						GROUP BY a.guests_uid
						';

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);

	$listguests = array();
	while ($row = $stmt->fetch())
		{
		$listguests[] = array ( 
			"guests_uid"	=> $row['guests_uid'],
			"firstname"		=> $jomres_encryption->decrypt($row['enc_firstname']),
			"surname"		=> $jomres_encryption->decrypt($row['enc_surname']),
			"house"			=> $jomres_encryption->decrypt($row['enc_house']),
			"street"		=> $jomres_encryption->decrypt($row['enc_street']), 
			"town"			=> $jomres_encryption->decrypt($row['enc_town']), 
			"county"		=> $jomres_encryption->decrypt($row['enc_county']), 
			"country"		=> $jomres_encryption->decrypt($row['enc_country']), 
			"postcode"		=> $jomres_encryption->decrypt($row['enc_postcode']),
			"tel_landline"	=> $jomres_encryption->decrypt($row['enc_tel_landline']), 
			"tel_mobile"	=> $jomres_encryption->decrypt($row['enc_tel_mobile']),
			"email"			=> $jomres_encryption->decrypt($row['enc_email']),
			"vat_number"	=> $jomres_encryption->decrypt($row['enc_vat_number']), 
			"discount"		=> $row['discount'], 
			"property_uid"	=> $row['property_uid']
			);
		}
    
	$conn = null;
	Flight::json( $response_name = "listguests" ,$listguests);
	});
