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

class j00005channelmanagement_framework {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
			
		if (!defined('JOMRES_CHANNEL_DICTIONARIES')) {
			define('JOMRES_CHANNEL_DICTIONARIES' , JOMRES_TEMP_ABSPATH.'dictionaries');
		}

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		if (!isset($jrConfig['api_capable']) || (bool)$jrConfig['api_capable'] === false) {
			return;
		}

		require_once($ePointFilepath.JRDS."vendor".JRDS."autoload.php");
		
		if (!is_dir(JOMRES_CHANNEL_DICTIONARIES)) {
			mkdir(JOMRES_CHANNEL_DICTIONARIES);
			if (!is_dir(JOMRES_CHANNEL_DICTIONARIES)) {
				throw new Exception("Cannot make ".JOMRES_CHANNEL_DICTIONARIES." directory, cannot continue.");
			}
		}
		
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
        if ($thisJRUser->userid ==0) { // WP on startup may not have the user setup yet, so we'll do nowt til the user object is ready
               return;
         }

        if ($thisJRUser->accesslevel < 50 && !jomres_cmsspecific_areweinadminarea() ) {
			return;
		}
		
		if (!defined('JOMRES_API_CMS_ROOT') ) {
			$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
		}

		jr_import('channelmanagement_framework_utilities');
		jr_import('channelmanagement_framework_channels');
		$channelmanagement_framework_channels = new channelmanagement_framework_channels();
		$user_channels = $channelmanagement_framework_channels->get_user_channels($thisJRUser->userid);

		if (!jomres_cmsspecific_areweinadminarea() && !defined('API_STARTED') ) {
			if (!isset($user_channels['jomres_local_ui'])) {
				$call_api = new jomres_call_api('system');
				$manager_id = $thisJRUser->userid;
				$proxy_manager_id = $thisJRUser->userid;

				$method = 'POST';
				$endpoint = 'cmf/channel/announce/jomres_local_ui/'.urlencode("Jomres Local UI");

				$result = $call_api->send_request(
					$method ,
					$endpoint ,
					[
						'params' => json_encode(array()),
					] ,
					[
						'X-JOMRES-PROXY-ID: '.$proxy_manager_id
					]
				);

				if (isset($result->data->response)) { // We have created the channel, let's go ahead and set dummy remote ids for each of the existing properties in the system so that we can use the channel management framework to manage them
					channelmanagement_framework_utilities :: register_local_properties_to_manager ( $manager_id , $result->data->response  );
				}
			}

			$query = "SELECT id FROM #__jomres_channelmanagement_framework_channels WHERE channel_name = 'jomres_local_ui' AND cms_user_id = ".(int)$thisJRUser->userid;
            $channel_id = (int)doSelectSql($query,1);

			if ($channel_id > 0) {
				$query = "SELECT id FROM `#__jomres_channelmanagement_framework_property_uid_xref` WHERE `channel_id` =  ".$channel_id." AND `cms_user_id` = ".(int)$thisJRUser->userid;
				$result = doSelectSql($query);

				if (empty($result)) {
					channelmanagement_framework_utilities :: register_local_properties_to_manager ( $thisJRUser->userid , $channel_id  );
				}
			}
		}

		if (!AJAXCALL) {
			jr_import('jomres_local_tokens');
			$jomres_local_tokens = new jomres_local_tokens();
			$jomres_local_tokens->user_id =  $thisJRUser->userid;

			// Trying really hard here to minimise the number of queries done. We'll only use the get token method if the token doesn't already exist or it has expired
			if (!isset($thisJRUser->params['jomres_local_cmf_ui_token'])) {
				$token = $jomres_local_tokens->get_token( 'jomres_local_cmf_ui_token' , 'Local CMF UI token' , $scope = 'channel_management' );
				$thisJRUser->init_user($thisJRUser->id);
			} else {
				$expired = $jomres_local_tokens->check_token_expired($thisJRUser->params['jomres_local_cmf_ui_token']);
				if ($expired) {
					$token = $jomres_local_tokens->get_token( 'jomres_local_cmf_ui_token' , 'Local CMF UI token' , $scope = 'channel_management' );
					$thisJRUser->init_user($thisJRUser->id);
				}
			}
			unset($token);
		}

		// Local token plugins cannot be removed or viewed by the native api view/edit functionality
		$local_token_plugins = get_showtime('local_token_plugins');
		if (!isset($local_token_plugins)) {
			$local_token_plugins = array();
		}
		if (!in_array('Local CMF UI token' , $local_token_plugins ) ) {
			$local_token_plugins[] = 'Local CMF UI token';
			set_showtime('local_token_plugins',$local_token_plugins);
		}

        $property_uid = 0;
        if ( !jomres_cmsspecific_areweinadminarea() ) {
            $property_uid = getDefaultProperty();
        }

        $jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
        $jomres_menu->add_admin_item(50, jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_TITLE', 'CHANNELMANAGEMENT_FRAMEWORK_TITLE', false), $task = 'channelmanagement_framework', 'fa-share-alt-square');

		if ($property_uid > 0) {
			$mrConfig = getPropertySpecificSettings($property_uid);

			$MiniComponents->triggerEvent('21001');

			$thin_channels = get_showtime("thin_channels");

			if ( ($mrConfig[ 'is_real_estate_listing' ] != '1' && !get_showtime('is_jintour_property')) && !is_null($thin_channels) ){
				if ($thisJRUser->accesslevel >= 70){
					$jomres_menu->add_item(80, jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_TITLE', 'CHANNELMANAGEMENT_FRAMEWORK_TITLE', false), 'channelmanagement_framework', 'fa-sitemap');
					}
				}
			}

			
		// Create the webhook if we need to.
		$manager_uid = 0;
		$url = 'Channel Manager Framework - standard webhook'; // We don't need to set a url, the endpoint will be coded into the webhook script.

		jr_import("webhooks");
		$webhooks = new webhooks( $manager_uid );
		$all_webhooks = $webhooks->get_all_webhooks();
		$webhook_already_exists = false;
		if (!empty($all_webhooks)) {
			foreach ( $all_webhooks as $key=>$val ) {
				if ($val['settings']['url'] == $url ) {
					$webhook_already_exists = true; // A webhook for this site already exists, we will not create a new one
					}
				}
			}

		if (!$webhook_already_exists) {
			$integration_id = 0;

			$webhooks->set_setting( $integration_id , 'url' , $url );
			$webhooks->set_setting( $integration_id , 'authmethod' , 'channelmanagement_framework_webhook' );
			$webhooks->webhooks[$integration_id ]['enabled'] = 1;

			$webhooks->commit_integration($integration_id);
		}

		$url = 'Channel Manager Framework - added property watcher'; // We don't need to set a url, the endpoint will be coded into the webhook script.

		$webhooks = new webhooks( $manager_uid );
		$webhook_already_exists = false;
		if (!empty($all_webhooks)) {
			foreach ( $all_webhooks as $key=>$val ) {
				if ($val['settings']['url'] == $url ) {
					$webhook_already_exists = true; // A webhook for this site already exists, we will not create a new one
				}
			}
		}

		if (!$webhook_already_exists) {
			$integration_id = 0;

			$webhooks->set_setting( $integration_id , 'url' , $url );
			$webhooks->set_setting( $integration_id , 'authmethod' , 'property_added_local_users_update' );
			$webhooks->webhooks[$integration_id ]['enabled'] = 1;

			$webhooks->commit_integration($integration_id);
		}

			$url = 'Channel Manager Framework - deleted property watcher'; // We don't need to set a url, the endpoint will be coded into the webhook script.

			$webhooks = new webhooks( $manager_uid );
			$webhook_already_exists = false;
			if (!empty($all_webhooks)) {
				foreach ( $all_webhooks as $key=>$val ) {
					if ($val['settings']['url'] == $url ) {
						$webhook_already_exists = true; // A webhook for this site already exists, we will not create a new one
					}
				}
			}

			if (!$webhook_already_exists) {
				$integration_id = 0;

				$webhooks->set_setting( $integration_id , 'url' , $url );
				$webhooks->set_setting( $integration_id , 'authmethod' , 'property_deleted_local_users_update' );
				$webhooks->webhooks[$integration_id ]['enabled'] = 1;

				$webhooks->commit_integration($integration_id);
			}

			$url = 'Channel Manager Framework - manager changed'; // We don't need to set a url, the endpoint will be coded into the webhook script.

			$webhooks = new webhooks( $manager_uid );
			$webhook_already_exists = false;
			if (!empty($all_webhooks)) {
				foreach ( $all_webhooks as $key=>$val ) {
					if ($val['settings']['url'] == $url ) {
						$webhook_already_exists = true; // A webhook for this site already exists, we will not create a new one
					}
				}
			}

			if (!$webhook_already_exists) {
				$integration_id = 0;

				$webhooks->set_setting( $integration_id , 'url' , $url );
				$webhooks->set_setting( $integration_id , 'authmethod' , 'manager_changed_local_users_update' );
				$webhooks->webhooks[$integration_id ]['enabled'] = 1;

				$webhooks->commit_integration($integration_id);
			}


		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
