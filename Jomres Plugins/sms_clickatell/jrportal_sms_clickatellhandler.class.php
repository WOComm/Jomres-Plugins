<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.29
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class jrportal_sms_clickatellhandler
{
    public function __construct()
    {
		//http://api.clickatell.com/http/sendmsg?api_id=xxxx&user=xxxx&password=xxxx&to=xxxx&text=xxxx
        $this->clickatell_api_url = 'http://api.clickatell.com/http/sendmsg?';
		$this->queryResult = false;
        $this->getVars = '';
        $this->errorText = array();
    }

    public function sendQuery()
    {
        if (strlen($this->clickatell_api_url) == 0) {
            $this->setErrorText("Remote server's url not set");

            return false;
        }
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

        $fields_string = '';
        $fields_string .= 'api_id='.urlencode($jrConfig[ 'sms_clickatell_api_id' ]);
        $fields_string .= '&user='.urlencode($jrConfig[ 'sms_clickatell_username' ]);
        $fields_string .= '&password='.urlencode($jrConfig[ 'sms_clickatell_password' ]).'&';
        
		if (!empty($this->getVars)) {
            foreach ($this->getVars as $key => $value) {
                $fields_string .= $key.'='.urlencode($value).'&';
            }
            rtrim($fields_string, '&');
        } else {
            return false;
        }
        
		$this->queryResult = '';

		try 
			{
			$url = $this->clickatell_api_url.$fields_string;

			$client = new GuzzleHttp\Client();

			logging::log_message('Starting guzzle call to '.$url, 'Guzzle', 'DEBUG');
			
			$this->queryResult = $client->request('GET', $url)->getBody()->getContents();
			}
		catch (Exception $e) 
			{
			$jomres_user_feedback = jomres_singleton_abstract::getInstance('jomres_user_feedback');
			$jomres_user_feedback->construct_message(array('message'=>'Could not contact sms clickatell api', 'css_class'=>'alert-danger alert-error'));
			}

        return true;
    }

    public function addField($key, $val)
    {
        $this->getVars[ $key ] = $val;
    }

    public function getResponse()
    {
        return $this->queryResult;
    }

    public function setErrorText($text)
    {
        $this->errorText[ ] = $text;
    }
}
