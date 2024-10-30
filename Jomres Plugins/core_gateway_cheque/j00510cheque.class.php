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


class j00510cheque {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$plugin="cheque";
		$button="<IMG SRC=\"".get_showtime('eLiveSite')."j00510".$plugin.".gif\" border=\"0\">";
		$defaultProperty=getDefaultProperty();

		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',false,FALSE) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',false,FALSE) );

		$query="SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = '$defaultProperty' AND plugin = '$plugin' ";
		$settingsList=doSelectSql($query);
		foreach ($settingsList as $set) {
			$settingArray[$set->setting]=$set->value;
			}

        if (!isset($settingArray['active'])) {
            $settingArray['active'] = "0";
            }

		if (!isset($settingArray['test_mode'])) {
			$settingArray['test_mode'] = "1";
			}

		$output = array();
		$pageoutput = array();

		$output['TEST_MODE']				= jomresHTML::selectList( $yesno, 'test_mode', 'class="" size="1"', 'value', 'text', $settingArray['test_mode']);

		$output['_JOMRES_COM_A_GATEWAYLIST_TEST_MODE_STR'] = jr_gettext('_JOMRES_COM_A_GATEWAYLIST_TEST_MODE_STR', '_JOMRES_COM_A_GATEWAYLIST_TEST_MODE_STR', false);
		$output['JOMRES_CHEQUE_GATEWAY_CHEQUE_INFO'] = jr_gettext('JOMRES_CHEQUE_GATEWAY_CHEQUE_INFO', 'JOMRES_CHEQUE_GATEWAY_CHEQUE_INFO', false);


		$output['GATEWAYNAME']=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false);
		$output['GATEWAYLOGO']=$button;
		$output['GATEWAY']=$plugin;
		$output['JR_GATEWAY_CONFIG_ACTIVE']=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_ACTIVE'.$plugin,"Active");
		$output['ACTIVE'] = jomresHTML::selectList( $yesno, 'active', 'class="inputbox" size="1"', 'value', 'text', $settingArray['active'] );
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( get_showtime('ePointFilepath') );
		$tmpl->readTemplatesFromInput( 'j00510'.$plugin.'.html' );
		$tmpl->addRows( 'edit_gateway', $pageoutput );
		$tmpl->displayParsedTemplate();	
		}

	function touch_template_language()
		{
		$output=array();
		$plugin="cheque";
		
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_ACTIVE'.$plugin,"Active");

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
