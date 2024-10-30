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

class j00005local_events_start {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		require_once($ePointFilepath."functions.php");

		if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
			}
		
		//admin menu item
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		$jomres_menu->add_admin_item(50, jr_gettext('_JRPORTAL_LOCAL_EVENTS_TITLE', '_JRPORTAL_LOCAL_EVENTS_TITLE', false), $task = 'list_local_events', 'fa-calendar');
		$jomres_menu->add_admin_item(50, jr_gettext('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE', '_JRPORTAL_LOCAL_ATTRACTIONS_TITLE', false), $task = 'list_local_attractions', 'fa-university');
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
