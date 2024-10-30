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

class jomres2jomres_changelog_item_process_property_settings_updated
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			// So far, so good. Let's find the remote site's booking to import it into this system

			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate("GET", '/cmf/property/settings/' . $item->data->property_uid, [], true);

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$success = true;

			if (is_object($response) ) {

				$response = json_decode(json_encode($response), true);

				if (is_array($response)) {

					// One setting that we will not inherit from the parent is api_privacy_off because that's one that allows a parent to share with the child, but the child shouldn't share itself with anybody else
					// If a channel wants to enable it, they can still use the PUT property/settings endpoint and enable it that way
					$response['api_privacy_off'] = 0;

					$put_data = array (
						"property_uid" 			=> $componetArgs->property_uid,
						"params"				=> json_encode($response)
					);

					$settings_response = $jomres_call_api->send_request(
						"PUT"  ,
						"cmf/property/settings" ,
						$put_data ,
                        array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
					);

					if (!isset($settings_response->data->response->success) && $settings_response->data->response->success != true ) {
						$success = false;
						$failed_on = "cmf/property/settings";
					}

					if ($success) {
						logging::log_message("Updated property ".$componetArgs->property_uid, 'JOMRES2JOMRES', 'DEBUG' , '' );

						$this->success = true;
					} else {
						logging::log_message("Failed to update property. Failed on ".$failedon, 'JOMRES2JOMRES', 'ERROR' , '' );
						$this->success = false;

					}
				}
			} else {
				logging::log_message("Did not get a valid response from parent server", 'JOMRES2JOMRES', 'ERROR' , serialize($response) );
			}
		} else {
			logging::log_message("Property not set", 'JOMRES2JOMRES', 'INFO' , '' );
		}
		if (!isset($this->success)) {
			$this->success = false;
		}
	}
}
