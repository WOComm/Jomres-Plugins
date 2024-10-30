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

class jomres2jomres_changelog_item_process_coupon_saved
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			$item_type = "coupons";

			$cross_references = channelmanagement_framework_utilities :: get_cross_references_for_property_uid ( 'jomres2jomres' , $componetArgs->property_uid , $item_type );

			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/list/coupons/'.$item->data->property_uid , [] , true );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			if (is_array($response) ) {
				foreach ($response as $coupon) {
					if ($coupon->coupon_id == $item->data->coupon_id) {
						if (isset($cross_references[$item->data->coupon_id])) {
							$coupon_id = $cross_references[$item->data->coupon_id]['local_id'];
						} else {
							$coupon_id = 0;
						}

						$put_data = array(
							"property_uid" => $componetArgs->property_uid,
							"coupon_id" => $coupon_id,
							"coupon_code" => $coupon->coupon_code,
							"valid_from" => $coupon->valid_from,
							"valid_to" => $coupon->valid_to,
							"amount" => $coupon->amount,
							"is_percentage" => $coupon->ispercentage,
							"roomonly" => $coupon->roomonly,
							"booking_valid_from" => $coupon->booking_valid_from,
							"booking_valid_to" => $coupon->booking_valid_to,
							"guest_uid" => 0 // We can't ensure that guest ids are accurate, so we will not link with any guests
						);

						$send_response = $jomres_call_api->send_request(
							"PUT",
							"cmf/property/coupon",
							$put_data,
                            array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
						);

						if (isset($send_response->data->response->coupon_id) && $send_response->data->response->coupon_id > 0) {
							channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $item->data->coupon_id, $send_response->data->response->coupon_id);
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



