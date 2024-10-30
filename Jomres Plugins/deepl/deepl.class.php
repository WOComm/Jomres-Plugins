<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.11.2
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
#[AllowDynamicProperties]
class deepl
{
	private static $internal_debugging;

    public function __construct()
    {
        self::$internal_debugging = false;

        $this->init_service();
    }

    public function init_service()
    {
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if (!isset($jrConfig[ 'deepl_api_key' ])) {
			$jrConfig[ 'deepl_api_key' ] = '';
		}
		
		$this->apikey = $jrConfig[ 'deepl_api_key' ];
		
		$this->supported_languages = array (
			"en",
			"de",
			"fr",
			"es",
			"it",
			"nl",
			"pl"
		);
		
		$jomres_language = jomres_singleton_abstract::getInstance('jomres_language');
		$this->language_shortcodes = $jomres_language->get_shortcodes();
		
		$this->already_translated = array();
    }
	
	
	public function get_translation( $raw_string ,  $constant , $target_language ) 
	{
		$target_language_shortcode = array_search ($target_language, $this->language_shortcodes );

		if ($this->apikey == '' ) {
			return $raw_string;
		}
		
		if (!in_array ($target_language_shortcode , $this->supported_languages ) ) {
			return $raw_string;
		}
		
		if ( mb_strtoupper($raw_string, 'utf-8') == $raw_string ) { // A definition has been passed, we don't seem to have default data for the constant therefore we'll just return the "constant".
			return $raw_string;
		}
		
		if (isset($this->already_translated[$constant])) {
			return $this->already_translated[$constant];
		}
		
		
		$string_size = mb_strlen($raw_string, '8bit');
		if ($string_size < 30000 )
			try {
				
				$base_uri =  'https://api.deepl.com/v1/translate';
				
				$client = new GuzzleHttp\Client([
					'base_uri' =>$base_uri
				]);

 				$query_string = '?text='.urlencode($raw_string).'&target_lang='.strtoupper($target_language_shortcode).'&auth_key='.$this->apikey;
				
				logging::log_message('Starting guzzle call to '.$base_uri.$query_string, 'Guzzle', 'DEBUG');
				
				$response = $client->request('GET', $query_string)->getBody()->getContents();
				
				logging::log_message('Received response '.$response, 'Guzzle', 'DEBUG');
				$translation_contents = json_decode($response);
				if ( isset($translation_contents->translations[0]->text) && trim( $translation_contents->translations[0]->text) != '' ) {
					$translation = jomres_sanitise_string($translation_contents->translations[0]->text);
					updateCustomText($constant, $translation, false, 0 );
				} else {
					$translation = "xxx"; // We'll set the translation to an easily recognisable string so that we're not constantly requesting a translation in this run.
				}
				
				$this->already_translated[$constant] = $translation;
			}
			catch (Exception $e) {
				logging::log_message('Failed to query DeepL service for translation for  '.$base_uri.$query_string, 'Guzzle', 'DEBUG');
			}
			
		//$this->supported_languages
	}
	

}
