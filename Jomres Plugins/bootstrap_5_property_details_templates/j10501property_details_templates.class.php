<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
* @version Jomres 10.2.0
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j10501property_details_templates
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		if (!isset($jrConfig['property_details_template_managers_allowed_to_choose'])){
			$jrConfig['property_details_template_managers_allowed_to_choose'] = 1;
		}

		if (!isset( $jrConfig['property_details_template'])){
			$jrConfig['property_details_template'] = 'property_details';
		}

		$yesno = array();
		$yesno[] = jomresHTML::makeOption('0', jr_gettext('_JOMRES_COM_MR_NO', '_JOMRES_COM_MR_NO', false));
		$yesno[] = jomresHTML::makeOption('1', jr_gettext('_JOMRES_COM_MR_YES', '_JOMRES_COM_MR_YES', false));
		$yesno_managers_choose = jomresHTML::selectList($yesno, 'cfg_property_details_template_managers_allowed_to_choose', 'class="inputbox" size="1"', 'value', 'text', $jrConfig['property_details_template_managers_allowed_to_choose'] );

		$available_templates =  get_property_details_templates();

		$templates = array();
		foreach ( $available_templates as $template_choice){
			$templates[] = jomresHTML::makeOption(  $template_choice['template_name'] ,  $template_choice['friendly_name']);
		}

		$configurationPanel = $componentArgs[ 'configurationPanel' ];

		$configurationPanel->startPanel(ucfirst(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_TITLE', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_TITLE', false)));

		$configurationPanel->insertDescription(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_INFO', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_INFO', false));

		$configurationPanel->setleft(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT', false));
		$configurationPanel->setmiddle(jomresHTML::selectList($templates, 'cfg_property_details_template', 'class="inputbox" size="1"', 'value', 'text', $jrConfig['property_details_template'] , false  ));
		$configurationPanel->setright(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT_INFO', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT_INFO', false));
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED', false));
		$configurationPanel->setmiddle($yesno_managers_choose);
		$configurationPanel->setright(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED_INFO', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED_INFO', false));
		$configurationPanel->insertSetting();

		$configurationPanel->endPanel();
	}


	public function getRetVals()
	{
		return null;
	}
}
