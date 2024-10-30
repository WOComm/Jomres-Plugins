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


function cmf_jomres2jomres_save_plugin_setting ( $user_id = 0 , $host = '' , $key = '' , $value = '')
{
	if ( trim($host) == '' ) {
		throw new Exception( 'Host not set' );
	}

	if ( trim($key) == '' ) {
		throw new Exception( 'Key not set' );
	}
	if ( trim($value) == '' ) {
		throw new Exception( 'Value not set' );
	}

	if ($user_id == 0 ) {
		throw new Exception( 'User id not set' );
	}

	$query = "SELECT `value` FROM #__jomres_pluginsettings WHERE `prid` = 0 AND `plugin` = 'jomres2jomres' LIMIT 1 ";
	$settingList = doSelectSql($query);

	if (!empty($settingList) ) {

        if (isset($settingList[0]->value) && $settingList[0]->value != '') {
            $existing_settings = unserialize($settingList[0]->value);
        }

		if (!isset($existing_settings->settings)) {
			$existing_settings->settings = array();
		}

		if (!isset($existing_settings->settings[$user_id][$host])) {
			$existing_settings->settings[$user_id][$host] = new stdClass();
		}

		$existing_settings->settings[$user_id][$host]->$key = $value;
		$v = serialize($existing_settings);

		$query = "UPDATE #__jomres_pluginsettings SET `value`='$v' WHERE `prid` = 0 AND `plugin` = 'jomres2jomres' LIMIT 1";
		doInsertSql($query, jr_gettext('_JOMRES_MR_AUDIT_PLUGINS_UPDATE', '_JOMRES_MR_AUDIT_PLUGINS_UPDATE', false));
	} else {
		$user_details = jomres_cmsspecific_getCMS_users_frontend_userdetails_by_id($user_id);

		$new_settings = new stdClass();
		$new_settings->settings = array();
		$new_settings->settings[$user_id] = array();
		$new_settings->settings[$user_id][$host] = new stdClass();

		$new_settings->settings[$user_id][$host]->$key	= $value;

		$v = serialize($new_settings);

		$query = "INSERT INTO #__jomres_pluginsettings
				(`prid`,`plugin`,`setting`,`value`) VALUES
				(0,'jomres2jomres','settings_obj','$v')";
		doInsertSql($query, jr_gettext('_JOMRES_MR_AUDIT_PLUGINS_INSERT', '_JOMRES_MR_AUDIT_PLUGINS_INSERT', false));
	}
}

function cmf_jomres2jomres_get_plugin_setting ( $user_id = 0 ) {
	$result = array();
	$query = "SELECT `value` FROM #__jomres_pluginsettings WHERE `prid` = 0 AND `plugin` = 'jomres2jomres' LIMIT 1";
	$settingList = doSelectSql($query);

	if (isset($settingList[0])) {
        if (isset($settingList[0]->value)) {
            $settings = unserialize($settingList[0]->value);
            if (!empty($settings->settings[$user_id])) {
                $result = $settings->settings[$user_id];
            }
        }
	}

	return $result;
}
