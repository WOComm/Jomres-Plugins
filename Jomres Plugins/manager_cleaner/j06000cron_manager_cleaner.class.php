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

class j06000cron_manager_cleaner {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		// Plugin is designed to query the property manager's xref table, and delete any records that don't have a corresponding user in the Joomla user's table. This allows us to catch users that have been deleted from the CMS database.

		$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
		$jomres_users->get_users();

		foreach ($jomres_users->users as $k => $v)
			{
			if (!isset($jomres_users->all_cms_users[$k]))
				{
				$jomres_users->delete_user($k);
				}
			}
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}
