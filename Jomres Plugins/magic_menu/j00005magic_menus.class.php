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

class j00005magic_menus
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
			}
			
		if (!defined('JOMRES_MAGIC_MENU_PLUGIN_DIR'))
			{
			$curr_path = get_showtime('ePointFilepath');
			$new_path = str_replace(JRDS."magic_menu".JRDS,"",$curr_path).JRDS."magic_menu_plugins".JRDS;
			define('JOMRES_MAGIC_MENU_PLUGIN_DIR',$new_path);
			}
		
		if (!is_dir(JOMRES_MAGIC_MENU_PLUGIN_DIR) )
			{
			if (!mkdir(JOMRES_MAGIC_MENU_PLUGIN_DIR))
				{
				define('JOMRES_MAGIC_MENU_CONTINUE',false);
				echo "Couldn't make ".JOMRES_MAGIC_MENU_PLUGIN_DIR." directory. Please create it manually and ensure that apache/your web server has write access to that folder.<br/>";
				}
			else
				define('JOMRES_MAGIC_MENU_CONTINUE',true);
			}
		elseif (!defined('JOMRES_MAGIC_MENU_CONTINUE'))
			define('JOMRES_MAGIC_MENU_CONTINUE',true);
		
		if (!defined('JOMRES_MAGIC_MENU_CONTINUE'))
			return;
			
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		
		$calledByModule = jomresGetParam($_REQUEST, 'calledByModule', '');
		
		if ($calledByModule != '' && $thisJRUser->accesslevel >= 90)
			{
			$url = '';
			
			foreach ($_GET as $key=>$val)
				{
				if ($key != "index.php" && $key != "option" && $key != "tmpl")
					$url .= "&".$key."=".$val;
				}
			
			$tmpBookingHandler = jomres_getSingleton('jomres_temp_booking_handler');
			$tmpBookingHandler->tmpsearch_data['magic_menu_search']= $url;

			$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
			$jomres_menu->add_item(70, jr_gettext('_JOMRES_MAGIC_MENUS_MENUOPTIONS', '_JOMRES_MAGIC_MENUS_MENUOPTIONS', false), 'magic_menu', 'fa-magic');
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
