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

class j16000delete_jintour_profile {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$thisJRUser=jomres_getSingleton('jr_user');
		if (!$thisJRUser->userIsManager)
			return;

		
		$id=jomresGetParam( $_REQUEST, 'id', 0 );
		$defaultProperty=0;
		if ($id>0)
			{
			$query="DELETE FROM #__jomres_jintour_profiles WHERE id = '".(int)$id."' AND property_uid = '".(int)$defaultProperty."'";
			if (!doInsertSql($query) )
				trigger_error ("Unable to delete from profiles table, mysql db failure", E_USER_ERROR);
		
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=jintour"), '' );
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
