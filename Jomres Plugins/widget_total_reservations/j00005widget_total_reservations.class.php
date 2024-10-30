<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.x
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00005widget_total_reservations {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
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
		
		$property_uid = getDefaultProperty();
		if ($property_uid == 0) {
			return;
		}
		
		$mrConfig = getPropertySpecificSettings($property_uid);

		$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		if ($thisJRUser->accesslevel >= 50) {
			if ($mrConfig[ 'is_real_estate_listing' ] != '1' && !get_showtime('is_jintour_property')) {
				$jomres_widgets->register_widget('06001', 'widget_total_reservations', jr_gettext('WIDGET_TOTAL_RESERVATIONS', 'WIDGET_TOTAL_RESERVATIONS', false), true);
			}
		}
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
