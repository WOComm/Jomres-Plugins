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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06002channelmanagement_framework_user_accounts_save {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		
		$return_url = jr_base64url_decode((string) jomresGetParam($_REQUEST, 'return_url', ''));
		
		$account_data = array();
		
		foreach ($_POST['user_accounts'] as $channel_name => $service ) {
			foreach ($service as  $field ) { // We're not going to use jomresGetParam or filter_var to sanitise the contents of these fields. The data will be encrypted before storage, which sanitises it for us, and it's possible that elements like ' or " or other characters could be in passwords
				foreach ( $service as $fieldname => $fieldcontents ) {
					$account_data[$channel_name][$fieldname] = $fieldcontents;
				}
			}
		}

		jr_import('channelmanagement_framework_user_accounts');
		$channelmanagement_framework_user_accounts = new channelmanagement_framework_user_accounts();
		$channelmanagement_framework_user_accounts->save_accounts_for_user ( $thisJRUser->id , $account_data );
		// When done
		jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL.'&task=channelmanagement_framework_user_accounts'), '');
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
