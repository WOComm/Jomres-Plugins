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
	** Title | Get guest types for a specific property
	** Description | Get guest types by property uid
	** Plugin | api_feature_guesttypes
	** Scope | properties_get
	** URL | guesttypes
 	** Method | GET
	** URL Parameters | guesttypes/@ID
	** Data Parameters | None
	** Success Response |{
  "data": {
    "guesttypes": [
      {
        "id": 18,
        "type": "Adult",
        "notes": "",
        "maximum": "10",
        "is_percentage": 0,
        "posneg": 0,
        "variance": 0,
        "published": 1,
        "property_uid": "1",
        "order": 0,
        "is_child": 0
      },
      {
        "id": 19,
        "type": "Children",
        "notes": "",
        "maximum": "10",
        "is_percentage": 1,
        "posneg": 0,
        "variance": 20,
        "published": 1,
        "property_uid": "1",
        "order": 0,
        "is_child": 1
      }
    ]
  },
  "meta": {
    "code": 200
  }
} 
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/guesttypes/1
	** Notes |
	
*/

Flight::route('GET /guesttypes/@id(/@language)', function( $property_uid, $language) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;	
    require_once("../framework.php");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");

	//get all guest types
	$basic_guest_type_details = jomres_singleton_abstract::getInstance( 'basic_guest_type_details' );
	$basic_guest_type_details->get_all_guest_types($property_uid);

	$guesttypes = array();
	foreach($basic_guest_type_details->guest_types as $row)
		{
		$guesttypes[] = array ( 
			"id"			=> $row['id'],
			"type"			=> $row['type'],
			"notes"			=> $row['notes'],
			"maximum"		=> $row['maximum'],
			"is_percentage"	=> $row['is_percentage'], 
			"posneg"		=> $row['posneg'], 
			"variance"		=> $row['variance'], 
			"published"		=> $row['published'], 
			"property_uid"	=> $row['property_uid'],
			"order"			=> $row['order'], 
			"is_child"		=> $row['is_child']
			);
		}
		
	$conn = null;
	Flight::json( $response_name = "guesttypes" ,$guesttypes);
	});
