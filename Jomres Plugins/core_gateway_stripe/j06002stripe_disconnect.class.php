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

class j06002stripe_disconnect
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );

		$manager_uid = $thisJRUser->id;
        if (!isset($manager_uid) || (int)$manager_uid < 1 ) { // If we can't figure out the manager uid we're stuffed, need to back out of this script
            return null;
        }

		jr_import("stripe_user");
		$stripe_user=new stripe_user();
		$stripe_user->id = $manager_uid;
		$stripe_user->deleteStripeUser();
		
		echo jr_gettext('STRIPE_SETUP_DISCONNECTED', 'STRIPE_SETUP_DISCONNECTED', false)   ;
		
		}
	
	

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

