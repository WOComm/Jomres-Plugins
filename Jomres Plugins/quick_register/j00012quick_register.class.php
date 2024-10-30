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

class j00012quick_register
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$task = get_showtime("task");
		
		$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig           = $siteConfig->get();
		
		$jomres_gdpr_optin_consent = new jomres_gdpr_optin_consent();
		if ( !$jomres_gdpr_optin_consent->user_consents_to_storage() ) {
			return;
		}
		
		if ( !isset($jrConfig[ 'quick_register_show_in_frontend' ]) )
			$jrConfig[ 'quick_register_show_in_frontend' ] = "1";
		
		if ( $task != "quick_register" && $jrConfig[ 'quick_register_show_in_frontend' ] == "1" )
			$MiniComponents->specificEvent('06000',"quick_register");

		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
