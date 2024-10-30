<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Mapping, get local item types
	** Description | Get the local item types, e.g. room types etc
*/


Flight::route('GET /cmf/location/information/@lat/@long', function($lat , $long )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user( );  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error


	$lat = filter_var($lat, FILTER_SANITIZE_SPECIAL_CHARS);
	$long = filter_var($long, FILTER_SANITIZE_SPECIAL_CHARS);

	cmf_utilities::cache_read($lat.'_'.$long , $general_data = true );


	$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
	$jrConfig = $siteConfig->get();


	try {
		$client = new GuzzleHttp\Client();

		$response = $client->request('GET', 'app.jomres.net/jomres/api/geocoding/information/'.$jrConfig["licensekey"].'/'.$lat.'/'.$long , ['connect_timeout' => 10 , 'verify' => false , 'http_errors' => false] );

		$data = json_decode(stripslashes((string)$response->getBody()));

		}
		catch (GuzzleHttp\Exception\RequestException $e) {
			var_dump($e->getMessage());exit;
			}

		$reply = new stdClass();

		if (isset($data->data->response->country_code)) {
			$reply->country_code = strtoupper(($data->data->response->country_code));
			$reply->region_id = $data->data->response->jomres_region_id;
			cmf_utilities::cache_write( $lat.'_'.$long , "response" , $reply  , $general_data = true  );
		}


	Flight::json( $response_name = "response" , $reply );
	});


