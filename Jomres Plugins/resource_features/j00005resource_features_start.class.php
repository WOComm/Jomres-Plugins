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

class j00005resource_features_start
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
		
		//menu
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		
		if (jomres_cmsspecific_areweinadminarea())
			{
			//admin menu item
			$jomres_menu->add_admin_item(90, jr_gettext('_JOMRES_HRESOURCE_FEATURES', '_JOMRES_HRESOURCE_FEATURES', false), $task = 'listRfeatures', 'fa-list');
			}
		else
			{
			$property_uid = getDefaultProperty();
		
			if ($property_uid > 0)
				{
				$mrConfig = getPropertySpecificSettings($property_uid);
				
				$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

				if ($mrConfig[ 'is_real_estate_listing' ] != '1' && $mrConfig[ 'singleRoomProperty' ] != '1' && !get_showtime('is_jintour_property')) 
					{
					if ($thisJRUser->accesslevel >= 70) 
						{
						$jomres_menu->add_item(80, jr_gettext('_JOMRES_HRESOURCE_FEATURES', '_JOMRES_HRESOURCE_FEATURES', false), 'list_resource_features', 'fa-list');
						}
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
