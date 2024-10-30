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

class j00005featured_listings {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		if (file_exists(get_showtime('ePointFilepath').'language/'.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language/'.get_showtime('lang').'.php');
		else
			{
			if (file_exists(get_showtime('ePointFilepath').'language/en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language/en-GB.php');
			}
		
		//admin menu item
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		$jomres_menu->add_admin_item(50, jr_gettext('_JRPORTAL_FEATUREDLISTINGS_TITLE', '_JRPORTAL_FEATUREDLISTINGS_TITLE', false), $task = 'featured_listings', 'fa-star');
		}

	//Must be included in every mini-component
	function getRetVals()
		{
		return null;
		}
	}
