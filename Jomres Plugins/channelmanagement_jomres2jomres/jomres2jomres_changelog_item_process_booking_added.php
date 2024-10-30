<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

/**
*
* @package Jomres\CMF
*
* Handles webhook events on the parent server
*
*
*/

class jomres2jomres_changelog_item_process_booking_added
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));
        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }



		if ( isset($item->data->property_uid) && isset($item->data->contract_uid)) {
			// So far, so good. Let's find the remote site's booking to import it into this system

			jr_import('channelmanagement_jomres2jomres_communication');
			$remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/booking/'.$item->data->property_uid.'/'.$item->data->contract_uid , [] , true );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			if (is_array($response) ) {

				$reservations = new stdClass();
				$reservations->reservations = array();

				$index = 0; // This is probably overkill right now, however it might be useful in the future to be able to pass multiple bookings. Under review.

				foreach ($response as $booking_data) {
					if ( isset($booking_data->booking_id) && $booking_data->booking_id ==  $item->data->contract_uid ) {
						// Ok, let's insert this puppie into the system

						$unknown =  jr_gettext('BOOKING_NOSHOW_UNKNOWN', 'BOOKING_NOSHOW_UNKNOWN', false);

						if ( $booking_data->booking_total				== 0 ) {  $booking_data->booking_total = 1; } // Just enough to get it over the line

						if ( $booking_data->guest_data->enc_firstname	== '' ) {  $booking_data->guest_data->enc_firstname = $unknown; }
						if ( $booking_data->guest_data->enc_surname		== '' ) {  $booking_data->guest_data->enc_surname = $unknown; }
						if ( $booking_data->guest_data->enc_email		== '' ) {  $booking_data->guest_data->enc_email = "uknown@example.com"; } // Not perfect :(
						if ( $booking_data->guest_data->enc_tel_mobile	== '' ) {  $booking_data->guest_data->enc_tel_mobile = $unknown; }
						if ( $booking_data->guest_data->enc_house		== '' ) {  $booking_data->guest_data->enc_house = $unknown; }
						if ( $booking_data->guest_data->enc_postcode	== '' ) {  $booking_data->guest_data->enc_postcode = $unknown; }
						if ( $booking_data->guest_data->country_code	== '' ) {  $booking_data->guest_data->country_code = '__'; }

						$stay_info = new stdClass();

						$stay_info->property_id		= $componetArgs->property_uid;
						$stay_info->date_from		= $booking_data->date_from;
						$stay_info->date_to			= $booking_data->date_to;
						$stay_info->client_price	= $booking_data->booking_total;
						$stay_info->channel_price	= $booking_data->booking_total;
						if ($booking_data->deposit_paid) {
							$stay_info->already_paid	= (float)$booking_data->deposit_amount;
						} else {
							$stay_info->already_paid	= 0.00;
						}

						reset($booking_data->room_types_booked);
						$first_key = key($booking_data->room_types_booked);

						$room_types = (array)$booking_data->room_types_booked;

						IF (!isset($room_types[$first_key])) {
							logging::log_message("Failed to add changelog booking because the room type relationship is wrong. Most likely caused by the booking being added on the remote system then cancelled before the booking could be created on the child server. ", 'JOMRES2JOMRES', 'WARNNG' , '' );
							throw new Exception( 'Failed to add changelog booking because the room type relationship is wrong. Most likely caused by the booking being added on the remote system then cancelled before the booking could be created on the child server.');
						}

						$stay_info->room_quantity	= (int)$room_types[$first_key]->number_of_rooms_of_type_booked;
						$stay_info->room_type_id	= (int)$room_types[$first_key]->room_type_id;
						$stay_info->room_type_name	= $room_types[$first_key]->room_type_name;
						$stay_info->guest_number	= (int)$booking_data->guest_numbers->number_of_guests;

						// This script can handle black bookings, which don't have guest information
						if ( $booking_data->guest_data->enc_firstname	== '' ) {  $booking_data->guest_data->enc_firstname = $unknown; }
						if ( $booking_data->guest_data->enc_surname		== '' ) {  $booking_data->guest_data->enc_surname = $unknown; }
						if ( $booking_data->guest_data->enc_email		== '' ) {  $booking_data->guest_data->enc_email = $unknown; }
						if ( $booking_data->guest_data->enc_tel_mobile	== '' ) {  $booking_data->guest_data->enc_tel_mobile = $unknown; }
						if ( $booking_data->guest_data->enc_house		== '' ) {  $booking_data->guest_data->enc_house = $unknown; }
						if ( $booking_data->guest_data->enc_postcode	== '' ) {  $booking_data->guest_data->enc_postcode = $unknown; }
						if ( $booking_data->guest_data->country_code	== '' ) {  $booking_data->guest_data->country_code = '__'; }

						$guest_info = new stdClass();
						$guest_info->name			= $booking_data->guest_data->enc_firstname;
						$guest_info->surname		= $booking_data->guest_data->enc_surname;
						$guest_info->email			= $booking_data->guest_data->enc_email;
						$guest_info->phone			= $booking_data->guest_data->enc_tel_mobile;
						$guest_info->address		= $booking_data->guest_data->enc_house.' '.
														$booking_data->guest_data->enc_house.' '.
														$booking_data->guest_data->enc_street.' '.
														$booking_data->guest_data->enc_city.' '.
														$booking_data->guest_data->enc_region.' '.
														$booking_data->guest_data->country.' ';
						$guest_info->post_code		= $booking_data->guest_data->enc_postcode;
						$guest_info->country_code	= $booking_data->guest_data->country_code;
						$guest_info->language_id	= 'en-GB';

						$reservations->reservations[$index]['remote_reservation_id']	= $booking_data->booking_number; // Undecided if this should be $booking_data->booking_id instead
						$reservations->reservations[$index]['comments']					= $booking_data->comments;
						$reservations->reservations[$index]['referrer']					= $booking_data->referrer;

						$reservations->reservations[$index]['stay_infos']				= array($stay_info);
						$reservations->reservations[$index]['guest_info']				= $guest_info;
					} else {
						throw new Exception( "Tried to import booking for property ".$componetArgs->property_uid." but booking data incomplete.");
					}
					$index++;
				}

				$send_response = $jomres_call_api->send_request(
					"PUT"  ,
					"cmf/reservations/add" ,
					array ( "reservations" => json_encode($reservations) ) ,
					array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				if (isset($send_response->data->response->successful_bookings) && !empty($send_response->data->response->successful_bookings)) {
					logging::log_message("Added changelog booking ", 'JOMRES2JOMRES', 'DEBUG' , '' );
					logging::log_message("Component args ", 'JOMRES2JOMRES', 'DEBUG' , serialize($componetArgs) );
					logging::log_message("Response ", 'JOMRES2JOMRES', 'DEBUG' , serialize($send_response) );
					$this->success = true;
				} else {

					logging::log_message("Failed to add changelog booking ", 'JOMRES2JOMRES', 'ERROR' , '' );
					logging::log_message("Component args ", 'JOMRES2JOMRES', 'ERROR' , serialize($componetArgs) );
					logging::log_message("Response ", 'JOMRES2JOMRES', 'ERROR' , serialize($send_response) );
					$this->success = false;

				}

			} else {
				logging::log_message("Did not get a valid response from parent server", 'JOMRES2JOMRES', 'ERROR' , serialize($response) );
			}
		} else {
			logging::log_message("Property or Contract id not set", 'JOMRES2JOMRES', 'INFO' , '' );
		}
		if (!isset($this->success)) {
			$this->success = false;
		}

	}
}





/*
object(stdClass)#885 (20) {
["booking_id"]=>
string(2) "15"
["booking_number"]=>
string(8) "50828507"
["invoice_id"]=>
string(2) "15"
["invoice_number"]=>
string(4) "1001"
["comments"]=>
string(0) ""
["status"]=>
object(stdClass)#894 (2) {
["status_code"]=>
int(3)
["status_text"]=>
string(9) "Approved "
}
["property_uid"]=>
string(1) "4"
["booking_created"]=>
string(19) "2020-05-09 13:28:02"
["last_modified"]=>
string(19) "2020-05-09 15:28:03"
["date_from"]=>
string(10) "2020-05-10"
["date_to"]=>
string(10) "2020-05-16"
["booking_total"]=>
string(7) "1050.00"
["deposit_amount"]=>
string(6) "210.00"
["deposit_paid"]=>
bool(false)
["currency_code"]=>
string(3) "EUR"
["referrer"]=>
string(6) "Jomres"
["mapping"]=>
array(0) {
}
["guest_numbers"]=>
object(stdClass)#842 (3) {
["adults"]=>
int(0)
["children"]=>
int(0)
["number_of_guests"]=>
int(2)
}
["room_types_booked"]=>
object(stdClass)#848 (1) {
["6"]=>
object(stdClass)#847 (4) {
["room_type_name"]=>
string(10) "2 Bedrooms"
["room_type_id"]=>
int(6)
["number_of_rooms_of_type_booked"]=>
int(1)
["room_ids"]=>
array(1) {
[0]=>
string(2) "11"
}
}
}
["guest_data"]=>
object(stdClass)#845 (15) {
["guest_id"]=>
string(2) "13"
["guest_system_id"]=>
string(1) "3"
["enc_firstname"]=>
string(4) "anon"
["enc_surname"]=>
string(4) "anon"
["enc_house"]=>
string(4) "asdf"
["enc_street"]=>
string(32) "anon anon anon Baden-Wurttemberg"
["enc_city"]=>
string(4) "asdf"
["enc_region"]=>
string(17) "Baden-Wurttemberg"
["country"]=>
string(7) "Germany"
["country_code"]=>
string(2) "DE"
["enc_postcode"]=>
string(4) "anon"
["enc_preferences"]=>
string(0) ""
["enc_tel_landline"]=>
string(39) "Mobile number anon Landline number anon"
["enc_tel_mobile"]=>
string(39) "Mobile number anon Landline number anon"
["enc_email"]=>
string(13) "anon@test.com"
}
}

{"reservations":
[{"stay_infos":[
{
"property_id":"26",
"date_from":"2020-08-07",
"date_to":"2020-08-10",
"client_price":"140",
"channel_price":"120",
"already_paid":"0.00",
"room_quantity":"1",
"room_type_id":"0",
"room_type_name":"",
"guest_number":"0"

},
{
"property_id":"26",
"date_from":"2020-09-05",
"date_to":"2020-09-05",
"client_price":"10",
"channel_price":"130",
"already_paid":"10",
"room_quantity":"1",
"room_type_id":"0",
"room_type_name":"",
"guest_number":"0"}
],
"remote_reservation_id":"1234",
"comments":"Fresh towels required every morning, plus a copy of the FT left in front of the door.",
"referrer":"Booking.com",
"guest_info":
{
"name":"Bob",
"surname":"Jones",
"email":"test@test.com",
"phone":"+00 34 1234567890",
"address":"10, this street, that town, this region",
"post_code":"01001",
"country_code":"ES",
"language_id":"en-GB"
}}]}*/

