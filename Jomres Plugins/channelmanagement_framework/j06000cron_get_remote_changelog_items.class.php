<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.21.4
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

/**
 * @package Jomres\Core\Minicomponents
 *
 * Triggers thin plugin scripts that pull remote site changelog items, and using the remote site's identifier, stores the changelog item in a table to be processed by a different cron task
 *
 */

class j06000cron_get_remote_changelog_items
{
    /**
     *
     * Constructor
     *
     * Main functionality of the Minicomponent
     *
     *
     *
     */

    public function __construct()
    {
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }

		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
		$channelmanagement_framework_singleton->init(999999999);
        // Let's check that the CM framework plugin is installed. We won't throw an error here as it's possible for this script to run even before the CMF has been setup
        jr_import('channelmanagement_framework_user_accounts');
        if (!class_exists('channelmanagement_framework_user_accounts')) {
            return;
        }

        $MiniComponents->triggerEvent('27400');

    }


    public function getRetVals()
    {
        return null;
    }
}