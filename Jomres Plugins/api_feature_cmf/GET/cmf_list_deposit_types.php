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

Return the property types

*/

Flight::route('GET /cmf/list/deposit/types', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	

	/* 
	<DepositType DepositTypeID="1">No deposit</DepositType>
	<DepositType DepositTypeID="2">Percentage of total price (without cleaning)</DepositType>
	<DepositType DepositTypeID="3">Percentage of total price</DepositType>
	<DepositType DepositTypeID="4">Fixed amount per day</DepositType>
	<DepositType DepositTypeID="5">Flat amount per stay</DepositType> 
	*/

	$deposit_types = array(
		"1" => "No deposit",
		"2" => "Percentage of total price (without cleaning)",
		"3" => "Percentage of total price",
		"5" => "Flat amount per stay"
	);

	Flight::json( $response_name = "response" , $deposit_types ); 
	});
	
	