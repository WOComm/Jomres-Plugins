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
	 * Property Configuration page tabs. Offers invoice number related settings.
	 * 
	 */


class j00501view_property_template
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
		if ($componentArgs['is_channel_property']) {
			return;
		}

		$configurationPanel = $componentArgs['configurationPanel'];

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		$mrConfig = getPropertySpecificSettings();
		$lists = $componentArgs['lists'];

		$configurationPanel->startPanel(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_TITLE', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_TITLE', false));

		$available_templates = get_property_details_templates();

		if (!isset($jrConfig['property_details_template_managers_allowed_to_choose'])) {
			$jrConfig['property_details_template_managers_allowed_to_choose'] = '1';
			}

		if ($jrConfig['property_details_template_managers_allowed_to_choose'] =='0') {
			return;
		}

		if ($mrConfig[ 'is_real_estate_listing' ] == 0 && !get_showtime('is_jintour_property') ) {
			$templates = array();
			foreach ( $available_templates as $template_choice){
				$templates[] = jomresHTML::makeOption(  $template_choice['template_name'] ,  $template_choice['friendly_name']);
			}

			if (!isset($mrConfig['property_details_template'])) {
				$mrConfig['property_details_template'] = 'property_details';
			}

			$configurationPanel->setleft(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_TITLE', 'JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_TITLE', false));
			$configurationPanel->setmiddle(jomresHTML::selectList($templates, 'cfg_property_details_template', 'class="inputbox" size="1"', 'value', 'text', $mrConfig['property_details_template'] , false  ));
			$configurationPanel->setright(jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_DESCRIPTION', 'JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_DESCRIPTION', false));
			$configurationPanel->insertSetting();
		}

		$configurationPanel->endPanel();
	}


	public function getRetVals()
	{
		return null;
	}
}
