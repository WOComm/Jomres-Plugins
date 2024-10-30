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

class j06002custom_property_field_data
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$defaultProperty=getDefaultProperty();
		$output = array();
		$pageoutput = array();
		$rows=array();
		
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data( $defaultProperty );
		$ptype_id = $current_property_details->ptype_id;
		
		$output['_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE'] = jr_gettext('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE','_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',false,false);
		
		jr_import('jomres_custom_property_field_handler');
		$custom_fields = new jomres_custom_property_field_handler();
		$allCustomFields = $custom_fields->getAllCustomFields($ptype_id);
		
		$current_data = $custom_fields->get_custom_field_data_for_property_uid($defaultProperty);
		if (!empty($allCustomFields))
			{
			foreach ($allCustomFields as $field)
				{
				$r=array();
				$fieldname =$field['fieldname'];
				$r['fieldname']=$fieldname;
				$r['description']=jr_gettext( 'CUSTOM_PROPERTY_FIELD_TITLE_'.$fieldname, $field['description'],true );
				if (!isset($current_data[$defaultProperty][$fieldname]))
					$r['default_value']=jomres_decode($field['default_value']);
				else
					{
					$r['default_value']=jomres_decode($current_data[$defaultProperty][$fieldname]);
					}
				$rows[]=$r;
				}
			}
		else
			{
			echo "Oops, you haven't created any custom fields in the administrator area";
			return;
			}
		
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL.""),'');
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_custom_property_field_data');
		
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_custom_property_data.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE','_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE');

		
		foreach ($output as $o)
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
