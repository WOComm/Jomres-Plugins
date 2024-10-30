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

Return the items for a given property type (e.g. property types) that currently exist in the system

*/

Flight::route('PUT /cmf/admin/api/client', function()
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();

	$_PUT = $GLOBALS['PUT'];
	
	
	$cms_user_id				= (int)$_PUT['cms_user_id'];
	$identifier					= filter_var($_PUT['identifier'], FILTER_SANITIZE_SPECIAL_CHARS );
	$scopes_str					= $_PUT['scopes'];
	
	if ( $cms_user_id == 0 ) {
		Flight::halt(204, "Manager id not sent");
	}
	
	if ( $identifier == '' ) {
		Flight::halt(204, "Identifier not sent");
	}
	
	if ( $scopes_str == '' ) {
		Flight::halt(204, "Scopes not sent");
	}
	
	$scopes = explode("," , $scopes_str );
	foreach ( $scopes as $key=>$val) {
		$scopes[$key] = filter_var($val , FILTER_SANITIZE_SPECIAL_CHARS );
		if ($val == "*") {
			$scopes = array ( "*" );
			break;
		}
		
	}

	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/admin/list/api/scopes/".$cms_user_id,
		"data"=>array()
		);
			
	$response = json_decode(stripslashes($call_self->call($elements)));
	
	if ( !isset($response->data->response) || empty($response->data->response) ){
		Flight::halt(204, "Cannot find valid scopes for cms user id");
	}
	
	// 
	$scopes_available_to_manager = json_decode(json_encode(stripslashes($response->data->response)), true);
	
	$available_scopes = array();
	foreach ($scopes_available_to_manager as $valid_scope ) {
		$available_scopes[] = $valid_scope['scope'];
	}

	$requested_scopes = '';

	foreach ($scopes as $scope) {
		if ( in_array ( $scope ,  $available_scopes ) ) {
			$requested_scopes .= $scope.",";
		} else {
			Flight::halt(204, "Scope ".$scope." is not valid for this user ");
		}
	}
	$requested_scopes = rtrim($requested_scopes, ",");
	
	$client_id=generateJomresRandomString( 15 );
	$client_secret = createNewAPIKey();
	$redirect_uri =get_showtime( 'live_site' )."/".JOMRES_ROOT_DIRECTORY."/api/";
	
	$query = "INSERT INTO #__jomres_oauth_clients 
		(`client_id`,`client_secret`,`redirect_uri`,`grant_types`,`scope`,`user_id` , `identifier` ) 
		VALUES 
		('".$client_id."','".$client_secret."','".$redirect_uri."',null,'".$requested_scopes."',".(int)$cms_user_id." , '".$identifier."' )";
	
	$response = array();
	if ( doInsertSql( $query, jr_gettext( '_OAUTH_CREATED', '_OAUTH_CREATED', false ) ) ) {
		$response['client_id'] = $client_id  ;
		$response['client_secret'] = $client_secret ;
		$response['redirect_uri'] = $redirect_uri ;
		$response['requested_scopes'] = $requested_scopes ;
		$response['cms_user_id'] = $cms_user_id ;
		$response['identifier'] = $identifier ;
	} else {
		Flight::halt(204, "Could not create api client.");
	}
	
	
	Flight::json( $response_name = "response" , $response ); 
	});
	
	