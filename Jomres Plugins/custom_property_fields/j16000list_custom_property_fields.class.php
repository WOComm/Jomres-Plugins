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

class j16000list_custom_property_fields
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$output=array();
		$sample_template = "";
		
		$output['TITLE']=jr_gettext("_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE",'_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',false);
		$output['INSTRUCTIONS']=jr_gettext("_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO",'_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',false);
		$output['HFIELDNAME']=jr_gettext("_JOMRES_COM_CUSTOMFIELDS_FIELDNAME",'_JOMRES_COM_CUSTOMFIELDS_FIELDNAME',false);
		$output['HDEFAULTVALUE']=jr_gettext("_JOMRES_COM_CUSTOMFIELDS_DEFAULTVALUE",'_JOMRES_COM_CUSTOMFIELDS_DEFAULTVALUE',false);
		$output['HDESCRIPTION']=jr_gettext("_JOMRES_COM_CUSTOMFIELDS_DESCRIPTION",'_JOMRES_COM_CUSTOMFIELDS_DESCRIPTION',false);
		$output['HREQUIRED']=jr_gettext("_JOMRES_COM_CUSTOMFIELDS_REQUIRED",'_JOMRES_COM_CUSTOMFIELDS_REQUIRED',false);
		$output['HORDER']=jr_gettext("_JOMRES_ORDER",'_JOMRES_ORDER');
		$output['_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS']=jr_gettext("_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS",'_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',false);
		$output[ 'HPROPERTY_TYPES' ] = jr_gettext( '_JOMRES_FRONT_PTYPE', '_JOMRES_FRONT_PTYPE',false );
		
		jr_import('jomres_custom_property_field_handler');
		$custom_fields = new jomres_custom_property_field_handler();
		$allCustomFields = $custom_fields->getAllCustomFields();

		if (is_null($allCustomFields)){
			$allCustomFields =[];
		}

		$editIcon	='<img src="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" alt="editicon" />';
		
		$query      = "SELECT * FROM #__jomres_ptypes";
		$ptypeList  = doSelectSql( $query );
		$all_ptypes = array ();
		if ( !empty( $ptypeList ) )
			{
			foreach ( $ptypeList as $ptype )
				{
				$all_ptypes[ $ptype->id ] = $ptype->ptype;
				}
			}

		$rows = [];
		if (count ($allCustomFields)>0)
			{
			$sample_template .='<patTemplate:tmpl name="pageoutput" unusedvars="strip">';
			foreach ($allCustomFields as $field)
				{
				$ptype_xref=unserialize($field['ptype_xref']);
				$selected_ptype_rows = "";
				
				foreach ( $ptype_xref as $ptype )
					{
					$selected_ptype_rows .= $all_ptypes[ $ptype ] . ', ';
					}
				
				$selected_ptype_rows = rtrim($selected_ptype_rows, ', ');
				
				$r=array();
				$r['REQUIRED']=jr_gettext("_JOMRES_COM_MR_NO",'_JOMRES_COM_MR_NO');
				if ($field['required']==1)
					$r['REQUIRED']="<b>".jr_gettext("_JOMRES_COM_MR_YES",'_JOMRES_COM_MR_YES',false)."</b>";
				$r['DEFAULT_VALUE']=$field['default_value'];
				$r['DESCRIPTION']=$field['description'];
				$r['ORDER']=$field['order'];
				$r['FIELDNAME']=$field['fieldname'];
				
				if (!using_bootstrap())
					{
					$r['EDITLINK']= '<a href="'.JOMRES_SITEPAGE_URL_ADMIN.'&task=edit_custom_property_field&uid='.$field['uid'].'">'.$editIcon.'</a>' ;
					}
				else
					{
					$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
					$toolbar->newToolbar();
					$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=edit_custom_property_field&uid=' . $field['uid'] ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
					$toolbar->addSecondaryItem( 'fa fa-trash-o', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=delete_custom_property_field&uid=' . $field['uid'] ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
					
					$r['EDITLINK'] = $toolbar->getToolbar();
					}
				
				
				$r[ 'PROPERTY_TYPES' ] = $selected_ptype_rows;
				$rows[]=$r;
				$sample_template .= '<div><b>{'.strtoupper($field['fieldname']).'_DESC}</b> {'.strtoupper($field['fieldname']).'}</div>';
				}
			$sample_template .='</patTemplate:tmpl>';
			}

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$image = $jrtbar->makeImageValid("/".JOMRES_ROOT_DIRECTORY."/images/jomresimages/small/AddItem.png");
		$link = JOMRES_SITEPAGE_URL_ADMIN;
		
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN,jr_gettext("_JRPORTAL_CANCEL",'_JRPORTAL_CANCEL',false));
		$jrtb .= $jrtbar->customToolbarItem('edit_custom_field',$link,jr_gettext("_JOMRES_COM_MR_NEWTARIFF",'_JOMRES_COM_MR_NEWTARIFF',false),$submitOnClick=true,$submitTask="edit_custom_property_field",$image);
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['JOMRES_SITEPAGE_URL_ADMIN']=JOMRES_SITEPAGE_URL_ADMIN;
		$output['SAMPLE_TEMPLATE']='<textarea class="inputbox" cols="100" rows="30" >'.$sample_template.'</textarea>';

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_custom_property_data.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		echo $output['SAMPLE_TEMPLATE'];
		}

	function touch_template_language()
		{
		$output = array ();

		jr_import('jomres_custom_property_field_handler');
		$custom_fields = new jomres_custom_property_field_handler();
		$allCustomFields = $custom_fields->getAllCustomFields();
		
		if (count ($allCustomFields)>0)
			{
			foreach ($allCustomFields as $field)
				{
				$output[ ] = jr_gettext( 'CUSTOM_PROPERTY_FIELD_TITLE_'.$field['fieldname'], $field['description'] );
				}
			}


		foreach ( $output as $o )
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