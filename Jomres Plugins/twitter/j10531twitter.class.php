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

class j10531twitter
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

        if (!isset($jrConfig[ 'twitter_hashtags' ]) ) {
            $jrConfig[ 'twitter_hashtags' ] = '';
        }

        if (!isset($jrConfig[ 'twitter_message' ]) ) {
            $jrConfig[ 'twitter_message' ] = '';
        }

        if (!isset($jrConfig[ 'twitter_access_token' ]) ) {
            $jrConfig[ 'twitter_access_token' ] = '';
        }

        if (!isset($jrConfig[ 'twitter_access_secret' ]) ) {
            $jrConfig[ 'twitter_access_secret' ] = '';
        }

        if (!isset($jrConfig[ 'twitter_consumer_key' ]) ) {
            $jrConfig[ 'twitter_consumer_key' ] = '';
        }

        if (!isset($jrConfig[ 'twitter_consumer_secret' ]) ) {
            $jrConfig[ 'twitter_consumer_secret' ] = '';
        }

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading('Twitter');

		$configurationPanel->setleft(jr_gettext('_TWITTER_HASTAGS', '_TWITTER_HASTAGS', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_twitter_hashtags" value="'.$jrConfig[ 'twitter_hashtags' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_TWITTER_BOOKING_MADE_MESSAGE', '_TWITTER_BOOKING_MADE_MESSAGE', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_twitter_message" value="'.$jrConfig[ 'twitter_message' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_TWITTER_ACCESS_TOKEN', '_TWITTER_ACCESS_TOKEN', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_twitter_access_token" value="'.$jrConfig[ 'twitter_access_token' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_TWITTER_ACCESS_TOKEN_SECRET', '_TWITTER_ACCESS_TOKEN_SECRET', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_twitter_access_secret" value="'.$jrConfig[ 'twitter_access_secret' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_TWITTER_CONSUMER_KEY', '_TWITTER_CONSUMER_KEY', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_twitter_consumer_key" value="'.$jrConfig[ 'twitter_consumer_key' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_TWITTER_CONSUMER_KEY_CONSUMER_SECRET', '_TWITTER_CONSUMER_KEY_CONSUMER_SECRET', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_twitter_consumer_secret" value="'.$jrConfig[ 'twitter_consumer_secret' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
