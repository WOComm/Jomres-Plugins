<?php
/**
* Jomres CMS Agnostic Plugin
* @author  Vince Wooll sales@jomres.net
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*

Confirm that settings to be passed are valid mrConfig indecies

*/

Flight::route('PUT /cmf/property/lastminute/discount', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid				= (int)$_PUT['property_uid'];
	$threashold					= (int)$_PUT['threashold'];
	$discount					= (int)$_PUT['discount'];
	$active						= (int)(bool)$_PUT['active'];


	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	
	if ($threashold <= 1 ) {
		Flight::halt(204, "Threashold is too low");
	}
	
	if ($discount <= 1 ) {
		Flight::halt(204, "Discount is too low");
	}
	
	$mrConfig = getPropertySpecificSettings($property_uid);

	if ($mrConfig['singleRoomProperty'] == "0"  ) {
		$settings = array (
			"wiseprice10discount"	=> $discount / 5,
			"wiseprice25discount"	=> $discount / 2,
			"wiseprice50discount"	=> $discount,
			"wiseprice75discount"	=> $discount,
			"wisepricethreshold"	=> $threashold,
			"wisepriceactive"		=> $active
			);
	} else {
		$settings = array (
			"lastminutediscount"	=> $discount,
			"lastminutethreshold"	=> $threashold,
			"lastminuteactive"		=> $active
			);
		}

	$updated_settings = array();
	
	foreach ($settings as $k=>$v) {
		$query = "SELECT uid FROM #__jomres_settings WHERE property_uid = '".(int) $property_uid."' and akey = '".$k."'";
		$result = doSelectSql($query);
		if (empty($result)) {
			$query = "INSERT INTO #__jomres_settings (property_uid,akey,value) VALUES ('".(int) $property_uid."','".$k."','".$v."')";
			$updated_settings[$k] = $v;
		} else {
			$query = "UPDATE #__jomres_settings SET `value`='".$v."' WHERE property_uid = '".(int) $property_uid."' and akey = '".$k."'";
			$updated_settings[$k] = $v;
		}
		doInsertSql($query, jr_gettext('_JOMRES_MR_AUDIT_EDIT_PROPERTY_SETTINGS', '_JOMRES_MR_AUDIT_EDIT_PROPERTY_SETTINGS', false) );
	}

	Flight::json( $response_name = "response" , array ("success" => true , "updated_settings" => $updated_settings ) ); 
	});
	
	