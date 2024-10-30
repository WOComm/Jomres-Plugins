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

class jomres2jomres_changelog_item_process_coupon_deleted
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		jr_import('channelmanagement_framework_queue_handling');
		$channelmanagement_framework_queue_handling = new channelmanagement_framework_queue_handling();

		if ( isset($item->data->property_uid) ) {
			$item_type = "coupons";

			$cross_references = channelmanagement_framework_utilities :: get_cross_references_for_property_uid ( 'jomres2jomres' , $componetArgs->property_uid , $item_type );

			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/list/coupons/'.$item->data->property_uid , [] , true );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			if (isset($cross_references[$item->data->coupon_id])) {
				$send_response = $jomres_call_api->send_request(
					"DELETE",
					"cmf/property/coupon/". $componetArgs->property_uid.'/'.$cross_references[$item->data->coupon_id]['local_id'],
					[],
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
					);

				if (isset($send_response->data->response) && $send_response->data->response == true ) {
					channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $item->data->coupon_id, 0 );
					logging::log_message("Deleted coupon ", 'JOMRES2JOMRES', 'DEBUG', '');
					logging::log_message("Component args ", 'JOMRES2JOMRES', 'DEBUG', serialize($componetArgs));
					logging::log_message("Response ", 'JOMRES2JOMRES', 'DEBUG', serialize($send_response));
					$this->success = true;
				} else {
					channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $item->data->coupon_id, 0 );
					logging::log_message("Failed to delete coupon ", 'JOMRES2JOMRES', 'ERROR', '');
					logging::log_message("Component args ", 'JOMRES2JOMRES', 'ERROR', serialize($componetArgs));
					logging::log_message("Response ", 'JOMRES2JOMRES', 'ERROR', serialize($send_response));
					$this->success = false;
				}
			}
		} else {
			logging::log_message("Id not set", 'JOMRES2JOMRES', 'INFO' , '' );
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

