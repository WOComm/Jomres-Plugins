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
	** Title | Get Property Name
	** Description | Get the property name by property uid
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/name(/:LANGUAGE) LANGUAGE is optional, default to en-GB if not sent
	** Data Parameters | None
	** Success Response | {"data":{"property_name":"Best West Hotel"}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/details/name/en-GB
	** Notes | 
*/
Flight::route('GET /properties/@id/details/name(/@language)', function( $property_uid , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	Flight::json( $response_name = "property_name" ,$current_property_details->property_name);
	});

/*
	** Title | Get Property Description 
	** Description | Get the property description
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/description(/:LANGUAGE)
	** Data Parameters | None
	** Success Response | {"data":{"property_description":"<p>property description<\/p>"}}
	** Error Response | 
	** Sample call |jomres/api/properties/85/details/description/en-GB
	** Notes |
*/

Flight::route('GET /properties/@id/details/description(/@language)', function( $property_uid , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	Flight::json( $response_name = "property_description" ,$current_property_details->property_description);
	});

	/*
	** Title | Get Property Checkin times 
	** Description | Get the property Checkin times as entered into the property details edit page
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/property_checkin_times(/:LANGUAGE)
	** Data Parameters | None
	** Success Response | {"data":{"property_checkin_times":"<p>checking times<\/p>"}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/details/property_checkin_times/en-GB
	** Notes |
	*/

Flight::route('GET /properties/@id/details/property_checkin_times(/@language)', function( $property_uid , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	Flight::json( $response_name = "property_checkin_times" ,$current_property_details->property_checkin_times);
	});
	
/*
	** Title | Get Property Area Activities 
	** Description | Get the property Area Activities as entered into the property details edit page
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/property_area_activities(/:LANGUAGE)
	** Data Parameters | None
	** Success Response | {"data":{"property_area_activities":"<p>area activities<\/p>"}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/details/property_area_activities/en-GB
	** Notes |
*/

Flight::route('GET /properties/@id/details/property_area_activities(/@language)', function( $property_uid , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	Flight::json( $response_name = "property_area_activities" ,$current_property_details->property_area_activities);
	});
	


/*
	** Title | Get Property Driving Directions
	** Description | Get the property Driving directions as entered into the property details edit page
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/property_driving_directions(/:LANGUAGE)
	** Data Parameters | None
	** Success Response | {"data":{"property_driving_directions":"<p>driving directions<\/p>"}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/details/property_driving_directions/en-GB
	** Notes |
*/

Flight::route('GET /properties/@id/details/property_driving_directions(/@language)', function( $property_uid , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	Flight::json( $response_name = "property_driving_directions" ,$current_property_details->property_driving_directions);
	});

/*
	** Title | Get Property Terms and Conditions
	** Description | Get the property Terms and Conditions as entered into the property details edit page
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/property_policies_disclaimers(/:LANGUAGE)
	** Data Parameters | None
	** Success Response | {"data":{"property_policies_disclaimers":"<p>terms etc<\/p>"}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/details/property_policies_disclaimers/en-GB
	** Notes |
*/

Flight::route('GET /properties/@id/details/property_policies_disclaimers(/@language)', function( $property_uid , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	Flight::json( $response_name = "property_policies_disclaimers" ,$current_property_details->property_policies_disclaimers);
	});

/*
	** Title | Get Latitude & Logitude
	** Description | Get the property location
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/lat_long
	** Data Parameters | None
	** Success Response | {"data":{"lat_long":{"lat":"51.49998","long":"-0.13596"}}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/details/lat_long
	** Notes |
*/

Flight::route('GET /properties/@id/details/lat_long', function( $property_uid  ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	Flight::json( $response_name = "lat_long" ,[ "lat" => $current_property_details->lat , "long" => $current_property_details->long ]);
	});
	
/*
	** Title | Get Property Accommodation tax rate
	** Description | Get the property Accommodation tax rate
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/accommodation_tax_rate
	** Data Parameters | None
	** Success Response | {"data":{"accommodation_tax_rate":20}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/details/accommodation_tax_rate
	** Notes |
*/

Flight::route('GET /properties/@id/details/accommodation_tax_rate', function( $property_uid ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	require_once("../framework.php");
	
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	Flight::json( $response_name = "accommodation_tax_rate" ,$current_property_details->accommodation_tax_rate);
	});
	
/*
	** Title | Get Property Room types
	** Description | Get the property room types
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/property_room_types
	** Data Parameters | None
	** Success Response | {"data":{"this_property_room_classes":{"4":{"abbv":"Room 4 Poster bed","desc":false,"image":"fourposter.png"},"1":{"abbv":"Room Double beds","desc":false,"image":"double.png"},"3":{"abbv":"Room Single","desc":false,"image":"single.png"},"2":{"abbv":"Room Twin beds","desc":false,"image":"twin.png"}}}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/details/property_room_types/en-GB
	** Notes |
*/

Flight::route('GET /properties/@id/details/property_room_types(/@language)', function( $property_uid , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );
	
	$path = JOMRES_IMAGELOCATION_ABSPATH.'/rmtypes/';

	foreach ( $current_property_details->this_property_room_classes as $key=>$val )
		{
		$current_property_details->this_property_room_classes['image_rel_path'] =  $path;
		}
	
	Flight::json( $response_name = "this_property_room_classes" ,$current_property_details->this_property_room_classes);
	});
	
/*
	** Title | Get Property Settings 
	** Description | Get the property specific settings
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/details/settings
	** Data Parameters | None
	** Success Response | {"data":{"settings":{"version":"6.1.0","newTariffModels":"2"}}} An array of settings, trimmed for brevity.
	** Error Response | 403 "User attempted to access a property that they don't have rights to access" 
	** Sample call |jomres/api/properties/85/details/settings
	** Notes | The property's mrConfig variable
*/

Flight::route('GET /properties/@id/details/settings', function( $property_uid ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	require_once("../framework.php");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	
	if (isset($mrConfig['version'])) {
		unset($mrConfig['version']);
	}
	
	Flight::json( $response_name = "settings" , $mrConfig);
	});
