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

class jomres2jomres_changelog_item_process_tariffs_updated
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			$mapped_dictionary_items = channelmanagement_framework_utilities:: get_mapped_dictionary_items('jomres2jomres', $mapped_to_jomres_only = true);

			if (empty($mapped_dictionary_items["_cmf_list_room_types"]) ) {
				throw new Exception('Room types not mapped yet');
			}

			jr_import('channelmanagement_jomres2jomres_import_prices');

			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$remote_property = $remote_server_communication->communicate( "GET" , '/cmf/property/'.$item->data->property_uid , [] , true );
			$room_info = json_decode(json_encode($remote_property->room_info), true);

			$property_room_types = array();
			$max_guests_in_property = 0;

			if (!empty($room_info)) {

				// First we have to clear the existing tariffs
				jr_import('jomres_call_api');
				$jomres_call_api = new jomres_call_api('system');

				$send_response = $jomres_call_api->send_request(
					"DELETE",
					"cmf/property/tariffs/".$componetArgs->property_uid,
					[],
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				foreach ($room_info['room_types'] as $remote_type_id => $remote_type_details) {
					if (isset($mapped_dictionary_items['_cmf_list_room_types']) && !empty($mapped_dictionary_items['_cmf_list_room_types'])) {
						foreach ($mapped_dictionary_items['_cmf_list_room_types'] as $mapped_item) {
							if ($mapped_item->remote_item_id == $remote_type_id) {
								$arr = $mapped_dictionary_items['_cmf_list_room_types'][$remote_type_id];
								$count = 0;

								foreach ($room_info['rooms_max_people'][$remote_type_id] as $a) { // Not sure yet if I need count
									$count = $count + $a;
									$max_guests = $a;
									$max_guests_in_property = $max_guests_in_property + $a;
								}
								$property_room_types[] = array("amenity" => $arr, "count" => $count, "max_guests" => $max_guests);
							}
						}
					}
				}

				$property_room_types = array_unique($property_room_types, SORT_REGULAR);

                $this->success = true;
				foreach ($property_room_types as $room_types) {
					$remote_room_type_id	= $room_types['amenity']->remote_item_id;
					$local_room_type_id		= $room_types['amenity']->jomres_id;

					$response = channelmanagement_jomres2jomres_import_prices::import_prices( $item->data->manager_id, 'jomres2jomres', $item->data->property_uid , $componetArgs->property_uid, $max_guests_in_property, $local_room_type_id , $remote_room_type_id );
					if ($response == 0 || !isset($response) || is_null($response) ) {
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



