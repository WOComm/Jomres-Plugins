<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.9.12
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j16000removeplugin
{
    public function __construct()
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }
        $debugging = false;
        $pluginName = jomresGetParam($_REQUEST, 'plugin', '');
		$ajax_install = (bool)jomresGetParam($_REQUEST, 'ajax_install', false);
        if ($pluginName == 'subsc<x>riptions') {
            $pluginName = 'subscriptions';
        }
        if (!dropPlugin($pluginName)) {
            echo 'Plugin could not be removed';
        }

        $registry = jomres_singleton_abstract::getInstance('minicomponent_registry');
		unlink ( $registry->registry_file );
		unlink ( JOMRES_TEMP_ABSPATH.'registry_classes.php' );
		
		$registry = jomres_singleton_abstract::getInstance('minicomponent_registry');
		$registry->regenerate_registry();

		emptyDir(JOMRES_CACHE_ABSPATH);

        if (!$debugging && !$ajax_install ) {
            jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL_ADMIN.'&task=showplugins#'.$pluginName));
        } else {
			ob_clean();

			$this->retVals = array("success" => true );
			$this->retVals ['install_button'] = '<a onclick="install_plugin(\''.$pluginName.'\');" class="btn btn-primary" id="install_button_content_'.$pluginName.'" >Install</a>';
			$this->retVals ['uninstall_button'] = '';
			echo json_encode($this->retVals);
		}

    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
