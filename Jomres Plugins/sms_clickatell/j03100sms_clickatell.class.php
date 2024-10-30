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

class j03100sms_clickatell 
	{
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
		
		if ($jrConfig[ 'sms_clickatell_active' ] != '1') {
			return;
		}
		
		$mrConfig = getPropertySpecificSettings();
		
		if (trim($mrConfig['sms_clickatell_notification_number']) == '') {
			return;
		}

		$property_uid = (int)$componentArgs['property_uid'];
		$arrivalDate = $componentArgs['arrivalDate'];
		$departureDate = $componentArgs['departureDate'];
		$contract_total = $componentArgs['contract_total'];
		$specialReqs = $componentArgs['specialReqs'];
		$deposit_required = $componentArgs['deposit_required'];
		
		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$property_name = $current_property_details->get_property_name($property_uid);
		
		$subject = jr_gettext("_JOMRES_FRONT_MR_EMAIL_SUBJECT_INTERNETBOOKINGMADE",'_JOMRES_FRONT_MR_EMAIL_SUBJECT_INTERNETBOOKINGMADE').stripslashes($property_name);

		$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
		
		$usersArray = $jomres_users->getManagerIdsForProperty( $property_uid );
		
		if (!empty($usersArray))
			{
			foreach ($usersArray as $u)
				{
				// First we need to find the manager's uid
				$jos_id = $u['manager_id'];
				$username = jomres_cmsspecific_getUsername($jos_id);
				
				// Now we need to find the mobile number that was recorded for this property_uid
				$mobile_number = trim($mrConfig['sms_clickatell_notification_number']);

				jr_import('jrportal_sms_clickatell_message');
				$message_record = new jrportal_sms_clickatell_message();
				$message_record->username			= $username;
				$message_record->number				= $mobile_number;
				$message_record->message			= $subject;
				$message_record->property_uid		= $property_uid;
				$message_record->commitNewMessage();
				$message_record->getMessage(); // We'll do this so that the send time isn't reset when we commit update
				
				jr_import('jrportal_sms_clickatellhandler');
				$handler = new jrportal_sms_clickatellhandler();
				$handler->addField("to",$message_record->number);
				$handler->addField("text",$message_record->message);
				$handler->sendQuery();
				
				if (empty($handler->errorText))
					{
					$message_record->apiMsgid=$handler->getResponse();
					$message_record->commitUpdateMessage();
					
					if (!strstr  ($message_record->apiMsgid, "001" ) )
						return true;
					else
						return false;
					
					exit;
					}
				else
					{
					foreach ($handler->errorText as $error)
						{
						error_logging( "Error message ".$error." for Message id ".$message_record->id);
						}
					error_logging( "Didn't get a meaningful message back from clickatell. Message id ".$message_record->id);
					}
				 
				}
			}
		else
			{
			error_logging( "Couldn't send sms for property as no users registered. Property uid ".$property_uid);
			return;
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
