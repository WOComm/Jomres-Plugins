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

class j00005custom_property_fields
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
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
		
		//menu
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');

		if (jomres_cmsspecific_areweinadminarea()) 
			{
			//admin menu item
			$jomres_menu->add_admin_item(90, jr_gettext('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', '_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', false), $task = 'list_custom_property_fields', 'fa-list');
			}
		else 
			{
			//frontend menu item
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			
			if ($thisJRUser->accesslevel >= 70)
				{
				$jomres_menu->add_item(80, jr_gettext('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', '_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', false), 'custom_property_field_data', 'fa-pencil-square-o');
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
