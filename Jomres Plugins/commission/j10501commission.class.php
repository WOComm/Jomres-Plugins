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

class j10501commission
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}

		$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig           = $siteConfig->get();

		$configurationPanel 			= $componentArgs[ 'configurationPanel' ];
		$lists 							= $componentArgs[ 'lists' ];
				
		$configurationPanel->startPanel( jr_gettext( "_JOMRES_STATUS_COMMISSIONS", '_JOMRES_STATUS_COMMISSIONS', false ) );
		
		$configurationPanel->setleft( jr_gettext( '_JRPORTAL_INVOICES_COMMISSION_USE', '_JRPORTAL_INVOICES_COMMISSION_USE', false ) );
		$configurationPanel->setmiddle( $lists['use_commission'] );
		$configurationPanel->setright( jr_gettext( '_JRPORTAL_INVOICES_COMMISSION_USE_DESC', '_JRPORTAL_INVOICES_COMMISSION_USE_DESC', false ) );
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( jr_gettext( '_JRPORTAL_CONFIG_DEFAULT_CRATE', '_JRPORTAL_CONFIG_DEFAULT_CRATE', false ) );
		$configurationPanel->setmiddle( $lists['defaultCrate'] );
		$configurationPanel->setright( jr_gettext( '_JRPORTAL_CONFIG_DEFAULT_CRATE_DESC', '_JRPORTAL_CONFIG_DEFAULT_CRATE_DESC', false ) );
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( jr_gettext( '_JRPORTAL_INVOICES_COMMISSION_MANAGER_TRIGGERS', '_JRPORTAL_INVOICES_COMMISSION_MANAGER_TRIGGERS', false ) );
		$configurationPanel->setmiddle( $lists['manager_bookings_trigger_commission'] );
		$configurationPanel->setright( jr_gettext( '_JRPORTAL_INVOICES_COMMISSION_MANAGER_TRIGGERS_DESC', '_JRPORTAL_INVOICES_COMMISSION_MANAGER_TRIGGERS_DESC', false ) );
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( jr_gettext( '_JRPORTAL_INVOICES_COMMISSION_AUTOSUSPEND', '_JRPORTAL_INVOICES_COMMISSION_AUTOSUSPEND', false ) );
		$configurationPanel->setmiddle( $lists['commission_autosuspend_on_overdue'] );
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( jr_gettext( '_JRPORTAL_INVOICES_COMMISSION_AUTOSUSPEND_THREASHOLD', '_JRPORTAL_INVOICES_COMMISSION_AUTOSUSPEND_THREASHOLD', false ) );
		$configurationPanel->setmiddle( '<input type="text" class="input-large" name="cfg_commission_autosuspend_on_overdue_threashold" value="' . $jrConfig[ 'commission_autosuspend_on_overdue_threashold' ] . '" />' );
		$configurationPanel->setright( jr_gettext( '_JRPORTAL_INVOICES_COMMISSION_AUTOSUSPEND_THREASHOLD_DESC', '_JRPORTAL_INVOICES_COMMISSION_AUTOSUSPEND_THREASHOLD_DESC', false ) );
		$configurationPanel->insertSetting();
	
		$configurationPanel->endPanel();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
