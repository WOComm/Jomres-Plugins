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

class j16000save_custom_field
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		
		jr_import( 'jrportal_custom_fields' );
		$jrportal_custom_fields = new jrportal_custom_fields();

		$jrportal_custom_fields->uid           = intval( jomresGetParam( $_POST, 'uid', 0 ) );
		$jrportal_custom_fields->fieldname     = preg_replace( '/[^A-Za-z0-9_-]+/', "", jomresGetParam( $_POST, 'fieldname', '' ) );
		$jrportal_custom_fields->default_value = jomresGetParam( $_POST, 'default_value', '' );
		$jrportal_custom_fields->description   = jomresGetParam( $_POST, 'description', '' );
		$jrportal_custom_fields->required      = intval( jomresGetParam( $_POST, 'required', 0 ) );
		$jrportal_custom_fields->ptype_ids     = jomresGetParam( $_POST, 'ptype_ids', array () );
		
		if ( $jrportal_custom_fields->fieldname == '' || $jrportal_custom_fields->description == '' )
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN . "&task=edit_custom_field&uid=".$jrportal_custom_fields->uid ), "" );
			return;
			}

		if ( $jrportal_custom_fields->uid > 0 )
			$jrportal_custom_fields->commit_update_custom_field();
		else
			$jrportal_custom_fields->commit_new_custom_field();

		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN . "&task=listCustomFields" ), "" );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
