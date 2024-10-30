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

Flight::route('PUT /cmf/property/features', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid			= (int)$_PUT['property_uid'];
	$features				= $_PUT['features'];
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
	$current_property_details->gather_data($property_uid);
	
	$globalPfeatures = array();
	foreach ($current_property_details->all_property_features as $k => $v) {  // We will find feature ids that are valid for this property type
		if ($k == 17 ) {
			var_dump(( isset( $v['ptype_xref'][0]) && $v['ptype_xref'][0] == 0) ) ;	var_dump($v['abbv']);	}

			if (
				$v['ptype_xref'] == $current_property_details->ptype_id  ||
				empty($v['ptype_xref']) ||
				( isset( $v['ptype_xref'][0]) && $v['ptype_xref'][0] == 0)
			) {
			$globalPfeatures[$k] = $v['abbv'];
		}
	}

	ksort ($globalPfeatures);
	$features = explode ( "," , $features );

	$features_arr = array();
	if (!empty($features)) {
		foreach ($features as $f ) {
			if (array_key_exists( $f , $globalPfeatures ) ) {
				$features_arr[] = (int)$f;
			}
		}
	}

	$property = cmf_utilities::get_property_object_for_update($property_uid); // This utility will return an instance of jomres_properties, because this class has a method for updating an existing property without going through the UI.
	
	$property->property_features				= $features_arr;

	
	$property = cmf_utilities::update_property($property);  // This utility will perform any checks required and then update the db with the property details

	Flight::json( $response_name = "response" , $property ); 
	});
	
	