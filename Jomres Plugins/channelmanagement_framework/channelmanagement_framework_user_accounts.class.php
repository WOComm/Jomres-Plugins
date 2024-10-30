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

/*

User accounts

params is an array, serialized then encrypted before saving, that contains all remote service account details

*/

class channelmanagement_framework_user_accounts
{
	
	function __construct()
	{
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
	}

    /*
     *
     * Calling script sends the remote property uid, so we'll consult the xreference table for all managers for that remote property uid
     *
     */
	function find_channel_owners_for_property($remote_property_uid)
	{
		$query = "SELECT cms_user_id as manager_id FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE `remote_property_uid` = ".(int)$remote_property_uid." ";
		$result = doSelectSql($query);
		$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
		$jomres_users->get_users();
			
		$managers = array();
		if (!empty($result)){
			foreach ( $result as $user  ) {
				$user_id = $user->manager_id;
				$managers[$user_id] = array ( 
					"user_id" => $user_id , 
					"user_name" => $jomres_users->users[$user_id]['username'] , 
					"access_level" => $jomres_users->users[$user_id]['access_level'] 
					);
			}
		}
		return $managers;
	}
	
	function get_accounts_for_user($id = 0)
	{
		if ( (int)$id == 0 ) {
			throw new Exception('Error: CMS User id not passed');
		}
		
		$response = array();
		
		$query = "SELECT  `params` FROM #__jomres_channelmanagement_framework_plugins_user_accounts WHERE `cms_user_id` = ".(int)$id." LIMIT 1";
		$user = doSelectSql($query);
		
		if (empty($user)){
			return $response;
		} else {
			$params = $this->jomres_encryption->decrypt($user[0]->params);
			$params = unserialize($params);
			return $params;
		}
		
		
	}
	
	function save_accounts_for_user ( $id = 0 , $accounts_data = array() ) 
	{
		if ( (int)$id == 0 ) {
			throw new Exception('Error: CMS User id not passed');
		}
		
		$user_accounts = $this->get_accounts_for_user($id);
		
		$serialized_accounts_data = serialize($accounts_data);
		$encrypted_accounts_data = $this->jomres_encryption->encrypt($serialized_accounts_data);

		if (empty($user_accounts) ) {
			$query = "INSERT INTO #__jomres_channelmanagement_framework_plugins_user_accounts ( `cms_user_id` , `params`)  VALUES ( ".(int)$id." , '".$encrypted_accounts_data."' )";
		} else {
			$query = "UPDATE #__jomres_channelmanagement_framework_plugins_user_accounts SET `params` = '".$encrypted_accounts_data."' WHERE `cms_user_id` =  ".(int)$id;
		}

		doInsertSql($query);
		
	}
}
