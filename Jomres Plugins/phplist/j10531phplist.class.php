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

class j10531phplist
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
		
		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext("_JOMRES_COM_MR_NO",'_JOMRES_COM_MR_NO',false) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext("_JOMRES_COM_MR_YES",'_JOMRES_COM_MR_YES',false) );

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading('PHPList');
		
		$configurationPanel->insertDescription(jr_gettext('_PHPLIST_INSTRUCTIONS', '_PHPLIST_INSTRUCTIONS', false));

        if (!isset($jrConfig[ 'phplist_enabled' ])) {
            $jrConfig[ 'phplist_enabled' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMCOMP_LASTMINUTE_ACTIVE', '_JOMCOMP_LASTMINUTE_ACTIVE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_phplist_enabled',' ', 'value', 'text', $jrConfig[ 'phplist_enabled' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'phplist_url' ])) {
            $jrConfig[ 'phplist_url' ] = "";
        }
		$configurationPanel->setleft(jr_gettext('_PHPLIST_HPHPLISTURL', '_PHPLIST_HPHPLISTURL', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_phplist_url" value="'.$jrConfig[ 'phplist_url' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'phplist_user' ])) {
            $jrConfig[ 'phplist_user' ] = "";
        }
		$configurationPanel->setleft(jr_gettext('_PHPLIST_HUSER', '_PHPLIST_HUSER', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_phplist_user" value="'.$jrConfig[ 'phplist_user' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'phplist_pass' ])) {
            $jrConfig[ 'phplist_pass' ] = "";
        }
		$configurationPanel->setleft(jr_gettext('_PHPLIST_HPASS', '_PHPLIST_HPASS', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_phplist_pass" value="'.$jrConfig[ 'phplist_pass' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'phplist_list_id' ])) {
            $jrConfig[ 'phplist_list_id' ] = "";
        }
		$configurationPanel->setleft(jr_gettext('_PHPLIST_HLIST_ID', '_PHPLIST_HLIST_ID', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_phplist_list_id" value="'.$jrConfig[ 'phplist_list_id' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'phplist_skipConfEmail' ])) {
            $jrConfig[ 'phplist_skipConfEmail' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_PHPLIST_HSKIPCONFEMAIL', '_PHPLIST_HSKIPCONFEMAIL', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_phplist_skipConfEmail',' ', 'value', 'text', $jrConfig[ 'phplist_skipConfEmail' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'phplist_html' ])) {
            $jrConfig[ 'phplist_html' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_PHPLIST_HSENDHTMLEMAILS', '_PHPLIST_HSENDHTMLEMAILS', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_phplist_html',' ', 'value', 'text', $jrConfig[ 'phplist_html' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'phplist_attr1' ])) {
            $jrConfig[ 'phplist_attr1' ] = "";
        }
		$configurationPanel->setleft(jr_gettext('_PHPLIST_HATTRIB1', '_PHPLIST_HATTRIB1', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_phplist_attr1" value="'.$jrConfig[ 'phplist_attr1' ].'" />');
		$configurationPanel->setright(jr_gettext('_PHPLIST_HATTRIB1_DESC', '_PHPLIST_HATTRIB1_DESC', false));
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'phplist_attr2' ])) {
            $jrConfig[ 'phplist_attr2' ] = "";
        }
		$configurationPanel->setleft(jr_gettext('_PHPLIST_HATTRIB2', '_PHPLIST_HATTRIB2', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_phplist_attr2" value="'.$jrConfig[ 'phplist_attr2' ].'" />');
		$configurationPanel->setright(jr_gettext('_PHPLIST_HATTRIB2_DESC', '_PHPLIST_HATTRIB2_DESC', false));
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
