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
	** Title | Add a favourite
	** Description | Add a property uid to a user's favourites
	** Plugin | api_feature_favourites
	** Scope | favourites_set
	** URL | favourites
 	** Method | POST
	** URL Parameters | favourites/:ID/
	** Data Parameters | None
	** Success Response | {"data":{"id":"1"}}
	** Error Response |
	** Sample call |jomres/api/favourites/1
	** Notes | None
*/

Flight::route('POST /favourites/@id', function($id) 
	{
	validate_scope::validate('favourites_set');
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	$stmt = $conn->prepare( 'SELECT property_uid FROM '.Flight::get("dbprefix").'jomcomp_mufavourites WHERE my_id = :my_id' );
	$stmt->execute([ 'my_id' => Flight::get("user_id") ]);
	$property_uids = array();
	while ($row = $stmt->fetch())
		{
		$property_uids[] = $row['property_uid'];
		}
	
	if (!in_array($id,$property_uids) )
		{
		$stmt = $conn->prepare( 'INSERT INTO '.Flight::get("dbprefix").'jomcomp_mufavourites ( my_id , property_uid )
			VALUES (:my_id , :property_uid) ' );
		$stmt->execute([ 'my_id' => Flight::get("user_id") , 'property_uid' => $id ]);
		}

	$conn = null;
	Flight::json( $response_name = "id" , $id);
	});

