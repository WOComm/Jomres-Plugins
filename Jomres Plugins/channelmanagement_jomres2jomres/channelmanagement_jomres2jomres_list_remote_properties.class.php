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


class channelmanagement_jomres2jomres_list_remote_properties
{
    function __construct()
	{

	}
    
	function get_remote_properties()
	{
		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
		if ($JRUser->id == 0 ) {
			return;
		}

        jr_import('channelmanagement_jomres2jomres_communication');

		$remote_server_communication = new channelmanagement_jomres2jomres_communication($JRUser->id);

        set_showtime("property_managers_id" ,  $JRUser->id );

        // We need to get the property ids that this manager has access to on the remote server

		$endpoint = '/cmf/properties/all';

		$response = $remote_server_communication->communicate( "GET" , $endpoint , [] , true );

		if (!empty($response) ) {

			foreach ($response as $r) {
				try {
					if ($r->api_privacy_off == 1 ) {
						$new_arr = array(
							"remote_property_id" => '',
							"remote_property_name" => '',
							"remote_property_town" => '',
							"remote_property_region" => '',
							"remote_property_country" => '',
							"remote_property_type_title" => '',
                            "remote_property_published" => '',
                            "remote_property_changelog_item_count" => '',
						);

						if (!isset($r->property_id)) {
							throw new Exception('Property uid not passed');
						}

						if (!isset($r->property_name)) {
							throw new Exception('Property name not passed');
						}

						$new_arr['remote_property_id'] = $r->property_id;
						$new_arr['remote_property_name'] = $r->property_name;
                        $new_arr['remote_property_published'] = (int)$r->published;
                        $new_arr['remote_property_changelog_item_count'] = (int)$r->changelog_item_count;

						if (isset($r->property_town)) {
							$new_arr['remote_property_town'] = $r->property_town;
						}
						if (isset($r->property_region)) {
							$new_arr['remote_property_region'] = $r->property_region;
						}
						if (isset($r->property_country)) {
							$new_arr['remote_property_country'] = $r->property_country;
						}
						if (isset($r->property_type_title)) {
							$new_arr['remote_property_type_title'] = $r->property_type_title;
						}

						$remote_property_ids[] = $new_arr;
					}
				} catch (Exception $e) {
					var_dump($e->getMessage());exit;
				}

			}

			return $remote_property_ids;
		} else {
			return false;
		}


	}


}
