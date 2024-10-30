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

class jomres2jomres_changelog_item_process_plugin_settings_saved
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/plugin/settings/'.$item->data->property_uid , [] , true );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$success = true;

			if (is_object($response) ) {

				$plugin_settings = json_decode(json_encode($response), true);

				if (is_array($plugin_settings)) {
					foreach ($plugin_settings as $plugin=>$settings) {
						// Plugin -----------------------------------------------------------------------------

						if(is_array($settings)) {
							$sets = array();
							foreach ($settings as $k=>$v) {
								if ($k != 'jomres_csrf_token') {
									$sets[$k] = $v;
								}
							}
							$settings = $sets;
						}

						$put_data = array (
							"property_uid" 			=> $componetArgs->property_uid,
							"plugin" 				=> $plugin,
							"params"				=> json_encode($settings)
						);

						$plugin_settings_response = $jomres_call_api->send_request(
							"PUT"  ,
							"cmf/property/plugin/settings" ,
							$put_data ,
                            array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
						);

						if (!isset($plugin_settings_response->data->response->success) && $plugin_settings_response->data->response->success != true ) {
							$success = false;
							$failed_on = "cmf/property/plugin/settings";
						}
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
