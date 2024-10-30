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

class j00009user_option_03_exchange_rate_conversion_selector {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$this->cpanelButton=jomres_mainmenu_option(JOMRES_SITEPAGE_URL."&task=exchange_rate_conversion_selector", '', jr_gettext('_JOMRES_CURRENCYCONVERSIONTEXT','_JOMRES_CURRENCYCONVERSIONTEXT',false,false),null,jr_gettext( "_JOMRES_SEARCH_BUTTON" , '_JOMRES_SEARCH_BUTTON' ,false,false) );
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JOMRES_CURRENCYCONVERSIONTEXT', '_JOMRES_CURRENCYCONVERSIONTEXT');

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->cpanelButton;
		}
	}
