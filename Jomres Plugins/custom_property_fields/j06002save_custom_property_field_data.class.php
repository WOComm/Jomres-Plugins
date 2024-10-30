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

class j06002save_custom_property_field_data
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$defaultProperty=getDefaultProperty();
		$clean_custom_field_data = array();
		
		$custom_field_data = $_POST['custom_property_field_data'];
		
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data( $defaultProperty );
		$ptype_id = $current_property_details->ptype_id;
		
		if (!empty($custom_field_data))
			{
			foreach ($custom_field_data as $key=>$d)
				{

				$dirty=getEscaped(RemoveXSS($key)); 
				$dirty=jomres_remove_HTML($dirty);
				$clean_key=filter_var($dirty,FILTER_SANITIZE_SPECIAL_CHARS);
				
				$dirty=getEscaped(RemoveXSS($d)); 
				$dirty=jomres_remove_HTML($dirty);
				$clean=filter_var($dirty,FILTER_SANITIZE_SPECIAL_CHARS);
				
				$clean_custom_field_data[$clean_key] = $clean;
				}
			//$query = "DELETE FROM #__jomres_custom_property_fields_data WHERE property_uid =".(int)$defaultProperty;
			//$result = doInsertSql($query,'');
			
			jr_import('jomres_custom_property_field_handler');
			$custom_fields = new jomres_custom_property_field_handler();
			$allCustomFields = $custom_fields->getAllCustomFields($ptype_id);
			$all_field_names = array();
			foreach ($allCustomFields as $f)
				{
				$all_field_names[] = $f['fieldname'];
				}
			
			foreach ($clean_custom_field_data as $key=>$d)
				{
				if (in_array($key,$all_field_names) )
					{
					$query = "SELECT id FROM #__jomres_custom_property_fields_data WHERE `fieldname` = '".$key."' AND property_uid = ".(int)$defaultProperty;
					$custom_field_id = doSelectSql($query,1);

					if ($custom_field_id > 0)
						$query = "UPDATE #__jomres_custom_property_fields_data SET `data`='".$d."'  WHERE `property_uid`=".(int)$defaultProperty." AND `fieldname` = '".$key."'";
					else
						$query = "INSERT INTO #__jomres_custom_property_fields_data (`fieldname`,`data`,`property_uid`) VALUES ( '".$key."','".$d."',".(int)$defaultProperty.")";
					$result = doInsertSql($query,'');
					
					updateCustomText("CUSTOM_PROPERTY_FIELD_DATA_".$key."_".(int)$defaultProperty,$d,TRUE,$defaultProperty);
					
					}
				}
			}
		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=custom_property_field_data") ,"" );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

