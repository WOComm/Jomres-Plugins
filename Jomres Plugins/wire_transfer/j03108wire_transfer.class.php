<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j03108wire_transfer
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$this->filepath=$ePointFilepath;
		$this->gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'."wire_transfer","Wire Transfer",false,false);
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return array('filepath'=>$this->filepath,'gatewayname'=>$this->gatewayname);
		}		
	}
