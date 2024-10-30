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

class j16000partner_delete
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$cms_userid	= (int)jomresGetParam( $_REQUEST, 'id', 0 );
		
		if ($cms_userid > 0)
			{
			$query = "DELETE FROM #__jomres_partners_discounts WHERE partner_id = ".$cms_userid;
			doInsertSql($query);
			$query = "DELETE FROM #__jomres_partners WHERE cms_userid = ".$cms_userid;
			doInsertSql($query);
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN."&task=partners_choose" ) ,"");
			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}