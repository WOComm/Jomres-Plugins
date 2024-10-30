<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
* @copyright	2005-2020 Vince Wooll
 * 
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * Processes the webhook, refactor's the data to send the information to the channel
	 * 
	 */

class jomres2Jomres_webhookevent_booking_added
{	
	public function __construct()
	{
		
	}
	
	public function trigger_event( $webhook_event , $data , $channel_data , $managers , $this_channel ) 
	{
		if ( isset($channel_data['channel_name']) && $channel_data['channel_name'] != '' ) {
			if ($this_channel == $channel_data['channel_name']) {
                throw new Exception ( "Webhook triggered by this channel, will not process further");
			}
		}

		logging::log_message(get_showtime("current_webhook_task")." -- "."Sending a booking to remote server" , 'JOMRES2JOMRES', 'DEBUG' , '' );

		$ePointFilepath=get_showtime('ePointFilepath');

        // var_dump($data);exit;
		// var_dump($channel_data);exit;
		// var_dump($managers);exit;
		// We need the manager's id, if we can't find it we'll back out

        if ( !isset($data->property_uid) || $data->property_uid == 0 ) {
            throw new Exception ( "Property uid not set");
        }

        if ( !isset($data->contract_uid) || $data->contract_uid == 0 ) {
            throw new Exception ( "Contract uid not set");
        }

		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
        $channelmanagement_framework_singleton->proxy_manager_id = $data->manager_id;

		$response = $channelmanagement_framework_singleton->rest_api_communicate( $this_channel , 'GET' , 'cmf/properties/ids');

		logging::log_message(get_showtime("task")." -- "."After trying to find property ids on the local system : ".serialize($response) , 'JOMRES2JOMRES', 'DEBUG' , '' );

        if (!isset($response->data->response)) {
            throw new Exception ( "Channel not associated with any properties or api failed to connect");
        }

        $remote_property_uid = 0;
        foreach ($response->data->response as $property ) {
            if ($property->local_property_uid == $data->property_uid ) {
                $remote_property_uid = $property->remote_property_uid;
                break;
            }
        }

        if ($remote_property_uid == 0) {
            throw new Exception ( "Could not identify the remote property id");
        }

        // Was going to use this, but the get property booking cmf endpoint includes guest numbers so we'll use that instead of reinventing the wheel
        // $current_contract_details = jomres_singleton_abstract::getInstance('basic_contract_details');
        // $current_contract_details->gather_data($data->contract_uid, $data->property_uid);


		jr_import('channelmanagement_framework_utilities');
		$mapped_dictionary_items = channelmanagement_framework_utilities :: get_mapped_dictionary_items ( 'jomres2jomres', $mapped_to_jomres_only = true );
		$mapped_room_types = $mapped_dictionary_items['_cmf_list_room_types'];

		$endpoint = 'cmf/property/booking/'.$data->property_uid.'/'.$data->contract_uid;
        $channelmanagement_framework_singleton->proxy_manager_id = $data->manager_id;
		$booking_data_response = $channelmanagement_framework_singleton->rest_api_communicate( $this_channel , 'GET' ,  $endpoint);

        if (!isset($booking_data_response->data->response[0])) {
            throw new Exception ( "Could not get booking data");
        }

		$room_types_booked = (array)$booking_data_response->data->response[0]->room_types_booked;

		$stay_infos = array();

		// Because it's possible to book multiple room types in a single booking, we will send each room type booking as an individual booking to the parent server
		// Guest numbers do not affect the total rooms available, so it's ok to create two bookings for the same guest in the same period and set the guest numbers
		// to the total number of guests, instead of trying to take the number_of_guests and make them fit the booked rooms for each booking

		foreach ( $room_types_booked as $room_type_booked ) {
			$booking_info = new stdClass();

			$booking_info->property_id			= $remote_property_uid;
			$booking_info->date_from			= $booking_data_response->data->response[0]->date_from;
			$booking_info->date_to				= $booking_data_response->data->response[0]->date_to;
			$booking_info->client_price			= $booking_data_response->data->response[0]->booking_total;
			$booking_info->channel_price		= $booking_data_response->data->response[0]->booking_total;
			$booking_info->already_paid			= $booking_data_response->data->response[0]->deposit_paid;

			// We need to find the remote room type id and the number of rooms booked to send that to the parent site
			$local_room_type_id = $room_type_booked->room_type_id;
			foreach ($mapped_room_types as $mapped_room_type ) {
				if ( $mapped_room_type->jomres_id == $local_room_type_id ) {
					$booking_info->room_type_id		= $mapped_room_type->remote_item_id;
					$booking_info->room_type_name	= $mapped_room_type->remote_name;
				}
			}


			$booking_info->room_quantity		= $room_type_booked->number_of_rooms_of_type_booked ;
			$booking_info->guest_number			= $booking_data_response->data->response[0]->guest_numbers->number_of_guests;

			$stay_infos[] = $booking_info;
		}

		$guest_info = new stdClass();
		$guest_info->name = $booking_data_response->data->response[0]->guest_data->enc_firstname;
		$guest_info->surname = $booking_data_response->data->response[0]->guest_data->enc_surname;
		$guest_info->email = $booking_data_response->data->response[0]->guest_data->enc_email;
		$guest_info->phone = jr_gettext('_JOMRES_COM_MR_EB_GUEST_JOMRES_MOBILE_EXPL', '_JOMRES_COM_MR_EB_GUEST_JOMRES_MOBILE_EXPL' , false )." ".$booking_data_response->data->response[0]->guest_data->enc_tel_mobile." ".jr_gettext('_JOMRES_COM_MR_EB_GUEST_JOMRES_LANDLINE_EXPL', '_JOMRES_COM_MR_EB_GUEST_JOMRES_LANDLINE_EXPL' , false )." ".$booking_data_response->data->response[0]->guest_data->enc_tel_landline;
		$guest_info->address =
			$booking_data_response->data->response[0]->guest_data->enc_house." ".
			$booking_data_response->data->response[0]->guest_data->enc_street." ".
			$booking_data_response->data->response[0]->guest_data->enc_city." ".
			$booking_data_response->data->response[0]->guest_data->enc_region." ";

		$guest_info->post_code = $booking_data_response->data->response[0]->guest_data->enc_postcode;
		$guest_info->country_code = ($booking_data_response->data->response[0]->guest_data->country_code);
		$guest_info->language_id = "en-GB"; // Not really supported in Jomres, at least not for now, so for now we'll just set everything to English


		$reservations = new stdClass();
		$reservations->reservations = array();

		$reservations->reservations[0]['stay_infos']				= $stay_infos;
		$reservations->reservations[0]['remote_reservation_id']		= $booking_data_response->data->response[0]->booking_number;
		$reservations->reservations[0]['comments']					= $booking_data_response->data->response[0]->comments;
		$reservations->reservations[0]['referrer']					= $booking_data_response->data->response[0]->referrer." :: ".get_showtime("live_site");
		$reservations->reservations[0]['guest_info'] = $guest_info;

		jr_import('channelmanagement_jomres2jomres_communication');
		$remote_server_communication = new channelmanagement_jomres2jomres_communication($data->manager_id);

		$data_array = array (
			"reservations"		=> json_encode($reservations)
		);

		$response = $remote_server_communication->communicate( "PUT" , 'cmf/reservations/add' , $data_array , true );

		logging::log_message(get_showtime("current_webhook_task")." -- "."Response from  sending a booking to the remote service : ".serialize($response) , 'JOMRES2JOMRES', 'DEBUG' , '' );


		return $response;
	}
}

/*
{
    "data": {
        "response": [
            {
                "booking_id": "19",
                "booking_number": "82590841",
                "invoice_id": "5",
                "invoice_number": "1001",
                "status": {
                    "status_code": 3,
                    "status_text": "Approved "
                },
                "property_uid": "26",
                "booking_created": "2020-02-23 10:51:04",
                "last_modified": "2020-02-23 10:51:05",
                "date_from": "2020-02-24",
                "date_to": "2020-02-24",
                "booking_total": "144",
                "deposit_amount": "14.4",
                "deposit_paid": false,
                "currency_code": "EUR",
                "referrer": "Jomres",
                "mapping": [],
                "guest_numbers": {
                    "adults": 0,
                    "children": 0,
                    "number_of_guests": 0
                },
                "guest_data": {
                    "guest_id": "3",
                    "guest_system_id": "48",
                    "enc_firstname": "test",
                    "enc_surname": "test",
                    "enc_house": "test",
                    "enc_street": "test",
                    "enc_city": "test",
                    "enc_region": "Kyrenia",
                    "country": "Cyprus",
                    "enc_postcode": "test",
                    "enc_preferences": "",
                    "enc_tel_landline": "test",
                    "enc_tel_mobile": "test",
                    "enc_email": "test@test.com"
                }
            }
        ]
    },
    "meta": {
        "code": 200
    }
}
 *

 object(basic_contract_details)#589 (2) {
  ["contract"]=>
  array(1) {
    [18]=>
    array(5) {
      ["contractdeets"]=>
      array(43) {
        ["contract_uid"]=>
        string(2) "18"
        ["arrival"]=>
        string(10) "2020/02/23"
        ["departure"]=>
        string(10) "2020/02/24"
        ["guest_uid"]=>
        string(1) "2"
        ["rate_rules"]=>
        string(0) ""
        ["rooms_tariffs"]=>
        string(5) "57^39"
        ["deposit_paid"]=>
        string(1) "0"
        ["contract_total"]=>
        string(3) "144"
        ["deposit_ref"]=>
        NULL
        ["payment_ref"]=>
        NULL
        ["special_reqs"]=>
        string(0) ""
        ["deposit_required"]=>
        string(4) "28.8"
        ["date_range_string"]=>
        string(10) "2020/02/23"
        ["booked_in"]=>
        string(1) "0"
        ["true_arrival"]=>
        NULL
        ["single_person_suppliment"]=>
        string(1) "0"
        ["extras"]=>
        string(0) ""
        ["extrasquantities"]=>
        bool(false)
        ["extrasvalue"]=>
        string(1) "0"
        ["tax"]=>
        string(5) "24.00"
        ["tag"]=>
        string(8) "22028627"
        ["timestamp"]=>
        string(19) "2020-02-21 12:36:41"
        ["room_total"]=>
        string(3) "120"
        ["discount"]=>
        string(1) "0"
        ["currency_code"]=>
        string(3) "EUR"
        ["cancelled"]=>
        string(1) "0"
        ["cancelled_timestamp"]=>
        NULL
        ["cancelled_reason"]=>
        NULL
        ["discount_details"]=>
        string(0) ""
        ["username"]=>
        string(6) "jomres"
        ["coupon_id"]=>
        string(1) "0"
        ["bookedout"]=>
        string(1) "0"
        ["bookedout_timestamp"]=>
        NULL
        ["invoice_uid"]=>
        string(1) "4"
        ["channel_manager_booking"]=>
        string(1) "0"
        ["approved"]=>
        string(1) "1"
        ["secret_key"]=>
        string(50) "JdSBTOogWwSrcGbCmVuGqfctHCWgxHQQHZItCcPDuaDlOudhmF"
        ["booking_language"]=>
        string(5) "en-GB"
        ["last_changed"]=>
        string(19) "2020-02-21 12:36:41"
        ["noshow_flag"]=>
        string(1) "0"
        ["network_stats"]=>
        string(2) "[]"
        ["referrer"]=>
        string(6) "Jomres"
        ["booking_data_archive_id"]=>
        string(1) "4"
      }
      ["guestdeets"]=>
      array(17) {
        ["image"]=>
        string(33) "/jomres/assets/images/noimage.gif"
        ["firstname"]=>
        string(4) "test"
        ["surname"]=>
        string(4) "test"
        ["house"]=>
        string(4) "test"
        ["street"]=>
        string(4) "test"
        ["town"]=>
        string(4) "test"
        ["county"]=>
        string(7) "Kyrenia"
        ["country"]=>
        string(6) "Cyprus"
        ["country_code"]=>
        string(2) "CY"
        ["postcode"]=>
        string(4) "test"
        ["tel_landline"]=>
        string(4) "test"
        ["tel_mobile"]=>
        string(4) "test"
        ["email"]=>
        string(13) "test@test.com"
        ["discount"]=>
        string(1) "0"
        ["vat_number"]=>
        string(0) ""
        ["vat_number_validated"]=>
        string(1) "0"
        ["vat_number_validation_response"]=>
        NULL
      }
      ["roomdeets"]=>
      array(1) {
        [57]=>
        array(11) {
          ["room_uid"]=>
          string(2) "57"
          ["black_booking"]=>
          NULL
          ["reception_booking"]=>
          string(1) "1"
          ["internet_booking"]=>
          string(1) "0"
          ["room_classes_uid"]=>
          string(1) "5"
          ["room_name"]=>
          NULL
          ["room_number"]=>
          NULL
          ["room_floor"]=>
          NULL
          ["max_people"]=>
          string(2) "10"
          ["singleperson_suppliment"]=>
          string(1) "0"
          ["rate_title"]=>
          string(6) "Tariff"
        }
      }
      ["guesttype"]=>
      array(0) {
      }
      ["notedeets"]=>
      array(1) {
        [4]=>
        array(3) {
          ["id"]=>
          string(1) "4"
          ["timestamp"]=>
          string(19) "2020-02-21 12:36:41"
          ["note"]=>
          string(32) " Wiseprice discount not applied "
        }
      }
    }
  }
}

*/
