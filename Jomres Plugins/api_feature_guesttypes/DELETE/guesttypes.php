<?php
/**
 * Core file
 *
 * @author  
 * @version Jomres 9
 * @package Jomres
 * @copyright    2005-2016 
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
    ** Title | Delete guest type
    ** Description | Delete a guest type
    ** Plugin | api_feature_guesttypes
    ** Scope | properties_get
    ** URL | guesttypes
     ** Method | DELETE
    ** URL Parameters | guesttypes/@id/delete/@guesttype_uid
    ** Data Parameters | 
    ** Success Response |
    ** Error Response | 
    ** Sample call |jomres/api/guesttypes/1/delete/1
    ** Notes |  
*/


Flight::route('DELETE /guesttypes/@id/delete/@guesttype_uid(/@language)', function($property_uid, $guesttype_uid, $language) 
    {
    validate_scope::validate('properties_set');
    validate_property_access::validate($property_uid);    

    if ( (int)$guesttype_uid == 0 ) {
        Flight::halt(204, "Guest type id not set");
        }
    
    require_once("../framework.php");

    jr_import( 'jrportal_guest_types' );
    $jrportal_guest_types = new jrportal_guest_types();
    $jrportal_guest_types->id = (int)$guesttype_uid;
    $jrportal_guest_types->property_uid    = (int)$property_uid;
    
    $success = $jrportal_guest_types->delete_guest_type();
        
    if ($success) {
        $deleteguesttype = array();
        $deleteguesttype[] = array ( 
                "message"               => jr_gettext('_JOMRES_MR_AUDIT_DELETE_CUSTOMERTYPE', '_JOMRES_MR_AUDIT_DELETE_CUSTOMERTYPE', false),
                "property_uid"          => $property_uid,
                "guesttype_uid"         => $guesttype_uid
            );

        Flight::json( $response_name = "deleteguesttype" ,$deleteguesttype);     
        }
    });    

