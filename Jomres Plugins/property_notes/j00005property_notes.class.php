<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9
* @package Jomres
* @copyright	2005-2018 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00005property_notes {

	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; return;
			}
		
		if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
		else {
			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
			}
		
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		
		if ($thisJRUser->accesslevel >= 50) {
				$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
				$jomres_menu->add_item(1, jr_gettext('PROPERTY_NOTES_TITLE', 'PROPERTY_NOTES_TITLE', false, false), 'property_notes_edit', 'fa-sticky-note-o');

				$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');
				$jomres_widgets->register_widget('06001', 'widget_property_notes', jr_gettext('PROPERTY_NOTES_TITLE', 'PROPERTY_NOTES_TITLE', false), true);
			}
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
