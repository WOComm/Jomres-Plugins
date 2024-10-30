<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
* @copyright	2005-2020 Vince Wooll
 * 
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * Processes the webhook, refactor's the data to send the information to the channel
	 * 
	 */

class jomres2jomres_webhookevent_property_created
{	
	public function __construct()
	{
		
	}
	
	public function trigger_event( $webhook_event , $data , $channel_data , $managers , $this_channel ) 
	{
		if ( isset($channel_data['channel_name']) && $channel_data['channel_name'] != '' ) {
			if ($this_channel == $channel_data['channel_name']) {
                throw new Exception ( "Webhook triggered by this channel, will not process further");
			}
		}

        $ePointFilepath=get_showtime('ePointFilepath');

        if ( !isset($data->property_uid) || $data->property_uid == 0 ) {
            throw new Exception ( "Property uid not set");
        }


        // If the manager's channel hasn't already been setup, calling this will do it.
		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
	}
}