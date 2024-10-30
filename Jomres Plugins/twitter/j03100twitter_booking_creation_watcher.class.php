<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j03100twitter_booking_creation_watcher
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		$contract_uid = $componentArgs[ 'contract_uid' ];
		
		$mrConfig           = getPropertySpecificSettings();
		
		if (!isset($mrConfig[ 'twitter_username' ]) || trim($mrConfig[ 'twitter_username' ]) == '')
			return;
		
		include_once( $ePointFilepath.JRDS. "twitter-api-php-master". JRDS . "TwitterAPIExchange.php");

        if (
            !isset($jrConfig['twitter_access_token']) ||
            !isset($jrConfig['twitter_access_secret']) ||
            !isset($jrConfig['twitter_consumer_key']) ||
            !isset($jrConfig['twitter_consumer_secret'])
        ) {
            return;
        }

		$settings = array(
			'oauth_access_token' => trim($jrConfig['twitter_access_token']),
			'oauth_access_token_secret' => trim($jrConfig['twitter_access_secret']),
			'consumer_key' => trim($jrConfig['twitter_consumer_key']),
			'consumer_secret' => trim($jrConfig['twitter_consumer_secret'])
			);
			
		if ( trim($settings['oauth_access_token']) == "" || trim($settings['oauth_access_token_secret']) == "" || trim($settings['consumer_key']) == "" || trim($settings['consumer_secret']) == "")
			return;
		
		if ( function_exists("get_bitly_shortcode"))
			$url = get_bitly_shortcode(jomresURL( JOMRES_SITEPAGE_URL_NOSEF . "&task=edit_booking&contract_uid=" . $contract_uid ));
		else
			$url = jomresURL( JOMRES_SITEPAGE_URL_NOSEF . "&task=edit_booking&contract_uid=" . $contract_uid );
		
		$tweet_message = jr_gettext("_TWITTER_MANAGER_TWEET",'_TWITTER_MANAGER_TWEET',false)." ".$url;

		$postfields = array(
			'text' => $tweet_message,
			'screen_name' => trim($mrConfig[ 'twitter_username' ])
		);

		$url = "https://api.twitter.com/1.1/direct_messages/new.json";
		$requestMethod = 'POST';
		$twitter = new TwitterAPIExchange($settings);
		$result = $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();  
			
		error_logging ( $result );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
