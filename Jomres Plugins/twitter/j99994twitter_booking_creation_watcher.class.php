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

class j99994twitter_booking_creation_watcher
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (isset($MiniComponents->miniComponentData[ '03020' ][ 'insertbooking' ]['contract_uid']))
			{
			$contract_uid = (string)$MiniComponents->miniComponentData[ '03020' ][ 'insertbooking' ]['contract_uid'];
			
			$task = get_showtime("task");
			
			if ( $task	== 'processpayment' && $contract_uid > 0 )
				{
				$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
				$jrConfig = $siteConfig->get();

                if (
                    !isset($jrConfig['twitter_access_token']) ||
                    !isset($jrConfig['twitter_access_secret']) ||
                    !isset($jrConfig['twitter_consumer_key']) ||
                    !isset($jrConfig['twitter_consumer_secret'])
                ) {
                    return;
                }

				include_once( $ePointFilepath.JRDS. "twitter-api-php-master". JRDS . "TwitterAPIExchange.php");
				
				$property_uid = get_showtime("property_uid");
				
				$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
				$current_property_details->gather_data( $property_uid );
				
				$current_contract_details = jomres_singleton_abstract::getInstance( 'basic_contract_details' );
				$current_contract_details->gather_data($contract_uid, $property_uid);



				$settings = array(
					'oauth_access_token' => trim($jrConfig['twitter_access_token']),
					'oauth_access_token_secret' => trim($jrConfig['twitter_access_secret']),
					'consumer_key' => trim($jrConfig['twitter_consumer_key']),
					'consumer_secret' => trim($jrConfig['twitter_consumer_secret'])
					);
				
				if ( trim($settings['oauth_access_token']) == "" || trim($settings['oauth_access_token_secret']) == "" || trim($settings['consumer_key']) == "" || trim($settings['consumer_secret']) == "")
					return;
					
				$hashtags = "#".str_replace(" ","",get_showtime("sitename"));
				$config_hashtags = explode(",",$jrConfig['twitter_hashtags']);
				if ( !empty($config_hashtags))
					{
					foreach ( $config_hashtags as $hashtag )
						{
						$hashtags .= " #".str_replace(" ","",$hashtag); 
						}
					}
					
				if ( function_exists("get_bitly_shortcode"))
					$url = get_bitly_shortcode(jomresURL( JOMRES_SITEPAGE_URL . "&task=viewproperty&property_uid=" . $property_uid ));
				else
					$url = jomresURL( JOMRES_SITEPAGE_URL . "&task=viewproperty&property_uid=" . $property_uid );
				
				$tweet_message = $jrConfig['twitter_message']." ".$current_property_details->property_name." at ".date("H:m:s d-m-Y")." ".$url." ".jr_gettext("_JOMRES_HFROM",'_JOMRES_HFROM',false,false)." ".$current_contract_details->contract[$contract_uid]['guestdeets']['country']." ".$hashtags ;

				$postfields = array(
					'status' => $tweet_message,
					"lat"=>$current_property_details->lat,
					"long"=>$current_property_details->long
				);

				$url = "https://api.twitter.com/1.1/statuses/update.json";
				$requestMethod = 'POST';
				$twitter = new TwitterAPIExchange($settings);
				$result = $twitter->buildOauth($url, $requestMethod)
				 ->setPostfields($postfields)
				 ->performRequest();  
				
				error_logging ( $result );
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
