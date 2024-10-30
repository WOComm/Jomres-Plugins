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

/**
#
 * Outgoing interrupt for cheque details
 #
* @package Jomres
#
 */

class j00600cheque {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$mrConfig=getPropertySpecificSettings();
		$plugin="cheque";
		$bookingdata=$componentArgs['bookingdata'];

		$output=array();
		$valid_manager_id = 0;

		$output["BOOKING_NUMBER"] = $bookingdata["booking_number"];
		$output['DEPOSIT']=output_price($bookingdata['deposit_required']);
		$output['TOTAL']=output_price($bookingdata['contract_total']);
		$bal=(float)$bookingdata['contract_total']-(float)$bookingdata['deposit_required'];
		$output['BALANCE']=output_price($bal);

		$mrConfig = getPropertySpecificSettings( (int)$bookingdata['property_uid'] );

		if ($mrConfig[ 'is_real_estate_listing' ] == 1) {
			return;
		}

		if (!isset($mrConfig['property_business_name'])) {
			$mrConfig['property_business_name'] = '';
		}
		if (!isset($mrConfig['property_vat_number'])) {
			$mrConfig['property_vat_number'] = '';
		}
		if (!isset($mrConfig['property_business_houseno'])) {
			$mrConfig['property_business_houseno'] = '';
		}
		if (!isset($mrConfig['property_business_street'])) {
			$mrConfig['property_business_street'] = '';
		}
		if (!isset($mrConfig['property_business_town'])) {
			$mrConfig['property_business_town'] = '';
		}
		if (!isset($mrConfig['property_business_region'])) {
			$mrConfig['property_business_region'] = '';
		}
		if (!isset($mrConfig['property_business_country'])) {
			$mrConfig['property_business_country'] = '';
		}
		if (!isset($mrConfig['property_business_postcode'])) {
			$mrConfig['property_business_postcode'] = '';
		}
		if (!isset($mrConfig['property_business_telephone'])) {
			$mrConfig['property_business_telephone'] = '';
		}
		if (!isset($mrConfig['property_business_email'])) {
			$mrConfig['property_business_email'] = '';
		}

		$output['PROP_NAME']=$mrConfig['property_business_name'];
		$output['PROP_STREET']=$mrConfig['property_business_houseno'].' '.$mrConfig['property_business_street'];
		$output['PROP_TOWN']=$mrConfig['property_business_town'];
		$output['PROP_POSTCODE']=$mrConfig['property_business_postcode'];
		$output['PROP_REGION']=$mrConfig['property_business_region'];
		$output['PROP_COUNTRY']=$mrConfig['property_business_country'] ;
		$output['PROP_TEL']=$mrConfig['property_business_telephone'];
		$output['PROP_EMAIL']=$mrConfig['property_business_email'];

		$output['GATEWAY']=$plugin;
		$output['JR_GATEWAY_SENDDEPOSITTO']	=jr_gettext('_JOMRES_CUSTOMTEXT_SENDDEPOSITTO'.$plugin,"Please send your deposit of ");
		$output['JR_GATEWAY_BELOWADDRESS']	=jr_gettext('_JOMRES_CUSTOMTEXT_BELOWADDRESS'.$plugin," to the address below ");
		$output['JR_GATEWAY_CONTACTUS1']	=jr_gettext('_JOMRES_CUSTOMTEXT_CONTACTUS1'.$plugin,"If you have any problems, please do not hesitate to contact us. You can ring us on ");
		$output['JR_GATEWAY_CONTACTUS2']	=jr_gettext('_JOMRES_CUSTOMTEXT_CONTACTUS2'.$plugin," or email us at ");
		$output['_JOMRES_REVIEWS_SUBMIT']	= jr_gettext('_JOMRES_REVIEWS_SUBMIT','_JOMRES_REVIEWS_SUBMIT',false);

		$output['_JOMRES_BOOKING_NUMBER']	= str_replace( " " , "%20" , jr_gettext('_JOMRES_BOOKING_NUMBER', '_JOMRES_BOOKING_NUMBER', false));
		$output['_JOMRES_FRONT_MR_MENU_BOOKTHISPROPERTY']	= jr_gettext('_JOMRES_FRONT_MR_MENU_BOOKTHISPROPERTY', '_JOMRES_FRONT_MR_MENU_BOOKTHISPROPERTY', false);



		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'j00600'.$plugin.'.html' );
		$tmpl->addRows( 'interrupt_outgoing', $pageoutput );
		$tmpl->displayParsedTemplate();
		}
		
	function touch_template_language()
		{
		$output=array();
		$plugin="cheque";

		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_SENDDEPOSITTO'.$plugin,"Please send your deposit of ");
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_BELOWADDRESS'.$plugin," to the address below ");
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_CONTACTUS1'.$plugin,"If you have any problems, please do not hesitate to contact us. You can ring us on ");
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_CONTACTUS2'.$plugin," or email us at ");
		
		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
