<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Webhooks Review Published
	** Description | Responds with review details of review
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/review_published/:REVIEW_UID
	** Data Parameters | None
	** Success Response | {"data":{"review_details":{"review_basics":{"rating_id":"2","item_id":"1","user_id":"48","review_title":"bad review","review_description":"bad","pros":"bad","cons":"bad","rating":"1","rating_ip":"::1","rating_date":"2017-01-04 14:36:44","published":"1"},"rating":{"0":"1","1":"1","2":"1","3":"1","4":"1","5":"1"},"review_fields_note":"Field 1 Hospitality , Field 2 Location , Field 3 Cleanliness , Field 4 Accommodation , Field 5 Value for money , Field 6 Services "}},"meta":{"code":200}}
	** Error Response | 404
	** Sample call |jomres/api/webhooks/1/review_published/37
	** Notes | Replies with the booking details from the query
*/

Flight::route('GET /webhooks/@id/review_published/@review_uid', function($property_uid , $review_uid)
	{
    $review_uid = (int)$review_uid;
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	jr_import('jomres_reviews');
    $Reviews = new jomres_reviews();
    $Reviews->property_uid = $property_uid;
    $all_reviews = $Reviews->showReviews($property_uid);
        
    if (!isset($all_reviews['fields'][$review_uid])) {
        Flight::halt( "404" ,"invalid_review_uid");
    } else {
        $review_basics = (object)$all_reviews['fields'][$review_uid]; // We'll cast the rating array to an object before passing it back.
        $rating = (object)$all_reviews['rating_details'][$review_uid];
    
        $response                               = new stdClass();
        $response->review_basics                = $review_basics;
        $response->rating                       = $rating;
        $response->review_fields_note           = $Reviews->review_fields_note;
        
        Flight::json( $response_name = "review_details" ,$response);
        }
	});
