<?php
/**
 * Core file
 *
 * @author
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Update guest type
	** Description | Edit a guest type
	** Plugin | api_feature_guesttypes
	** Scope | properties_get
	** URL | guesttypes
 	** Method | PUT
	** URL Parameters | guesttypes/@id/@guesttype_uid/@type/@notes/@maximum/@is_percentage/@posneg/@variance/@published/@order/@is_child(:LANGUAGE)
	** Data Parameters |
	** Success Response |{
  "data": {
    "updateguesttype": [
      {
        "message": "Updated customer type",
        "type": "disabled people updated",
        "notes": "for test",
        "maximum": 5,
        "is_percentage": 0,
        "posneg": 0,
        "variance": 1,
        "published": 1,
        "property_uid": "1",
        "guesttype_uid": 22,
        "order": 0,
        "is_child": 0
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response |
	** Sample call |jomres/api/guesttypes/1/3/disabled people/for test2/10/0/0/1/1/0/0
	** Notes | See the POST add a guest type notes for descriptions of the various fields.
*/

Flight::route('PUT /guesttypes/@id/@guesttype_uid/@type/@notes/@maximum/@is_percentage/@posneg/@variance/@published/@order/@is_child(/@language)', function($property_uid, $guesttype_uid, $type, $notes, $maximum, $is_percentage, $posneg, $variance, $published, $order, $is_child, $language)

	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);
    
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");

    if ( (int)$guesttype_uid == 0 ) {
        Flight::halt(204, "Guest type id not set");
        }

    jr_import( 'jrportal_guest_types' );
	$jrportal_guest_types = new jrportal_guest_types();
    
	$jrportal_guest_types->id			    = (int)$guesttype_uid;
	$jrportal_guest_types->type				= filter_var($type, FILTER_SANITIZE_SPECIAL_CHARS);
	$jrportal_guest_types->notes			= filter_var($notes, FILTER_SANITIZE_SPECIAL_CHARS);
	$jrportal_guest_types->maximum			= (int)$maximum;
	$jrportal_guest_types->is_percentage	= (int)$is_percentage;
	$jrportal_guest_types->is_child			= (int)$is_child ;
	$jrportal_guest_types->posneg			= (int)$posneg;
	$jrportal_guest_types->variance			= (float)$variance;
	$jrportal_guest_types->property_uid		= $property_uid;
    
    $jrportal_guest_types->commit_update_guest_type();

	$updateguesttype = array();
	$updateguesttype[] = array (
		    "message"			=> jr_gettext('_JOMRES_MR_AUDIT_UPDATE_CUSTOMERTYPE', '_JOMRES_MR_AUDIT_UPDATE_CUSTOMERTYPE', false),
			"type"				=> filter_var($type, FILTER_SANITIZE_SPECIAL_CHARS),
			"notes"				=> filter_var($notes, FILTER_SANITIZE_SPECIAL_CHARS),
			"maximum"			=> (int)$maximum,
			"is_percentage"		=> (int)$is_percentage,
			"posneg"			=> (int)$posneg,
			"variance"			=> (int)$variance,
			"published"			=> (int)$published,
			"property_uid"		=> $property_uid,
			"guesttype_uid"     => (int)$guesttype_uid,
			"order"				=> (int)$order,
			"is_child"			=> (int)$is_child
			);

	$conn = null;
	Flight::json( $response_name = "updateguesttype" ,$updateguesttype);
	});

/*
	** Title | Update guest type order
	** Description | Edit a guest type order
	** Plugin | api_feature_guesttypes
	** Scope | properties_get
	** URL | guesttypes
 	** Method | PUT
	** URL Parameters | guesttypes/@id/updateorder/@guesttype_uid/@order
	** Data Parameters |
	** Success Response |{
  "data": {
    "updateguesttype": [
      {
        "property_uid": "1",
        "guesttype_uid": "22",
        "order": "10"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response |204 "Guest type id not set"
	** Sample call |jomres/api/guesttypes/1/updateorder/3/12
	** Notes |

*/

Flight::route('PUT /guesttypes/@id/updateorder/@guesttype_uid/@order', function($property_uid, $guesttype_uid, $order)
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

    if ( (int)$guesttype_uid == 0 ) {
        Flight::halt(204, "Guest type id not set");
        }
        
	require_once("../framework.php");
 
    jr_import( 'jrportal_guest_types' );
	$jrportal_guest_types = new jrportal_guest_types();
    
	$jrportal_guest_types->id			    = $guesttype_uid;
    $jrportal_guest_types->order		    = $order;
    $jrportal_guest_types->property_uid	    = $property_uid;
    $jrportal_guest_types->save_guest_type_order();

	$updateguesttype = array();
	$updateguesttype[] = array (
			"property_uid"		=> $property_uid,
			"guesttype_uid"	    => $guesttype_uid,
			"order"				=> $jrportal_guest_types->order
			);
    
	Flight::json( $response_name = "updateguesttype" ,$updateguesttype);
	$conn = close();
	});

/*
	** Title | publish guest type
	** Description | publish a guest type
	** Plugin | api_feature_guesttypes
	** Scope | properties_get
	** URL | guesttypes
 	** Method | PUT
	** URL Parameters | guesttypes/@id/publish/@guesttype_uid
	** Data Parameters |
	** Success Response |
	** Error Response |
	** Sample call |jomres/api/guesttypes/1/publish/3
	** Notes | The guest types class will publish an unpublished guest type, and unpublish a published guest type ( so, toggle between the two states ) therefore it's advisable that you check that the published state is what you're expecting to see. If not, resend the publish message.

*/

Flight::route('PUT /guesttypes/@id/publish/@guesttype_uid', function($property_uid, $guesttype_uid)

	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

    if ( (int)$guesttype_uid == 0 ) {
        Flight::halt(204, "Guest type id not set");
        }
        
	require_once("../framework.php");
 
    jr_import( 'jrportal_guest_types' );
	$jrportal_guest_types = new jrportal_guest_types();
    
	$jrportal_guest_types->id			    = $guesttype_uid;
    $jrportal_guest_types->property_uid	    = $property_uid;
    $jrportal_guest_types->publish_guest_type();

	$publishguesttype = array();
	$publishguesttype[] = array (
			"property_uid"		=> $property_uid,
			"guesttype_uid"	    => $guesttype_uid,
			"published"			=> $jrportal_guest_types->published
			);
	Flight::json( $response_name = "publishguesttype" ,$publishguesttype);
	});

