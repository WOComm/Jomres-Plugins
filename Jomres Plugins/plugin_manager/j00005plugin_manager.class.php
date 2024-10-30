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

class j00005plugin_manager {
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; return;
			}

		if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
		else {
			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
			}

		if (!defined('APP_SERVER')) {
			define('APP_SERVER' , 'https://app.jomres.net/');
		}


		if (_JOMRES_DETECTED_CMS != 'joomla3') { // We don't want plugins from older versions of Joomla. I don't test on it any more, so I don't want to support it.
			$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
			$jomres_menu->add_admin_item(1, 'Upload plugins', $task = 'community_plugins', 'fa-list');
			$jomres_menu->add_admin_item(1, 'Your Community plugins', $task = 'your_plugins', 'fa-list');
		}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

	/**
	 *
	 * @package Jomres\Core\Functions
	 *
	 * Send a query to one of two Jomres servers, either the plugin server or the updates server.
	 *
	 *  Returns the response, un-furtled with (i.e. not json_decoded/unserialized). This functionality was originally devised back in 2009, so significantly pre-dates REST APIs etc.
	 */
	if (!function_exists('queryHubServer')) {
		function queryHubServer()
		{
			$url = APP_SERVER.'jomres/api/plugins_hub/manifests/';

			$response = '';

			try {
				$client = new GuzzleHttp\Client([
					'base_uri' => $url
				]);

				logging::log_message('Starting guzzle call to '.$url.'/', 'Guzzle', 'DEBUG');

				$response = $client->request('GET',$url)->getBody()->getContents();
			} catch (Exception $e) {
				$jomres_user_feedback = jomres_singleton_abstract::getInstance('jomres_user_feedback');
				$jomres_user_feedback->construct_message(array('message'=>'Could not query the updates server', 'css_class'=>'alert-danger alert-error'));
			}

			return $response;
		}
	}

	if (!function_exists('strtoarray')) {
		function strtoarray($a, $t = ''){
			$arr = [];
if (!is_array(($a))) {
	$a = ltrim($a, '[');
	$a = ltrim($a, 'array(');
	$a = rtrim($a, ']');
	$a = rtrim($a, ')');
	$tmpArr = explode(",", $a);
	foreach ($tmpArr as $v) {
		if($t == 'keys'){
			$tmp = explode("=>", $v);
			$k = $tmp[0]; $nv = $tmp[1];
			$k = trim(trim($k), "'");
			$k = trim(trim($k), '"');
			$nv = trim(trim($nv), "'");
			$nv = trim(trim($nv), '"');
			$arr[$k] = $nv;
		} else {
			$v = trim(trim($v), "'");
			$v = trim(trim($v), '"');
			$arr[] = $v;
		}
	}
	return $arr;
			}

		}
	}