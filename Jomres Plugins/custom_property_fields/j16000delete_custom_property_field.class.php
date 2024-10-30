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

class j16000delete_custom_property_field 
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$uid = intval(jomresGetParam( $_REQUEST, 'uid', 0 ));
		
		if ($uid>0)
			{
			$query = "DELETE FROM #__jomres_custom_property_fields_fields WHERE `id` = ".(int)$uid." ";
			$result = doInsertSql($query,'');

			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN.'&task=list_custom_property_fields'), "" );
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
