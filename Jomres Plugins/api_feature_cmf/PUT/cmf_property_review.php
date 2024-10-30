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

Flight::route('PUT /cmf/property/review/', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

 	$property_uid			= (int)$_PUT['property_uid'];
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$review_user_display_name			= filter_var( $_PUT['review_user_display_name'], FILTER_SANITIZE_SPECIAL_CHARS);
	$review_title						= filter_var( $_PUT['review_title'], FILTER_SANITIZE_SPECIAL_CHARS);
	$review_description					= filter_var( $_PUT['review_description'], FILTER_SANITIZE_SPECIAL_CHARS);
	$pros								= filter_var( $_PUT['pros'], FILTER_SANITIZE_SPECIAL_CHARS);
	$cons								= filter_var( $_PUT['cons'], FILTER_SANITIZE_SPECIAL_CHARS);
	$rating								= (float)filter_var( $_PUT['rating'], FILTER_SANITIZE_SPECIAL_CHARS);

	jr_import('jomres_reviews');
	$Reviews = new jomres_reviews();
	$Reviews->property_uid = $property_uid;
	
	$overall_rating = number_format ( ($rating + $rating + $rating + $rating + $rating + $rating) / 6 , 2 );

	$rating_id = $Reviews->save_review($overall_rating, $review_title, $review_description, $pros, $cons , $review_user_display_name );
	$Reviews->save_rating_detail($property_uid, $rating_id, $rating, $rating, $rating, $rating, $rating, $rating);
				

	Flight::json( $response_name = "response" , array ("rating_id" => $rating_id ) ); 
	});
	
	