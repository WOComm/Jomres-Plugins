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

class j06000exchange_rate_conversion_selector
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; 
			$this->shortcode_data = array (
				"task" => "exchange_rate_conversion_selector",
				"info" => "_JOMRES_SHORTCODES_06000EXCHANGE_RATE_CONVERSION_SELECTOR",
				"arguments" => array (
					array (
						"argument" => "alternate_template",
						"arg_info" => "_JOMRES_SHORTCODES_06000EXCHANGE_RATE_CONVERSION_SELECTOR_ARG_ALTERNATE_TEMPLATE",
						"arg_example" => "0",
						)
					)
				);
			return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		$tmpBookingHandler->initBookingSession(get_showtime('jomressession'));
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		
		$alternate_template = false;
		if (isset($_REQUEST['alternate_template']) && $_REQUEST['alternate_template']=="1")
			$alternate_template = true;

		$output=array();
		if ($jrConfig['use_conversion_feature'] == "1")
			{
			if (is_null($tmpBookingHandler->user_settings['current_exchange_rate']))
				{
				$jomres_geolocation = jomres_getSingleton('jomres_geolocation');
				$jomres_geolocation->auto_set_user_currency_code();
				}

			$jomres_currency_conversion = jomres_singleton_abstract::getInstance('jomres_currency_conversion');
			
			if (!$jomres_currency_conversion->check_currency_code_valid($tmpBookingHandler->user_settings['current_exchange_rate']))
				$tmpBookingHandler->user_settings['current_exchange_rate'] = "GBP";

			$output['EXCHANGE_RATE_DROPDOWN'] = $jomres_currency_conversion->get_exchange_rate_dropdown($tmpBookingHandler->user_settings['current_exchange_rate'] , $alternate_template );
			$output['_JOMRES_CONVERSION_DISCLAIMER']=jr_gettext('_JOMRES_CONVERSION_DISCLAIMER','_JOMRES_CONVERSION_DISCLAIMER',false,false);
			$output['DISCLAIMER_TIP']=jomres_makeTooltip('_JOMRES_CONVERSION_DISCLAIMER',$hover_title="",$output['_JOMRES_CONVERSION_DISCLAIMER'],'_JOMRES_CONVERSION_DISCLAIMER',$class="",$type="infoimage",array("width"=>25,"height"=>25));
			}
		else
			{
			$output['EXCHANGE_RATE_DROPDOWN'] = "";
			$output['_JOMRES_CONVERSION_DISCLAIMER']="";
			$output['DISCLAIMER_TIP']="";
			}

		$pageoutput=array();
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'selector.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}


	}

