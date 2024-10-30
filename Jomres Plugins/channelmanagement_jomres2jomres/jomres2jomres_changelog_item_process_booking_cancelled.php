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

class jomres2jomres_changelog_item_process_booking_cancelled
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) && isset($item->data->contract_uid)) {
			// So far, so good. Let's find the remote site's booking information. We need to know it's booking number so that we can find the corresponding booking locally

			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/booking/'.$item->data->property_uid.'/'.$item->data->contract_uid , [] , true );
			if (!isset($response[0]->booking_number)) {
				throw new Exception( "Can't find remote booking" );
			}

			$remote_booking_number = $response[0]->booking_number;

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

				$send_response = $jomres_call_api->send_request(
					"GET"  ,
					'cmf/property/booking/link/'.$componetArgs->property_uid.'/'.$remote_booking_number ,
					array () ,
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				// It is legitimate for a local booking to not exist, for example a remote booking could have been created and then cancelled before this
				//  local system had a chance to catch up. In that event then the local booking will not be created because the rooms no longer exist
				// in the remote system's room_bookings table, therefore the local system didn't know which rooms were booked.
				// In that event, failure to create the booking locally is an acceptable response therefore we will not stress it if we can't cancel it locally

				if( isset($send_response->data->response->local_bookings) && !empty($send_response->data->response->local_bookings)) {

					$local_booking_ids = array();
					foreach ($send_response->data->response->local_bookings as $contract ) {
						$local_booking_ids[] = $contract->local_booking_id;
					}

					$cancel_response = $jomres_call_api->send_request(
						"PUT"  ,
						"cmf/reservations/cancel" ,
						array ( "reservation_ids" => json_encode(array($remote_booking_number)) ) ,
                        array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
					);

					if (isset($cancel_response->data->response->success) && $cancel_response->data->response->success == true ) {
						logging::log_message("Cancelled changelog booking ", 'JOMRES2JOMRES', 'DEBUG' , '' );
						logging::log_message("Component args ", 'JOMRES2JOMRES', 'DEBUG' , serialize($componetArgs) );
						logging::log_message("Response ", 'JOMRES2JOMRES', 'DEBUG' , serialize($send_response) );
						$this->success = true;
					} else {
						logging::log_message("Failed to cancel changelog booking ", 'JOMRES2JOMRES', 'ERROR' , '' );
						logging::log_message("Component args ", 'JOMRES2JOMRES', 'ERROR' , serialize($componetArgs) );
						logging::log_message("Response ", 'JOMRES2JOMRES', 'ERROR' , serialize($send_response) );
						$this->success = false;
					}
				} else {
					$this->success = true;
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

