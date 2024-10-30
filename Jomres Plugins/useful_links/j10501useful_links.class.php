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

class j10501useful_links
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
		
		$configurationPanel->startPanel(jr_gettext('USEFUL_LINKS_ADMIN', 'USEFUL_LINKS_ADMIN', false));

		$configurationPanel->setleft(jr_gettext('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE', 'USEFUL_LINKS_ADMIN_PROPERTIESFORSALE', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_useful_links_realestate" value="'.$jrConfig[ 'useful_links_realestate' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('USEFUL_LINKS_ADMIN_HOTELS', 'USEFUL_LINKS_ADMIN_HOTELS', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_useful_links_mrp" value="'.$jrConfig[ 'useful_links_mrp' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('USEFUL_LINKS_ADMIN_VILLAS', 'USEFUL_LINKS_ADMIN_VILLAS', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_useful_links_srp" value="'.$jrConfig[ 'useful_links_srp' ].'" />');
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
