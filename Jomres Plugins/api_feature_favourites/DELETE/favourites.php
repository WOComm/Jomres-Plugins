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
	** Title | Delete a favourite
	** Description | Delete a user's favourite by property uid
	** Plugin | api_feature_favourites
	** Scope | favourites_set
	** URL | favourites
 	** Method | DELETE
	** URL Parameters | favourites/:ID/
	** Data Parameters | None
	** Success Response | {"data":{"id":"1"}}
	** Error Response | 
	** Sample call |jomres/api/favourites/2
	** Notes | None
*/

Flight::route('DELETE /favourites/@id', function($id) 
	{
	validate_scope::validate('favourites_set');
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	$query="SELECT property_uid FROM ".Flight::get("dbprefix")."jomcomp_mufavourites WHERE  my_id = :my_id AND property_uid = :property_uid ";
	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'my_id' => Flight::get("user_id") , 'property_uid' => $id ]);
	$property = $stmt->fetch();

	if ($property)
		{
		$stmt = $conn->prepare( 'DELETE FROM '.Flight::get("dbprefix").'jomcomp_mufavourites WHERE my_id = :my_id AND property_uid=:property_uid' );
		$stmt->execute([ 'my_id' => Flight::get("user_id") , 'property_uid' => $id ]);
		}
	Flight::json( $response_name = "id" , $id);
	}); 
