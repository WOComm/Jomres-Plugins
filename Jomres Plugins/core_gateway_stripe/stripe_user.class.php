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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class stripe_user
	{
	private static $configInstance;

	public function __construct()
		{
		$this->id = 0;
		$this->mos_id = 0;
		$this->connected = false;
		$this->publishable_key = '';
		$this->stripe_user_id = '';
		$this->refresh_token = '';
		$this->access_token = '';
		}

	public static function getInstance()
		{
		if ( !self::$configInstance )
			{
			self::$configInstance = new stripe_user();
			}

		return self::$configInstance;
		}
	

	function getStripeUser($cms_user_id = 0)
		{
/* 		if ($cms_user_id == 0 )
			{
			throw new Exception( "Error: User id not set.");
			} */
		
		$query = "SELECT 
						`id`,
						`connected`,
						`publishable_key`,
						`stripe_user_id`,
						`refresh_token`,
						`access_token`
					FROM #__jomres_stripe_users 
					WHERE `mos_id` = " . (int) $cms_user_id . " 
					";
		$result = doSelectSql( $query , 2 );

		if ( empty($result) || $result == false)
			{
			return false;
			}

		$this->id = (int)$result['id'];
		$this->mos_id = (int)$cms_user_id;
		$this->connected = $result['connected'];
		$this->publishable_key = $result['publishable_key'];
		$this->stripe_user_id = $result['stripe_user_id'];
		$this->refresh_token = $result['refresh_token'];
		$this->access_token = $result['access_token'];

		return true;
		}
	
	function insertStripeUser()
		{
		if ( $this->mos_id == 0 )
			{
			throw new Exception( "Error: User id not set.");
			}
		
		$query = "SELECT id FROM #__jomres_stripe_users
			WHERE 
			`mos_id` = ".(int)$this->mos_id;
		$result = doSelectSql($query);
		
		if (count($result)>0)
			{
			throw new Exception( "Error: Tried to create a new user, but that mos id already exists in Stripe Users table.");
			}

		$query  = "INSERT INTO #__jomres_stripe_users
			(
			`mos_id`,
			`connected`,
			`publishable_key`,
			`stripe_user_id`,
			`refresh_token`,
			`access_token`
			)
			VALUES
			(
			". (int)$this->mos_id . ",
			". (int)$this->connected . ",
			'" . (string)$this->publishable_key . "',
			'". (string)$this->stripe_user_id . "',
			'". (string)$this->refresh_token . "',
			'" . (string)$this->access_token . "'
			)";
		$this->id = doInsertSql( $query, "" );
		
		return $this->id ;
		}

	function updateStripeUser()
		{
		if ( $this->id > 0 )
			{
			$query  = "UPDATE #__jomres_stripe_users SET
							`mos_id` = ".(int)$this->mos_id.",
							`connected` = ".(int)$this->connected.",
							`publishable_key` = '". (string)$this->publishable_key."',
							`stripe_user_id` = '".(string)$this->stripe_user_id."',
							`refresh_token` = '".(string)$this->refresh_token."',
							`access_token` = '".(string)$this->access_token."' 
						WHERE `id` = " . (int)$this->id ;
			$result = doInsertSql( $query, "" );
			
			if ( $result ) 
				return true;
			else
				{
				error_logging( "ID of Stripe could not be found after apparent successful update" );
				return false;
				}
			}
		else
			error_logging( "ID of Stripe user to be updated is 0, which is wrong." );

		return false;
		}

	function deleteStripeUser( )
		{
		if ( (int)$this->id > 0 )
			{
			$query  = "DELETE FROM #__jomres_stripe_users WHERE `mos_id` = " . (int)$this->id;
			$result = doInsertSql( $query, "" );
			
			if ( $result )
				{
				return true;
				}
			else
				{
				error_logging( "Could not delete stripe user with id ".$this->id );

				return false;
				}
			}
		error_logging( "ID ".$this->id." of stripe user not available" );

		return false;
		}
	
	
	function get_access_key($code)
		{
		$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = 0 AND plugin = 'stripe' ";
		$settingsList = doSelectSql( $query );
		
		if ( count ($settingsList) > 0)
			{
			foreach ( $settingsList as $set )
				{
				$settingArray[ $set->setting ] = trim($set->value);
				}
			}

		$data=array('grant_type' => 'authorization_code' , "code" => $code , "client_secret" => $settingArray[ 'stripe_secret_key' ]);
		$server = 'https://connect.stripe.com/oauth/token';
		$ch = curl_init($server);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		$token_request=curl_exec ($ch);
		
		$errors = curl_error($ch);
		$status = curl_getinfo($ch); 
		curl_close ($ch);
		if (!$token_request)
			{
			logging::log_message('Error when trying to connect Property Manager '.$errors , "Stripe" , "ERROR" );
            $response = new stdClass();
			$response->error = $errors;
			}
		else
			{
			logging::log_message('Received a message from Stripe after requesting authorisation code ' , "Stripe" , "DEBUG" );
			logging::log_message('Response '.$token_request , "Stripe" , "DEBUG" );
			$response = json_decode($token_request);  
			}
		return $response;
		}
	}