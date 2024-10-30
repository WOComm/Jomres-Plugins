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

class j06000stripe_register_email
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
			{
			// We don't have a cms specific function for searching for users by email address, so instead we'll pull all users and loop through looking for matching emails. We may need to change this in the future, but for now it'll stand
			$current_users = jomres_cmsspecific_getCMSUsers();
			foreach ($current_users as $user)
				{
				if ($user['email'] == $email)
					{
					logging::log_message("User tried to register, but email address already in use. ".$email , "Stripe" , "INFO" );
					echo json_encode( array ("result" => false , "message" => "Email address can't be used."));
					return;
					}
				}
			// Ok, we've checked the there isn't already a user with this address, let's crack on and send them their registration email. Rather than forcing them to click a confirmation link we'll use the existing Jomres functionality to create a new email, they won't be able to log in without the password in that email.
			
			$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig   = $siteConfig->get();
			$jrConfig[ 'useNewusers' ] = "1";
			$jrConfig[ 'useNewusers_sendemail' ] = "1";
			$siteConfig->set($jrConfig);
			
			$tmpBookingHandler = jomres_singleton_abstract::getInstance( 'jomres_temp_booking_handler' );
			$tmpBookingHandler->tmpguest[ "mos_userid" ]   = 0;
			$tmpBookingHandler->tmpguest[ "existing_id" ]  = 0;
			$tmpBookingHandler->tmpguest[ "firstname" ]    = "Your first name";
			$tmpBookingHandler->tmpguest[ "surname" ]      = "Your surname";
			$tmpBookingHandler->tmpguest[ "email" ]        = $email;

			$id = jomres_cmsspecific_createNewUserOnBooking();
			if ($id>0)
				{
				jr_import("stripe_user");
				
				$stripe_user=new stripe_user();
				$stripe_user->mos_id = $id;
				$stripe_user->insertStripeUser();
				
				// We'll send a separate welcome email
				$subject = jr_gettext( 'STRIPE_REGISTER_WELCOME_EMAIL_TITLE', 'STRIPE_REGISTER_WELCOME_EMAIL_TITLE', false, false )." ".get_showtime("sitename");

				$text = jr_gettext( 'STRIPE_REGISTER_WELCOME_EMAIL_TITLE', 'STRIPE_REGISTER_WELCOME_EMAIL_TITLE', false, false )." ".get_showtime("sitename") . " <br />";
				$text .= jr_gettext( 'STRIPE_REGISTER_WELCOME_EMAIL_BLURB', 'STRIPE_REGISTER_WELCOME_EMAIL_BLURB', false, false ) . "<br /><br /><a href='".jomresURL( JOMRES_SITEPAGE_URL_NOSEF . "&task=stripe_setup")."' >". jomresURL( JOMRES_SITEPAGE_URL_NOSEF . "&task=stripe_setup") . "</a> <br />";
				
				$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
				$jrConfig   = $siteConfig->get();
				if ( $jrConfig[ 'useNewusers_sendemail' ] == "1" )
					{
					if ( !jomresMailer( get_showtime('mailfrom'), get_showtime('fromname'), $email, $subject, $text, $mode = 1 ) ) 
						error_logging( 'Failure in sending Stripe Setup email to guest. Target address: ' . $email . ' Subject' . $subject );
					}
				
				echo json_encode(true);
				logging::log_message('Registered a new user with the email address '.$email , "Stripe" , "INFO" );
				return;
				}
			else
				{
				echo json_encode( array ("result" => false , "message" => "Failed to create a new user, for some reason."));
				logging::log_message("Failed to create a new user, for some reason. ".$email , "Stripe" , "ERROR" );
				return;
				}
			} 
		else 
			{
			echo json_encode( array ("result" => false , "message" => "$email is not a valid email address"));
			return;
			}
		}
	
	

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

