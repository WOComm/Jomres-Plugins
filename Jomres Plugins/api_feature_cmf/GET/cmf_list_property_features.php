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

Return the property types

*/

Flight::route('GET /cmf/list/property/features', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$jomres_property_features = jomres_singleton_abstract::getInstance('jomres_property_features');
	$jomres_property_features->get_all_property_features();
	
	$response = array();
	if (!empty($jomres_property_features->property_features)) {
		foreach ( $jomres_property_features->property_features as $val ) {
			$response[] = array ( "property_feature_id" => $val['id'] , "property_feature" => $val['abbv'] , 'include_in_filters' => $val['include_in_filters']  ) ;
		}
	}

	Flight::json( $response_name = "response" , $response ); 
	});
	
	