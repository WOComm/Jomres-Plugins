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


Flight::route('GET /cmf/property/available/rooms/@property_uid/@start_date/@end_date', function( $property_uid , $start_date , $end_date )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);

	cmf_utilities::cache_read($property_uid);
	
	$property = cmf_utilities::get_property_object_for_update($property_uid); // Information about the property. We will use the number of rooms to determine if the property is fully booked or not

	if ( !isset($property->rooms['local_rooms']) || empty($property->rooms['local_rooms']) ) {
		Flight::halt(204, "There are no rooms for this property.");
	}

	$number_of_rooms = count($property->rooms['local_rooms']);

	$dates_array = array_keys(cmf_utilities::get_date_ranges( $start_date , $end_date ));

	$bookings = cmf_utilities::get_property_bookings( $property_uid );
	
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data($property_uid);
	
	$continuously_available_rooms = array();

	if ( !empty($current_property_details->multi_query_result[$property_uid]['rooms']) ) {
		
		$total_rooms_in_property =  count($current_property_details->multi_query_result[$property_uid]['rooms']);
		$some_rooms_available_over_period = true;
		$dates_and_rooms_booked = array();
		
		foreach ($dates_array as $date ) {
			$available_accommodation_numbers = 0;
			$dates_and_rooms_booked[$date] = array();
			$dates_and_rooms_booked[$date]['available_rooms'] = $current_property_details->multi_query_result[$property_uid]['rooms'];
			$dates_and_rooms_booked[$date]['number_booked_this_date'] = 0;
			foreach ($bookings as $booking ) {
				if ($booking['date'] == $date ) {
					$dates_and_rooms_booked[$date]['number_booked_this_date']++;
					unset($dates_and_rooms_booked[$date]['available_rooms'][ $booking['room_uid'] ]);
				}
			}
			
			if ( $dates_and_rooms_booked[$date]['number_booked_this_date'] == $total_rooms_in_property ) {
				$some_rooms_available_over_period = false;
			}
		}
		
		

		if ($some_rooms_available_over_period) {
			$basic_room_details = jomres_singleton_abstract::getInstance('basic_room_details');
			$basic_room_details->get_all_rooms($property_uid);

			$all_room_uids = $current_property_details->multi_query_result[$property_uid]['rooms'];
			
			foreach ($current_property_details->multi_query_result[$property_uid]['rooms'] as $room_uid ) {
				if ( in_array($room_uid , $all_room_uids ) ) {
					foreach ($dates_and_rooms_booked as $date=>$ar) {
						if (!in_array($room_uid , $ar['available_rooms'])) { // The room isn't available on this date
							$key = array_search($room_uid , $all_room_uids );
							unset($all_room_uids[$key]); 
						}
						
					}
				}
			}

			if (!empty($all_room_uids)) {
				foreach ($all_room_uids as $room_uid) {
					$room_type_id = $basic_room_details->rooms[$room_uid]['room_classes_uid'];
					$room_type_name =  $current_property_details->multi_query_result[$property_uid]["room_types"][$room_type_id]["abbv"];
					$continuously_available_rooms['continuously_available_rooms'][] = array (
						"room_uid" => (int)$room_uid , 
						"room_name" => $basic_room_details->rooms[$room_uid]['room_name'],
						"room_number" => $basic_room_details->rooms[$room_uid]['room_number'],
						"max_people" => (int)$basic_room_details->rooms[$room_uid]['max_people'],
						"room_type" => $room_type_name , 
						"room_type_id" => $room_type_id
						 );
					$basic_room_details->rooms[$room_uid]['room_type'] = $room_type_name;
					$continuously_available_rooms['room_details'][$room_uid] = $basic_room_details->rooms[$room_uid];
				}
			}
			
			// $continuously_available_rooms['rooms_availability'] = $dates_and_rooms_booked;
			
		}
	}


	cmf_utilities::cache_write( $property_uid , "response" , $continuously_available_rooms );
	
	Flight::json( $response_name = "response" , $continuously_available_rooms );
	});

