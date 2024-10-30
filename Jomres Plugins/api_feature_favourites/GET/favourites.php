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
	** Title | Get user's favourites
	** Description | Get the user's favourite properties ( property uids )
	** Plugin | api_feature_favourites
	** Scope | favourites_get
	** URL | favourites
 	** Method | GET
	** URL Parameters | favourites
	** Data Parameters | None
	** Success Response | {"data":{"ids":[6,3,5,4]}}
	** Error Response | 
	** Sample call |jomres/api/favourites/
	** Notes | None
*/


Flight::route('GET /favourites', function() 
	{
	validate_scope::validate('favourites_get');
		
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	$stmt = $conn->prepare( 'SELECT property_uid FROM '.Flight::get("dbprefix").'jomcomp_mufavourites WHERE my_id = :my_id' );
	$stmt->execute([ 'my_id' => Flight::get("user_id") ]);
	$property_uids = array();
	while ($row = $stmt->fetch())
		{
		$property_uids[] = $row['property_uid'];
		}
	$conn = null;
	
	Flight::json( $response_name = "ids" , $property_uids);
	}); 
	