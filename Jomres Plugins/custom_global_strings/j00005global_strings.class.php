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

class j00005global_strings {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$jomresConfig_lang = get_showtime('lang');
		
		if (file_exists($ePointFilepath.'language'.JRDS.$jomresConfig_lang.'.php'))
			require_once($ePointFilepath.'language'.JRDS.$jomresConfig_lang.'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}

		//admin menu item
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		$jomres_menu->add_admin_item(60, jr_gettext('_JOMRES_GLOBALSTRINGS', '_JOMRES_GLOBALSTRINGS', false), $task = 'global_strings', 'fa-globe');
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
