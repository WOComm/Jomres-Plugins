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

class j00005auction_house
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
		
		require_once($ePointFilepath.JRDS."functions.php");
		
		set_showtime("auctionhouse_templates_path",get_showtime('ePointFilepath').JRDS."templates".JRDS.find_plugin_template_directory());
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		$jomres_menu->add_item(70, jr_gettext('_JOMRES_AUCTIONHOUSE_TITLE', '_JOMRES_AUCTIONHOUSE_TITLE', false), 'auction_house', 'fa-gavel');
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
