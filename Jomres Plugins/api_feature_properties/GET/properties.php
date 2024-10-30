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
	** Title | Get all properties
	** Description | Get all of a user's properties
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/all/
	** Data Parameters | None
	** Success Response | {"data":{"ids":[1,2,3,4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22,23,24,25,52,53,79,80,81,82,85,86]}}
	** Error Response | 
	** Sample call |jomres/api/properties/all
	** Notes | Supplies all properties that a use has rights to administer
*/

Flight::route('GET /properties/all', function() 
	{
	validate_scope::validate('properties_get');
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	$scopes = Flight::get("scopes");
	
 	$stmt = $conn->prepare( 'SELECT access_level FROM '.Flight::get("dbprefix").'jomres_managers WHERE userid = :id' );
	$stmt->execute([ 'id' => Flight::get("user_id") ]);
	$user = $stmt->fetch();
	if ((isset($user['access_level']) && $user['access_level'] >= "90" ) || $scopes[0] == "*") // User is a super property manager
		{
		$stmt = $conn->query( 'SELECT propertys_uid FROM '.Flight::get("dbprefix").'jomres_propertys ORDER BY propertys_uid' );
		$property_uids = array();
		while ($row = $stmt->fetch())
			{
			$property_uids[] = $row['propertys_uid'];
			}
		}
	else
		{
		$stmt = $conn->prepare( 'SELECT property_uid FROM '.Flight::get("dbprefix").'jomres_managers_propertys_xref WHERE  manager_id = :id ORDER BY property_uid');
		$stmt->execute([ 'id' => Flight::get("user_id") ]);
		while ($row = $stmt->fetch())
			{
			$property_uids[] = $row['property_uid'];
			}
		}
		
	$conn = null;
	
	Flight::json( $response_name = "ids" , $property_uids);
	
	});



/*
	** Title | Get all properties - full details
	** Description | Get all of a user's properties including their full details
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/all/
	** Data Parameters | None
	** Success Response | {"data":{"ids":[1,2,3,4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22,23,24,25,52,53,79,80,81,82,85,86]}}
	** Error Response | 
	** Sample call |jomres/api/properties/all
	** Notes | Supplies all properties that a use has rights to administer
*/

Flight::route('GET /properties/full/@language', function() 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	validate_scope::validate('properties_get');
	
	$call_self = new call_self();
		$elements = array(
			"method"=>"GET",
			"request"=>"properties/all",
			"data"=>array()
			);

	$users_properties = json_decode($call_self->call($elements));

	if ( count ($users_properties->data->ids) > 0 ) {
			$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
			$current_property_details->gather_data_multi($users_properties->data->ids);
			Flight::json( $response_name = "full_data" , $current_property_details->multi_query_result );
		}
	else {
		Flight::halt(403, "User has no properties");
		}
	});