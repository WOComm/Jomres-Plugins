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
	** Title | Get room types 
	** Description | Returns a list of room types with their IDs
	** Plugin | api_feature_site_structure
	** Scope | N/A
	** URL | site_structure
 	** Method | GET
	** URL Parameters | site_structure/room_types(:LANGUAGE)
	** Data Parameters | none
	** Success Response |{
  "data": {
    "room_types": {
      "1": {
        "room_classes_uid": 1,
        "room_class_abbv": "Double Room",
        "room_class_full_desc": "",
        "image": "double.png",
        "ptype_xref": [
          "1",
          "5"
        ]
      },
      "2": {
        "room_classes_uid": 2,
        "room_class_abbv": "Family Room",
        "room_class_full_desc": "",
        "image": "twin.png",
        "ptype_xref": [
          "1",
          "5"
        ]
      }
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 409 No room types in database
	** Sample call |jomres/api/site_structure/room_types
	** Notes | Responds with all room types
*/

Flight::route('GET /site_structure/room_types(/@language)', function($language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$jomres_room_types = jomres_singleton_abstract::getInstance( 'jomres_room_types' );
    $jomres_room_types->get_all_room_types();
    
	if ( empty($jomres_room_types->room_types) )
		Flight::halt(409, "No room types in database");
	else
		{
		Flight::json( $response_name = "room_types" ,$jomres_room_types->room_types);
		}
	});

/*
	** Title | Get property types 
	** Description | Returns a list of property types with their IDs

	** Plugin | api_feature_site_structure
	** Scope | N/A
	** URL | site_structure
 	** Method | GET
	** URL Parameters |site_structure/property_types(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {
  "data": {
    "all_property_types": {
      "1": "Hotel",
      "2": "Yacht",
      "3": "Car",
      "4": "Camp Site",
      "5": "Bed and Breakfast",
      "6": "Villa",
      "7": "Apartment",
      "8": "Cottage",
      "9": "Tour",
      "10": "For Sale"
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 409 No property types in database
	** Sample call |jomres/api/site_structure/property_types
	** Notes | Site Structure api feature, would be used when setting up search forms in a remote device, as it supplies the currently available property types in the system. The index is the property type id.
*/

Flight::route('GET /site_structure/property_types(/@language)', function($language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	if ( empty($basic_property_details->all_property_type_titles) )
		Flight::halt(409, "No property types in database");
	else
		{
		Flight::json( $response_name = "all_property_types" ,$basic_property_details->all_property_type_titles);
		}
	});


/*
	** Title | Get property features 
	** Description | Returns a list of property features with their IDs

	** Plugin | api_feature_site_structure
	** Scope | N/A
	** URL | site_structure
 	** Method | GET
	** URL Parameters |site_structure/property_features(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {
  "data": {
    "property_features": {
      "3": {
        "id": 3,
        "abbv": "Airport",
        "desc": "Close to the airport",
        "image": "airport_nearby.png",
        "property_uid": 0,
        "ptype_xref": [
          0
        ],
        "cat_id": 0,
        "cat_title": ""
      },
      "4": {
        "id": 4,
        "abbv": "Minibar",
        "desc": "Minibar in room",
        "image": "air_conditioning.png",
        "property_uid": 0,
        "ptype_xref": [
          1
        ],
        "cat_id": 0,
        "cat_title": ""
      },
      "5": {
        "id": 5,
        "abbv": "All Inclusive",
        "desc": "All inclusive rates available",
        "image": "allinc.png",
        "property_uid": 0,
        "ptype_xref": [],
        "cat_id": 9,
        "cat_title": "Services"
      }
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 409 No property features in database
	** Sample call |jomres/api/site_structure/property_features
	** Notes | Site Structure api feature, would be used when setting up search forms in a remote device, as it supplies the currently available property types in the system.
*/

Flight::route('GET /site_structure/property_features(/@language)', function($language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$jomres_property_features = jomres_singleton_abstract::getInstance('jomres_property_features');
	$jomres_property_features->get_all_property_features();

	if ( empty($jomres_property_features->property_features) )
		Flight::halt(409, "No property features in database");
	else
		{
		Flight::json( $response_name = "property_features" ,$jomres_property_features->property_features );
		}
	});
    


/*
	** Title | Get property feature categories 
	** Description | Returns a list of property features categories

	** Plugin | api_feature_site_structure
	** Scope | N/A
	** URL | site_structure
 	** Method | GET
	** URL Parameters |site_structure/property_features_categories(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {
  "data": {
    "property_features_categories": {
      "1": {
        "id": 1,
        "title": "Activities"
      },
      "2": {
        "id": 2,
        "title": "Amenities"
      },
      "3": {
        "id": 3,
        "title": "Accessibility"
      },
      "4": {
        "id": 4,
        "title": "Views"
      },
      "5": {
        "id": 5,
        "title": "Living Area"
      },
      "6": {
        "id": 6,
        "title": "Media & Technology"
      },
      "7": {
        "id": 7,
        "title": "Food & Drink"
      },
      "8": {
        "id": 8,
        "title": "Parking"
      },
      "9": {
        "id": 9,
        "title": "Services"
      },
      "10": {
        "id": 10,
        "title": "Bathroom"
      }
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 409 No property feature categories in database
	** Sample call |jomres/api/site_structure/property_feature_categories
	** Notes | Site Structure api feature, would be used when setting up search forms in a remote device, as it supplies the currently available property feature categories in the system.
*/

Flight::route('GET /site_structure/property_features_categories(/@language)', function($language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$jomres_property_features_categories = jomres_singleton_abstract::getInstance('jomres_property_features_categories');
	$jomres_property_features_categories->get_all_property_features_categories();

	if ( empty($jomres_property_features_categories->property_features_categories) )
		Flight::halt(409, "No property feature categories in database");
	else
		{
		Flight::json( $response_name = "property_features_categories" ,$jomres_property_features_categories->property_features_categories );
		}
	});
    

/*
	** Title | Get countries
	** Description | Returns a list of countries

	** Plugin | api_feature_site_structure
	** Scope | N/A
	** URL | site_structure
 	** Method | GET
	** URL Parameters |site_structure/countries(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {
  "data": {
    "countries": {
      "AF": {
        "id": "1",
        "countrycode": "AF",
        "countryname": "Afghanistan"
      },
      "AL": {
        "id": "2",
        "countrycode": "AL",
        "countryname": "Albania"
      },
      "DZ": {
        "id": "3",
        "countrycode": "DZ",
        "countryname": "Algeria"
      },
      "AS": {
        "id": "4",
        "countrycode": "AS",
        "countryname": "Am. Samoa"
      },
      "AD": {
        "id": "5",
        "countrycode": "AD",
        "countryname": "Andorra"
      }
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 409 No countries in database
	** Sample call |jomres/api/site_structure/countries
	** Notes | Site Structure api feature, would be used when setting up search forms in a remote device, as it supplies the currently available countries in the system.
*/

Flight::route('GET /site_structure/countries(/@language)', function($language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$jomres_countries = jomres_singleton_abstract::getInstance('jomres_countries');
    $jomres_countries->get_all_countries();

	if ( empty($jomres_countries->countries) )
		Flight::halt(409, "No countries in database");
	else
		{
		Flight::json( $response_name = "countries" ,$jomres_countries->countries );
		}
	});
    
    

/*
	** Title | Get regions
	** Description | Returns a list of regions

	** Plugin | api_feature_site_structure
	** Scope | N/A
	** URL | site_structure
 	** Method | GET
	** URL Parameters |site_structure/regions(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {
  "data": {
    "regions": {
      "1": {
        "id": "1",
        "countrycode": "AD",
        "regionname": "Canillo"
      },
      "2": {
        "id": "2",
        "countrycode": "AD",
        "regionname": "Encamp"
      },
      "3": {
        "id": "3",
        "countrycode": "AD",
        "regionname": "La Massana"
      },
      "4": {
        "id": "4",
        "countrycode": "AD",
        "regionname": "Ordino"
      },
      "5": {
        "id": "5",
        "countrycode": "AD",
        "regionname": "Sant Julia de Loria"
      },
      "6": {
        "id": "6",
        "countrycode": "AD",
        "regionname": "Andorra la Vella"
      },
      "7": {
        "id": "7",
        "countrycode": "AD",
        "regionname": "Escaldes-Engordany"
      },
      "8": {
        "id": "8",
        "countrycode": "AE",
        "regionname": "Abu Dhabi"
      }
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 409 No regions in database
	** Sample call |jomres/api/site_structure/regions
	** Notes | Site Structure api feature, would be used when setting up search forms in a remote device, as it supplies the currently available regions in the system.
*/

Flight::route('GET /site_structure/regions(/@language)', function($language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
    $jomres_regions->get_all_regions();

	if ( empty($jomres_regions->regions) )
		Flight::halt(409, "No regions in database");
	else
		{
		Flight::json( $response_name = "regions" ,$jomres_regions->regions );
		}
	});
	
	

/*
	** Title | Get categories
	** Description | Returns a list of categories

	** Plugin | api_feature_site_structure
	** Scope | N/A
	** URL | site_structure
 	** Method | GET
	** URL Parameters |site_structure/categories(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {
  "data": {
    "regions": {
      "1": {
        "id": "1",
        "countrycode": "AD",
        "regionname": "Canillo"
      },
      "2": {
        "id": "2",
        "countrycode": "AD",
        "regionname": "Encamp"
      },
      "3": {
        "id": "3",
        "countrycode": "AD",
        "regionname": "La Massana"
      },
      "4": {
        "id": "4",
        "countrycode": "AD",
        "regionname": "Ordino"
      },
      "5": {
        "id": "5",
        "countrycode": "AD",
        "regionname": "Sant Julia de Loria"
      },
      "6": {
        "id": "6",
        "countrycode": "AD",
        "regionname": "Andorra la Vella"
      },
      "7": {
        "id": "7",
        "countrycode": "AD",
        "regionname": "Escaldes-Engordany"
      },
      "8": {
        "id": "8",
        "countrycode": "AE",
        "regionname": "Abu Dhabi"
      }
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 409 No categories in database
	** Sample call |jomres/api/site_structure/categories
	** Notes | Site Structure api feature, would be used when setting up search forms in a remote device, as it supplies the currently available property categories in the system. These are not categories in the traditional Joomla or Wordpress sense.
	
*/

Flight::route('GET /site_structure/categories(/@language)', function($language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$jomres_property_categories = jomres_singleton_abstract::getInstance('jomres_property_categories');
    $jomres_property_categories->get_all_property_categories();

	if ( empty($jomres_property_categories->property_categories) )
		Flight::halt(409, "No categories in database");
	else
		{
		Flight::json( $response_name = "categories" ,$jomres_property_categories->property_categories );
		}
	});
	