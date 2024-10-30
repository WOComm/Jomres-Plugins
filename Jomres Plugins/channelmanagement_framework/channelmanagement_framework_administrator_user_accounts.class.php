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

class channelmanagement_framework_administrator_user_accounts
{
	
	function __construct()
	{
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
	}

	function get_accounts_for_site()
	{
		
		
		
		$response = array();
		
/* 		$query = "SELECT  `params` FROM #__jomres_channelmanagement_framework_plugins_user_accounts WHERE `cms_user_id` = ".(int)$id." LIMIT 1";
		$user = doSelectSql($query);
		
		if (empty($user)){
			return $response;
		} else {
			$params = $this->jomres_encryption->decrypt($user[0]->params);
			$params = unserialize($params);
			return $params;
		} */
		
		
	}
	
	function save_accounts_for_site ( $accounts_data = array() ) 
	{
/* 		$user_accounts = $this->get_accounts_for_user($id);
		
		$serialized_accounts_data = serialize($accounts_data);
		$encrypted_accounts_data = $this->jomres_encryption->encrypt($serialized_accounts_data);

		if (empty($user_accounts) ) {
			$query = "INSERT INTO #__jomres_channelmanagement_framework_plugins_user_accounts ( `cms_user_id` , `params`)  VALUES ( ".(int)$id." , '".$encrypted_accounts_data."' )";
		} else {
			$query = "UPDATE #__jomres_channelmanagement_framework_plugins_user_accounts SET `params` = '".$encrypted_accounts_data."' WHERE `cms_user_id` =  ".(int)$id;
		}
 */
		doInsertSql($query);
		
	}
}
