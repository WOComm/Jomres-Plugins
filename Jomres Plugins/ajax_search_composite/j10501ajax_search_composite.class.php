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

class j10501ajax_search_composite
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



        if (!isset( $jrConfig['asc_template_style'])) {
            $jrConfig['asc_template_style'] = "multiselect";
        }

		$template_styles = array();
        if ( jomres_bootstrap_version() != 5) {
            $template_styles[] = jomresHTML::makeOption( 'buttons', jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS','_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',FALSE) );
            $template_styles[] = jomresHTML::makeOption( 'modals', jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS','_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',FALSE) );
            $template_styles[] = jomresHTML::makeOption( 'accordion', jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION','_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',FALSE) );
        }

		$template_styles[] = jomresHTML::makeOption( 'multiselect', jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT','_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',FALSE) );
		$template_style = jomresHTML::selectList( $template_styles, 'cfg_asc_template_style','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_template_style']);

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->startPanel(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', '_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', false));
		
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', false));
		$configurationPanel->setmiddle($template_style);
		$configurationPanel->setright(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', false));
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_date'])) {
            $jrConfig['asc_by_date'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_date','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_date']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_guestnumber'])) {
            $jrConfig['asc_by_guestnumber'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_guestnumber','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_guestnumber']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_propertytype'])) {
            $jrConfig['asc_by_propertytype'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_propertytype','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_propertytype']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_roomtype'])) {
            $jrConfig['asc_by_roomtype'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_roomtype','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_roomtype']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_town'])) {
            $jrConfig['asc_by_town'] = "0";
        }

        $configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_town','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_town']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_region'])) {
            $jrConfig['asc_by_region'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_region','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_region']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_country'])) {
            $jrConfig['asc_by_country'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_country','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_country']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_features'])) {
            $jrConfig['asc_by_features'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_features','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_features']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_price'])) {
            $jrConfig['asc_by_price'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_price','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_price']));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig['asc_by_stars'])) {
            $jrConfig['asc_by_stars'] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', '_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_asc_by_stars','class="inputbox" size="1"', 'value', 'text', $jrConfig['asc_by_stars']));
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
