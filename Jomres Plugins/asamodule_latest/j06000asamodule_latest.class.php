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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000asamodule_latest
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "asamodule_latest",
				"info" => "_JOMRES_SHORTCODES_06000ASAMODULE_LATEST",
				"arguments" => array (
					array (
						"argument" => "asamodule_latest_listlimit",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_LATEST_ARG_ASAMODULE_POPULAR_LISTLIMIT",
						"arg_example" => "10",
						),
					array (
						"argument" => "asamodule_latest_ptype_ids",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_LATEST_ARG_ASAMODULE_POPULAR_PTYPE_IDS",
						"arg_example" => "1,3",
						),
					array (
						"argument" => "asamodule_latest_vertical",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_LATEST_ARG_ASAMODULE_POPULAR_VERTICAL",
						"arg_example" => "0",
						)
					)
				);
			return;
			}
		$output = array();	
		add_gmaps_source();

		$listlimit =  trim(jomresGetParam($_REQUEST,'asamodule_latest_listlimit',6));
		$ptype_ids 	= trim(jomresGetParam($_REQUEST,'asamodule_latest_ptype_ids',''));
		$vertical 	= (bool)trim(jomresGetParam($_REQUEST,'asamodule_latest_vertical', '0'));

		$property_type_bang = explode (",",$ptype_ids);		
		$required_property_type_ids = array();
		
		foreach ($property_type_bang as $ptype)
			{
			if ((int)$ptype!=0)
				$required_property_type_ids[] = (int)$ptype;
			}
		
		if ( !empty($required_property_type_ids) )
			{
			$clause="AND ptype_id IN ( " . jomres_implode($required_property_type_ids) . ") ";
			}
		else
			$clause='';
		
		$query="SELECT `propertys_uid` FROM #__jomres_propertys WHERE `published` = 1 $clause ORDER BY `propertys_uid` DESC LIMIT $listlimit ";
		$base_property_uids =doSelectSql($query); 
		
		if (empty($base_property_uids))
			return;
			
		$list = array();
		foreach ($base_property_uids as $p)
			{
			if ($p->propertys_uid > 0)
				$list[]=$p->propertys_uid;
			}
		
		$result = get_property_module_data($list, '', '', $vertical);
		$rows = array();
		foreach ($result as $property)
			{
			$r=array();
			$r['PROPERTY']=$property['template'];
			$rows[]=$r;
			}
			
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_FRONTEND );
		$tmpl->readTemplatesFromInput( 'basic_module_output_wrapper.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();

		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
