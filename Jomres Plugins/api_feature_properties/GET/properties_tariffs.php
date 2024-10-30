<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################



/*
	** Title | Get Property Tariffs
	** Description | Get the property tariffs
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/tariffs/(:LANGUAGE)
	** Data Parameters | None
	** Success Response | {"data":{"tariffs":[{"rates_uid":31530,"rate_title":"Tariff","rate_description":"","validfrom":"2016\/05\/24","validto":"2026\/05\/24","roomrateperday":150,"mindays":1,"maxdays":1000,"minpeople":1,"maxpeople":4,"roomclass_uid":"4","ignore_pppn":0,"allow_we":1},{"rates_uid":31531,"rate_title":"Tariff","rate_description":"","validfrom":"2016\/05\/24","validto":"2026\/05\/24","roomrateperday":140,"mindays":1,"maxdays":1000,"minpeople":1,"maxpeople":5,"roomclass_uid":"1","ignore_pppn":0,"allow_we":1},{"rates_uid":31532,"rate_title":"Tariff","rate_description":"","validfrom":"2016\/05\/24","validto":"2026\/05\/24","roomrateperday":130,"mindays":1,"maxdays":1000,"minpeople":1,"maxpeople":2,"roomclass_uid":"3","ignore_pppn":0,"allow_we":1},{"rates_uid":31533,"rate_title":"Tariff","rate_description":"","validfrom":"2016\/05\/24","validto":"2026\/05\/24","roomrateperday":120,"mindays":1,"maxdays":1000,"minpeople":1,"maxpeople":6,"roomclass_uid":"2","ignore_pppn":0,"allow_we":1}]}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/tariffs/en-GB
	** Notes |
*/

Flight::route('GET /properties/@id/tariffs(/@language)', function( $property_uid , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	$query 	=  "SELECT `rates_uid`,`rate_title`,`rate_description`,`validfrom`,`validto`,
			`roomrateperday`,`mindays`,`maxdays`,`minpeople`,`maxpeople`,`roomclass_uid`,
			`ignore_pppn`,`allow_we`
			FROM ".Flight::get("dbprefix")."jomres_rates WHERE property_uid =:property_uid ORDER BY validfrom";
	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
	$property_uids = array();

	$tariffs = array();
	while ($row = $stmt->fetch())
		{
		$tariff_title = jr_gettext( '_JOMRES_CUSTOMTEXT_TARIFF_TITLE' . $row['rates_uid'], stripslashes($row['rate_title']) , false );
		$tariffs[] = array ( 
			"rates_uid"=> $row['rates_uid'] , 
			"rate_title"=> $tariff_title , 
			"rate_description"=> $row['rate_description'] , 
			"validfrom"=> $row['validfrom'] , 
			"validto"=> $row['validto'] , 
			"roomrateperday"=> $row['roomrateperday'] , 
			"mindays"=> $row['mindays'] , 
			"maxdays"=> $row['maxdays'] , 
			"minpeople"=> $row['minpeople'] , 
			"maxpeople"=> $row['maxpeople'] , 
			"roomclass_uid"=> $row['roomclass_uid'] , 
			"ignore_pppn"=> $row['ignore_pppn'] , 
			"allow_we"=> $row['allow_we']
			);
		}
	$conn = null;
		
	Flight::json( $response_name = "tariffs" ,$tariffs);
	});
