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

class j10501share_property
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
		
		//button styles
		$options = array();
		$options[] = jomresHTML::makeOption( 'balloon32', 'balloon32' );
		$options[] = jomresHTML::makeOption( 'balloon48', 'balloon48' );
		$options[] = jomresHTML::makeOption( 'balloon64', 'balloon64' );
		$options[] = jomresHTML::makeOption( 'balloon128', 'balloon128' );
		$options[] = jomresHTML::makeOption( 'starry', 'starry' );
		$options[] = jomresHTML::makeOption( 'orb', 'orb' );
		$options[] = jomresHTML::makeOption( 'pagepeel64', 'pagepeel64' );
		$options[] = jomresHTML::makeOption( 'pagepeel128', 'pagepeel128' );
		$options[] = jomresHTML::makeOption( 'vintagestamps', 'vintagestamps' );
		$options[] = jomresHTML::makeOption( 'aquasmall', 'aquasmall' );
		$options[] = jomresHTML::makeOption( 'aquaticus', 'aquaticus' );
		$options[] = jomresHTML::makeOption( 'big', 'big' );
		$options[] = jomresHTML::makeOption( 'buddycircular', 'buddycircular' );
		$options[] = jomresHTML::makeOption( 'buddyrounded', 'buddyrounded' );
		$options[] = jomresHTML::makeOption( 'circular32', 'circular32' );
		$options[] = jomresHTML::makeOption( 'circular64', 'circular64' );
		$options[] = jomresHTML::makeOption( 'classy', 'classy' );
		$options[] = jomresHTML::makeOption( 'drink', 'drink' );
		$options[] = jomresHTML::makeOption( 'elegant', 'elegant' );
		$options[] = jomresHTML::makeOption( 'handdrawn', 'handdrawn' );
		$options[] = jomresHTML::makeOption( 'isometrica', 'isometrica' );
		$options[] = jomresHTML::makeOption( 'isometricasmall', 'isometricasmall' );
		$options[] = jomresHTML::makeOption( 'small', 'small' );
		$options[] = jomresHTML::makeOption( 'texto', 'texto' );
		$options[] = jomresHTML::makeOption( 'umar', 'umar' );
		$options[] = jomresHTML::makeOption( 'vector', 'vector' );
		$options[] = jomresHTML::makeOption( 'wpzoom24', 'wpzoom24' );
		$options[] = jomresHTML::makeOption( 'wpzoom32', 'wpzoom32' );
		$options[] = jomresHTML::makeOption( 'wpzoom48', 'wpzoom48' );
		$options[] = jomresHTML::makeOption( 'wpzoom64', 'wpzoom64' );
		sort($options);

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->startPanel(jr_gettext('_JRPORTAL_SHARE_PROPERTY_TITLE_SETTINGS', '_JRPORTAL_SHARE_PROPERTY_TITLE_SETTINGS', false));
		
		$configurationPanel->insertDescription(jr_gettext('_JRPORTAL_SHARE_PROPERTY_INSTRUCTIONS', '_JRPORTAL_SHARE_PROPERTY_INSTRUCTIONS', false));

        if (!isset($jrConfig[ 'share_prop_enabled' ])) {
            $jrConfig[ 'share_prop_enabled' ] = "0";
        }
		$configurationPanel->setleft(jr_gettext('_JOMCOMP_LASTMINUTE_ACTIVE', '_JOMCOMP_LASTMINUTE_ACTIVE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_enabled',' ', 'value', 'text', $jrConfig[ 'share_prop_enabled' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_SHARE_PROPERTY_HSTYLE', '_JRPORTAL_SHARE_PROPERTY_HSTYLE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $options, 'cfg_share_prop_style','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_style' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'share_prop_shortURL' ])) {
            $jrConfig[ 'share_prop_shortURL' ] = "";
        }
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_SHARE_PROPERTY_HSHORTURL', '_JRPORTAL_SHARE_PROPERTY_HSHORTURL', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_shortURL','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_shortURL' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'share_prop_Delicious' ])) {
            $jrConfig[ 'share_prop_Delicious' ] = "0";
        }
		$configurationPanel->setleft('Delicious');
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_Delicious','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_Delicious' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'share_prop_Digg' ])) {
            $jrConfig[ 'share_prop_Digg' ] = "0";
        }
		$configurationPanel->setleft('Digg');
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_Digg','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_Digg' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'share_prop_Facebook' ])) {
            $jrConfig[ 'share_prop_Facebook' ] = "0";
        }
		$configurationPanel->setleft('Facebook');
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_Facebook','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_Facebook' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'share_prop_Google' ])) {
            $jrConfig[ 'share_prop_Google' ] = "0";
        }
		$configurationPanel->setleft('Google Bookmarks');
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_Google','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_Google' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'share_prop_StumbleUpon' ])) {
            $jrConfig[ 'share_prop_StumbleUpon' ] = "0";
        }
		$configurationPanel->setleft('StumbleUpon');
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_StumbleUpon','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_StumbleUpon' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'share_prop_Twitter' ])) {
            $jrConfig[ 'share_prop_Twitter' ] = "0";
        }
		$configurationPanel->setleft('Twitter');
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_Twitter','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_Twitter' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

        if (!isset($jrConfig[ 'share_prop_LinkedIn' ])) {
            $jrConfig[ 'share_prop_LinkedIn' ] = "0";
        }
		$configurationPanel->setleft('LinkedIn');
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_share_prop_LinkedIn','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'share_prop_LinkedIn' ]));
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
