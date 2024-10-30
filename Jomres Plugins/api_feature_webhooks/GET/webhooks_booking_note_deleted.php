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
	** Title | Webhooks Booking Note Delete
	** Description | Should respond with 404
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/booking_note_deleted/:NOTE_UID
	** Data Parameters | None
	** Success Response | Response code 404
	** Error Response | 
	** Sample call |jomres/api/webhooks/1/booking_note_deleted/9999
	** Notes | Replies with 404 if the note is not found
*/

Flight::route('GET /webhooks/@id/booking_note_deleted/@note_uid', function($property_uid , $note_uid)
	{
    $property_uid   = (int)$property_uid;
    $note_uid       = (int)$note_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$query = "SELECT `note` FROM #__jomcomp_notes WHERE `id`='".$note_uid."' AND `property_uid`='".$property_uid."' LIMIT 1";
    $result = doSelectSql($query, 1);

    if (!$result) {
        Flight::halt( "404" ,"invalid_note_uid");
    } else {
        $response                               = new stdClass();
        $response->note_content                 = $result;

        Flight::json( $response_name = "contract_details" ,$response);
        }
	});
