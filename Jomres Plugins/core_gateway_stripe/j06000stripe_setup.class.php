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

class j06000stripe_setup
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		if (!$thisJRUser->userIsRegistered)
			{
			$login_task = jomres_cmsspecific_getlogin_task();
			jomresRedirect( get_showtime( 'live_site' ) . '/' . $login_task);
			}

		// Now we need to ensure that we've connected to this user's Stripe account.
		$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig           = $siteConfig->get();

		echo jr_gettext( "STRIPE_SETUP_INFO", 'STRIPE_SETUP_INFO', false, false ). " <a href='https://connect.stripe.com/oauth/authorize?response_type=code&scope=read_write&client_id=".$jrConfig[ 'stripe_client_id' ]."'><img src='".get_showtime( 'live_site' )."/jomres/core-plugins/core_gateway_stripe/blue-on-light.png'/></a>";
		}
	
	

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

