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

Flight::route('GET /cmf/property/features/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); // This utility will return an instance of jomres_properties, because this class has a method for updating an existing property without going through the UI.

	$jomres_property_features = jomres_singleton_abstract::getInstance('jomres_property_features');
	$jomres_property_features->get_all_property_features();
	
	$features = array();
	if(isset($property->property_features) && $property->property_features != ",") {
		$bang = explode ("," , $property->property_features );

		if (!empty($bang)){
			foreach ($bang as $feature_id ) {
				if (isset($jomres_property_features->property_features[$feature_id]) && $feature_id != 0 ){
					$features[] = array ("id" => $feature_id , "name" => $jomres_property_features->property_features[$feature_id]['abbv'] , "description" => $jomres_property_features->property_features[$feature_id]['desc'] );
				}
			}
		}
	}

	cmf_utilities::cache_write( $property_uid , "response" , $features );
	
	Flight::json( $response_name = "response" , $features ); 
	});
	
	