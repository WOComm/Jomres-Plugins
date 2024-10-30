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

class j10527nearby_propertys
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
		
		$units = array();
		$units[] = jomresHTML::makeOption( '0', jr_gettext("_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM",'_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM',false) );
		$units[] = jomresHTML::makeOption( '1', jr_gettext("_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES",'_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES',false) );

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading(jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_TITLE', '_JRPORTAL_NEARBY_PROPERTYS_TITLE', false));
		
		$configurationPanel->insertDescription(jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_INSTRUCTIONS', '_JRPORTAL_NEARBY_PROPERTYS_INSTRUCTIONS', false));

        if (!isset($jrConfig[ 'nearby_prop_enabled' ])) {
            $jrConfig[ 'nearby_prop_enabled' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMCOMP_LASTMINUTE_ACTIVE', '_JOMCOMP_LASTMINUTE_ACTIVE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_nearby_prop_enabled','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'nearby_prop_enabled' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_HRADIUS', '_JRPORTAL_NEARBY_PROPERTYS_HRADIUS', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_nearby_prop_radius" value="'.$jrConfig[ 'nearby_prop_radius' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'nearby_prop_unit' ])) {
            $jrConfig[ 'nearby_prop_unit' ] =0;
        }

		$configurationPanel->setleft('Unit');
		$configurationPanel->setmiddle(jomresHTML::selectList( $units, 'cfg_nearby_prop_unit','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'nearby_prop_unit' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

		if (!isset($jrConfig[ 'nearby_prop_ptype_enabled' ])) {
			$jrConfig[ 'nearby_prop_ptype_enabled' ] = 1;
		}

		$configurationPanel->setleft(jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_HPTYPE_ENABLED', '_JRPORTAL_NEARBY_PROPERTYS_HPTYPE_ENABLED', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_nearby_prop_ptype_enabled','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'nearby_prop_ptype_enabled' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_HLISTLIMIT', '_JRPORTAL_NEARBY_PROPERTYS_HLISTLIMIT', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_nearby_prop_listlimit" value="'.$jrConfig[ 'nearby_prop_listlimit' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
