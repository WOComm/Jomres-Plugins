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

class jomres2jomres_changelog_item_process_review_deleted
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			$item_type = "reviews";

			$cross_references = channelmanagement_framework_utilities :: get_cross_references_for_property_uid ( 'jomres2jomres' , $componetArgs->property_uid , $item_type );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$local_id = 0;
			foreach ($cross_references as $rev) {

				if ($rev["remote_id"] == $item->data->review_uid) {
					$local_id = $rev['local_id'];
				}
			}

			if ($local_id > 0 ) {
				$send_response = $jomres_call_api->send_request(
					"DELETE",
					"cmf/property/review/".$componetArgs->property_uid."/".$local_id ,
					[],
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				if (isset($send_response->data->response) && $send_response->data->response == true ) {
					//channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $local_id, 0 );
					logging::log_message("Deleted review ", 'JOMRES2JOMRES', 'DEBUG', '');
					logging::log_message("Component args ", 'JOMRES2JOMRES', 'DEBUG', serialize($componetArgs));
					logging::log_message("Response ", 'JOMRES2JOMRES', 'DEBUG', serialize($send_response));
					$this->success = true;
				} else {
					logging::log_message("Failed to delete review ", 'JOMRES2JOMRES', 'ERROR', '');
					logging::log_message("Component args ", 'JOMRES2JOMRES', 'ERROR', serialize($componetArgs));
					logging::log_message("Response ", 'JOMRES2JOMRES', 'ERROR', serialize($send_response));
					$this->success = false;
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



