<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


/**
*
* Delete all property tariffs
*
*/

Flight::route('DELETE /cmf/property/tariffs/@id', function($property_uid)
	{
    require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	$basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
	$basic_rate_details->get_rates($property_uid);

	if (!empty($basic_rate_details->multi_query_rates[$property_uid])) {
		jr_import('jrportal_rates');
		$tariff_type_ids_already_deleted = array();
		foreach ($basic_rate_details->multi_query_rates[$property_uid] as $rates ) {
			if (!empty($rates) ){
				foreach ($rates as $rate ) {
                    reset($rate);
                    $first_key = key($rate);

                    if (isset($rate[$first_key]['tarifftype_id'])) {
                        $tariff_type_id = $rate[$first_key]['tarifftype_id'];
                        if ($tariff_type_id > 0 && !in_array( $tariff_type_id , $tariff_type_ids_already_deleted ) ) {
                            $jrportal_rates = new jrportal_rates();
                            $jrportal_rates->property_uid = $property_uid;

                            $rates_uid = (int)jomresGetParam( $_REQUEST, 'tariffUid', 0 );

                            $jrportal_rates->tarifftype_id = $tariff_type_id;
                            $jrportal_rates->delete_rate();

                            $tariff_type_ids_already_deleted[] = $tariff_type_id;
                        }
                    }
				}
			}
		}
	}
	
	$response = true;
	
	Flight::json( $response_name = "response" ,$response );
	});