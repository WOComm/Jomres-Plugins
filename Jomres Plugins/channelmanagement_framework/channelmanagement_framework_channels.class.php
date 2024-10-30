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

/*

User accounts

params is an array, serialized then encrypted before saving, that contains all remote service account details

*/

class channelmanagement_framework_channels
{
	
	function __construct()
	{
		
	}

	/**
	*
	* In two minds about whether or not this should be an api call. On the one hand, it's nice to get a report of all of the user's channels, on the other hand making it an api call which exposes other channels to this one channel breaks the concept of each channel operating in it's own sandbox. Other channels from different suppliers should not know about each other, it's none of their business. For now I'll keep this as it's own query.
	*
	*/
	function get_user_channels ( $cms_user_id = 0 ) 
	{
		if ($cms_user_id ==0 ) {
			throw new Exception ( "channelmanagement_framework_channels - get_user_channels - CMS user id not set");
		}
		
		$query = " SELECT id , channel_name , channel_friendly_name , params , cms_user_id FROM #__jomres_channelmanagement_framework_channels WHERE cms_user_id = ".(int)$cms_user_id;
		$result = doSelectSql($query);

		$channels = array();
		if (!empty($result)) {
			foreach ( $result as $channel) {
				$channels[$channel->channel_name] = array (
					"id" => $channel->id,
					"channel_friendly_name" => jomres_decode($channel->channel_friendly_name),
					"channel_name" => $channel->channel_name,
					"cms_user_id" => $channel->cms_user_id,
					"params" => ''
				);
			}
		}
		return $channels;
	}

	function get_all_channels_ids()
	{
		$query = " SELECT id , channel_name FROM #__jomres_channelmanagement_framework_channels ";
		$result = doSelectSql($query);

		$channels = array();
		if (!empty($result)) {
			foreach ( $result as $channel) {
				$channels[$channel->channel_name][] = array (
					"id" => $channel->id,
					"channel_name" => $channel->channel_name
				);
			}
		}
		return $channels;
	}
}
