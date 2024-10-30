<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################
//

class j00509wire_transfer {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite=get_showtime('eLiveSite');
		$plugin="wire_transfer";

		$defaultProperty=getDefaultProperty();
		
		$wire_transfer = new jrportal_wire_transfer();
		$wire_transfer->get_wire_transfer($defaultProperty);
		$active=$wire_transfer->wire_transferConfigOptions['active'];

		if ($wire_transfer->wire_transferConfigOptions['active'] == "1")
			$active=jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES');
		else
			$active=jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO');
		$status = 'status=no,toolbar=yes,scrollbars=yes,titlebar=no,menubar=yes,resizable=yes,width=750,height=500,directories=no,location=no';
		$link = JOMRES_SITEPAGE_URL_NOSEF."&task=editGateway&popup=1&plugin=$plugin&tmpl=".get_showtime('tmplcomponent');
		$gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false);
		$pluginLink="<a href=\"javascript:void window.open('".$link."', 'win2', '".$status."');\" title=\"".$plugin."\">".$gatewayname."</a>";
		$button="<img src=\"".$eLiveSite."j00510".$plugin.".gif"."\" border=\"0\"/>";
	    $this->outputArray=array('button'=>$button,'link'=>$pluginLink,'active'=>$active);
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->outputArray;
		}
	}
