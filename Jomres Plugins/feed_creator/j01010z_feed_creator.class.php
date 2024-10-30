<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j01010z_feed_creator {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$MiniComponents->specificEvent('09000','feed_creator');
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
