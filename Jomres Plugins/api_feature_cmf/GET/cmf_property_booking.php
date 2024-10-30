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


Flight::route('GET /cmf/property/booking/@property_uid/@contract_uid', function( $property_uid , $contract_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);

	cmf_utilities::cache_read($property_uid);

	if ( (int)$contract_uid == 0) {
		Flight::halt(204, "Booking di not sent");
	}

	$query = "SELECT channel_id  , remote_booking_id , local_booking_id  FROM #__jomres_channelmanagement_framework_bookings_xref WHERE property_uid  = ".$property_uid;
	$cross_referenced_bookings = doSelectSql($query);
	
	$linked_bookings = array();
	
	if (!empty($cross_referenced_bookings)) {
		foreach ($cross_referenced_bookings as $xref) {
			$linked_bookings[ $xref->local_booking_id ] = array ( "channel_id" => $xref->channel_id , "remote_booking_id" => $xref->remote_booking_id , "local_booking_id" => $xref->local_booking_id ); 
		}
	}
	
	$query = 'SELECT SQL_CALC_FOUND_ROWS 
		a.contract_uid as booking_id, 
		a.arrival, 
		a.departure, 
		a.rate_rules as guest_types,
		a.contract_total, 
		a.tag as booking_number,
		a.currency_code,
		a.booked_in, 
		a.bookedout, 
		a.deposit_required, 
		a.deposit_paid, 
		a.special_reqs, 
		a.timestamp as booking_created, 
		a.cancelled,
		a.username,
		a.invoice_uid,
		a.property_uid,
		a.approved,
		a.referrer,
		a.last_changed,
		a.noshow_flag,
		a.rejected,
		b.guests_uid,
		b.mos_userid,
		b.enc_firstname, 
		b.enc_surname, 
		b.enc_house ,
		b.enc_street ,
		b.enc_town,
		b.enc_county ,
		b.enc_country ,
		b.enc_postcode,
		b.enc_preferences ,
		b.enc_tel_landline, 
		b.enc_tel_mobile, 
		b.enc_email,
		c.invoice_number,
		c.raised_date ,
		c.init_total ,
		c.id as invoice_id
			FROM #__jomres_contracts a 
		LEFT JOIN #__jomres_guests b ON a.guest_uid = b.guests_uid 
		LEFT JOIN #__jomresportal_invoices c ON a.invoice_uid  = c.id 
			WHERE a.property_uid = '.(int) $property_uid .' AND a.contract_uid = '.(int)$contract_uid .' 
		LIMIT 1';
					
					
		$jomresContractsList = doSelectSql($query);

		$query = "SELECT `room_uid` FROM #__jomres_room_bookings WHERE `contract_uid` = ".(int)$contract_uid." ORDER BY `room_uid` ASC ";
		$room_bookings = doSelectSql($query);

		$room_types_booked = array();

		if (! empty($room_bookings) ) {
			$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
			$current_property_details->gather_data($property_uid);
			$booked_rooms = array();
			foreach ( $room_bookings as $room ) {
				$booked_rooms[] = $room->room_uid;
			}
			$booked_rooms = array_unique($booked_rooms);

			foreach ( $current_property_details->rooms_by_type as $room_type_id=>$room_type ) {
				foreach ($booked_rooms as $room_uid ) {
					if ( in_array( $room_uid , $room_type ) ) {
						if (isset($room_types_booked[$room_type_id]) ) {
							$room_types_booked[$room_type_id]['number_of_rooms_of_type_booked']++;
						} else {
							$room_types_booked[$room_type_id]['room_type_name'] = $current_property_details->classAbbvs[$room_type_id]['abbv'];
							$room_types_booked[$room_type_id]['room_type_id'] = $room_type_id;
							$room_types_booked[$room_type_id]['number_of_rooms_of_type_booked'] = 1;

						}
						$room_types_booked[$room_type_id]['room_ids'][] =  $room_uid;
					}
				}
			}
		}



	$bookings = array();
	
	if (!empty($jomresContractsList)) {
		$count = count($jomresContractsList);
		for ( $i = 0 ; $i < $count ; $i++ ) {
			$contract = $jomresContractsList[$i];
			$bookings[] = cmf_utilities:: build_booking_output ( $contract , $property_uid , $linked_bookings , $room_types_booked ) ;
		}
	}

	
	cmf_utilities::cache_write( $property_uid , "response" , $bookings );
	
	Flight::json( $response_name = "response" , $bookings ) ;
	});

