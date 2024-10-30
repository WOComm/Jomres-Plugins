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
	** Title | Get List for Coupon a specific property
	** Description | Get coupon list by property uid
	** Plugin | api_feature_coupon
	** Scope | properties_get
	** URL | coupon
 	** Method | GET
	** URL Parameters | coupon/@ID/list
	** Data Parameters | None
	** Success Response |
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/coupon/85/list
	** Notes |
*/

Flight::route('GET /coupon/@id/list(/@language)', function($property_uid, $language)
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

		$query = "SELECT `coupon_id`,`coupon_code`,`valid_from`,`valid_to`,`amount`,`is_percentage`,`rooms_only`,`booking_valid_from`,`booking_valid_to`,`guest_uid` FROM ".Flight::get("dbprefix")."jomres_coupons WHERE property_uid = :property_uid";

		$stmt = $conn->prepare( $query );
		$stmt->execute([ 'property_uid' => $property_uid]);

		$query2 = "SELECT guests_uid, enc_surname, enc_firstname FROM ".Flight::get("dbprefix")."jomres_guests WHERE property_uid = :property_uid";
		$stmt2 = $conn->prepare( $query2 );
		$stmt2->execute([ 'property_uid' => $property_uid]);

		$guests_arrray = array();
		while ($row = $stmt2->fetch()) {
		$guests_arrray[] = array (
			"guest_uid"		=> $row['guests_uid'],
			"surname"		=> $jomres_encryption->decrypt($row['enc_surname']),
			"firstname"   	=> $jomres_encryption->decrypt($row['enc_firstname'])
			);
		}

		$couponlist = array();
		while ($row = $stmt->fetch()) {
			$ispercentage=jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',false);
			if ($row['is_percentage'])
				$ispercentage=jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',false);

			$roomonly=jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',false);
			if ($row['rooms_only'])
				$roomonly=jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',false);

			foreach ($guests_arrray as $coupon) {
			$guest_name="";
				if ( (int)$coupon['guest_uid'] > 0  && (int)$row['guest_uid'] == (int)$coupon['guest_uid'] ) {
				$guest_name=$coupon['firstname']. " ".$coupon['surname'];
				break;
				}
			}

		$couponlist[] = array (
				"coupon_id"			=> $row['coupon_id'],
				"coupon_code"		=> $row['coupon_code'],
				"valid_from" 		=> $row['valid_from'],
				"valid_to" 			=> $row['valid_to'],
				"amount" 			=> $row['amount'],
				"ispercentage" 		=> $ispercentage,
				"roomonly"			=> $roomonly,
				"booking_valid_from" => $row['booking_valid_from'],
				"booking_valid_to" 	=> $row['booking_valid_to'],
				"guest_name" 		=> $guest_name
			);
		}

	$conn = null;
	Flight::json( $response_name = "coupons" ,$couponlist);
	$conn = close();
	});
