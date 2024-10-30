<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j03110phplist {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if ( !isset($jrConfig['phplist_enabled']) || $jrConfig['phplist_enabled'] != '1' || $jrConfig['phplist_list_id'] == '') {
			return;
		}
		
		//get tmp booking data
		$tmpBookingHandler = jomres_getSingleton('jomres_temp_booking_handler');
		
		$guests_uid = $componentArgs['guests_uid'];
		
		//get guest details
		$query = "SELECT enc_firstname,enc_surname,enc_email FROM #__jomres_guests WHERE guests_uid = '".(int)$guests_uid."' LIMIT 1";
		$userEmail = doSelectSql($query);
		$email = stripslashes($this->jomres_encryption->decrypt($userEmail[0]->enc_email));
		$firstname = stripslashes($this->jomres_encryption->decrypt($userEmail[0]->enc_firstname));
		$surname = stripslashes($this->jomres_encryption->decrypt($userEmail[0]->enc_surname));
		
		//login to phplist
		$url = $jrConfig[ 'phplist_url' ] . "admin/?";
		$ch = curl_init();
		$login_data = array();
		$login_data["login"] = $jrConfig['phplist_user'];
		$login_data["password"] = $jrConfig['phplist_pass'];
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $login_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/nofileneeded.txt"); //Enable Cookie Parser. File does not need to exist
		$result = curl_exec ($ch);
		//echo("Result was: $result");
		//Now simulate post to subscriber form. 
		$post_data["email"] = $email;
		$post_data["emailconfirm"] = $email;
		$post_data["htmlemail"] = (int)$jrConfig['phplist_html'];
		$post_data["list[".(int)$jrConfig['phplist_list_id']."]"] = "signup";
		$post_data["subscribe"] = "Subscribe";
		$post_data["makeconfirmed"] = (int)$jrConfig['phplist_skipConfEmail'];
		$post_data[$jrConfig[ 'phplist_attr1' ]] = $firstname;
		$post_data[$jrConfig[ 'phplist_attr2' ]] = $surname;
		$url = $domain . "?p=subscribe";
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		//echo("Result was: $result");
		curl_close($ch);
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
