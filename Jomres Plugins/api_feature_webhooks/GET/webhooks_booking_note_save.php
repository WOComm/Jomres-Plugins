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
	** Title | Webhooks Booking Note Save
	** Description | Responds with note contents
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/booking_note_save/:NOTE_UID
	** Data Parameters | None
	** Success Response | {"data":{"contract_details":{"note_content":" Double Room has been discounted from 80.00\u20ac to 76.00\u20ac "}},"meta":{"code":200}}
	** Error Response | Replies with 404 if the note is not found
	** Sample call |jomres/api/webhooks/1/booking_note_save/46
	** Notes |
*/

Flight::route('GET /webhooks/@id/booking_note_save/@note_uid', function($property_uid , $note_uid)
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
