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
	** Title | Add guest
	** Description | Create a guest
	** Plugin | api_feature_guests
	** Scope | properties_get
	** URL | guests
 	** Method | POST
	** URL Parameters | guests/@id/@firstname/@surname/@house/@street/@town/@region/@country/@postcode/@landline/@mobile/@fax/@email/@vat_number/@discount
	** Data Parameters | 
	** Success Response |{
  "data": {
    "addguest": [
      {
        "guest_uid": "25"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 
	** Sample call |guests/1/tom/smith/Appt 112/Long Road/Swansea/1083/GB/XXNN NNXX/01000123456/07000123456/02000123456/test@test.com/12345678/10
	** Notes |  
	
*/


Flight::route('POST /guests/@id/@firstname/@surname/@house/@street/@town/@region/@country/@postcode/@landline/@mobile/@email/@vat_number/@discount(/@language)', function($property_uid, $firstname, $surname, $house, $street, $town, $region, $country, $postcode, $landline, $mobile, $email, $vat_number, $discount , $language) 

	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	jr_import('jomres_encryption');
	$jomres_encryption = new jomres_encryption();
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
    $query = "INSERT INTO ".Flight::get("dbprefix")."jomres_guests (`enc_firstname`,`enc_surname`,`enc_house`,`enc_street`,`enc_town`,`enc_county`,`enc_country`,`enc_postcode`,`enc_tel_landline`,`enc_tel_mobile`,`enc_email`,`discount`,`property_uid`)VALUES (:firstname,:surname,:house,:street,:town,:region,:country,:postcode,:landline,:mobile,:email,:discount,:property_uid)";

	$stmt = $conn->prepare( $query );
	$stmt->execute([
        'property_uid'      => $property_uid,
        'firstname'         => $jomres_encryption->encrypt($firstname),
        'surname'           => $jomres_encryption->encrypt($surname),
        'house'             => $jomres_encryption->encrypt($house),
        'street'            => $jomres_encryption->encrypt($street),
        'town'              => $jomres_encryption->encrypt($town),
        'region'            => $jomres_encryption->encrypt($region),
        'country'           => $jomres_encryption->encrypt($country),
        'postcode'          => $jomres_encryption->encrypt($postcode),
        'landline'          => $jomres_encryption->encrypt($landline),
        'mobile'            => $jomres_encryption->encrypt($mobile),
        'email'             => $jomres_encryption->encrypt($email),
        'discount'          => $discount
        ]);

    $addguest = array();
	$addguest[] = array ( 
        "guest_uid" => $conn->lastInsertId()
		);

	$conn = null;
	Flight::json( $response_name = "addguest" ,$addguest);
	});	



