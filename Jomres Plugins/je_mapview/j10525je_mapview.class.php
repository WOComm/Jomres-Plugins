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

class j10525je_mapview
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
		$options[] = jomresHTML::makeOption( 'ROADMAP', 'Roadmap' );
		$options[] = jomresHTML::makeOption( 'SATELLITE', 'Satellite' );
		$options[] = jomresHTML::makeOption( 'HYBRID', 'Hybrid' );
		$options[] = jomresHTML::makeOption( 'TERRAIN', 'Terrain' );

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading(jr_gettext('_JRPORTAL_JE_MAPVIEW_TITLE', '_JRPORTAL_JE_MAPVIEW_TITLE', false));
		
		/* $configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HWIDTH', '_JRPORTAL_JE_MAPVIEW_HWIDTH', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_mapview_width" value="'.$jrConfig[ 'mapview_width' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting(); */

        if(!isset($jrConfig[ 'mapview_height' ])) {
            $jrConfig[ 'mapview_height' ] = "1";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HHEIGHT', '_JRPORTAL_JE_MAPVIEW_HHEIGHT', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_mapview_height" value="'.$jrConfig[ 'mapview_height' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_maptype' ])) {
            $jrConfig[ 'mapview_maptype' ] = "ROADMAP";
        }
		$configurationPanel->setleft(jr_gettext('_JOMRES_MAP_MAPTYPE', '_JOMRES_MAP_MAPTYPE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $options, 'cfg_mapview_maptype',' ', 'value', 'text', $jrConfig[ 'mapview_maptype' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_groupmarkers' ])) {
            $jrConfig[ 'mapview_groupmarkers' ] = "1";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_GROUPMARKERS', '_JRPORTAL_JE_MAPVIEW_GROUPMARKERS', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_mapview_groupmarkers',' ', 'value', 'text', $jrConfig[ 'mapview_groupmarkers' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_infoicon' ])) {
            $jrConfig[ 'mapview_infoicon' ] = "1";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HINFOICON', '_JRPORTAL_JE_MAPVIEW_HINFOICON', false));
		$configurationPanel->setmiddle(get_showtime('live_site').' <input type="text" class="input-large" name="cfg_mapview_infoicon" value="'.$jrConfig[ 'mapview_infoicon' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_popupwidth' ])) {
            $jrConfig[ 'mapview_popupwidth' ] = "280";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HPOPUP_WIDTH', '_JRPORTAL_JE_MAPVIEW_HPOPUP_WIDTH', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_mapview_popupwidth" value="'.$jrConfig[ 'mapview_popupwidth' ].'" />');

		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_img_width' ])) {
            $jrConfig[ 'mapview_img_width' ] = "150";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HPROPERTY_IMGWIDTH', '_JRPORTAL_JE_MAPVIEW_HPROPERTY_IMGWIDTH', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_mapview_img_width" value="'.$jrConfig[ 'mapview_img_width' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_img_height' ])) {
            $jrConfig[ 'mapview_img_height' ] = "120";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HPROPERTY_IMGHEIGHT', '_JRPORTAL_JE_MAPVIEW_HPROPERTY_IMGHEIGHT', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_mapview_img_height" value="'.$jrConfig[ 'mapview_img_height' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_show_desc' ])) {
            $jrConfig[ 'mapview_show_desc' ] = "1";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HSHOW_DESCRIPTION', '_JRPORTAL_JE_MAPVIEW_HSHOW_DESCRIPTION', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_mapview_show_desc',' ', 'value', 'text', $jrConfig[ 'mapview_show_desc' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_trim_desc' ])) {
            $jrConfig[ 'mapview_trim_desc' ] = "1";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HTRIM_DESCRIPTION', '_JRPORTAL_JE_MAPVIEW_HTRIM_DESCRIPTION', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_mapview_trim_desc',' ', 'value', 'text', $jrConfig[ 'mapview_trim_desc' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if(!isset($jrConfig[ 'mapview_trim_value' ])) {
            $jrConfig[ 'mapview_trim_value' ] = "1";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_JE_MAPVIEW_HTRIM_VALUE', '_JRPORTAL_JE_MAPVIEW_HTRIM_VALUE', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_mapview_trim_value" value="'.$jrConfig[ 'mapview_trim_value' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
