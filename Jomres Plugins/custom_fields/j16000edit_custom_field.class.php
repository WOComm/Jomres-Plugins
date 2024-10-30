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

class j16000edit_custom_field {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; 
			return;
			}
		
		$uid = intval(jomresGetParam( $_REQUEST, 'uid', 0 ));
		
		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		
		$jomres_custom_field_handler = jomres_singleton_abstract::getInstance('jomres_custom_field_handler');
		$jomres_custom_field_handler->get_all_custom_fields();
		
		$thisField = array();
		if ( isset( $jomres_custom_field_handler->custom_fields[$uid] ) )
			$thisField = $jomres_custom_field_handler->custom_fields[$uid];
		
		$output = array();
		$ptype_xref = array();
		$all_ptype_rows = array ();

		$output['HFIELD'] = jr_gettext("_JOMRES_COM_CUSTOMFIELDS_FIELDNAME",'_JOMRES_COM_CUSTOMFIELDS_FIELDNAME',false);
		$output['HDEFAULT_VALUE'] = jr_gettext("_JOMRES_COM_CUSTOMFIELDS_DEFAULTVALUE",'_JOMRES_COM_CUSTOMFIELDS_DEFAULTVALUE',false);
		$output['HDESCRIPTION'] = jr_gettext("_JOMRES_COM_CUSTOMFIELDS_DESCRIPTION",'_JOMRES_COM_CUSTOMFIELDS_DESCRIPTION',false);
		$output['HREQUIRED'] = jr_gettext("_JOMRES_COM_CUSTOMFIELDS_REQUIRED",'_JOMRES_COM_CUSTOMFIELDS_REQUIRED',false);
		$output['_JOMRES_COM_CUSTOMFIELDS_TITLE_EDIT'] = jr_gettext("_JOMRES_COM_CUSTOMFIELDS_TITLE_EDIT",'_JOMRES_COM_CUSTOMFIELDS_TITLE_EDIT',false);
		$output['_JOMRES_PROPERTY_TYPE_ASSIGNMENT'] = jr_gettext( '_JOMRES_PROPERTY_TYPE_ASSIGNMENT', '_JOMRES_PROPERTY_TYPE_ASSIGNMENT',false );

		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext("_JOMRES_COM_MR_NO",'_JOMRES_COM_MR_NO',false) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext("_JOMRES_COM_MR_YES",'_JOMRES_COM_MR_YES',false) );
		
		$output['FIELDNAME'] = '';
		$output['DEFAULT_VALUE'] = '';
		$output['DESCRIPTION'] = '';
		$output['REQUIRED'] = jomresHTML::selectList( $yesno, 'required',' ', 'value', 'text', false);
		$output['UID'] = 0;
		
		if ( !empty($thisField) )
			{
			$ptype_xref = unserialize( $thisField['ptype_xref'] );
			
			$output['FIELDNAME'] 		= $thisField['fieldname'];
			$output['DEFAULT_VALUE'] 	= $thisField['default_value'];
			$output['DESCRIPTION'] 		= $thisField['description'];
			$output['REQUIRED'] 		= jomresHTML::selectList( $yesno, 'required',' ', 'value', 'text', (int)$thisField['required']);
			$output['UID'] 				= $thisField['uid'];
			}

		if ( !empty( $current_property_details->all_property_types ) )
			{
			foreach ( $current_property_details->all_property_types as $ptype => $ptype_desc )
				{
				$r = array();
				
				$r[ 'propertytype_id' ]   = $ptype;
				$r[ 'propertytype_desc' ] = $current_property_details->all_property_type_titles[ $ptype ];
				$r[ 'checked' ]           = "";
				
				if ( in_array( $ptype, $ptype_xref ) ) 
					$r[ 'checked' ] = " checked ";
				
				$all_ptype_rows[] = $r;
				}
			}
		
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_custom_field');
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN."&task=listCustomFields",'');
		if ($uid > 0)
			$jrtb .= $jrtbar->toolbarItem('delete',JOMRES_SITEPAGE_URL_ADMIN."&task=delete_custom_field&no_html=1&uid=".$uid,'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
		$tmpl->readTemplatesFromInput( 'edit_custom_field.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'all_ptype_rows', $all_ptype_rows );
		$tmpl->displayParsedTemplate();
		
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
