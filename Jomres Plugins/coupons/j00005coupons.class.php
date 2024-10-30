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

class j00005coupons {
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
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		
		if ($property_uid > 0)
			{
			$mrConfig = getPropertySpecificSettings($property_uid);
			
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			
			if ( $thisJRUser->accesslevel >= 70 && $mrConfig[ 'is_real_estate_listing' ] != '1')
				{
				$jomres_menu->add_item(80, jr_gettext('_JRPORTAL_COUPONS_TITLE','_JRPORTAL_COUPONS_TITLE',false), 'listCoupons', 'fa-barcode');
				}
			}
		
		if (jomres_cmsspecific_areweinadminarea()) 
			{
			$jomres_menu->add_admin_item(50, jr_gettext('_JRPORTAL_COUPONS_TITLE', '_JRPORTAL_COUPONS_TITLE', false), $task = 'list_coupons', 'fa-barcode');
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
