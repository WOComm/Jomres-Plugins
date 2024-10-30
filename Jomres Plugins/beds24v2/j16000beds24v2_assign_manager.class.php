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
#[AllowDynamicProperties]
class j16000beds24v2_assign_manager
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
		$ePointFilepath = get_showtime('ePointFilepath');
		$output     = array ();
		$pageoutput = array ();
		$rows       = array ();

		$output[ 'AJAXURL' ]                     = JOMRES_SITEPAGE_URL_ADMIN . '&nofollowtmpl';
		$output[ '_JOMRES_CRATES_CLICKINITIAL' ] = jr_gettext( "_JOMRES_CRATES_CLICKINITIAL", '_JOMRES_CRATES_CLICKINITIAL',false );
		$output[ 'BEDS24_ASSIGN_MANAGER_DESC' ] = jr_gettext( "BEDS24_ASSIGN_MANAGER_DESC", 'BEDS24_ASSIGN_MANAGER_DESC',false );

		jr_import( 'jrportal_property_functions' );
		$propertyFunctions  = new jrportal_property_functions();
		$jomresPropertyList = $propertyFunctions->getAllJomresProperties();

		$initials = array ();
		foreach ( $jomresPropertyList as $pn )
			{
			if ( !array_key_exists( strtoupper( substr( $pn[ 'property_name' ], 0, 1 ) ), $initials ) ) 
				$initials[ strtoupper( jr_substr( $pn[ 'property_name' ], 0, 1 ) ) ] = 1;
			else
				$initials[ strtoupper( jr_substr( $pn[ 'property_name' ], 0, 1 ) ) ]++;
			}

		ksort( $initials );

		foreach ( $initials as $key => $val )
			{
			$r              = array ();
			$r[ 'INITIAL' ] = $key;
			$r[ 'COUNT' ]   = $val;
			$rows[ ]        = $r;
			}

		$pageoutput[ ] = $output;
		$tmpl          = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'property_initials.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		echo $tmpl->getParsedTemplate();
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}