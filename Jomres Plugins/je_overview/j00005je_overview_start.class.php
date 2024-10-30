<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00005je_overview_start {
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
		
		if ($property_uid > 0)
			{
			$mrConfig = getPropertySpecificSettings($property_uid);
			
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			
			$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
			
			$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');

			
			if ($thisJRUser->accesslevel >= 70 && $thisJRUser->accesslevel < 90) //commission invoices are for managers only 
				{
				//commission overview menu
				$jomres_menu->add_item(10, jr_gettext('_JOMRES_HOVERVIEW_COMMISSION_INVOICES', '_JOMRES_HOVERVIEW_COMMISSION_INVOICES', false), 'overview_commission_invoices', 'fa-list');
				
				//commission overview widget
				$jomres_widgets->register_widget('06001', 'overview_commission_invoices', jr_gettext('_JOMRES_HOVERVIEW_COMMISSION_INVOICES', '_JOMRES_HOVERVIEW_COMMISSION_INVOICES', false));
				}
			
			if ($mrConfig[ 'is_real_estate_listing' ] != '1') 
				{
				if ($thisJRUser->accesslevel >= 50) 
					{
					//overview menus
					$jomres_menu->add_item(60, jr_gettext('_JOMRES_HOVERVIEW_CHECKINS', '_JOMRES_HOVERVIEW_CHECKINS', false), 'overview_checkins', 'fa-list');
					$jomres_menu->add_item(60, jr_gettext('_JOMRES_HOVERVIEW_CHECKOUTS', '_JOMRES_HOVERVIEW_CHECKOUTS', false), 'overview_checkouts', 'fa-list');
					$jomres_menu->add_item(60, jr_gettext('_JOMRES_HOVERVIEW_CURRENT_RESIDENTS', '_JOMRES_HOVERVIEW_CURRENT_RESIDENTS', false), 'overview_residents', 'fa-list');
					//$jomres_menu->add_item(1, jr_gettext('_JOMRES_HOVERVIEW', '_JOMRES_HOVERVIEW', false), 'overview', 'fa-eye');
					
					//overview widgets
					$jomres_widgets->register_widget('06001', 'overview_checkins', jr_gettext('_JOMRES_HOVERVIEW_CHECKINS', '_JOMRES_HOVERVIEW_CHECKINS', false));
					$jomres_widgets->register_widget('06001', 'overview_checkouts', jr_gettext('_JOMRES_HOVERVIEW_CHECKOUTS', '_JOMRES_HOVERVIEW_CHECKOUTS', false));
					$jomres_widgets->register_widget('06001', 'overview_residents', jr_gettext('_JOMRES_HOVERVIEW_CURRENT_RESIDENTS', '_JOMRES_HOVERVIEW_CURRENT_RESIDENTS', false));
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
