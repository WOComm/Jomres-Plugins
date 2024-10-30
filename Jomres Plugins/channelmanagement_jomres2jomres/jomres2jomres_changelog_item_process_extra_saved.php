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

class jomres2jomres_changelog_item_process_extra_saved
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			$item_type = "extras";

			$cross_references = channelmanagement_framework_utilities :: get_cross_references_for_property_uid ( 'jomres2jomres' , $componetArgs->property_uid , $item_type );

			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$remote_tax_rates = $remote_server_communication->communicate( "GET" , '/cmf/list/tax/rates' , [] , true );

			if (!is_array($remote_tax_rates)) {
				throw new Exception( "Can't get remote tax rates" );
			}

			$local = $jomres_call_api->send_request(
				"GET",
				"cmf/list/tax/rates",
				[],
				array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $componetArgs->property_uid ) )
			);

			if (!isset($local->data->response)) {
				throw new Exception( "Can't get local tax rates" );
			}
			$local_tax_rates = $local->data->response;

			// For getting linked room types
			$mapped_dictionary_items = channelmanagement_framework_utilities:: get_mapped_dictionary_items('jomres2jomres', $mapped_to_jomres_only = true);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/list/extras/'.$item->data->property_uid , [] , true );

			if ( is_object($response)) {
				$response = json_decode(json_encode($response), true);
			}

			if (is_array($response) ) {
				foreach ($response as $extra) {
					if ($extra['id'] == $item->data->extras_uid) {
						if (isset($cross_references[$item->data->extras_uid])) {
							$extra_id = $cross_references[$item->data->extras_uid]['local_id'];
						} else {
							$extra_id = 0;
						}

						// Tax rate mapping
						$tax_rate_on_remote_site = false;
						$remote_tax_rate_arr = array();
						foreach ($remote_tax_rates as $tax_rate ) {
							$tax_rate_on_remote_site = $tax_rate;
						}

						$local_tax_rate_id = false;
						foreach ($local_tax_rates as $tax_rate ) {
							if ( $tax_rate->description == $tax_rate_on_remote_site->description ) {
								$local_tax_rate_id = $tax_rate->id;
							}
						}

						// Room type mapping
						$limited_to_room_type = 0;
						if ( $extra['limited_to_room_type'] != 0 ) {
							foreach ( $mapped_dictionary_items['_cmf_list_room_types'] as $map ) {
								if ($map["remote_item_id"] == $extra['limited_to_room_type'] ) {
									$limited_to_room_type = $map["jomres_id"];
								}
							}
							if ($limited_to_room_type == 0) { // If it's still set to zero, despite $extra['limited_to_room_type'] being set, then $extra['limited_to_room_type'] refers to an unmapped room type and we can't proceed
								throw new Exception( "Can't map remote room type id to local room type id" );
							}
						}


						$put_data = array(
							"property_uid" => $componetArgs->property_uid,
							"extra_id" => $extra_id,
							"name" => $extra['name'],
							"description" => $extra['description'],
							"price" => $extra['price'],
							"auto_select" => $extra['auto_select'],
							"tax_rate" => $local_tax_rate_id,  // Need to import tax rates
							"maxquantity" => $extra['maxquantity'],
							"validfrom" => $extra['validfrom'],
							"validto" => $extra['validto'],
							"include_in_property_lists" => $extra['include_in_property_lists'],
							"limited_to_room_type" => $limited_to_room_type,  // Need to find local room types.
							"published" => $extra['published'],
							"model_model" => $extra['model'][0]['model'],
							"model_params" => $extra['model'][0]['params'],
							"model_force" => $extra['model'][0]['force']
						);

						$send_response = $jomres_call_api->send_request(
							"PUT",
							"cmf/property/extra",
							$put_data,
                            array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
						);

						if (isset($send_response->data->response->extra_id) && $send_response->data->response->extra_id > 0) {
							channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $item->data->extras_uid, $send_response->data->response->extra_id);
							logging::log_message("Added extra ", 'JOMRES2JOMRES', 'DEBUG', '');
							logging::log_message("Component args ", 'JOMRES2JOMRES', 'DEBUG', serialize($componetArgs));
							logging::log_message("Response ", 'JOMRES2JOMRES', 'DEBUG', serialize($send_response));
							$this->success = true;
						} else {
							logging::log_message("Failed to add extra ", 'JOMRES2JOMRES', 'ERROR', '');
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



