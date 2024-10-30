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

class j01012custom_property_fields
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$property_uids= '';
		if ( isset( $componentArgs[ 'property_uid' ] ) ) 
			$property_uid = $componentArgs[ 'property_uid' ];
		if ( isset( $componentArgs[ 'property_uids' ] ) ) 
			$property_uids = $componentArgs[ 'property_uids' ];
		
		jr_import('jomres_custom_property_field_handler');
		$custom_fields = new jomres_custom_property_field_handler();
		$this->returnValue = array();
		if ( is_array( $property_uids ) )
			{
			$relevant_properties = array ();
			
			$current_data = $custom_fields->get_custom_field_data_for_property_uid($property_uids);
			
			foreach ($property_uids as $property_uid)
				{
				$output = array();
				$pageoutput = array();
				
				$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
				$current_property_details->gather_data( $property_uid );
				$ptype_id = $current_property_details->ptype_id;

				$allCustomFields = $custom_fields->getAllCustomFields($ptype_id);

				if (!empty($current_data))
					{
					$all_fields=array();
					foreach ($allCustomFields as $field) // Just grabbing the stuff we need from the allCustomFields arr
						{
						$all_field_descriptions[$field['fieldname']]=$field['description'];
						}
					if (isset($current_data[$property_uid]))
						{
						foreach ($current_data[$property_uid] as $fieldname=>$fielddata)
							{
                            if (isset($all_field_descriptions[$fieldname])) {
                                $field_title = $all_field_descriptions[$fieldname];
                                $output[$fieldname] = jomres_decode($fielddata);
                                $output[$fieldname."_DESC"] = jomres_decode($field_title);
                                $output[$fieldname."_STYLE"] = 'display:block;';
                                }
							}
						}
					$pageoutput[]=$output;
					$tmpl = new patTemplate();
					$tmpl->addRows( 'pageoutput', $pageoutput );
					$tmpl->setRoot( $ePointFilepath.JRDS.'templates' );
					$tmpl->readTemplatesFromInput( 'propertylist_custom_property_fields.html');
					$parsedTemplate = $tmpl->getParsedTemplate();

					$relevant_properties[ $property_uid ] = $parsedTemplate;
					}
				}
			set_showtime( 'propertylist_custompropertyfields', $relevant_properties );
			}
		else
			{
			$relevant_properties = get_showtime( 'propertylist_custompropertyfields' );

			if ( array_key_exists( $property_uid, $relevant_properties ) )
				{
				$this->returnValue = array ( 'CUSTOM_PROPERTY_FIELDS_DATA_SNIPPET' => $relevant_properties[ $property_uid ] );
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->returnValue;
		}
	}
