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

class j10501external_form
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

        $configurationPanel->startPanel(jr_gettext('EXTERNAL_FORM', 'EXTERNAL_FORM', false));
		
		$configurationPanel->insertDescription(jr_gettext('EXTERNAL_FORM_INFO', 'EXTERNAL_FORM_INFO', false));

		$configurationPanel->setleft(jr_gettext('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'EXTERNAL_FORM_PLUGIN_SHORTCODE', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_external_form_shortcode" value="'.$jrConfig['external_form_shortcode'].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('EXTERNAL_FORM_PLUGIN_ARG1', 'EXTERNAL_FORM_PLUGIN_ARG1', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_external_form_arg1" value="'.$jrConfig[ 'external_form_arg1' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('EXTERNAL_FORM_PLUGIN_ARG2', 'EXTERNAL_FORM_PLUGIN_ARG2', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_external_form_arg2" value="'.$jrConfig[ 'external_form_arg2' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

		$configurationPanel->endPanel();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
