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

function get_property_details_templates()
{
	$available_templates = [];

	$available_templates['property_details'] = [ 'template_name' => 'property_details' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DEFAULT', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DEFAULT', false) ];
	$available_templates['property_details_lux'] = [ 'template_name' => 'property_details_lux' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_LUX', '_JOMRJOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_LUXES_COM_MR_NO', false) ];
	$available_templates['property_details_minimalist'] = [ 'template_name' => 'property_details_minimalist' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_MINIMALIST', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_MINIMALIST', false) ];
	$available_templates['property_details_calendar_only'] = [ 'template_name' => 'property_details_calendar_only' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_CALENDAR_ONLY', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_CALENDAR_ONLY', false) ];
	$available_templates['property_details_dynamo'] = [ 'template_name' => 'property_details_dynamo' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DYNAMO', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DYNAMO', false) ];
	$available_templates['property_details_erika'] = [ 'template_name' => 'property_details_erika' , 'friendly_name' => jr_gettext('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ERIKA', 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ERIKA', false) ];

	return $available_templates;
}