<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.7.0
 *
 * @copyright	2005-2023 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	#[AllowDynamicProperties]
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 *
	 */

class j00005watcher_manager_delete
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
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;
			return;
		}

		if (isset($componentArgs["task"])) {
			$task =  $componentArgs["task"];
		} else {
			$task = get_showtime('task');
		}


		if ( jomres_cmsspecific_areweinadminarea() && $task == 'delete_user') {
			$cms_user_id = (int)jomresGetParam($_REQUEST, 'cms_user_id', 0);
			if ($cms_user_id >0) {
				$query = "UPDATE #__jomresportal_subscriptions SET `status` = '0' WHERE `cms_user_id` = '" . $cms_user_id . "' LIMIT 1";
				doInsertSql($query, "Updated subscription status to 0");
			}
		}
	}
	

	

	public function getRetVals()
	{
		return null;
	}
}
