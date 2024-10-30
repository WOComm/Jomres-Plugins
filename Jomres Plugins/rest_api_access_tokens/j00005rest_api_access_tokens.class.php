<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 10
* @package Jomres
* @copyright	2005-2023 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00005rest_api_access_tokens
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php')) {
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		}
		else if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php')){
			require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
		}
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		
		if (jomres_cmsspecific_areweinadminarea()) {
			$jomres_menu->add_admin_item(10, jr_gettext('REST_API_ACCESS_TOKENS_MENU_OPTION', 'REST_API_ACCESS_TOKENS_MENU_OPTION', false), $task = 'rest_api_access_tokens', 'fa-list');
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
