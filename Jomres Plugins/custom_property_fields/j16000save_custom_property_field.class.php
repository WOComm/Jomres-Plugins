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

class j16000save_custom_property_field {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$uid				= intval(jomresGetParam( $_POST, 'uid', 0 ));
		$fieldname			= jomresGetParam( $_POST, 'fieldname', '' );
		$default_value 		= jomresGetParam( $_POST, 'default_value', '' );
		$description 		= jomresGetParam( $_POST, 'description', '' );
		$required			= intval(jomresGetParam( $_POST, 'required', 0 ));
		$ptype_ids     		= jomresGetParam( $_POST, 'ptype_ids', array () );

		$fieldname=preg_replace("/[^A-Za-z0-9]/",'',$fieldname);
		
		jr_import('jomres_custom_property_field_handler');
		$custom_fields = new jomres_custom_property_field_handler();
		$allCustomFields = $custom_fields->getAllCustomFields();

		if (is_null($allCustomFields)){
			$allCustomFields =[];
		}

		if (array_key_exists($uid,$allCustomFields) )
			$query = "UPDATE #__jomres_custom_property_fields_fields SET fieldname='".$fieldname."',default_value='".$default_value."',`description`='".$description."',required=".$required.",`ptype_xref`='".serialize($ptype_ids)."' WHERE id = ".$uid;
		else
			$query = "INSERT INTO #__jomres_custom_property_fields_fields (`fieldname`,`default_value`,`description`,`required`,`ptype_xref`) VALUES ( '".$fieldname."','".$default_value."','".$description."','".$required."','".serialize($ptype_ids)."')";
		$result = doInsertSql($query,'');

		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=list_custom_property_fields"), "" );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
