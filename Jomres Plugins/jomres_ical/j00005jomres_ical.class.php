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

class j00005jomres_ical {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
			
		if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
			}

		if (!defined('JOMRES_ICAL_FILES_DIR')) {
			define('JOMRES_ICAL_FILES_DIR' , JOMRES_TEMP_ABSPATH.'ical_files');
		}

		if (!is_dir(JOMRES_ICAL_FILES_DIR)) {
			mkdir(JOMRES_ICAL_FILES_DIR);
			if (!is_dir(JOMRES_ICAL_FILES_DIR)) {
				throw new Exception("Cannot make ".JOMRES_ICAL_FILES_DIR." directory, cannot continue.");
			}
		}

		$property_uid = getDefaultProperty();
		
		if ($property_uid > 0)
			{
			$mrConfig = getPropertySpecificSettings($property_uid);
			
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			
			$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');

			if ($mrConfig[ 'is_real_estate_listing' ] != '1' && !get_showtime('is_jintour_property')) 
				{
				if ($thisJRUser->accesslevel >= 70) 
					{
					$jomres_menu->add_item(30, jr_gettext('_JOMRES_ICAL_FEEDS', '_JOMRES_ICAL_FEEDS', false), 'ical_feeds', 'fa-download');
					$jomres_menu->add_item(30, jr_gettext('_JOMRES_ICAL_IMPORT', '_JOMRES_ICAL_IMPORT', false), 'ical_import', 'fa-upload');
					$jomres_menu->add_item(30, jr_gettext('_JOMRES_ICAL_REMOTE_FEED', '_JOMRES_ICAL_REMOTE_FEED', false), 'list_ical_remote_feeds', 'fa-download');
					}
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
