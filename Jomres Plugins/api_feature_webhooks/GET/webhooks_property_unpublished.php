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
	** Title | Webhooks Property Published
	** Description | Responds with details of unpublished property.
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/property_unpublished
	** Data Parameters | None
	** Success Response | { "data": { "property_details": { "property": {  "propertys_uid": "2",  "property_name": "Best West Hotel",  "property_street": "142 - 146 Harley Street",  "property_town": "London",  "property_postcode": "W1G 7LD",  "property_region": "London, City of",  "property_region_id": "1154",  "property_country": "United Kingdom",  "property_country_code": "GB",  "property_tel": "34324324324",  "property_fax": "34234234344",  "property_email": "your@email.com",  "published": 1,  "ptype_id": 1,  "property_type": "propertyrental",  "property_type_title": "Hotel",  "stars": 5,  "superior": 0,  "lat": "51.49998",  "long": "-0.13596",  "metatitle": "",  "metadescription": "",  "metakeywords": "",  "property_features": ",48,25,42,43,54,55,61,22,66,65,67,68,70,47,",  "property_mappinglink": "",  "real_estate_property_price": "0",  "property_description": "<p>TRIMMED</p>",  "property_checkin_times": "<p>TRIMMED</p>",  "property_area_activities": "<p>TRIMMED</p>",  "property_driving_directions": "<p>TRIMMED</p>",  "property_airports": "<p>TRIMMED</p>",  "property_othertransport": "<p>TRIMMED</p>",  "property_policies_disclaimers": "<p>TRIMMED</p>",  "apikey": "uXXCFDVhVOQSlOzrIBSunWmisQdpQkVHAXlQIdiCAwUxDRWFZg",  "approved": true,  "permit_number": "",  "rooms": {  "7": "7",  "8": "8",  "9": "9",  "10": "10",  "11": "11",  "12": "12",  "13": "13",  "14": "14",  "15": "15",  "16": "16",  "17": "17",  "18": "18",  "19": "19",  "20": "20",  "21": "21",  "22": "22",  "23": "23",  "24": "24",  "25": "25",  "26": "26"  },  "room_types": {  "1": {  "abbv": "Double Room",  "desc": "",  "image": "double.png"  },  "3": {  "abbv": "Single Room",  "desc": "",  "image": "single.png"  }  },  "rooms_by_type": {  "1": [  "7",  "8",  "9",  "10",  "11",  "12",  "13",  "14",  "15",  "16"  ],  "3": [  "17",  "18",  "19",  "20",  "21",  "22",  "23",  "24",  "25",  "26"  ]  },  "rooms_max_people": {  "1": {  "7": "2",  "8": "2",  "9": "2",  "10": "2",  "11": "2",  "12": "2",  "13": "2",  "14": "2",  "15": "2",  "16": "2"  },  "3": {  "17": "1",  "18": "1",  "19": "1",  "20": "1",  "21": "1",  "22": "1",  "23": "1",  "24": "1",  "25": "1",  "26": "1"  }  },  "accommodation_tax_rate": 20 } } }, "meta": { "code": 200 } }
	** Error Response | 404 invalid_property_uid / 403 invalid_property_uid
	** Sample call |jomres/api/webhooks/1/property_unpublished
	** Notes | Replies with the details of the property
*/

Flight::route('GET /webhooks/@id/property_unpublished', function($property_uid)
	{
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
    try {
        $current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
        $current_property_details->gather_data($property_uid);

        if (!isset($current_property_details->multi_query_result[$property_uid])) { 
            Flight::halt( "403" ,"invalid_property_uid");
        }
        $response                               = new stdClass();
        $response->property                     = $current_property_details->multi_query_result[$property_uid];
        
        Flight::json( $response_name = "property_details" ,$response);
    } catch (Exception $e) {
        Flight::halt( "404" ,"invalid_property_uid");
        }
	});
