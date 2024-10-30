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

function get_available_property_list_templates()
{
	$available_templates = [];

	$available_templates['list_properties'] = [ 'template_name' => 'list_properties' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_LIST_DEFAULT', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_LIST_DEFAULT', false) ,'show_property_list_header' => true ];
	$available_templates['property_list_minimalist'] = [ 'template_name' => 'property_list_minimalist' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_LIST_MINIMALIST_VIEW', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_LIST_MINIMALIST_VIEW', false) ,'show_property_list_header' => false ];
	$available_templates['property_list_box'] = [ 'template_name' => 'property_list_box' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_LIST_BOX_VIEW', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_LIST_BOX_VIEW', false) ,'show_property_list_header' => false ];

	return $available_templates;
}


	function get_available_property_photo_templates()
	{
		$available_templates = [];

		$available_templates['list_properties_photos_layout'] = [ 'template_name' => 'list_properties_photos_layout' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_PHOTO_DEFAULT', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_PHOTO_DEFAULT', false)  ,'show_property_list_header' => true];
		$available_templates['list_properties_photos_small_thumbs'] = [ 'template_name' => 'list_properties_photos_small_thumbs' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_PHOTO_THUMB', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_PHOTO_THUMB', false)  ,'show_property_list_header' => true];
		$available_templates['list_properties_photos_large_images'] = [ 'template_name' => 'list_properties_photos_large_images' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_LIST_TEMPLATES_PHOTO_LARGE', 'JOMRES_BS5_PROPERTY_LIST_TEMPLATES_PHOTO_LARGE', false)  ,'show_property_list_header' => true];

		return $available_templates;
	}
