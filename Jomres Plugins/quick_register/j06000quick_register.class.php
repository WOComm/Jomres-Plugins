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

class j06000quick_register
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; 
			$this->shortcode_data = array (
				"task" => "quick_register",
				"info" => "QUICK_REGISTER_TITLE",
				"arguments" => array ()
				);
			return;
			}
		
		$eLiveSite=get_showtime('eLiveSite');
		$ePointFilepath = get_showtime('ePointFilepath');

		$result = false;
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		$task = get_showtime("task");
		if (AJAXCALL)
			return;
		
/* 		if ($thisJRUser->userIsManager)
			return; */

		if ( $task == "new_property" || $task == "save_new_property" || $task == "dobooking" || $task == "confirmbooking" || $task == "processpayment")
			return;
		

		if (!$thisJRUser->id > 0 )
			{
			if (isset($_POST['username']))
				{
				$result = false;
				if ( this_cms_is_joomla() )
					{
					$app = JFactory::getApplication();
					$username = $app->input->get('username', '', 'STRING');
					$password = $app->input->get('password', '', 'STRING');
					$result = $app->login(array('username' => $username, 'password' => $password));
					}
				else
					{
					$credentials = array();
					$credentials['user_login'] = jomresGetParam($_POST, 'username', '');
					$credentials['user_password'] = jomresGetParam($_POST, 'password', '');
					$user = wp_signon($credentials);
		 
					if ( is_wp_error($user) ) 
						$result = false;
					else
						{
						$result = true;
						}
					}
				}

			if (!$result)
				{
				$output = array();
				$pageoutput=array();
				
				$output['QUICK_REGISTER'] = jr_gettext('QUICK_REGISTER','QUICK_REGISTER',false,false);
				$output['QUICK_REGISTER_BLURB'] = jr_gettext('QUICK_REGISTER_BLURB','QUICK_REGISTER_BLURB',false,false);

				$output['QUICK_REGISTER_EMAIL_ADD']				= jr_gettext('QUICK_REGISTER_EMAIL_ADD','QUICK_REGISTER_EMAIL_ADD',false,false);
				$output['QUICK_REGISTER_EMAIL']					= jr_gettext('QUICK_REGISTER_EMAIL','QUICK_REGISTER_EMAIL',false,false);
				$output['QUICK_REGISTER_EMAIL_SAVE']			= jr_gettext('QUICK_REGISTER_EMAIL_SAVE','QUICK_REGISTER_EMAIL_SAVE',false,false);
				$output['QUICK_REGISTER_EMAIL_CLICKLINK']		= jr_gettext('QUICK_REGISTER_EMAIL_CLICKLINK','QUICK_REGISTER_EMAIL_CLICKLINK',false,false);
				$output['QUICK_REGISTER_EMAIL_THANKS']			= jr_gettext('QUICK_REGISTER_EMAIL_THANKS','QUICK_REGISTER_EMAIL_THANKS',false,false);
				$output['QUICK_REGISTER_EMAIL_THANKS_BLURB']	= jr_gettext('QUICK_REGISTER_EMAIL_THANKS_BLURB','QUICK_REGISTER_EMAIL_THANKS_BLURB',false,false);
				$output['ORIGIN_URL']							= $this->full_url( $_SERVER );
				$output['QUICK_LOGIN']							= jr_gettext('QUICK_LOGIN','QUICK_LOGIN',false,false);
				$output['QUICK_REGISTER_PASSWORD']				= jr_gettext('QUICK_REGISTER_PASSWORD','QUICK_REGISTER_PASSWORD',false,false);
				
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'quick_register.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->displayParsedTemplate();
				}
			else
				{
				jomresRedirect($this->full_url( $_SERVER ));
				}
			}
		}

		function url_origin( $s, $use_forwarded_host = false )
			{
			$ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
			$sp       = strtolower( $s['SERVER_PROTOCOL'] );
			$protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
			$port     = $s['SERVER_PORT'];
			$port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
			$host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
			$host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
			return $protocol . '://' . $host;
			}

		function full_url( $s, $use_forwarded_host = false )
			{
			return $this->url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
			}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
