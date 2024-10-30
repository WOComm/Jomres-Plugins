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

class j16000hyphen_check {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		// Plugin is designed to scan all properties and any with hyphen html entities in lat or long fields, they are replaced with the real thing
		
		echo jr_gettext('TOOL_HYPHEN_CHECK_DESCRIPTION','TOOL_HYPHEN_CHECK_DESCRIPTION',false )."<br/>";
		
		$query = "SELECT `propertys_uid`, `lat`,`long` FROM #__jomres_propertys WHERE `lat` LIKE '%&#45;%' OR `long` LIKE '%&#45;%' ";
		$properties = doSelectSql($query);
		
		if (!empty($properties)) {
			$number_fixed = 0;
			foreach ($properties as $property ) {
				$lat = str_replace("&#45;" , "-" , $property->lat);
				$long = str_replace("&#45;" , "-" , $property->long);
				$query = "UPDATE #__jomres_propertys SET `lat` = '".$lat."' , `long` = '".$long."' WHERE propertys_uid = ".$property->propertys_uid;
				
				if ( doInsertSql($query)) {
					$number_fixed++;
				}
			}
			echo jr_gettext('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND','TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',false )." ".$number_fixed;
		} else {
			echo jr_gettext('TOOL_HYPHEN_CHECK_DONE_NONEFOUND','TOOL_HYPHEN_CHECK_DONE_NONEFOUND',false );
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
