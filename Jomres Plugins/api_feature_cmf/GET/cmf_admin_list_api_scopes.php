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

Return all countries 

*/

Flight::route('GET /cmf/admin/list/api/scopes/@user_id', function( $user_id )
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();
	
	jr_import("jomres_oauth_scopes");
	$scopes_class = new jomres_oauth_scopes();

	
	$user_id = (int)$user_id;
	
	$query = "SELECT access_level FROM #__jomres_managers WHERE userid = ".$user_id;
	$manager_access_level = doSelectSql($query , 1 );
	
	if ( $manager_access_level == false ) { // they're not registered as a manager, therefore we will not grant any access at all
		Flight::halt(204, "User is not a manager");
	}elseif ( $manager_access_level == 70 ) { // Receptionists are discarded, we will jump straight to property managers
		$available_scopes = array ( "user" , "manager" );
	} elseif ( $manager_access_level == 90 ) {
		$available_scopes = array ( "user" , "manager" , "super" );
	} else {
		Flight::halt(204, "Cannot identify the users access level");
	}
	

	foreach ($scopes_class->default_scopes as $category => $category_scopes) {
		$scope_rows=array();

		foreach ($category_scopes as $scope) {
			if ( in_array ( $scope->user_type ,  $available_scopes ) ){
				$sr=array();
				$sr['scope'] = $scope->scope;
				$sr['scope_friendly'] = jr_gettext( $scope->definition , $scope->definition );
				$sr['scope_description'] = jr_gettext( $scope->description , $scope->description );
				$scope_rows[]=$sr;
			}
		}
		
	}
	if ( $manager_access_level == 90 ) {
		$sr=array();
		$sr['scope'] = "*";
		$sr['scope_friendly'] = "System";
		$sr['scope_description'] = "Scope gives client access to administrator level REST API features.";
		$scope_rows[]=$sr;
	}
		
	Flight::json( $response_name = "response" , $scope_rows ); 
	});
	