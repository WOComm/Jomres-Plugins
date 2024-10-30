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

class jomres2jomres_changelog_item_process_rooms_multiple_deleted
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
			$response = json_decode(json_encode($response), true);

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$deleted_room_ids = json_decode($item->data->room_ids);
			if ( !isset($deleted_room_ids) || $deleted_room_ids == false || empty($deleted_room_ids )) {
				throw new Exception('Room ids do not exist');
			}

			foreach ($deleted_room_ids as $room_uid) {
				if (isset($cross_references[$room_uid])) {
					$send_response = $jomres_call_api->send_request(
						"DELETE",
						"cmf/property/room/".$componetArgs->property_uid.'/'.$cross_references[$room_uid]['local_id'],
						[],
                        array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
					);

					if (isset($send_response->data->response) && $send_response->data->response == true ) {
						channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $room_uid , 0 ); // Although the api endpoint should create a link we still need this cross referencing for room images
						logging::log_message("Added coupon ", 'JOMRES2JOMRES', 'DEBUG', '');
						logging::log_message("Component args ", 'JOMRES2JOMRES', 'DEBUG', serialize($componetArgs));
						logging::log_message("Response ", 'JOMRES2JOMRES', 'DEBUG', serialize($send_response));
						$this->success = true;
					} else {
						logging::log_message("Failed to add coupon ", 'JOMRES2JOMRES', 'ERROR', '');
						logging::log_message("Component args ", 'JOMRES2JOMRES', 'ERROR', serialize($componetArgs));
						logging::log_message("Response ", 'JOMRES2JOMRES', 'ERROR', serialize($send_response));
						$this->success = false;
					}
				}
			}
		} else {
			logging::log_message("Property id not set", 'JOMRES2JOMRES', 'INFO' , '' );
		}
		if (!isset($this->success)) {
			$this->success = false;
		}
	}
}



