<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.29
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j10531acymailing_integration
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
		
		if (!isset($jrConfig[ 'acymailing_enabled' ])) {
			$jrConfig[ 'acymailing_enabled' ] = "0";
		}
		
		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext("_JOMRES_COM_MR_NO",'_JOMRES_COM_MR_NO',false) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext("_JOMRES_COM_MR_YES",'_JOMRES_COM_MR_YES',false) );
		$active = jomresHTML::selectList( $yesno, 'cfg_acymailing_enabled','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'acymailing_enabled' ]);

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading('AcyMailing');
		
		$configurationPanel->insertDescription(jr_gettext('_ACYMAILING_INSTRUCTIONS', '_ACYMAILING_INSTRUCTIONS', false));

		$configurationPanel->setleft(jr_gettext('_JOMCOMP_LASTMINUTE_ACTIVE', '_JOMCOMP_LASTMINUTE_ACTIVE', false));
		$configurationPanel->setmiddle($active);
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_ACYMAILING_LIST_ID', '_ACYMAILING_LIST_ID', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_acymailing_list_id" value="'.$jrConfig[ 'acymailing_list_id' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
