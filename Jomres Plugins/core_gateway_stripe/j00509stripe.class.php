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

class j00509stripe {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
			
		$plugin="stripe";
        
        $this->outputArray = array();
        
        $thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
        if (!$thisJRUser->userIsManager) { // This is a guest attempting to pay an invoice or booking deposit
            $property_uid = get_showtime("property_uid");
            if (is_null($property_uid) ) {
                $invoice_uid = intval(jomresGetParam($_REQUEST, 'invoice_id', 0));
                if (!is_null($invoice_uid) && $invoice_uid > 0 ) {
                    $invoice = jomres_singleton_abstract::getInstance('basic_invoice_details');
                    $invoice->gatherData($invoice_uid);
                    $property_uid = (int) $invoice->invoice[$invoice_uid]['property_uid'];
                }
            }
            if (is_null($property_uid)) {// We can't figure out the property uid, so we can't find the manager therefore we'll return that this gateway can't be used
                return null;
            }
            
            
            $manager_2_property_uid_xref_array = build_property_manager_xref_array();
            if (isset($manager_2_property_uid_xref_array[$property_uid])) {
                $manager_uid = $manager_2_property_uid_xref_array[$property_uid];
                }
            }
        else {
            $manager_uid = $thisJRUser->id;
            }

        if (!isset($manager_uid) || (int)$manager_uid < 1 ) { // If we can't figure out the manager uid we're stuffed, need to back out of this script
            return null;
        }
		jr_import("stripe_user");
		$stripe_user=new stripe_user();

		$this->outputArray=array();

		jr_import("stripe_user");
		$stripe_user=new stripe_user();
		$stripe_user->getStripeUser($manager_uid);

		if ($stripe_user->connected == "1")
			$active=jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',false);
		else
			$active=jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',false);
		
		$status = 'status=no,toolbar=yes,scrollbars=yes,titlebar=no,menubar=yes,resizable=yes,width=750,height=500,directories=no,location=no';
		$link = JOMRES_SITEPAGE_URL_NOSEF."&task=editGateway&popup=1&tmpl=".get_showtime("tmplcomponent")."&plugin=$plugin";
		$gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false);
		$pluginLink="<a href=\"javascript:void window.open('".$link."', 'win2', '".$status."');\" title=\"".$plugin."\">".$gatewayname."</a>";
		$button="<IMG SRC=\"".get_showtime('eLiveSite')."j00510".$plugin.".gif"."\" border=\"0\">";

        $balance_payments_supported = "1"; // This setting allows individual gateways to declare if they support balance payments or not. If it's not set at all Jomres will know that the gateway is an older version that does not support balance payments and the gateway will not be offered on the "show gateways for invoice" page. This allows us to improve the paypal gateway override functionality without offering older gateways that can't handle secondary payments.

		$this->outputArray=array('button'=>$button,'link'=>$pluginLink, 'active'=>$active , "balance_payments_supported" => $balance_payments_supported , "connected" => (bool)$stripe_user->connected );
		}

	function touch_template_language()
		{
		$plugin="stripe";
		echo jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin));
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->outputArray;
		}
	}
