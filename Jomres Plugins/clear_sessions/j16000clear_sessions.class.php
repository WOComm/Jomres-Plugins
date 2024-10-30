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

class j16000clear_sessions
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$query = "TRUNCATE TABLE #__jomres_sessions";
		$result = doInsertSql($query);

			echo '<p class="alert alert-success">'.jr_gettext('_JRPORTAL_CLEAR_SESSIONS_EMPTIED','_JRPORTAL_CLEAR_SESSIONS_EMPTIED',false).'</p>';

		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}