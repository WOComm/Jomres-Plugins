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

class j00510braintree {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');
		$plugin="braintree";
		$defaultProperty=getDefaultProperty();

		$settingArray=array();
		$settingArray['active']="0";
		$settingArray['merchant_id']		= "";
		$settingArray['public_key']			= "";
		$settingArray['private_key']		= "";
		$settingArray['test_mode']			= "1";
		$settingArray['test_merchant_id']	= "";
		$settingArray['test_public_key']	= "";
		$settingArray['test_private_key']	= "";

		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',FALSE) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',FALSE) );

		$output = [];

		$query="SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = '".(int)$defaultProperty."' AND plugin = '$plugin' ";
		$settingsList=doSelectSql($query);
		foreach ($settingsList as $set) {
			$settingArray[$set->setting]=$set->value;
		}

		$output['LOGO'] = $eLiveSite."j00510".$plugin.".png";

		$output['JR_GATEWAY_CONFIG_ACTIVE']	= jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_ACTIVE'.$plugin,"Active");
		$output['ACTIVE']					= jomresHTML::selectList( $yesno, 'active', 'class="" size="1"', 'value', 'text', $settingArray['active']  );
		$output['MERCHANT_ID']				= $settingArray['merchant_id'];
		$output['PUBLIC_KEY']				= $settingArray['public_key'];
		$output['PRIVATE_KEY']				= $settingArray['private_key'];

		$output['TEST_MERCHANT_ID']			= $settingArray['test_merchant_id'];
		$output['TEST_PUBLIC_KEY']			= $settingArray['test_public_key'];
		$output['TEST_PRIVATE_KEY']			= $settingArray['test_private_key'];

		$output['TEST_MODE']				= jomresHTML::selectList( $yesno, 'test_mode', 'class="" size="1"', 'value', 'text', $settingArray['test_mode']);
		$output['BRAINTREE_API_TEST_MODE']			= jr_gettext('BRAINTREE_API_TEST_MODE','BRAINTREE_API_TEST_MODE');
		$output['BRAINTREE_API_TEST_MODE_DESC']		= jr_gettext('BRAINTREE_API_TEST_MODE_DESC','BRAINTREE_API_TEST_MODE_DESC');

		$output['BITPAY_TITLE']						= jr_gettext('BITPAY_TITLE','BITPAY_TITLE');
		$output['BITPAY_MARKETING']					= jr_gettext('BITPAY_MARKETING','BITPAY_MARKETING');

		$output['BRAINTREE_MERCHANT_ID']			= jr_gettext('BRAINTREE_MERCHANT_ID','BRAINTREE_MERCHANT_ID');
		$output['BRAINTREE_MERCHANT_PUBLIC_KEY']	= jr_gettext('BRAINTREE_MERCHANT_PUBLIC_KEY','BRAINTREE_MERCHANT_PUBLIC_KEY');
		$output['BRAINTREE_MERCHANT_PRIVATE_KEY']	= jr_gettext('BRAINTREE_MERCHANT_PRIVATE_KEY','BRAINTREE_MERCHANT_PRIVATE_KEY');

		$output['BRAINTREE_TEST_MERCHANT_ID']			= jr_gettext('BRAINTREE_TEST_MERCHANT_ID','BRAINTREE_TEST_MERCHANT_ID');
		$output['BRAINTREE_TEST_MERCHANT_PUBLIC_KEY']		= jr_gettext('BRAINTREE_TEST_MERCHANT_PUBLIC_KEY','BRAINTREE_TEST_MERCHANT_PUBLIC_KEY');
		$output['BRAINTREE_TEST_MERCHANT_PRIVATE_KEY']	= jr_gettext('BRAINTREE_TEST_MERCHANT_PRIVATE_KEY','BRAINTREE_TEST_MERCHANT_PRIVATE_KEY');

		$output['GATEWAY']							= $plugin;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_gateway.html' );
		$tmpl->addRows( 'edit_gateway', $pageoutput );
		$tmpl->displayParsedTemplate();
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
		return null;
		}
	}
