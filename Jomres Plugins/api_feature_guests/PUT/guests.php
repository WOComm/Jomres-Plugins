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
	** Title | Update guest
	** Description | Edit a guest
	** Plugin | api_feature_guests
	** Scope | properties_get
	** URL | guests
 	** Method | PUT
	** URL Parameters | guests/@id/@guests_uid/@firstname/@surname/@house/@street/@town/@region/@country/@postcode/@landline/@mobile/@fax/@email/@vat_number/@discount
	** Data Parameters | 
	** Success Response |
	** Error Response | 
	** Sample call |guests/1/25/paolo/smith/12/first/london/london/england/111/12345678/22334455/22222/info@localhost/0/0
	** Notes |  
	
*/

Flight::route('PUT /guests/@id/@guests_uid/@firstname/@surname/@house/@street/@town/@region/@country/@postcode/@landline/@mobile/@email/@vat_number/@discount', function($property_uid, $guests_uid, $firstname, $surname, $house, $street, $town, $region, $country, $postcode, $landline, $mobile, $email, $vat_number, $discount)
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

    $query = "UPDATE ".Flight::get("dbprefix")."jomres_guests SET `enc_firstname`=:firstname,`enc_surname`=:surname,`enc_house`=:house,`enc_street`=:street,`enc_town`=:town,`enc_county`=:region,`enc_country`=:country,`enc_postcode`=:postcode,`enc_tel_landline`=:landline,`enc_tel_mobile`=:mobile,`enc_email`=:email,`discount`= :discount WHERE guests_uid = :guests_uid AND `property_uid` = :property_uid";

	$stmt = $conn->prepare( $query );
	$stmt->execute([
        'guests_uid' => $guests_uid,
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
        'discount'          	=> $discount
        ]);
        
	$updateguest = array();
	$updateguest[] = array (
			"property_uid"	=> $property_uid,
			"guests_uid"	=> $guests_uid
			);

	$conn = null;
	Flight::json( $response_name = "updateguest" ,$updateguest);
	});	



