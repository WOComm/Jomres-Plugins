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

class j00005weather {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
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

		$property_uid = getDefaultProperty();
		
		if ($property_uid > 0)
			{
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			
			$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');
			
			if ($thisJRUser->accesslevel >= 50)
				{
				$jomres_widgets->register_widget('06000', 'show_property_weather', jr_gettext('_CURRENT_WEATHER', '_CURRENT_WEATHER', false));
				}
			}
			
			
		if (get_showtime("task") == "rebuildregistry" ) {
			$cache_path = JOMRES_TEMP_ABSPATH.JRDS.'weather_cache'.JRDS;
			
			if (is_dir($cache_path)) {
				emptyDir($cache_path);
            }
		}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
