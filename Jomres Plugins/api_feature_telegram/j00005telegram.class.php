<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00005telegram {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		//require_once('vendor/autoload.php');
		//define('TELEGRAM_TOKEN','6303785017:AAFl9cv4JSArfPDKS08fAbcbQJOc9A6dATM');
		}

		/*
		 *
		 *
		 getMe

		 array(2) {
  ["ok"]=>
  bool(true)
  ["result"]=>
  array(7) {
    ["id"]=>
    int(6303785017)
    ["is_bot"]=>
    bool(true)
    ["first_name"]=>
    string(11) "jomres_news"
    ["username"]=>
    string(15) "jomres_news_bot"
    ["can_join_groups"]=>
    bool(true)
    ["can_read_all_group_messages"]=>
    bool(false)
    ["supports_inline_queries"]=>
    bool(false)
  }
}

		 *
		 */
	/**
	#
	 * Must be included in every mini-component
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}

?>