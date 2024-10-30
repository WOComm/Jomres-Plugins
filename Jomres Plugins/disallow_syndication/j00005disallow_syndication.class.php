<?php

defined( '_JOMRES_INITCHECK' ) or die( '' );

class j00005disallow_syndication {
	function __construct() {
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) { $this->template_touchable=false; return; }
		
		$ePointFilepath = get_showtime('ePointFilepath');

		// Include the language file.
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php')) {
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		}
		else {
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php')) {
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
		}

 		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		$jomres_menu->add_admin_item(70, jr_gettext('DISALLOW_SYNDICATION_TITLE', 'DISALLOW_SYNDICATION_TITLE', false), 'disallow_syndication', 'fa-arrows-h');
	}

	function getRetVals() {
		return null;
		}
	}
