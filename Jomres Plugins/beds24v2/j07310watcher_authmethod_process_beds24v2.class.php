<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
#[AllowDynamicProperties]
class j07310watcher_authmethod_process_beds24v2
{
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;
			return;
		}

		// This script will collate and send information to the remote site using the authentication information provided in the componentArgs variable.
		$ePointFilepath=get_showtime('ePointFilepath');
		$this->retVals = false;

		$webhook_messages = $componentArgs['webhook_messages'];
		
		$task =  get_showtime('task');

		$non_processing_tasks = array ( // A number of tasks should not result in webhooks being sent onwards to Beds24. There´s a good chance we will need to add other tasks to this, as I can imagine Beds24 using the API, which will then trigger notifications coming back to them.
			"beds24v2_import_bookings" ,
			"beds24v2_notify" ,
		);

		if (
			!empty($webhook_messages) && 
			!in_array( $task , $non_processing_tasks)
			) {
			$webhook_messages = array_unique( $webhook_messages, SORT_REGULAR ); // Remove duplicate objects

			// The Save normal mode tariffs features will add two webhooks, rooms_multiple_added & tariffs_updated. We don´t need to run them both as this script does both at the same time, so we´ll check to see if both of these webhooks are set, and if they are we´ll discard one.
			$messages = array();
			foreach ( $webhook_messages as $webhook_notification ) {
				$messages[] = $webhook_notification->webhook_event;
			}
			if ( in_array (  "rooms_multiple_added" , $messages ) && in_array (  "rooms_multiple_added" , $messages ) ) {
				unset( $webhook_messages[1] );
			}

			foreach ( $webhook_messages as $webhook_notification ) {
				logging::log_message("Webhook triggered ".$webhook_notification->webhook_event , 'Beds24v2', 'DEBUG' , '' );
				$data = $webhook_notification->data;

				$beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
				
				$is_beds24_property = true;
				if (!$beds24v2_properties->is_this_a_beds24_property($data->property_uid) ) {
					$is_beds24_property = false;
				}

				if (isset($data) && $data !== false && isset($webhook_notification->webhook_event) && $is_beds24_property ) { // The data, whatever it is, has been collected, let's send it off to the remote site
					$data->task = $webhook_notification->webhook_event;
					switch ( $data->task )
						{
						case 'booking_added':
						case 'blackbooking_added';
						case 'booking_modified';
						case 'blackbooking_deleted';
						case 'booking_cancelled';
							$result = $this->update_beds24_with_booking($data);
							// We'll make sure that beds24 and Jomres' availability are synced
							jr_import("beds24v2_room_availability");
							$beds24v2_room_availability = new beds24v2_room_availability($data->property_uid);
							$beds24v2_room_availability->update_room_numbers_to_beds24();
							break;
						case 'rooms_multiple_added':
						case 'room_added';
						case 'room_deleted';
						case 'room_updated';
						case 'tariff_cloned';
						case 'tariffs_updated';
							$this->check_room_counts($data);
							// We'll make sure that beds24 and Jomres' availability are synced
							jr_import("beds24v2_room_availability");
							$beds24v2_room_availability = new beds24v2_room_availability($data->property_uid);
							$beds24v2_room_availability->update_room_numbers_to_beds24();
							break;
						}
				


				}
			}
		}

	logging::log_message("Completed Watcher's run." , 'Beds24v2', 'DEBUG' , '' );
	}
	
	private function check_room_counts( $data ) {
		
		$beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
		$manager_uid		= $beds24v2_keys->watcher_get_manager_uid_for_property_uid($data->property_uid);
		$manager_key		= $beds24v2_keys->get_manager_key($manager_uid);
		$property_apikey	= $beds24v2_keys->get_property_key($data->property_uid , $manager_uid );
		
		if ($manager_key == '' )
			return false;
		if ($property_apikey == '' )
			return false;
		
		$beds24v2_rooms = jomres_singleton_abstract::getInstance('beds24v2_rooms');
		$beds24v2_rooms->set_property_uid($data->property_uid);
		
		$beds24v2_rooms->get_room_type_xref_data();
		$beds24v2_rooms->prepare_data( $manager_key , $property_apikey ); 
		
		if ( !$beds24v2_rooms->compare_room_counts() ){
			
		}
	}
	
	
	private function update_beds24_with_rooms_and_tariffs($data) 
	{
		// We'll make sure that beds24 and Jomres' availability are synced
		jr_import("beds24v2_room_availability");
		$beds24v2_room_availability = new beds24v2_room_availability($data->property_uid);
		$beds24v2_room_availability->update_room_numbers_to_beds24();
	}
	
	private function update_beds24_with_booking($data) 
	{
		logging::log_message("Sending booking to Beds24 " , 'Beds24v2', 'DEBUG' , serialize($data) );
		if (!isset($data->property_uid)) {
			return false;
			}
		if ($data->property_uid == 0 ) {
			return false;
			}
		if (!isset($data->contract_uid)) {
			return false;
			}
		if ($data->contract_uid == 0 ) {
			return false;
			}
		

		$beds24v2_bookings = jomres_singleton_abstract::getInstance('beds24v2_bookings');
		$beds24v2_bookings->set_property_uid($data->property_uid);
		$beds24v2_bookings->update_beds24_with_booking($data);
	}

	
	// This must be included in every Event/Mini-component
	public function getRetVals()
	{
		return $this->retVals;
	}
}
	