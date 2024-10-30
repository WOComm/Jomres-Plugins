<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.29
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j10527local_events
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }

        $siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading(jr_gettext('_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE', '_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE', false));
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS', '_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_local_events_radius" value="'.$jrConfig[ 'local_events_radius' ].'" />');
		$configurationPanel->setright(jr_gettext('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC', '_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC', false));
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
