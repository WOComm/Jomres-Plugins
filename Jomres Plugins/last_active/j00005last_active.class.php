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

class j00005last_active
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

		$property_uid = getDefaultProperty();
		
		if ($property_uid > 0) 
			{
			$mrConfig = getPropertySpecificSettings($property_uid);
			
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			
			if ($thisJRUser->accesslevel >= 50 && $mrConfig[ 'is_real_estate_listing' ] != '1') 
				{
				$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');

				$jomres_widgets->register_widget('06001', 'last_active', jr_gettext('_JOMRES_LATEST_BOOKINGS', '_JOMRES_LATEST_BOOKINGS', false));
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
