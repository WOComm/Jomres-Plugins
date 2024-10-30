<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j16000publish_subscription_package {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;

		$id				= (int)jomresGetParam( $_REQUEST, 'id', 0 );
		$published		= (int)jomresGetParam( $_REQUEST, 'published', 0 );

		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		
		if ($id < 1)
			return;
		
		$jrportal_subscriptions->package['id'] = $id;
		$jrportal_subscriptions->getSubscriptionPackage();
		
		if ( $published != $jrportal_subscriptions->package['published'] )
			{	
			$jrportal_subscriptions->package['published'] = $published;	
			$jrportal_subscriptions->commitUpdateSubscriptionPackage();
			}

		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscription_packages"),"");
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
