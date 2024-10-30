<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2011 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j03110acymailing_integration {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if ( !isset($jrConfig['acymailing_enabled']) || $jrConfig['acymailing_enabled'] != '1' || $jrConfig['acymailing_list_id'] == '') {
			return;
		}
		logging::log_message('acymailing list export script started ', 'Guzzle', 'DEBUG');
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		//get tmp booking data
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		
		$guests_uid=$componentArgs['guests_uid'];
		
		//get guest details
		$query="SELECT enc_firstname,enc_surname,enc_email FROM #__jomres_guests WHERE guests_uid = '".(int)$guests_uid."' LIMIT 1";
		$userEmail = doSelectSql($query);
		$email = stripslashes($this->jomres_encryption->decrypt($userEmail[0]->enc_email));
		$firstname = stripslashes($this->jomres_encryption->decrypt($userEmail[0]->enc_firstname));
		$surname = stripslashes($this->jomres_encryption->decrypt($userEmail[0]->enc_surname));
		$name = $firstname.' '.$surname;
		
		//subscribe to newsletter
		$url = get_showtime('live_site')."/index.php";

		$post_data = array();
		$post_data["option"] = "com_acymailing";
		$post_data["ctrl"] = "sub";
		$post_data["task"] = "optin";
		$post_data["hiddenlists"] = (int)$jrConfig['acymailing_list_id'];
		$post_data["user[email]"] = $email;
		$post_data["user[name]"] = $name;
		
		try 
			{
			$client = new GuzzleHttp\Client();

			logging::log_message('Starting guzzle call to '.$url, 'Guzzle', 'DEBUG');
			
			$response = $client->request('POST', $url, [
				'form_params' => $post_data
				]);
			}
		catch (Exception $e) 
			{
			logging::log_message('acymailing list export script failed to export user to acymailing', 'Guzzle', 'ERROR');
			/* $jomres_user_feedback = jomres_singleton_abstract::getInstance('jomres_user_feedback');
			$jomres_user_feedback->construct_message(array('message'=>'Could not subscribe user to acymailing', 'css_class'=>'alert-danger alert-error')); */
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
