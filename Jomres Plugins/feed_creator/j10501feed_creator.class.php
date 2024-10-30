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

class j10501feed_creator
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
		$options[] = jomresHTML::makeOption( '1', 'RSS 1.0' );
		$options[] = jomresHTML::makeOption( '2', 'RSS 2.0' );

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->startPanel(jr_gettext('_JRPORTAL_FEED_CREATOR_TITLE', '_JRPORTAL_FEED_CREATOR_TITLE', false));
		
		$configurationPanel->insertDescription(jr_gettext('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS', '_JRPORTAL_FEED_CREATOR_INSTRUCTIONS', false));

        if (!isset($jrConfig[ 'feed_enabled' ])) {
            $jrConfig[ 'feed_enabled' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMCOMP_LASTMINUTE_ACTIVE', '_JOMCOMP_LASTMINUTE_ACTIVE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_feed_enabled','', 'value', 'text', $jrConfig[ 'feed_enabled' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_feedformat' ])) {
            $jrConfig[ 'feed_feedformat' ] = "2";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', '_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $options, 'cfg_feed_feedformat',' ', 'value', 'text', $jrConfig[ 'feed_feedformat' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_feedname' ])) {
            $jrConfig[ 'feed_feedname' ] = "Jomres Feed";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', '_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_feed_feedname" value="'.$jrConfig[ 'feed_feedname' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_feeddesc' ])) {
            $jrConfig[ 'feed_feeddesc' ] = "Jomres Feed";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HFEEDDESC', '_JRPORTAL_FEED_CREATOR_HFEEDDESC', false));
		$configurationPanel->setmiddle('<textarea rows="3" name="cfg_feed_feeddesc" class="input-xxlarge">'.$jrConfig[ 'feed_feeddesc' ].'</textarea>');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_feedfilename' ])) {
            $jrConfig[ 'feed_feedfilename' ] = "feed";
        }
        $configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', '_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_feed_feedfilename" value="'.$jrConfig[ 'feed_feedfilename' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_feedcachetime' ])) {
            $jrConfig[ 'feed_feedcachetime' ] = "86400";
        }
        $configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', '_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_feed_feedcachetime" value="'.$jrConfig[ 'feed_feedcachetime' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_showfeedimage' ])) {
            $jrConfig[ 'feed_showfeedimage' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE', '_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_feed_showfeedimage',' ', 'value', 'text', $jrConfig[ 'feed_showfeedimage' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_feedimageurl' ])) {
            $jrConfig[ 'feed_feedimageurl' ] = JOMRES_IMAGES_RELPATH.'jrlogo.png';
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', '_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', false));
		$configurationPanel->setmiddle(get_showtime('live_site').' <input type="text" class="input-large" name="cfg_feed_feedimageurl" value="'.$jrConfig[ 'feed_feedimageurl' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_showpropertyimage' ])) {
            $jrConfig[ 'feed_showpropertyimage' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE', '_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_feed_showpropertyimage',' ', 'value', 'text', $jrConfig[ 'feed_showpropertyimage' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_showpropertytown' ])) {
            $jrConfig[ 'feed_showpropertytown' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', '_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_feed_showpropertytown',' ', 'value', 'text', $jrConfig[ 'feed_showpropertytown' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_showpropertyregion' ])) {
            $jrConfig[ 'feed_showpropertyregion' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION', '_JRPORTAL_FEED_CREATOR_HPROPERTYREGION', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_feed_showpropertyregion',' ', 'value', 'text', $jrConfig[ 'feed_showpropertyregion' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_showpropertycountry' ])) {
            $jrConfig[ 'feed_showpropertycountry' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', '_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_feed_showpropertycountry',' ', 'value', 'text', $jrConfig[ 'feed_showpropertycountry' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_truncatedesc' ])) {
            $jrConfig[ 'feed_truncatedesc' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', '_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_feed_truncatedesc',' ', 'value', 'text', $jrConfig[ 'feed_truncatedesc' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_truncatedescsize' ])) {
            $jrConfig[ 'feed_truncatedescsize' ] = "300";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', '_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_feed_truncatedescsize" value="'.$jrConfig[ 'feed_truncatedescsize' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'feed_items' ])) {
            $jrConfig[ 'feed_items' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_FEED_CREATOR_HITEMS', '_JRPORTAL_FEED_CREATOR_HITEMS', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_feed_items" value="'.$jrConfig[ 'feed_items' ].'" />');
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
