<?php

defined( '_JOMRES_INITCHECK' ) or die( '' );

class j00005video_tutorials{
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
	}

	function getRetVals() {
		return null;
		}
	}
