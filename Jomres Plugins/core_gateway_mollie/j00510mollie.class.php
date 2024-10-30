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

class j00510mollie {
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
		$plugin="mollie";
		$defaultProperty=getDefaultProperty();

		$settingArray=array();
		$settingArray['active']="0";
		$settingArray['api_token']="";
		$settingArray['test_mode']="1";
		$settingArray['test_api_token']="";

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
		$output['ACTIVE']					= jomresHTML::selectList( $yesno, 'active', 'class="inputbox form-control" size="1"', 'value', 'text', $settingArray['active'] );
		$output['API_TOKEN']				= $settingArray['api_token'];
		$output['TEST_API_TOKEN']			= $settingArray['test_api_token'];
		$output['TEST_MODE']				= jomresHTML::selectList( $yesno, 'test_mode', 'class="inputbox form-control" size="1"', 'value', 'text', $settingArray['test_mode']);

		$output['MOLLIE_TITLE']					= jr_gettext('MOLLIE_TITLE','MOLLIE_TITLE');
		$output['MOLLIE_MARKETING']				= jr_gettext('MOLLIE_MARKETING','MOLLIE_MARKETING');
		$output['MOLLIE_API_TOKEN_TITLE']		= jr_gettext('MOLLIE_API_TOKEN_TITLE','MOLLIE_API_TOKEN_TITLE');
		$output['MOLLIE_TEST_API_TOKEN_TITLE']	= jr_gettext('MOLLIE_TEST_API_TOKEN_TITLE','MOLLIE_TEST_API_TOKEN_TITLE');
		$output['MOLLIE_API_TOKEN_DESC']		= jr_gettext('MOLLIE_API_TOKEN_DESC','MOLLIE_API_TOKEN_DESC');
		$output['MOLLIE_API_TEST_MODE']			= jr_gettext('MOLLIE_API_TEST_MODE','MOLLIE_API_TEST_MODE');
		$output['MOLLIE_API_TEST_MODE_DESC']	= jr_gettext('MOLLIE_API_TEST_MODE_DESC','MOLLIE_API_TEST_MODE_DESC');
		$output['COMMON_SUBMIT']				= jr_gettext('COMMON_SUBMIT','COMMON_SUBMIT');
		$output['GATEWAY']						= 'mollie';

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
