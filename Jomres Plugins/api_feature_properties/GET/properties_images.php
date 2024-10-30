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
	** Title | Get Main Image
	** Description | Get the property main image
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/images/main
	** Data Parameters | None
	** Success Response | {"data":{"images":{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/2.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/2.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/2.jpg"}}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/images/main
	** Notes |
*/

Flight::route('GET /properties/@id/images/main', function( $property_uid  ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
	$images = $jomres_media_centre_images->get_images($property_uid, array('property'));

	Flight::json( $response_name = "images" ,$images['property'][0][0]);
	});

/*
	** Title | Get Slideshow Images
	** Description | Get the property slideshow images
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/images/slideshow
	** Data Parameters | None
	** Success Response | {"data":{"images":[[{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/slideshow\/0\/2.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/slideshow\/0\/medium\/2.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/slideshow\/0\/thumbnail\/2.jpg"}]]}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/images/slideshow
	** Notes |
*/

Flight::route('GET /properties/@id/images/slideshow', function( $property_uid  ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
	$images = $jomres_media_centre_images->get_images($property_uid, array('slideshow'));

	Flight::json( $response_name = "images" ,$images['slideshow']);
	});
	
/*
	** Title | Get Room Images
	** Description | Get the property room images
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/images/room
	** Data Parameters | None
	** Success Response | {"data":{"images":{"7":[{"large":"http:\/\/localhost\/quickstart\/jomres\/images\/noimage.gif","medium":"http:\/\/localhost\/quickstart\/jomres\/images\/noimage.gif","small":"http:\/\/localhost\/quickstart\/jomres\/images\/noimage_small.gif"}]}}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/85/images/room
	** Notes | The indecies of the array returned is the room uid. 
*/

Flight::route('GET /properties/@id/images/room', function( $property_uid  ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
	$images = $jomres_media_centre_images->get_images($property_uid, array('rooms'));
	Flight::json( $response_name = "images" ,$images['rooms']);
	});