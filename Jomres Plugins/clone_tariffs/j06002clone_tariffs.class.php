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

class j06002clone_tariffs
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
		$output = array();
		$pageoutput = array();
		
		$output['_CLONE_TARIFFS_SOURCE']          = jr_gettext('_CLONE_TARIFFS_SOURCE','_CLONE_TARIFFS_SOURCE',false);
		$output['_CLONE_TARIFFS_TARGET']          = jr_gettext('_CLONE_TARIFFS_TARGET','_CLONE_TARIFFS_TARGET',false);
		$output['_CLONE_TARIFFS_TARIFF_TO_CLONE'] = jr_gettext('_CLONE_TARIFFS_TARIFF_TO_CLONE','_CLONE_TARIFFS_TARIFF_TO_CLONE',false);
		$output['_CLONE_TARIFFS_TARGET_ROOMTYPE'] = jr_gettext('_CLONE_TARIFFS_TARGET_ROOMTYPE','_CLONE_TARIFFS_TARGET_ROOMTYPE',false);
		$output['_CLONE_TARIFFS_TARGET_WARNING']         = jr_gettext('_CLONE_TARIFFS_TARGET_WARNING','_CLONE_TARIFFS_TARGET_WARNING',false);
		$output['_CLONE_TARIFFS_TARGET_DELETE_EXISTING'] = jr_gettext('_CLONE_TARIFFS_TARGET_DELETE_EXISTING','_CLONE_TARIFFS_TARGET_DELETE_EXISTING',false);
		$output['_CLONE_TARIFFS_TARGET_DELETE_OPTION']   = jr_gettext('_CLONE_TARIFFS_TARGET_DELETE_OPTION','_CLONE_TARIFFS_TARGET_DELETE_OPTION',false);
		$output['TITLE']                          = jr_gettext('_CLONE_TARIFFS_TITLE','_CLONE_TARIFFS_TITLE',false);
		$output['_CLONE_TARIFFS_INFO']            = jr_gettext('_CLONE_TARIFFS_INFO','_CLONE_TARIFFS_INFO',false);
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$basic_property_details->get_property_name_multi( $thisJRUser->authorisedProperties );
		
		$yesno    = array ();
		$yesno[ ] = jomresHTML::makeOption( '0', jr_gettext( '_JOMRES_COM_MR_NO', '_JOMRES_COM_MR_NO', false ) );
		$yesno[ ] = jomresHTML::makeOption( '1', jr_gettext( '_JOMRES_COM_MR_YES', '_JOMRES_COM_MR_YES', false ) );
		
		$output['DELETE_EXISTING'] = jomresHTML::selectList( $yesno, 'delete_existing', ' ', 'value', 'text', '0' );
		
		$users_properties = array();
		foreach ($thisJRUser->authorisedProperties as $p)
			{
			$users_properties[$p] = $basic_property_details->property_names[$p];
			}
		natcasesort($users_properties);
		$options[ ] = jomresHTML::makeOption( '', '');

		foreach ($users_properties as $key=>$property)
			{
			$options[ ] = jomresHTML::makeOption( $key, $property);
			}

		$output['SOURCE_PROPERTY_DROPDOWN'] = jomresHTML::selectList( $options, "source_property", '   ', 'value', 'text', '' );
		$output['TARGET_PROPERTY_DROPDOWN'] = jomresHTML::selectList( $options, "target_property", '   ', 'value', 'text', '' );
		
		$pageoutput[] = $output;
		
		$tmpl                             = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'clone_tariffs.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
