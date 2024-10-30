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

class j10510stripe
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$plugin = "stripe";
		
		$str = jr_gettext('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL','STRIPE_CONNECT_SITE_CONFIG_RETURN_URL' ,false , false );
		$notes = jr_gettext( "STRIPE_CONNECT_CONFIG_INFO", 'STRIPE_CONNECT_CONFIG_INFO', false, false )."<br/>".jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_NOTES'.$plugin, $str." ".JOMRES_SITEPAGE_URL_NOSEF.'&task=stripe_connect_return&topoff=1&tmpl=jomres');
		
		
		$settingArray=array();

		$settingArray['stripe_client_id'] = array (
			"default" => "ca_",
			"setting_title" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID','STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID'),
			"setting_description" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC','STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC'),
			"format" => "input"
			) ;
		
		$settingArray['stripe_secret_key'] = array (
			"default" => "sk_",
			"setting_title" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY','STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY'),
			"setting_description" => '',
			"format" => "input"
			) ;
		
		$settingArray['stripe_public_key'] = array (
			"default" => "pk_",
			"setting_title" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY','STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY'),
			"setting_description" => '',
			"format" => "input"
			) ;
		
		$settingArray['application_fee'] = array (
			"default" => "",
			"setting_title" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_COMMISSION','STRIPE_CONNECT_SITE_CONFIG_COMMISSION'),
			"setting_description" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC','STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC'),
			"format" => "input"
			) ;
			
/* 		
		// not used atm. Current recommendations are that sites should set minimum deposit to 2x commission rate. If site owners follow that recommendation then there will always be enough funds to pay both Stripe, Site owner, and leaving some left over for the property manager. Without that recommendation, we would need to calculate the entire fees when showing the payment form, and if the deposit isn't enough to then throw an error. Using the 2x guidelines this shouldn't be a problem.
		// Calculation code has been commented and left at the bottom of j00605stripe.class.php for now in case there's a need to revisit this. 
		
		$settingArray['stripe_commission_euro'] = array (
			"default" => "1.4",
			"setting_title" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO','STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO'),
			"setting_description" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC','STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC'),
			"format" => "input"
			) ;
			
		$settingArray['stripe_commission_noneuro'] = array (
			"default" => "2.9",
			"setting_title" => jr_gettext('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO','STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO'),
			"setting_description" => '',
			"format" => "input"
			) ; */

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
