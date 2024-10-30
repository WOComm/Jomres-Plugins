<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.11.2
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j10531deepl
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
		
		if (!isset($jrConfig[ 'deepl_api_key' ])) {
			$jrConfig[ 'deepl_api_key' ] = '';
		}
		$configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading(jr_gettext('_DEEPL_TITLE', '_DEEPL_TITLE', false));
		
		$configurationPanel->insertDescription(jr_gettext('_DEEPL_DESCRIPTION', '_DEEPL_DESCRIPTION', false));

		$configurationPanel->setleft(jr_gettext('_DEEPL_API_KEY_SETTING', '_DEEPL_API_KEY_SETTING', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_deepl_api_key" value="'.$jrConfig[ 'deepl_api_key' ].'" />');
		$configurationPanel->setright(jr_gettext('_DEEPL_API_KEY_SETTING_DESC', '_DEEPL_API_KEY_SETTING_DESC', false));
		$configurationPanel->insertSetting();
    }


    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
