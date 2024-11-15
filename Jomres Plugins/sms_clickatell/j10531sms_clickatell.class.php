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

class j10531sms_clickatell
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

        if (!isset($jrConfig[ 'sms_clickatell_active' ])) {
            $jrConfig[ 'sms_clickatell_active' ] = "0";
        }

		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext("_JOMRES_COM_MR_NO",'_JOMRES_COM_MR_NO',false) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext("_JOMRES_COM_MR_YES",'_JOMRES_COM_MR_YES',false) );
		$active = jomresHTML::selectList( $yesno, 'cfg_sms_clickatell_active','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'sms_clickatell_active' ]);

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading('Clickatell SMS');
		
		//$configurationPanel->insertDescription(jr_gettext('_JRPORTAL_SMS_CLICKATELL_INSTRUCTIONS', '_JRPORTAL_SMS_CLICKATELL_INSTRUCTIONS', false));

		$configurationPanel->setleft(jr_gettext('_JOMCOMP_WISEPRICE_ACTIVE', '_JOMCOMP_WISEPRICE_ACTIVE', false));
		$configurationPanel->setmiddle($active);
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_SMS_CLICKATELL_USERNAME', '_JRPORTAL_SMS_CLICKATELL_USERNAME', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_sms_clickatell_username" value="'.$jrConfig[ 'sms_clickatell_username' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_SMS_CLICKATELL_PASSWORD', '_JRPORTAL_SMS_CLICKATELL_PASSWORD', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_sms_clickatell_password" value="'.$jrConfig[ 'sms_clickatell_password' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_SMS_CLICKATELL_APIID', '_JRPORTAL_SMS_CLICKATELL_APIID', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_sms_clickatell_api_id" value="'.$jrConfig[ 'sms_clickatell_api_id' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
