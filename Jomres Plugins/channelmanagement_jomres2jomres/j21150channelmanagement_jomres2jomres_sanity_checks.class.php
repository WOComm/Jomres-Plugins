<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j21150channelmanagement_jomres2jomres_sanity_checks
{
	function __construct($componentArgs) {
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$current_channel = channelmanagement_framework_utilities :: get_current_channel ( $this , array ( "j21150channelmanagement_" , "_sanity_checks" ) );
		
		$channel_sanity_checks_errors = get_showtime('channel_sanity_checks_errors');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		if ( !isset($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres'][ 'channel_management_jomres2jomres_client_id' ]) || trim($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres'][ 'channel_management_jomres2jomres_client_id' ]) == '' ) {
			$channel_sanity_checks_errors[] = jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', 'CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', false);
			}

		if ( !isset($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres'][ 'channel_management_jomres2jomres_client_secret' ]) || trim($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres'][ 'channel_management_jomres2jomres_client_secret' ]) == '' ) {
			$channel_sanity_checks_errors[] = jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', 'CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', false);
			}

		if ( !isset($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres'][ 'channel_management_jomres2jomres_parent_site' ]) || trim($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres'][ 'channel_management_jomres2jomres_parent_site' ]) == '' ) {
			$channel_sanity_checks_errors[] = jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', 'CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', false);
		}

		set_showtime('channel_sanity_checks_errors' , $channel_sanity_checks_errors );
		
	}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
