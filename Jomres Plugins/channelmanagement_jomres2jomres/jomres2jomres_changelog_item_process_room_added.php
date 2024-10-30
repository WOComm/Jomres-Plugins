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

class jomres2jomres_changelog_item_process_room_added
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

		if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			$item_type = "rooms";

			$cross_references = channelmanagement_framework_utilities :: get_cross_references_for_property_uid ( 'jomres2jomres' , $componetArgs->property_uid , $item_type );

			$mapped_dictionary_items = channelmanagement_framework_utilities:: get_mapped_dictionary_items('jomres2jomres', $mapped_to_jomres_only = true);

			if (empty($mapped_dictionary_items["_cmf_list_room_types"]) ) {
				throw new Exception('Room types not mapped yet');
			}

			jr_import('channelmanagement_jomres2jomres_communication');
			$remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/rooms/'.$item->data->property_uid , [] , true );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');
            logging::log_message('Starting room import ', 'JOMRES2JOMRES', 'DEBUG', '');
			if (is_array($response) ) {
				foreach ($response as $room) { // Parse the remote site's rooms
                    logging::log_message('Adding room ', 'JOMRES2JOMRES', 'DEBUG', '');
					if ($room->room_uid == $item->data->room_uid) {
						if (isset($cross_references[$item->data->room_uid])) {  // Does the room already exist locally?
                            logging::log_message('Room already exists locally ', 'JOMRES2JOMRES', 'ERROR', '');
							$room_uid = $cross_references[$item->data->room_uid]['local_id'];
						} else {
                            logging::log_message('Room does not exist locally, we can continue ', 'JOMRES2JOMRES', 'DEBUG', '');
							$room_uid = 0;
						}

						$local_room_type_id = 0;

						foreach ($mapped_dictionary_items["_cmf_list_room_types"] as $room_type ) {
							if ($room_type->remote_item_id == $room->room_type_id ) {
								$local_room_type_id = $room_type->jomres_id;
							}
						}

						if ($local_room_type_id == 0 ) {
                            logging::log_message('Cannot find local room type for remote room type', 'JOMRES2JOMRES', 'ERROR', '');
							throw new Exception('Cannot find local room type for remote room type' );
						}

						$put_data = array(
							"property_uid"				=> $componetArgs->property_uid,
							"room_uid"					=> $room_uid,
							"room_name"					=> $room->room_name,
							"room_number"				=> $room->room_number,
							"room_type_id"				=> $local_room_type_id,
							"room_features"				=> '',
							"max_people"				=> $room->max_people,
							"singleperson_suppliment"	=> $room->singleperson_suppliment,
							"surcharge"					=> $room->surcharge,
							"tagline"					=> $room->tagline,
							"description"				=> $room->description
						);

                        //logging::log_message('Room add, sending '.serialize($put_data), 'JOMRES2JOMRES', 'DEBUG', '');

						$send_response = $jomres_call_api->send_request(
							"PUT",
							"cmf/property/room",
							$put_data,
                            array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
						);

                        if ( isset($send_response->error_message)) {
                            logging::log_message('Room add, send response '.$send_response->error_message, 'JOMRES2JOMRES', 'ERROR', '');
                            return;
                        }

						if (isset($send_response->data->response->room_uid) && $send_response->data->response->room_uid > 0) {
							channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $item->data->room_uid, $send_response->data->response->room_uid); // Although the api endpoint should create a link we still need this cross referencing for room images
							logging::log_message("Added room ", 'JOMRES2JOMRES', 'DEBUG', '');
							logging::log_message("Component args ", 'JOMRES2JOMRES', 'DEBUG', serialize($componetArgs));
							logging::log_message("Response ", 'JOMRES2JOMRES', 'DEBUG', serialize($send_response));
							$this->success = true;
						} else {
							logging::log_message("Failed to add room ", 'JOMRES2JOMRES', 'ERROR', '');
							logging::log_message("Component args ", 'JOMRES2JOMRES', 'ERROR', serialize($componetArgs));
							logging::log_message("Response ", 'JOMRES2JOMRES', 'ERROR', serialize($send_response));
							$this->success = false;
						}
					}
				}
			} else {
				logging::log_message("Did not get a valid response from parent server", 'JOMRES2JOMRES', 'ERROR' , serialize($response) );
			}
		} else {
			logging::log_message("Property id not set", 'JOMRES2JOMRES', 'INFO' , '' );
		}
		if (!isset($this->success)) {
			$this->success = false;
		}
	}
}



