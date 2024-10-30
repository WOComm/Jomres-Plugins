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

class j00005jomres_charts {
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

		$property_uid = getDefaultProperty();
		
		if ($property_uid > 0) 
			{
			$mrConfig = getPropertySpecificSettings($property_uid);
			
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			
			if ($mrConfig[ 'is_real_estate_listing' ] != '1') 
				{
				if ($thisJRUser->accesslevel >= 70) 
					{
					$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');

					$jomres_widgets->register_widget('06002', 'chart_guests_countries', jr_gettext('_JOMRES_HGUESTS_COUNTRY_DESC', '_JOMRES_HGUESTS_COUNTRY_DESC', false));
					
					if (!get_showtime('is_jintour_property'))
						{
						$jomres_widgets->register_widget('06002', 'chart_occupancy', jr_gettext('_JOMRES_CHART_OCCUPANCY_DESC', '_JOMRES_CHART_OCCUPANCY_DESC', false));
						//$jomres_widgets->register_widget('06002', 'chart_property_visits', Jr_gettext('_JOMRES_HPROPERTY_VISITS_DESC', '_JOMRES_HPROPERTY_VISITS_DESC', false));
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
