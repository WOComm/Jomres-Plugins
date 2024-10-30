<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.20.0
 *
* @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class channelmanagement_framework_singleton
{
	public function __construct()
	{
		jr_import('jomres_call_api');
		
		$this->call_api = new jomres_call_api('system');  // Sets up the system user's data if needed
		$this->current_channels = array();
		$this->manager_id = 0;
		$this->proxy_manager_id = 0;
		// System is a special API user who has godlike abilities, however for each channel, system must also be announced so that API calls that API endpoints make for their own use can also be done.
		$this->register_system_channels();

		$this->current_task = get_showtime("current_webhook_task");
		if ( is_null($this->current_task) || $this->current_task == '') {
			$this->current_task = jomresGetParam($_REQUEST, 'task', '') ;
		}

		// There are only two scenarios we want to initialise this class, 1. If it's a "channelmanagement..." task, or if it's a webhook. If it's a webhook then the webhook watcher will manually run init, otherwise we'll check the name of the task and then initialise
        // Addendum : If we are in Admin area, there's a chance the user isn't a property manager, therefore we don't want to register channels for them
        if (!jomres_cmsspecific_areweinadminarea()) {
            if ( isset( $this->current_task ) && strpos( $this->current_task , "channelmanagement" )  === 0 ) {
                $this->init();
            }
        }
	}

	/*
	
	Channels calling in cannot get a list of all channels in the system for a user, they should not be able to modify other channels. The channel management framework that implements channel plugins, however, is an exception
	Here we will trigger the channel report minicomponents and then use the api to confirm their existence. If they don't exist, we'll create them in the database using POST {{cm_url}}/cmf/channel/announce/{{channel_name}}/{{channel_friendly_name}}
	
	*/
	public function init( $manager_id = 0 )
	{
		logging::log_message($this->current_task." -- "."rest_api_communicate init() initialising manager : ".$manager_id , 'CMF', 'DEBUG' , '' );

		if ( $manager_id === 0 ) {
			$JRUser				= jomres_singleton_abstract::getInstance( 'jr_user' );
			$this->manager_id	= $JRUser->userid;
		} else {
			$this->manager_id	= $manager_id;
		}

		logging::log_message($this->current_task." -- "."rest_api_communicate init() initialised manager_id : ".$this->manager_id , 'CMF', 'DEBUG' , '' );

		jr_import('channelmanagement_framework_channels');
		$channelmanagement_framework_channels = new channelmanagement_framework_channels();
		$user_channels = $channelmanagement_framework_channels->get_user_channels($this->manager_id);

		set_showtime('user_channels' , $user_channels );

		$MiniComponents =jomres_getSingleton('mcHandler');
		// Channels build reports of their existence
		$MiniComponents->triggerEvent('21001');

		// Now we can add channel records for each user/installed channel
		$this->register_channels();
	}

	// The "system" oauth client can be used by Jomres functionality so that one api endpoint can call another api endpoint. To do that it needs it's own channel records assigned to it so first we need to register ourselves with the
	private function register_system_channels()
	{
		$existing_system_channels = $this->get_system_channels();

		$MiniComponents =jomres_getSingleton('mcHandler');
		$MiniComponents->triggerEvent('21001');
		$thin_channels = get_showtime("thin_channels");

		$results = array();
		if (!empty($thin_channels)) {
			foreach ($thin_channels as $channel ) {
				if ( !in_array( $channel['channel_name'] , $existing_system_channels) ) {
					$method = 'POST';
					$endpoint = 'cmf/channel/announce/'.$channel['channel_name'].'/'.urlencode($channel['channel_friendly_name']);

					$results[] = $this->call_api->send_request( $method , $endpoint , [
						'params' => json_encode($channel['features'])
					] ,
						array()
					);
				}
			}
		}

	}

	private function get_system_channels()
	{
		$query = "SELECT channel_name FROM #__jomres_channelmanagement_framework_channels WHERE cms_user_id = 999999999";
		$channel_names = doSelectSql($query);

		$existing_channels = array();
		if (!empty($channel_names)) {
			foreach ( $channel_names as $chan) {
				$existing_channels[] = $chan->channel_name;
			}
		}

		return $existing_channels;
	}

	/*
	 * Before a user can connect to the local API, they need to be associated with a channel
	 * Because we're using the CMF, rather than naked API then the CMF will register the channel on the user's behalf.
	 */
	public function register_channels()
	{
		$MiniComponents =jomres_getSingleton('mcHandler');
		// Channels build reports of their existence
		$MiniComponents->triggerEvent('21001');

		$available_thin_channels = get_showtime("thin_channels");

		if (!empty($available_thin_channels)) {
			foreach ($available_thin_channels as $channel ) {
				try {
					$headers = array ( "X-JOMRES-proxy-id: ".(int)$this->manager_id );

					$method = 'GET';
					$endpoint = 'cmf/channel/announce/'.$channel['channel_name'];  // Endpoint that confirms the channel's existence
					$result = $this->call_api->send_request( $method , $endpoint , array() , $headers);

					if ( isset($result->data->response) && $result->data->response == 0 ) { // The channel does not exist in the CMS
						$method = 'POST';
						$endpoint = 'cmf/channel/announce/'.$channel['channel_name'].'/'.urlencode($channel['channel_friendly_name']);

						$result = $this->call_api->send_request( $method , $endpoint , [
								'params' => json_encode($channel['features'])
							] ,
							$headers
							);
						$channel["channel_id"] = $result->data->response ;
					} else {
						$channel["channel_id"] = $result->data->response ;
					}
					$this->current_channels[ $result->data->response ] = $channel ;
				}
				catch (Exception $e) {
					logging::log_message("Tried to add ".$channel['channel_name']."to database but failed ", 'CMF', 'WARNING');
				}
			}

		}
		
	}
	
	public function rest_api_communicate( $channel_name = '' , $method = 'GET' , $endpoint = ''  , $data = array() )
	{
		if ( $channel_name == '' ) {
			throw new Exception( "Channel not passed" );
		}

		if ( $method == '' ) {
			throw new Exception( "Method not passed" );
		}

		if ( $endpoint == '' ) {
			throw new Exception( "Endpoint not passed" );
		}

		if ( $this->manager_id == 0 ) {
			throw new Exception( "Manager id is incorrect" );
		}

		if ( $this->proxy_manager_id == 0 ) {
			throw new Exception( "Proxy manager id is incorrect" );
		}

		$headers = array ( "X-JOMRES-channel-name: ".$channel_name , "X-JOMRES-proxy-id: ".(int)$this->proxy_manager_id );

		logging::log_message("rest_api_communicate Headers : ".serialize($headers) , 'CMF', 'DEBUG' , '' );

		try {
			$result = $this->call_api->send_request( $method , $endpoint , $data , $headers );
			return $result;
			}
		catch (Exception $e) {
			logging::log_message("Tried to communicate with ".$endpoint." endpoint but failed ", 'CMF', 'WARNING');
		}
	}


}
