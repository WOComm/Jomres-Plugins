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

class j06000asamodule_specific_properties
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "asamodule_specific_properties",
				"info" => "_JOMRES_SHORTCODES_06000ASAMODULE_SPECIFIC_PROPERTIES",
				"arguments" => array (
					array (
						"argument" => "asamodule_sp_uids",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_SPECIFIC_PROPERTIES_ARG_ASAMODULE_SP_UIDS",
						"arg_example" => "3,1,5",
						),
					array (
						"argument" => "asamodule_sp_vertical",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_SPECIFIC_PROPERTIES_ARG_ASAMODULE_SP_VERTICAL",
						"arg_example" => "0",
						)
					)
				);
			return;
			}
		
		$property_uids = array();

		$p_uids 	= trim(jomresGetParam($_REQUEST,'asamodule_sp_uids',''));
		$vertical 	= (bool)trim(jomresGetParam($_REQUEST,'asamodule_sp_vertical', '0'));

		add_gmaps_source();

		if ( $p_uids == '' )
			return;
		
		$property_uids_bang = explode ( ",", $p_uids );

		foreach ($property_uids_bang as $puid)
			{
			if ( (int)$puid != 0 )
				$property_uids[] = (int)$puid;
			}
		
		$result = get_property_module_data($property_uids, '', '', $vertical);

		$rows = array();
		foreach ($result as $property)
			{
			$r=array();
			$r['PROPERTY']=$property['template'];
			$rows[]=$r;
			}

		$output = array();
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_FRONTEND );
		$tmpl->readTemplatesFromInput( 'basic_module_output_wrapper.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();

		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}


