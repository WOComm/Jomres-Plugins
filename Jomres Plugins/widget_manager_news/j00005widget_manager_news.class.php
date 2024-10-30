<?php

defined( '_JOMRES_INITCHECK' ) or die( '' );

class j00005widget_manager_news {
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

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

		$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		if ($thisJRUser->accesslevel >= 50) {
			$jomres_widgets->register_widget('06001', 'widget_manager_news', jr_gettext('WIDGET_MANAGER_NEWS_TITLE', 'WIDGET_MANAGER_NEWS_TITLE', false), true);
		}
		
		// Get the user object. In this example we want to check their access level to ensure that they're a property manager or super property manager
		//Access levels
		//50: receptionist
		//70: property manager
		//90: super property manager
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		if ($thisJRUser->accesslevel >= 70) {
			$jomres_menu->add_item(70, jr_gettext('WIDGET_MANAGER_NEWS_TITLE', 'WIDGET_MANAGER_NEWS_TITLE', false), 'widget_manager_news', 'fa-newspaper-o');
		}
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		$jomres_menu->add_admin_item(50, jr_gettext('WIDGET_MANAGER_NEWS_TITLE', 'WIDGET_MANAGER_NEWS_TITLE', false), $task = 'widget_manager_news', 'fa-newspaper-o');
		
	}

	function getRetVals() {
		return null;
		}
	}
