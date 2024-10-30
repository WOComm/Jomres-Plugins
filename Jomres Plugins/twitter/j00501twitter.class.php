<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00501twitter
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		$mrConfig = getPropertySpecificSettings();
		
		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 ) 
			return;
		
		$configurationPanel = $componentArgs[ 'configurationPanel' ];

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
		
		if ( isset($mrConfig[ 'twitter_username' ]) && trim($mrConfig[ 'twitter_username' ]) != "" ) {
			$url = "https://api.twitter.com/1.1/account/verify_credentials.json";
			$requestMethod = 'GET';
			$postfields = array();
			
			$twitter = new TwitterAPIExchange($settings);
			$result = $twitter->buildOauth($url, $requestMethod)
				 ->performRequest();  
			$result = json_decode($result); 
			if (isset($result->errors) ) {
				$result->screen_name = "Error, user could not be authenticated";
			}
		} else {
			$result = new stdClass();
			$result->screen_name = "";
			$mrConfig[ 'twitter_username' ] = "";
		}

		$configurationPanel->startPanel( jr_gettext( "_TWITTER_MANAGER_USERNAME", '_TWITTER_MANAGER_USERNAME', false ) );
		
		$configurationPanel->setleft( jr_gettext( "_TWITTER_MANAGER_USERNAME", '_TWITTER_MANAGER_USERNAME', false ) );
		$configurationPanel->setmiddle( '<input type="text" class="inputbox form-control"  size="5" name="cfg_twitter_username" value="' . $mrConfig[ 'twitter_username' ] . '" />' );
		$configurationPanel->setright( jr_gettext( "_TWITTER_MANAGER_USERNAME_DESC", '_TWITTER_MANAGER_USERNAME_DESC', false )." <a href='https://twitter.com/".$result->screen_name."/' target='_blank' >".$result->screen_name. "</a>" );
		$configurationPanel->insertSetting();

		$configurationPanel->endPanel();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
