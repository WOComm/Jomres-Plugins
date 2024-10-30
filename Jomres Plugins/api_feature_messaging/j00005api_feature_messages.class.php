<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2022 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00005api_feature_messages {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
		else {
			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
			}

		$filepath		= get_showtime('ePointFilepath');
		require_once($filepath.'functions.php');


		// The planned messaging html will need an access token to talk to the messaging system. We'll silently create, store and refresh
		// 	access tokens which are then stored against the user's profile and reused as needed
		// At best, I've managed to limit this to one query on startup to perform checks

		// If I need to do this again (and I think I will) then I'll make this a core class of Jomres, but for now it stays here

		if (AJAXCALL) {
			return;
		}

		// Need to check the user id, see if they've got a messaging token, if not we should silently create one for them
		$thisJRUser = jomres_getSingleton('jr_user');

		if ($thisJRUser->id == 0 ) { // Not a logged in user, just return
			return;
		}

		if (!isset($thisJRUser->params['messaging_api_token']) && $thisJRUser->id > 0 ) {
			$IDENTIFIER="Messaging";
			$CLIENT_ID=generateJomresRandomString( 15 );
			$CLIENT_SECRET =createNewAPIKey();
			$TOKEN_REQUEST_URL = get_showtime( 'live_site' ).'/jomres/api/';

			$query = "INSERT INTO #__jomres_oauth_clients 
					(`client_id`,`client_secret`,`redirect_uri`,`grant_types`,`scope`,`user_id` , `identifier` ) 
					VALUES 
					('".$CLIENT_ID."','".$CLIENT_SECRET."','',null,'messaging',".(int)$thisJRUser->id." , '".$IDENTIFIER."' )";
			$result = doInsertSql($query);

			if ($result == true ) {
				$data = array('grant_type' => 'client_credentials', 'client_id' => $CLIENT_ID, 'client_secret' => $CLIENT_SECRET , 'token_url' => $TOKEN_REQUEST_URL );

				$token_request_response = $this->request_access_token ($data);

				$json_decoded = json_decode($token_request_response);

				if ($json_decoded != false) {
					$thisJRUser->params['messaging_api_token'] = $json_decoded->access_token;
					$thisJRUser->update_params();
				}
			}
		} else {
			// We need to check that the token is still valid. If not, we need to request a new one
			$query = "SELECT client_id FROM #__jomres_oauth_access_tokens WHERE 
            		access_token = '". $thisJRUser->params['messaging_api_token']."' 
            		AND user_id = ".$thisJRUser->id."
            		AND expires >= CURRENT_TIMESTAMP";
			$result = doSelectSql($query);
			if (empty($result)) { // The token is expired, we need to get a new one. First we'll find the client id and secret, and if they don't exist, we'll generate new ones
				$query = "SELECT client_id , client_secret FROM #__jomres_oauth_clients  WHERE scope = 'messaging' AND user_id = ".$thisJRUser->id ;
				$client_select = doSelectSql($query,2);
				$TOKEN_REQUEST_URL = get_showtime('live_site') . '/jomres/api/';
				$IDENTIFIER = "Messaging";

				if (empty($client_select)) {
					$CLIENT_ID = generateJomresRandomString(15);
					$CLIENT_SECRET = createNewAPIKey();
					$query = "INSERT INTO #__jomres_oauth_clients 
					(`client_id`,`client_secret`,`redirect_uri`,`grant_types`,`scope`,`user_id` , `identifier` ) 
					VALUES 
					('" . $CLIENT_ID . "','" . $CLIENT_SECRET . "','',null,'messaging'," . (int)$thisJRUser->id . " , '" . $IDENTIFIER . "' )";
					$result = doInsertSql($query);

					if ($result == true) {
						$data = array('grant_type' => 'client_credentials', 'client_id' => $CLIENT_ID, 'client_secret' => $CLIENT_SECRET, 'token_url' => $TOKEN_REQUEST_URL);
						$token_request_response = $this->request_access_token($data);
						$json_decoded = json_decode($token_request_response);
						if ($json_decoded != false) {
							$thisJRUser->params['messaging_api_token'] = $json_decoded->access_token;
							$thisJRUser->update_params();
						}
					}
				} else {
					$CLIENT_ID = $client_select['client_id'];
					$CLIENT_SECRET = $client_select['client_secret'];

					$data = array('grant_type' => 'client_credentials', 'client_id' => $CLIENT_ID, 'client_secret' => $CLIENT_SECRET, 'token_url' => $TOKEN_REQUEST_URL);

					$token_request_response = $this->request_access_token($data);
					$json_decoded = json_decode($token_request_response);
					if ($json_decoded != false) {
						$thisJRUser->params['messaging_api_token'] = $json_decoded->access_token;
						$thisJRUser->update_params();
					}
				}
			}
		}



		}

	private function request_access_token ($data)
	{
		$ch = curl_init($data['token_url']);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch,CURLOPT_VERBOSE,true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		//$headerSent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
		$result = curl_exec($ch);
		//$status = curl_getinfo($ch);
		//$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return $result;
	}


	/**
	#
	 * Must be included in every mini-component
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}
