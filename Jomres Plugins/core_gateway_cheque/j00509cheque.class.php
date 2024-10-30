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
//

class j00509cheque {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$plugin="cheque";

		$defaultProperty=getDefaultProperty();
		$query="SELECT value FROM #__jomres_pluginsettings WHERE prid = '$defaultProperty' AND plugin = '$plugin' AND setting = 'active' AND value = '1'";
		$activeList =doSelectSql($query);
		if (!empty($activeList))
			$active=jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES');
		else
			$active=jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO');
		$status = 'status=no,toolbar=yes,scrollbars=yes,titlebar=no,menubar=yes,resizable=yes,width=750,height=500,directories=no,location=no';
		$link = JOMRES_SITEPAGE_URL_NOSEF."&task=editGateway&popup=1&tmpl=".get_showtime("tmplcomponent")."&plugin=$plugin";
		$gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false);
		$pluginLink="<a class=\"btn btn-primary\" href=\"javascript:void window.open('".$link."', 'win2', '".$status."');\" title=\"".$plugin."\">".jr_gettext('COMMON_EDIT' , 'COMMON_EDIT' , false)." ".$gatewayname."</a>";
		$button="<IMG SRC=\"".get_showtime('eLiveSite')."j00510".$plugin.".gif"."\" border=\"0\">";
	    $this->outputArray=array('button'=>$button,'link'=>$pluginLink,'active'=>$active);
		}

	function touch_template_language()
		{
		$plugin="cheque";
		echo jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin));
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->outputArray;
		}
	}
