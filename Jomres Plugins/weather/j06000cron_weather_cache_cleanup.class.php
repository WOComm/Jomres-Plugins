<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.25
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j06000cron_weather_cache_cleanup
{
	public function __construct()
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;
			return;
		}

		$jomresConfig_secret = get_showtime('secret');

		$cache_path = JOMRES_TEMP_ABSPATH.JRDS.'weather_cache'.JRDS;

		if (is_dir($cache_path)) {
			emptyDir($cache_path);
		}
	}

	// This must be included in every Event/Mini-component
	public function getRetVals()
	{
		return null;
	}
}
