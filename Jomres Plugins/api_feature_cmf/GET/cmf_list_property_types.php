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

Flight::route('GET /cmf/list/property/types', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
	$jomres_property_types->get_all_property_types();
	
	$response = array();
	if (!empty($jomres_property_types->property_types)) {
		foreach ( $jomres_property_types->property_types as $val ) {
			if ($val['published'] == '1') {
				$response[] = array ( "property_type_id" => $val['id'] , "property_type" => $val['ptype'] , 'flag' => $val['mrp_srp_flag'] ) ;
			}
			
		}
	}

	Flight::json( $response_name = "response" , $response ); 
	});
	
	