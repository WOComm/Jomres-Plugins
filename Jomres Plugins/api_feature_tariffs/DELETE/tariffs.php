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
	** Title | Delete tariff by tariff type
	** Description | Delete a collection of tariffs by tariff type id
	** Plugin | api_feature_tariffs
	** Scope | properties_set
	** URL | tariffs
 	** Method | DELETE
	** URL Parameters | tariffs/@id/delete/@tarifftypeid
	** Data Parameters |
	** Success Response |{
{
    "data": {
        "deletetariff": [
            {
                "message": "Tariff deleted",
                "property_uid": 1,
                "tarifftypeid": 67
            }
        ]
    },
    "meta": {
        "code": 200
    }
}
	** Error Response | Unable to delete tariff(s) by tariff id
	** Sample call |jomres/api/tariffs/1/115
	** Notes |
*/

Flight::route('DELETE /tariffs/@id/@tarifftypeid', function($property_uid, $tarifftypeid)
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

    $property_uid = (int)$property_uid;
	$tarifftypeid = (int)$tarifftypeid;
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
    
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if ($mrConfig['tariffmode'] != '2' || $mrConfig[ 'is_real_estate_listing' ] == '1' || get_showtime('is_jintour_property')) {
        Flight::halt(204, "Tariff save method not valid for this property");
    }

    jr_import('jrportal_rates');
	$jrportal_rates = new jrportal_rates();
	$jrportal_rates->property_uid = $property_uid;

	$jrportal_rates->tarifftype_id = $tarifftypeid;

	//delete rate
	try{
		$jrportal_rates->delete_rate();
			
		$deletetariff[] = array (
				"message"		=> jr_gettext('_JOMRES_COM_MR_LISTTARIFF_DELETED', '_JOMRES_COM_MR_LISTTARIFF_DELETED', false),
				"property_uid"	=> $property_uid,
				"tarifftypeid"	=> $tarifftypeid
			);
		Flight::json( $response_name = "deletetariff" ,$deletetariff);
	}
	catch (Exception $e) {
		Flight::halt(204, jr_gettext('TARIFF_DELETE_FAILED', 'TARIFF_DELETE_FAILED', false));
	}

	
	});



