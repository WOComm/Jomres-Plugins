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

class j00005commission_start
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
		
		//if commissions are not enabled, no need to go any further
		if ( (int)$jrConfig[ 'use_commission' ] == 0 )
			return;
			
		//admin menu item
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		$jomres_menu->add_admin_item(20, jr_gettext('_JRPORTAL_CPANEL_LISTCRATES', '_JRPORTAL_CPANEL_LISTCRATES', false), $task = 'listcrates', 'fa-percent');
		$jomres_menu->add_admin_item(20, jr_gettext('_JOMRES_COMMISSION_ASSIGN', '_JOMRES_COMMISSION_ASSIGN', false), $task = 'assigncrates', 'fa-list');
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
