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

Flight::route('GET /cmf/admin/list/properties', function()
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();
	
	$jomres_properties = jomres_singleton_abstract::getInstance('jomres_properties');
	$jomres_properties->get_all_properties();
	
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$property_names = $current_property_details->get_property_name_multi($jomres_properties->all_property_uids['all_propertys']);
	
	$properties = array();
	if (!empty($property_names)) {
		foreach ($property_names as $property_uid => $property_name ) {
			$properties[] = array ( "property_id" => $property_uid , "property_name" => $property_name ) ;
		} 
	}
	
	
	
	
	Flight::json( $response_name = "response" , $properties ); 
	});
	