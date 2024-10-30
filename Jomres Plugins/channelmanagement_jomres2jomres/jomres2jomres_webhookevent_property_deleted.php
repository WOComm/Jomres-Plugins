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

class jomres2jomres_webhookevent_property_deleted
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

         //var_dump($data);exit;
		// var_dump($channel_data);exit;
		// var_dump($managers);exit;
        //var_dump($managers);exit;
		// We need the manager's id, if we can't find it we'll back out

        if ( !isset($data->property_uid) || $data->property_uid == 0 ) {
            throw new Exception ( "Property uid not set");
        }

        $query = "DELETE FROM #__jomres_channelmanagement_framework_changelog_queue_items WHERE property_uid = ".$data->property_uid." ";
        doInsertSql($query);

        $query = "DELETE FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE property_uid = ".$data->property_uid." ";
        doInsertSql($query);

		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
        $channelmanagement_framework_singleton->proxy_manager_id =$data->manager_id;
        $response = $channelmanagement_framework_singleton->rest_api_communicate('jomres2jomres' , 'DELETE' , 'cmf/property/local/'.$data->property_uid );


	}
}