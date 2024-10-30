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

class j10530unpaid_bookings
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
		
		$options = array();
		$options[] = jomresHTML::makeOption( '0', jr_gettext("COMMON_CANCEL",'COMMON_CANCEL',false) );
		$options[] = jomresHTML::makeOption( '1', jr_gettext("COMMON_DELETE",'COMMON_DELETE',false) );
		
		$days = array();
		for ($i=1, $n=30; $i <= $n; $i++) 
			{
			$days[] = jomresHTML::makeOption( $i, $i.' '.jr_gettext('_JOMRES_COM_MR_QUICKRES_STEP4_STAYDAYS_WHOLEDAY', '_JOMRES_COM_MR_QUICKRES_STEP4_STAYDAYS_WHOLEDAY', false));
			}

        $configurationPanel = $componentArgs[ 'configurationPanel' ];
		
		$configurationPanel->insertHeading(jr_gettext('_JRPORTAL_UNPAID_BOOKINGS_TITLE', '_JRPORTAL_UNPAID_BOOKINGS_TITLE', false));
		
		$configurationPanel->insertDescription(jr_gettext('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS', '_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS', false));

        if (!isset($jrConfig[ 'unpaid_b_enabled' ])) {
            $jrConfig[ 'unpaid_b_enabled' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMCOMP_LASTMINUTE_ACTIVE', '_JOMCOMP_LASTMINUTE_ACTIVE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_unpaid_b_enabled','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'unpaid_b_enabled' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'unpaid_b_delete' ])) {
            $jrConfig[ 'unpaid_b_delete' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL', '_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $options, 'cfg_unpaid_b_delete','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'unpaid_b_delete' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'unpaid_b_days' ])) {
            $jrConfig[ 'unpaid_b_days' ] = "3";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE', '_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $days, 'cfg_unpaid_b_days','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'unpaid_b_days' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
