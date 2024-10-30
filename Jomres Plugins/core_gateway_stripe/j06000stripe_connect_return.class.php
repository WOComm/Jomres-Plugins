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

class j06000stripe_connect_return
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		logging::log_message('Received code from Stripe '.$_GET['code'] , "Stripe" , "INFO" );
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		jr_import("stripe_user");
		$stripe_user=new stripe_user();
		$stripe_user->getStripeUser($thisJRUser->id);
		$already_exists = false;
		if ($stripe_user->id > 0 )
			$already_exists = true;
		
		$response = $stripe_user->get_access_key($_GET['code']);

		if ( is_object($response) && !isset($response->error))
			{
			
			if ($stripe_user->connected == 0 )
				{
				$stripe_user->connected = 1;
				$stripe_user->mos_id			= $thisJRUser->id;
				$stripe_user->publishable_key	= $response->stripe_publishable_key;
				$stripe_user->stripe_user_id	= $response->stripe_user_id;
				$stripe_user->refresh_token		= $response->refresh_token;
				$stripe_user->access_token		= $response->access_token;
				
				if (!$already_exists)
					$stripe_user->insertStripeUser();
				else
					$stripe_user->updateStripeUser();
				
				logging::log_message('New Stripe user connected to site Stripe account' , "Stripe" , "INFO" );

				$output = array();
				$pageoutput=array();
				
				$output['STRIPE_SETUP_THANKS'] = jr_gettext('STRIPE_SETUP_THANKS','STRIPE_SETUP_THANKS',false,false);

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'connection_done.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->displayParsedTemplate();
				
				}
			}
		else
			{
			if (!is_object($response))
				logging::log_message('Non-object returned from Stripe when trying to connect a user.' , "Stripe" , "ERROR" );
			else
				{
                if ( isset($response->error_description))
                    $message = $response->error_description;
                else
                    $message = $response->error;
                
				echo '<p class="alert alert-danger">'.$message.'</p>';
				}
			}
		}
	
	

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

