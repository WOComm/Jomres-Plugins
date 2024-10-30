<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.21.4
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

/**
 * @package Jomres\Core\Minicomponents
 *
 * Triggers thin plugin scripts that process changelog queue items
 *
 */

class j06000cron_process_remote_changelog_items
{
	/**
	 *
	 * Constructor
	 *
	 * Main functionality of the Minicomponent
	 *
	 *
	 *
	 */

	public function __construct()
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}
		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
		$channelmanagement_framework_singleton->init(999999999);

		$number_of_attempts_allowed = 5;

		// Let's check that the CM framework plugin is installed. We won't throw an error here as it's possible for this script to run even before the CMF has been setup
		jr_import('channelmanagement_framework_user_accounts');
		if (!class_exists('channelmanagement_framework_user_accounts')) {
			return;
		}

		jr_import('channelmanagement_framework_queue_handling');
		$channelmanagement_framework_queue_handling = new channelmanagement_framework_queue_handling();
		$queue_items = $channelmanagement_framework_queue_handling->get_queue_items();

		// Queue items need to be triggered as asynchronous tasks, fire and forget. Let the task decide if the job completed successfully
		if ( !empty($queue_items) ) {
			foreach ( $queue_items as $item ) {

				if ( (int)$item->attempts <= $number_of_attempts_allowed && (int)$item->completed != 1 ) {
					$target_minicomponent = 'channelmanagement_'.$item->channel_name.'_process_changelog_queue_item';
                   try {
                       logging::log_message("Processed changelog item ".serialize($item), 'CMF', 'DEBUG');
                        if ($MiniComponents->eventSpecificlyExistsCheck('27410',$target_minicomponent)) {
                            $result = $MiniComponents->specificEvent('27410', $target_minicomponent , $item );
                            if ($result) {
                                $channelmanagement_framework_queue_handling->complete_queue_item( $item->id );
                            } else {
                                $channelmanagement_framework_queue_handling->increment_attempts ( $item->id );
                            }
                        }
                    }
                catch (Exception $e) { // We will catch the error here, we won't allow it to bubble up because a bubbled up error may result in the calling script deciding that the property wasn't created properly and delete everything so far created. Instead we will trust the sanity checks at the end to catch the problem

                    }
				}
			}
		}
	}


	public function getRetVals()
	{
		return true;
	}
}