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

class j10510paypal {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$plugin = "paypal";
		
		$notes = jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_NOTES'.$plugin,'You must create a new API Credential pair in Paypal, then enter those details here. More info  https://developer.paypal.com/docs/integration/admin/manage-apps/ ');
		
		$settingArray=array();
		
		$settingArray['override'] = array (
			"default" => "1",
			"setting_title" => jr_gettext('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_OVERRIDE'.$plugin,'Override frontend settings?'),
			"setting_description" => jr_gettext('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_OVERRIDE'.$plugin,'If you set this to Yes then none of the frontend gateway settings will be used, instead all payments will use the Paypal gateway settings you set here.'),
			"format" => "boolean"
			) ;
		
		$settingArray['usesandbox'] = array (
			"default" => "1",
			"setting_title" => jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_SANDBOX'.$plugin,'Use sandbox?'),
			"setting_description" => jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_SANDBOX_DESC'.$plugin,'Set this to Yes if you want to use the paypal sandbox'),
			"format" => "boolean"
			) ;
		
		$settingArray['paypalemail'] = array (
			"default" => "",
			"setting_title" => jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_PAYPAL_EMAIL'.$plugin,'Your paypal email address. Note, you should use your Paypal account primary email address.'),
			"setting_description" => "",
			"format" => "input"
			) ;

		$settingArray['client_id'] = array (
			"default" => "",
			"setting_title" => jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_PAYPAL_CLIENT_ID'.$plugin,'Client ID'),
			"setting_description" => "",
			"format" => "input"
			) ;
			
		$settingArray['secret'] = array (
			"default" => "",
			"setting_title" => jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_PAYPAL_SECRET'.$plugin,'Secret'),
			"setting_description" => "",
			"format" => "input"
			) ;
			
		$settingArray['client_id_sandbox'] = array (
			"default" => "",
			"setting_title" => jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_PAYPAL_CLIENT_ID_SANDBOX'.$plugin,'Sandbox Client ID'),
			"setting_description" => "",
			"format" => "input"
			) ;
			
		$settingArray['secret_sandbox'] = array (
			"default" => "",
			"setting_title" => jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_PAYPAL_SECRET_SANDBOX'.$plugin,'Sandbox Secret'),
			"setting_description" => "",
			"format" => "input"
			) ;

/* 

// Not used, but useful for seeing potential options.

		$settingArray['pendingok'] = array (
			"default" => "1",
			"setting_title" => jr_gettext('_JOMRES_JR_GATEWAY_CONFIG_PAYPAL_PENDINGOK'.$plugin,'Pending ok?'),
			"setting_description" => jr_gettext('_JOMRES_JR_GATEWAY_CONFIG_PAYPAL_PENDINGOK_DESC'.$plugin,'In some instances it is acceptable to receive a payment status of "Pending". '),
			"format" => "boolean"
			) ;
			
		$settingArray['useipn'] = array (
			"default" => "1",
			"setting_title" => jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_PAYPAL_USEIPN'.$plugin,'Use IPN?'),
			"setting_description" => jr_gettext('_JOMRES_JR_GATEWAY_CONFIG_PAYPAL_IPNEMAIL_DESC'.$plugin,'Set this to Yes to receive an IPN email with a dump of the transaction. Note, only for servers that use the php mail function.'),
			"format" => "boolean"
			) ;
			

			
		$settingArray['currencycode'] = array (
			"default" => "1",
			"setting_title" => jr_gettext('_JOMRES_JR_GATEWAY_CONFIG_PAYPAL_CURRENCYCODE'.$plugin,'Currency code (eg EUR) '),
			"setting_description" => "",
			"format" => "currencycode"
			) ;
		
		$settingArray['receiveIPNemail'] = array (
			"default" => "1",
			"setting_title" => jr_gettext('_JOMRES_JR_GATEWAY_CONFIG_PAYPAL_IPNEMAIL'.$plugin,'Receive IPN email from Jomres?'),
			"setting_description" => "",
			"format" => "boolean"
			) ; */
		
		/*
		Demonstration purposes, for free format input fields ( e.g. dropdowns )
		*/
		
		/*
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		$index = 'gateway_setting_'.$plugin.'_checkbox';
		$checkbox_value = $jrConfig[$index];
		
		$settingArray['checkbox'] = array (
			"html" => '<input type="checkbox" name=\"gateway_setting_paypal_checkbox\" value="'.$checkbox_value.'"/>',
			"setting_title" => "Checkbox",
			"setting_description" => "Description",
			"format" => "html"
			) ;
		
		*/

		/*
		end demo
		*/

		$this->retVals = array ( "notes" => $notes , "settings" => $settingArray );
		}


	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
