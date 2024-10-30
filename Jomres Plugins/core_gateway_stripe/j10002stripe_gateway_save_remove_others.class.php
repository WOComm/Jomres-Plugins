<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j10002stripe_gateway_save_remove_others
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
        if ( isset($_POST['task']) && $_POST['task'] == 'save_gateway' && $_POST['plugin'] == 'stripe') {
            return; // We're not using this right now, we will see how the override changes in 9.8.27 affect users. Feb 2017
            $query = "SELECT `id`,`plugin`,`setting`,`value` FROM #__jomres_pluginsettings WHERE setting = 'active' AND value = '1'";
            $all_gateways = doSelectSql($query);
            if (!empty($all_gateways)) {
                foreach ($all_gateways as $gateway) {
                    if ($gateway->plugin != "stripe"){
                        $query = "DELETE FROM #__jomres_pluginsettings WHERE id = ".(int)$gateway->id;
                        doInsertSql($query);
                    }
                }
            }
        }
		
		}


	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
