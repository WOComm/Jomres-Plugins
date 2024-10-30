<?php
/**
 * Jomres CMS Agnostic Plugin
 * @author  John m_majma@yahoo.com
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*

Return the items for a given property type (e.g. property types) that currently exist in the system

*/

Flight::route('GET /cmf/property/reviews/@id', function( $property_uid )
{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	cmf_utilities::validate_property_uid_for_user($property_uid);

	cmf_utilities::cache_read($property_uid);

	$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
	$jomres_users->get_users();

	jr_import('jomres_reviews');
	$Reviews = new jomres_reviews();
	$Reviews->property_uid = $property_uid;

	$itemReviews = $Reviews->showReviews($property_uid);

	$itemRating = $Reviews->showRating($property_uid);

	$review_response = array();

	$review_response["summary"] = array (
		"average_rating" => $itemRating['avg_rating'],
		"number_of_reviews" => $itemRating['counter']
	);

	$all_reviews = $Reviews->get_all_reviews_index_by_property_uid();

	if (!empty($all_reviews[$property_uid]) ){
		foreach ($all_reviews[$property_uid] as $itemReview ) {
			$rating_id = $itemReview['rating_id'];
			$reviewer_id = $itemReview['user_id'];

			$reviewer = $jomres_users->all_cms_users[$reviewer_id];

			$review_response["reviews"][$property_uid][$rating_id]['rating_id']						= $rating_id;
			$review_response["reviews"][$property_uid][$rating_id]['user_id']						= $itemReview['user_id'];
			$review_response["reviews"][$property_uid][$rating_id]['review_title']					= $itemReview['review_title'];
			$review_response["reviews"][$property_uid][$rating_id]['review_user_username']			= $reviewer['username'];
			$review_response["reviews"][$property_uid][$rating_id]['review_user_display_name']		= $itemReview['user_name'];
			$review_response["reviews"][$property_uid][$rating_id]['review_user_email']				= $reviewer['email'];
			$review_response["reviews"][$property_uid][$rating_id]['rating']						= $itemReview['rating'];
			$review_response["reviews"][$property_uid][$rating_id]['submitted']						= $itemReview['rating_date'];
			$review_response["reviews"][$property_uid][$rating_id]['published']						= $itemReview['published'];
			$review_response["reviews"][$property_uid][$rating_id]['review_text_combined']					=
				jr_gettext('_JOMRES_REVIEWS_REVIEWBODY_SAID', '_JOMRES_REVIEWS_REVIEWBODY_SAID', false, false)." ".$itemReview['review_description']." ".
				jr_gettext('_JOMRES_REVIEWS_PROS', '_JOMRES_REVIEWS_PROS', false, false)." ".$itemReview['pros']." ".
				jr_gettext('_JOMRES_REVIEWS_CONS', '_JOMRES_REVIEWS_CONS', false, false)." ".$itemReview['cons'];

			$review_response["reviews"][$property_uid][$rating_id]['review_text']					= $itemReview['review_description'];
			$review_response["reviews"][$property_uid][$rating_id]['pros']							= $itemReview['pros'];
			$review_response["reviews"][$property_uid][$rating_id]['cons']							= $itemReview['cons'];
		}
	}

	cmf_utilities::cache_write( $property_uid , "response" , $review_response );

	Flight::json( $response_name = "response" , $review_response );
});
	
	