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


Flight::route('GET /cmf/property/list/guesttypes/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);

		//get all guest types
		$basic_guest_type_details = jomres_singleton_abstract::getInstance( 'basic_guest_type_details' );
		$basic_guest_type_details->get_all_guest_types($property_uid);

		$guesttypes = array();
		if (!empty($basic_guest_type_details->guest_types)) {
			foreach($basic_guest_type_details->guest_types as $row)
			{
				$guesttypes[] = array (
					"id"			=> $row['id'],
					"type"			=> $row['type'],
					"notes"			=> $row['notes'],
					"maximum"		=> $row['maximum'],
					"is_percentage"	=> $row['is_percentage'],
					"posneg"		=> $row['posneg'],
					"variance"		=> $row['variance'],
					"published"		=> $row['published'],
					"property_uid"	=> $row['property_uid'],
					"order"			=> $row['order'],
					"is_child"		=> $row['is_child']
				);
			}
		}

	
	Flight::json( $response_name = "response" , $guesttypes );
	});

