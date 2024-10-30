<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00005je_custom_html_tab_start {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		require_once($ePointFilepath."je_custom_html_tab.class.php");
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		
		if ($thisJRUser->accesslevel >= 70) 
			{
			$jomres_menu->add_item(80, jr_gettext('_JRPORTAL_JE_CUSTOM_HTML_TAB_TITLE', '_JRPORTAL_JE_CUSTOM_HTML_TAB_TITLE', false), 'je_custom_html_tab', 'fa-pencil-square-o');
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
