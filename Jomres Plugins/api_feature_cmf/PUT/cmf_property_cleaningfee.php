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

Confirm that settings to be passed are valid mrConfig indecies

*/

Flight::route('PUT /cmf/property/cleaningfee', function()
	{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$_PUT['property_uid'];
	$cleaningfee			= convert_entered_price_into_safe_float($_PUT['cleaningfee']);
	

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$name						= jr_gettext('_CMF_CLEANING_STRING','_CMF_CLEANING_STRING',false , false ) ;
	$description				= '' ;
	$price						= $cleaningfee;
	$auto_select				= "1";
	$tax_rate					= filter_var($_PUT['tax_rate_code'], FILTER_SANITIZE_SPECIAL_CHARS );
	$maxquantity				= 1;
	$validfrom					= date("Y-m-d");
	$validto					= date('Y-m-d', strtotime('+10 years'));
	$include_in_property_lists	= "0";
	$limited_to_room_type		= "0";
	$published					= "1";
	$model_model				= "3";
	$model_params				= "";
	$model_force				= "1";
	
	$call_self = new call_self( );
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/property/list/extras/".$property_uid,
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
	
	$response = json_decode(stripslashes($call_self->call($elements)));
	if ( isset ($response->data->response)) {
		if (!empty($response->data->response)) {
			foreach ($response->data->response as $extra ) {
				if($extra->name == jr_gettext('_CMF_CLEANING_STRING','_CMF_CLEANING_STRING',false , false ) ) { // It's an existing Extra with the Cleaning fee name, we will delete it and add a new one
					$elements = array(
					"method"=>"DELETE",
					"request"=>"cmf/property/extra/".$property_uid."/".$extra->id,
					"data"=>array(),
					"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
					);
				
				$response = json_decode(stripslashes($call_self->call($elements)));
				// Todo add a check for success
				}
			}
		}
	}
	
	// Need to find the tax rates, use the sent tax rate code to find the tax rate id
	$tax_rate_id = 0;
	$elements = array(
		"method"=>"GET",
		"request"=>"cmf/list/tax/rates",
		"data"=>array(),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
	
	$response = json_decode(stripslashes($call_self->call($elements)));
	
	if ( !isset ($response->data->response)) {
		Flight::halt(204, "Cannot determine tax rates for site");
	}
	
	if ( empty($response->data->response) ) {
		Flight::halt(204, "Cannot determine tax rates for site");
	}
	
	foreach ($response->data->response as $taxrate ) {
		if (isset($taxrate->code) ) {
			if ($taxrate->code == $tax_rate ) {
				$tax_rate_id = $taxrate->id;
			}
		}
	}

	if ( $tax_rate_id == 0 ) {
		Flight::halt(204, "Cannot determine tax rates id for that tax rate");
	}

	$elements = array(
		"method"=>"PUT",
		"request"=>"cmf/property/extra/",
		"data"=>array( 
			'property_uid'					=> $property_uid,
			'name'							=> $name,
			'description'					=> $description,
			'price'							=> $price,
			'auto_select'					=> $auto_select,
			'tax_rate'						=> $tax_rate_id,
			'maxquantity'					=> $maxquantity,
			'validfrom'						=> $validfrom,
			'validto'						=> $validto,
			'include_in_property_lists'		=> $include_in_property_lists,
			'limited_to_room_type'			=> $limited_to_room_type,
			'published'						=> $published,
			'model_model'					=> $model_model,
			'model_params'					=> $model_params,
			'model_force'					=> $model_force
			),
		"headers" => array ( Flight::get('channel_header' ).": ".Flight::get('channel_name') , "X-JOMRES-proxy-id: ".Flight::get('user_id') )
		);
	
	$response = json_decode(stripslashes($call_self->call($elements)));
	
	$result = false;
	if ( isset($response->data->response->extra_id) && (int)$response->data->response->extra_id > 0 ) {
		$result = true;
	}
	
	
	Flight::json( $response_name = "response" , $result ); 
	});
	
	