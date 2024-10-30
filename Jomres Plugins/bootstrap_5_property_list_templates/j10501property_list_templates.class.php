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

class j10501property_list_templates
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

		if (!isset( $jrConfig['property_list_template'])){
			$jrConfig['property_list_template'] = 'list_properties';
		}

		if (!isset( $jrConfig['property_photos_template'])){
			$jrConfig['property_photos_template'] = 'list_properties_photo_layout';
		}

		$available_list_templates =  get_available_property_list_templates();
		$available_photo_templates =  get_available_property_photo_templates();

		$list_templates = array();
		foreach ( $available_list_templates as $template_choice){
			$list_templates[] = jomresHTML::makeOption(  $template_choice['template_name'] ,  $template_choice['friendly_name']);
		}

		$photo_templates = array();
		foreach ( $available_photo_templates as $template_choice){
			$photo_templates[] = jomresHTML::makeOption(  $template_choice['template_name'] ,  $template_choice['friendly_name']);
		}

		$configurationPanel = $componentArgs[ 'configurationPanel' ];

		$configurationPanel->startPanel(ucfirst(jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_TITLE', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_TITLE', false)));

		$configurationPanel->insertDescription(jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_INFO', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_INFO', false));

		$configurationPanel->setleft(jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_ADMIN_LIST_DEFAULT', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_ADMIN_LIST_DEFAULT', false));
		$configurationPanel->setmiddle(jomresHTML::selectList($list_templates, 'cfg_property_list_template', 'class="inputbox" size="1"', 'value', 'text', $jrConfig['property_list_template'] , false  ));
		$configurationPanel->setright(jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_ADMIN_LIST_DEFAULT_INFO', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_ADMIN_LIST_DEFAULT_INFO', false));
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_ADMIN_PHOTO_DEFAULT', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_ADMIN_PHOTO_DEFAULT', false));
		$configurationPanel->setmiddle(jomresHTML::selectList($photo_templates, 'cfg_property_photos_template', 'class="inputbox" size="1"', 'value', 'text', $jrConfig['property_photos_template'] , false  ));
		$configurationPanel->setright(jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_ADMIN_PHOTO_DEFAULT_INFO', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_ADMIN_PHOTO_DEFAULT_INFO', false));
		$configurationPanel->insertSetting();

		$configurationPanel->endPanel();
	}


	public function getRetVals()
	{
		return null;
	}
}
