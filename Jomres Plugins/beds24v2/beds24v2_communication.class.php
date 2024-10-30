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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################
#[AllowDynamicProperties]

class beds24v2_communication
	{
    /*
    The manager api key required by all communications with Beds24
    */
    private $manager_apikey = '';
    
    /*
    The property api key required by all communications with Beds24
    */
    private $property_apikey = '';
    
    /*
    The property api key required by all communications with Beds24
    */
    private $beds24_url = '';

    
	function __construct(){
        $this->beds24_url = 'https://www.beds24.com/api/json/';
		}

        
    public function set_manager_key($apikey = ''){
        if ($apikey == '' ){
            throw new Exception("Manager key not sent to Beds24 communication class");
        }
        $this->manager_apikey = $apikey;
    }
    
    public function set_property_key($property_key = ''){
        if ($property_key == '' ){
            throw new Exception("Property key not sent to Beds24 communication class");
        }
        $this->property_apikey = $property_key;
    }
    
    public function communicate_with_beds24($path , $payload = array() )
		{
        if ($this->manager_apikey == '' ){
            throw new Exception("Manager key not available to Beds24 communication class");
            }
        /* if ($this->property_apikey == '' ){
            throw new Exception("Property key not available to Beds24 communication class");
            } */
        
		$Message = new stdClass;
		
        if (!empty($payload)) {
            foreach ($payload as $key => $value) {
				//$value = str_replace("'","",$value);
				//$value = str_replace("&#39;","",$value);
				$Message->$key = $value;
			}
		}

		$Message->authentication = new stdClass;
		$Message->authentication->apiKey = $this->manager_apikey;
		$Message->authentication->propKey = $this->property_apikey;
		$encoded = json_encode($Message);
		if (!$encoded === false ) {
			$json = "json=".$encoded;
			logging::log_message("Sending request to beds24 : ".$path, 'Beds24v2', 'DEBUG' , $json);
			
			$ch = curl_init( $this->beds24_url.$path );
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded );
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

			$result = curl_exec($ch);
			$info = curl_getinfo($ch);
			curl_close( $ch );
			
			logging::log_message("Received : ".$path, 'Beds24v2', 'DEBUG' , serialize(json_decode($result)) );
			
			if ( $path == 'setBooking' ) {
				if (json_decode($result)) {
					$reply = json_decode($result);
					
					if ($reply->success != 'new booking created' && $reply->success != 'booking modified') {
						logging::log_message("Received error from Beds24 ", 'Beds24v2', 'ERROR' , serialize(json_decode($result)) );
					} else {
						if (isset($reply->bookId)) {
							logging::log_message("Sent booking to Beds24, created new booking number ".$reply->bookId, 'Beds24v2', 'INFO' , serialize(json_decode($result)) );
						} else {
							logging::log_message("Sent booking to Beds24, Booking modified successfully ", 'Beds24v2', 'INFO' , serialize(json_decode($result)) );
						}
						
					}
				} else {
					logging::log_message("Received error from Beds24 ", 'Beds24v2', 'ERROR' , $result);
				}
			}
			
			return $result;
		} else {
			logging::log_message("Failed to json encode data for sending to Beds24 ", 'Beds24v2', 'ERROR' , serialize(json_decode($result)) );
		}

		}
		
	}
