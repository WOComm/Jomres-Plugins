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

class jomres2jomres_changelog_item_process_image_deleted
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			$cross_references = channelmanagement_framework_utilities:: get_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, '');

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$send_response = $jomres_call_api->send_request(
				"GET",
				"cmf/property/images/" . $componetArgs->property_uid,
				[],
                array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
			);

			$local_images = $response = json_decode(json_encode($send_response), true);

			$resource_type = $item->data->resource_type;

			if ( isset($local_images['data']['response']['images'][$resource_type])) {
				if (empty($local_images['data']['response']['images'][$resource_type])) {
					$this->success = true;
					return;
				}
				foreach ($local_images['data']['response']['images'][$resource_type] as $resource_id => $image_sets ) {
					foreach ($image_sets as $images ) {
						$bang = explode("/" , $images['large']);
						$file_name = end($bang);

						if ($file_name == $item->data->deleted_image) {
							$result = channelmanagement_framework_utilities::delete_image ($file_name ,$componetArgs->property_uid , $resource_type , $resource_id );
							$this->success = true;
							return;
						}
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



