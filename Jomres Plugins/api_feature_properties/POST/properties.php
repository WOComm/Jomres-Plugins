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
	** Title | Add property
	** Description | Create a property
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | POST
	** URL Parameters | properties/add/(:LANGUAGE)
	** Data Parameters | property_name, property_street, property_town, region, property_postcode, country, property_tel, price, lat, long, ptype_id, stars, superior, property_description, property_checkin_times, property_area_activities, property_driving_directions, property_airports, property_othertransport, property_policies_disclaimers
	** Success Response | {"data":{"id":87}}
	** Error Response | 
	** Sample call |jomres/api/properties/add
	** Notes | Useful companion methods www.example.com/jomres/api/properties/regions & www.example.com/jomres/api/properties/types which return region names and ids, and property types and their ids, respectively. 
	
	POST FIELDS example
	
 	$data = array (
		"property_name"						=> "API Property",
		"property_street"					=> "API Property",
		"property_town"						=> "API Property",
		"region"							=> 6, // Use  www.example.com/jomres/api/properties/regions to retrieve Region ids
		"property_postcode"					=> "API Property",
		"country"							=> "GB", // Countries sent must be in ISO 3166 format ( http://www.iso.org/iso/country_codes )
		"property_tel"						=> "01234 567890",
		"price"								=> "0.00", // Real estate type properties only
		"lat"								=> "51.50068", // Latitude
		"long"								=> "-0.14317", // Longitude
		"ptype_id"							=> 1, // Use www.example.com/jomres/api/properties/types to retrieve possible property types and their available ids
		"stars"								=> 4,
		"superior"							=> 0, // 0 no, 1 yes
		"property_description"				=> 'Lorem ipsum dolor sit amet...',
		"property_checkin_times"			=> 'Lorem ipsum dolor sit amet...',
		"property_area_activities"			=> 'Lorem ipsum dolor sit amet...',
		"property_driving_directions"		=> 'Lorem ipsum dolor sit amet...',
		"property_airports"					=> 'Lorem ipsum dolor sit amet...',
		"property_othertransport"			=> 'Lorem ipsum dolor sit amet...',
		"property_policies_disclaimers"		=> 'Lorem ipsum dolor sit amet...'
		);
*/

Flight::route('POST /properties/add(/@language)', function() 
	{
	validate_scope::validate('properties_set');
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
	$jrConfig   = $siteConfig->get();
	
	$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );

	//jomres properties object
	$jomres_properties = jomres_singleton_abstract::getInstance('jomres_properties');

	
	$jomres_properties->property_name					= trim( jomresGetParam( $_POST, 'property_name', "" ) );
	$jomres_properties->property_street					= jomresGetParam( $_POST, 'property_street', "" );
	$jomres_properties->property_town					= jomresGetParam( $_POST, 'property_town', "" );
	$jomres_properties->property_region					= jomresGetParam( $_POST, 'region', "" );
	$jomres_properties->property_postcode				= jomresGetParam( $_POST, 'property_postcode', "" );
	$jomres_properties->property_tel					= jomresGetParam( $_POST, 'property_tel', "" );
	$jomres_properties->property_email					= jomresGetParam( $_POST, 'property_email', "" );
	$jomres_properties->price							= convert_entered_price_into_safe_float(jomresGetParam( $_POST, 'price', '' ));
	$jomres_properties->lat								= parseFloat( jomresGetParam( $_POST, 'lat', '' ) );
	$jomres_properties->long							= parseFloat( jomresGetParam( $_POST, 'long', '' ) );
	$jomres_properties->ptype_id						= jomresGetParam( $_POST, 'ptype_id', 0 );
	$jomres_properties->stars							= jomresGetParam( $_POST, 'stars', 0 );
	$jomres_properties->superior						= jomresGetParam( $_POST, 'superior', 0 );
	$jomres_properties->property_description			= jomresGetParam( $_POST, 'property_description', "" );
	$jomres_properties->property_checkin_times			= jomresGetParam( $_POST, 'property_checkin_times', "" );
	$jomres_properties->property_area_activities		= jomresGetParam( $_POST, 'property_area_activities', "" );
	$jomres_properties->property_driving_directions		= jomresGetParam( $_POST, 'property_driving_directions', "" );
	$jomres_properties->property_airports				= jomresGetParam( $_POST, 'property_airports', "" );
	$jomres_properties->property_othertransport			= jomresGetParam( $_POST, 'property_othertransport', "" );
	$jomres_properties->property_policies_disclaimers	= jomresGetParam( $_POST, 'property_policies_disclaimers', "" );

		
	//property country
	if ( $jrConfig[ 'limit_property_country' ] == "0" ) 
		$jomres_properties->property_country = jomresGetParam( $_POST, 'country', "" );
	else
		$jomres_properties->property_country = $jrConfig[ 'limit_property_country_country' ];

	//set approved flag
	if ( !isset($jrConfig['automatically_approve_new_properties']) )
		$jrConfig['automatically_approve_new_properties'] = 1;
	
	if ( (int)$jrConfig['automatically_approve_new_properties'] == 1 )
		$jomres_properties->approved = 1;
		
	//insert new property
	$jomres_properties->commit_new_property();
	$jomres_properties->commit_update_property();

	//send approval email to site admin 
	if ((int)$jrConfig['automatically_approve_new_properties'] == 0 && !$thisJRUser->superPropertyManager)
		{
		$link = JOMRES_SITEPAGE_URL_ADMIN."&task=list_properties_awaiting_approval";
		$subject=jr_gettext("_JOMRES_APPROVALS_ADMIN_EMAIL_SUBJECT",'_JOMRES_APPROVALS_ADMIN_EMAIL_SUBJECT',false);
		$message=jr_gettext("_JOMRES_APPROVALS_ADMIN_EMAIL_CONTENT",'_JOMRES_APPROVALS_ADMIN_EMAIL_CONTENT',false).$link;
		sendAdminEmail($subject,$message);
		}

	if ( (int)$jomres_properties->propertys_uid > 0 )
		{
		Flight::json( $response_name = "id" ,(int)$jomres_properties->propertys_uid);
		}
	else
		{
		Flight::halt(409, "Failed to insert property");
		}
	});


