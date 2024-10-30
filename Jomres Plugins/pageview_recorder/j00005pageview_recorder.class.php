<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.9.17
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j00005pageview_recorder
{
    public function __construct()
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else {
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php')) {
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
		}

		if (!AJAXCALL) {
			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();
			
			if ( !isset($jrConfig['record_pageviews']) || $jrConfig['record_pageviews'] != '1') {
				return;
			}
			
			jr_import("jomres_pageview_record");
			$jomres_pageview_record = new jomres_pageview_record();
		}
	}

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
