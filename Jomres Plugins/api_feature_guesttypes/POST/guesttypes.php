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
	** Title | Add guest type
	** Description | Create a guest type
	** Plugin | api_feature_guesttypes
	** Scope | properties_get
	** URL | guesttypes
 	** Method | POST
	** URL Parameters | guesttypes/@id/@type/@notes/@maximum/@is_percentage/@posneg/@variance/@published/@order/@is_child(:LANGUAGE)
	** Data Parameters |
	** Success Response |{
  "data": {
    "addguesttype": [
      {
        "message": "Created customer type",
        "type": "disabled people",
        "notes": "for test",
        "maximum": "5",
        "is_percentage": "0",
        "posneg": "0",
        "variance": "1",
        "published": "1",
        "property_uid": "1",
        "order": "0",
        "is_child": "0"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 
	** Sample call |jomres/api/guesttypes/1/disabled people/for test/5/0/0/1/1/0/0
	** Notes | Type refers to the title as it would be shown in the booking form. Notes are just that, notes for internal use. Maximum reflects the maximum of that guest type that can be selected in the booking form. The variance refers to how selection of this guest type modifies it's cost to the booking, for example a variance of 10 and a is_percentage value of 1 would mean that these guest types would receive a 10% discount when booking. Posneg refers to whether the variance will add or subtract from the cost of the booking. Order reflects the order of the guest types as they appear in the booking form, it is mandatory, send 0 if you don't care what the order should be. Is child should be either 1 or 0, it's used by channel managers. 
	
*/

Flight::route('POST /guesttypes/@id/@type/@notes/@maximum/@is_percentage/@posneg/@variance/@published/@order/@is_child(/@language)', function($property_uid, $type, $notes, $maximum, $is_percentage, $posneg, $variance, $published, $order, $is_child, $language) {
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	jr_import( 'jrportal_guest_types' );
	$jrportal_guest_types = new jrportal_guest_types();
    
	$jrportal_guest_types->id			    = 0;
	$jrportal_guest_types->type				= filter_var($type, FILTER_SANITIZE_SPECIAL_CHARS);
	$jrportal_guest_types->notes			= filter_var($notes, FILTER_SANITIZE_SPECIAL_CHARS);
	$jrportal_guest_types->maximum			= (int)$maximum;
	$jrportal_guest_types->is_percentage	= (int)$is_percentage;
	$jrportal_guest_types->is_child			= (int)$is_child ;
	$jrportal_guest_types->posneg			= (int)$posneg;
	$jrportal_guest_types->variance			= (float)$variance;
	$jrportal_guest_types->property_uid		= $property_uid;
	
	$jrportal_guest_types->commit_new_guest_type();

	$addguesttype = array();
	$addguesttype[] = array ( 
		        "message"		=> jr_gettext('_JOMRES_MR_AUDIT_INSERT_CUSTOMERTYPE', '_JOMRES_MR_AUDIT_INSERT_CUSTOMERTYPE', false),
				"id"			=> $jrportal_guest_types->id,
				"type"			=> $type,
				"notes"			=> $notes,
				"maximum"		=> $maximum,
				"is_percentage"	=> $is_percentage, 
				"posneg"		=> $posneg, 
				"variance"		=> $variance, 
				"published"		=> $published, 
				"property_uid"	=> $property_uid,
				"order"			=> $order, 
				"is_child"		=> $is_child
			);

	$conn = null;
	Flight::json( $response_name = "addguesttype" ,$addguesttype);
	});	



