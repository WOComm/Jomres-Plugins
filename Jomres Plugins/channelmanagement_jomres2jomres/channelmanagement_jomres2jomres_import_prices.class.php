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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


class channelmanagement_jomres2jomres_import_prices
{
	
	public static function import_prices(  $manager_id , $channel , $remote_property_id = 0 , $property_uid = 0 , $sleeps = 0 , $local_room_type_id = 0 , $remote_room_type_id = 0  )
	{

		if ( (int)$remote_property_id == 0 ) {
			throw new Exception( jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET','CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET',false) );
		}
		
		if ( (int)$property_uid == 0 ) {
			throw new Exception( "Property uid is not set " );
		}
		
		if ( (int)$sleeps == 0 ) {
			throw new Exception( "Number of persons property sleeps is not set " );
		}

		if ( (int)$local_room_type_id == 0 ) {
			throw new Exception( "Local room type id is not set " );
		}

		if ( (int)$remote_room_type_id == 0 ) {
			throw new Exception( "Remote room type id is not set " );
		}

		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api('system');


        jr_import('channelmanagement_jomres2jomres_communication'); // channelmanagement_jomres2jomres_communication is unique to this thin plugin and is the mechanism for talking to the remote service
        $remote_server_communication = new channelmanagement_jomres2jomres_communication($manager_id);

		// Before we can set more detailed tariffs, we need to set the base price
        // Ask the remote server what the base price is
		$base_price = $remote_server_communication->communicate( 'GET' , 'cmf/property/base/price/'.$remote_property_id ,  array() , true  );

		$post_data = array (
				"property_uid"					=> $property_uid ,
				"base_price"					=> $base_price->price_excluding_vat , // Create a new micromanage tariff
				"rate_title"					=> "Tariff" ,
				"max_people"					=> $sleeps
			);


		$remote_prices = $remote_server_communication->communicate( 'GET' , 'cmf/property/list/prices/'.$remote_property_id ,  array() , true  );
		$remote_prices = json_decode(json_encode($remote_prices), true);

		if ( !empty($remote_prices['tariff_sets'])) {
			$sets_for_this_remote_room_type_id = array();
			foreach ($remote_prices['tariff_sets'] as $tariff_sets ) {
				foreach ($tariff_sets as $tariff_set ) {
					if ($tariff_set['room_type_id'] == $remote_room_type_id ) {
						$sets_for_this_remote_room_type_id [] = $tariff_set;
					}
				}
			}
			unset($remote_prices['tariff_sets']); // We'll free up some memory as this wont be used again

			if (!empty($sets_for_this_remote_room_type_id)) {
				$post_data = array();
				foreach ($sets_for_this_remote_room_type_id as $set ) { // We can cycle through all of the sets without creating multiple mirroring sets here as the tariffinput and mindaysinput arrays should be cumulativiely added to for all the sets in one go

					$post_data['property_uid']				= $property_uid;
					$post_data['tarifftypeid']				= 0;
					$post_data['rate_title']				= filter_var($set['rate_title'], FILTER_SANITIZE_SPECIAL_CHARS);
					$post_data['rate_description']			= '';
					$post_data['maxdays']					= (int)$set['max_days'];
					$post_data['minpeople']					= (int)$set['minpeople'];
					$post_data['maxpeople']					= (int)$set['maxpeople'];
					$post_data['roomclass_uid']				= $local_room_type_id;
					$post_data['dayofweek']					= (int)$set['dayofweek'];
					$post_data['ignore_pppn']				= (int)$set['ignore_pppn'];
					$post_data['allow_we']					= (int)$set['allow_we'];
					$post_data['weekendonly']				= (int)$set['weekendonly'];
					$post_data['minrooms_alreadyselected']	= 0;
					$post_data['maxrooms_alreadyselected']	= 100;

                    // No prizes if you guessed that we only want a year's worth of prices. Any more than that and most servers start whinging about too many post vars and everything grinds to a halt. Change this only if you have full access to both servers and have a clue what you're doing.
                    for ($i = 0; $i < 365; $i++) {
                        if (isset($set['dates'][$i])) {
                            $date = $set['dates'][$i];
                            $epoch = strtotime($date);
                            $post_data['tariffinput'][$epoch] = (float)$set["rate_per_night"]["price_excluding_vat"];
                            $post_data['mindaysinput'][$epoch] = (int)$set['min_days'];
                        }
					}
				}
			}

			$send_response = $jomres_call_api->send_request(
				"PUT",
				'cmf/property/tariff/',
				$post_data,
                array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $remote_property_id ) )
			);
            return $send_response->data->response;
		}
	}
}

