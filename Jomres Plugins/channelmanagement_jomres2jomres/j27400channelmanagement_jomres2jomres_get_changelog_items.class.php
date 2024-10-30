<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
* @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

/**
 * @package Jomres\Core\Minicomponents
 *
 * This collects a list of property uids for this channel, and for each property it pulls the changelog items
 *
 */

class j27400channelmanagement_jomres2jomres_get_changelog_items
{
    /**
     *
     * Constructor
     *
     * Main functionality of the Minicomponent
     *
     */

    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
            return;
        }

		$ePointFilepath = get_showtime('ePointFilepath');

		// The event trigger crossref is used to group various webhooks, for example booking_added and blackbooking_added can be handled in the same way by the booking_added script, therefore we will adjust the queue action here
		jr_import('channelmanagement_jomres2jomres_push_event_trigger_crossref');
		$event_trigger_crossref = new channelmanagement_jomres2jomres_push_event_trigger_crossref();
		$comparable_events = $event_trigger_crossref->events;

		$supported_changelog_events = array();
		$dir_contents = get_directory_contents($ePointFilepath);
		foreach ($dir_contents as $file_name ) {
			if ( strstr($file_name , 'jomres2jomres_changelog_item_process_' )) {
				$supported_changelog_events[] = substr($file_name , 37 , -4 );
			}

		}

		jr_import('channelmanagement_framework_queue_handling');
		$channelmanagement_framework_queue_handling = new channelmanagement_framework_queue_handling();

		jr_import('channelmanagement_framework_channels');
		$channelmanagement_framework_channels = new channelmanagement_framework_channels();
		$all_channel_ids = $channelmanagement_framework_channels->get_all_channels_ids();

		$local_properties = array();

		if (!empty($all_channel_ids)) {
			foreach ( $all_channel_ids as $channel_name=>$channel ) {
				foreach ( $channel as $record ) {
					// First we will find our property ids
					$properties = channelmanagement_framework_properties::get_local_property_ids_for_channel(  $record['id'] );
					if (!empty($properties)) {
						$local_properties[$channel_name][ $record['id']] = $properties;
					}
				}
			}
		}

        if (empty($local_properties)) {
            return;
        	}

		if (!isset($local_properties['jomres2jomres']) ) {
			return;
		}

		// This _may_be problematic. We need the manager's cms user id to setup the communication between local and remote, however what happens if there's more than one manager on a site?
        $all_local_jomres2jomres_properties = reset($local_properties['jomres2jomres']);
        $firstkey = key($all_local_jomres2jomres_properties);
        $manager_id = $all_local_jomres2jomres_properties[$firstkey] ["local_cms_user_id"];

		jr_import('channelmanagement_jomres2jomres_communication');
		$remote_server_communication = new channelmanagement_jomres2jomres_communication($manager_id);

		// Jomres2jomres installations are only connected to one parent (although the parent can have many children)
		// Therefore we'll send a request for properties/change/logs and then find those remote ids that we have a record for
		// And then create a queue item for each property

		$response = $remote_server_communication->communicate( "GET" , 'cmf/properties/change/logs' , [] , true );

		$response = (array)$response;

		if (empty($response)) {
			return;
		}


		$all_queue_items = $channelmanagement_framework_queue_handling->get_queue_items();

		$unique_ids = array();
		if (!empty($all_queue_items)) {
			foreach ($all_queue_items as $queue_item ) {
				$unique_ids[] = $queue_item->unique_id;
			}
		}

		// Not sure if this is going to be an issue, however there's the possibility that two super managers could have channels against them
		// so some properties might get processed twice. This should prevent that from happening
		$properties_already_processed = array();

		foreach ($response as $remote_property_uid => $changelog_items ) {
			foreach ($local_properties['jomres2jomres'] as $properties ) {
				foreach ( $properties as $local_property ) {
					if ( $local_property['remote_property_uid'] == $remote_property_uid && !in_array ( $remote_property_uid , $properties_already_processed )) {
						if (!empty($changelog_items)) {

							foreach ($changelog_items as $changelog_item) {
								// Here we will create a unique id based off of the action, channel and time. As the unique_id column is a var_char you can use anything
								// The remote channel returns, so if it passes back a unique id that you want to use, you can. So long as that id is not likely to be
								// the same as that of any other channel.

								// You can store anything you need in the items "thing", so long as you can process it later

								// Because jomres2jomres only has one parent, there's no further identifying information passed
								// to be processed later however you may need to send manager information along to the "thing" so that your processing script
								// Can identify the correct authentication information.

								// Besides those items, everything else is mandatory

								///////////////////////////////////////////////////////////////////////////////
								// If the current action isn't in the supported events array, we can search the
								// comparable events array to see if there's another script that can be used instead

								if ( !in_array ( $changelog_item->action , $supported_changelog_events )) {
									foreach ($comparable_events as $key=>$val) {
										if (in_array( $changelog_item->action , $val )) {
											$note = 'Adjusted event from '.$changelog_item->action;
											$changelog_item->action = $key;

											// We are only changing the webhook event name in the context of this plugin, not across the board, so this should be safe enough
											$changelog_item->webhook_event->webhook_event = $key;
											$changelog_item->webhook_event->webhook_event_note = $note;
										}
									}
								}

								$date_validity_check = strtotime($changelog_item->date);
								if ($date_validity_check && in_array ( $changelog_item->action , $supported_changelog_events )) {

									$new_unique_id = 'jomres2jomres'."_".$changelog_item->action."_".$changelog_item->date;

									if (!in_array( $new_unique_id , $unique_ids ) ) {

										$item = new stdClass();
										$item->remote_property_id	= $remote_property_uid;
										$item->local_property_id	=  $local_property['local_property_uid'];
										$item->thing				= filter_var($changelog_item->action, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK );
										$item->last_updated 		= $changelog_item->date;

										$items[] = array(
											"channel_name" => 'jomres2jomres',
											"local_property_id" => $local_property['local_property_uid'],
											"unique_id" => $new_unique_id,
											"completed" => false,
											"item" => $changelog_item->webhook_event
										);

										foreach ($items as $item) {
											try {
												$channelmanagement_framework_queue_handling->store_queue_item($item);
											} catch (Exception $e) {
												logging::log_message("Failed to get store queue item for channel " . $channel_name . ". Message " . $e->getMessage(), 'JOMRES2JOMRES', 'ERROR', serialize($item));
											}
										}
									}
								}
							}
						}
						$properties_already_processed[] = $remote_property_uid;
					}
				}
			}
		}
    }

    public function getRetVals()
    {
        return null;
    }
}
