<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00005exchange_rate_conversion_selector {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		
		if ($thisJRUser->accesslevel >= 50) 
			{
			$jomres_menu->add_item(70, jr_gettext('_JOMRES_CURRENCYCONVERSIONTEXT', '_JOMRES_CURRENCYCONVERSIONTEXT', false), 'exchange_rate_conversion_selector', 'fa-money');
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
