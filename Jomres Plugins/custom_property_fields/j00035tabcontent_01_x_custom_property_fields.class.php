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

class j00035tabcontent_01_x_custom_property_fields
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$property_uid=(int)$componentArgs['property_uid'];  
		$ePointFilepath=get_showtime('ePointFilepath');
		$mrConfig=getPropertySpecificSettings($property_uid);
		$output = array();
		$this->retVals = '';
		
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data( $property_uid );
		$ptype_id = $current_property_details->ptype_id;
		
		jr_import('jomres_custom_property_field_handler');
		$custom_fields = new jomres_custom_property_field_handler();
		$allCustomFields = $custom_fields->getAllCustomFields($ptype_id);
		$current_data = $custom_fields->get_custom_field_data_for_property_uid($property_uid);
		if (empty($current_data)) // Nothing to see here, move along
			return;
		
		$all_fields=array();
		foreach ($allCustomFields as $field) // Just grabbing the stuff we need from the allCustomFields arr
			{
			$all_field_descriptions[$field['fieldname']]=$field['description'];
			}
		
		foreach ($current_data[$property_uid] as $fieldname=>$fielddata)
			{
			if (isset($all_field_descriptions[$fieldname])) 
				{
				$field_title = $all_field_descriptions[$fieldname];
				$output[$fieldname] = jomres_decode($fielddata);
				$output[$fieldname."_DESC"] = jomres_decode($field_title);
				$output[$fieldname."_STYLE"] = 'display:block;';
				}
			}
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates' );
		
		$tmpl->readTemplatesFromInput( 'tabcontent_01_custom_property_fields.html');
		$parsedTemplate = $tmpl->getParsedTemplate();

		$anchor = jomres_generate_tab_anchor(jr_gettext("_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE",'_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',false));
		$tab = array(
			"TAB_ANCHOR"=>$anchor,
			"TAB_TITLE"=>jr_gettext("_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE",'_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',false),
			"TAB_CONTENT"=>$parsedTemplate
			);
		$this->retVals = $tab;
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}

	}
