<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


/*
	** Title | Get property blocks
	** Description | Get dates when the property is not available
*/


Flight::route('GET /cmf/property/list/coupons/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);

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


			$couponlist[] = array (
				"coupon_id"			=> $row['coupon_id'],
				"coupon_code"		=> $row['coupon_code'],
				"valid_from" 		=> $row['valid_from'],
				"valid_to" 			=> $row['valid_to'],
				"amount" 			=> $row['amount'],
				"ispercentage" 		=> $row['is_percentage'],
				"roomonly"			=> $row['rooms_only'],
				"booking_valid_from" => $row['booking_valid_from'],
				"booking_valid_to" 	=> $row['booking_valid_to'],
				"guest_id" 			=> $row['guest_uid']
			);
		}

		$conn = null;
	
	cmf_utilities::cache_write( $property_uid , "response" , $couponlist );
	
	Flight::json( $response_name = "response" , $couponlist );
	});

