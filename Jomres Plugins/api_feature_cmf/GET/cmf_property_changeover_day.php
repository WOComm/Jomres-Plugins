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


/*
	** Title | Get property blocks
	** Description | Get dates when the property is not available
*/


Flight::route('GET /cmf/property/changeover/day/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);

	$response = array (
		"changeover_day_of_week" => 0,
		"changeover_day_enabled" => 0,
		"days_of_week" => array (
			"6" => jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SATURDAY','_JOMRES_COM_MR_WEEKDAYS_SATURDAY',false),
			"0" => jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SUNDAY','_JOMRES_COM_MR_WEEKDAYS_SUNDAY',false),
			"1" => jr_gettext('_JOMRES_COM_MR_WEEKDAYS_MONDAY','_JOMRES_COM_MR_WEEKDAYS_MONDAY',false),
			"2" => jr_gettext('_JOMRES_COM_MR_WEEKDAYS_TUESDAY','_JOMRES_COM_MR_WEEKDAYS_TUESDAY',false),
			"3" => jr_gettext('_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY','_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY',false),
			"4" => jr_gettext('_JOMRES_COM_MR_WEEKDAYS_THURSDAY','_JOMRES_COM_MR_WEEKDAYS_THURSDAY',false),
			"5" => jr_gettext('_JOMRES_COM_MR_WEEKDAYS_FRIDAY','_JOMRES_COM_MR_WEEKDAYS_FRIDAY',false)
			
			)
		);

	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if ( isset($mrConfig['fixedArrivalDay']) && isset($mrConfig['fixedPeriodBookings']) ) {
		$response["changeover_day_of_week"] = $mrConfig['fixedArrivalDay'];
		$response["changeover_day_enabled"] = $mrConfig['fixedPeriodBookings'];
	}
	
	cmf_utilities::cache_write( $property_uid , "response" , $response );
	
	Flight::json( $response_name = "response" , $response ) ;
	});

