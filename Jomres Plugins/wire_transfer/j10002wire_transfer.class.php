<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j10002wire_transfer
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$htmlFuncs =jomres_getSingleton('html_functions');
		$this->cpanelButton=$htmlFuncs->cpanelButton(JOMRES_SITEPAGE_URL_ADMIN.'&task=wire_transfer', 'j00510wire_transfer.gif', jr_gettext('_JRPORTAL_WIRE_TRANSFER_TITLE','_JRPORTAL_WIRE_TRANSFER_TITLE',false,false),"images/",jr_gettext( "_JOMRES_CUSTOMCODE_MENUCATEGORIES_GATEWAYS" , "payment methods" ,false,false));
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->cpanelButton;
		}	
	}
