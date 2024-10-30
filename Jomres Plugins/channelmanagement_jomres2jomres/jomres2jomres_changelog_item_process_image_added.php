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

class jomres2jomres_changelog_item_process_image_added
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			$cross_references = channelmanagement_framework_utilities :: get_cross_references_for_property_uid ( 'jomres2jomres' , $componetArgs->property_uid , '' );

			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/images/'.$item->data->property_uid , [] , true );
			$response = json_decode(json_encode($response), true);

			$resource_type = $item->data->resource_type;

			if ( empty($response['images'][$resource_type])) { // Whatever was there, it aint there now, we'll mark this as successful and return
				$this->success = true;
				return;
			}

			foreach ($response['images'][$resource_type] as $resource_id=>$image_sets) {
				foreach ($image_sets as $index=>$images) {
					if ( isset($images['large']) ) {
						$bang = explode("/" , $images['large']);

						if ( $item->data->added_image == end($bang) ) {
							try {
								// Need to cross reference local thingys with remote thingys resource ids
								if ($resource_type == 'property' || $resource_type == 'slideshow') {
									$local_resource_id = 0;
								} else {
									if ( isset($cross_references[$resource_type][$resource_id]) ) {
										$local_resource_id = $cross_references[$resource_type][$resource_id]['local_id'];
									} else {
										// There's no local cross reference, so nothing that we can associate this image with, giving up, this is terminal
										$this->success = true;
										return;
									}
								}

								$image_url = $response['url'].$images['large'];

								$result = channelmanagement_framework_utilities:: get_image($image_url, $componetArgs->property_uid, $resource_type, $local_resource_id );
								if ($result != false ) {
									$this->success = true;
									return;
								}

							} catch (RequestException $e) {
								return;
							}
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



