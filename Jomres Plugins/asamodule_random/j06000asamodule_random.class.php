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

class j06000asamodule_random
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "asamodule_random",
				"info" => "_JOMRES_SHORTCODES_06000ASAMODULE_RANDOM",
				"arguments" => array (
					array (
						"argument" => "asamodule_random_listlimit",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_RANDOM_ARG_ASAMODULE_RANDOM_LISTLIMIT",
						"arg_example" => "10",
						),
					array (
						"argument" => "asamodule_random_ptype_ids",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_RANDOM_ARG_ASAMODULE_RANDOM_PTYPE_IDS",
						"arg_example" => "1,3",
						),
					array (
						"argument" => "asamodule_random_vertical",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_RANDOM_ARG_ASAMODULE_RANDOM_VERTICAL",
						"arg_example" => "0",
						)
					)
				);
			return;
			}
		$listlimit =  trim(jomresGetParam($_REQUEST,'asamodule_random_listlimit',10));
		$ptype_ids 	= trim(jomresGetParam($_REQUEST,'asamodule_random_ptype_ids',''));
		$vertical 	= (bool)trim(jomresGetParam($_REQUEST,'asamodule_random_vertical', '0'));

		add_gmaps_source();

		$property_type_bang = explode (",",$ptype_ids);
		$required_property_type_ids = array();
		foreach ($property_type_bang as $ptype)
			{
			if ((int)$ptype!=0)
				$required_property_type_ids[] = (int)$ptype;
			}
		if (!empty($required_property_type_ids))
			{
			$clause="AND ptype_id IN (".implode(',',$required_property_type_ids).") ";
			}
		else
			$clause='';

		$query="SELECT `propertys_uid` FROM #__jomres_propertys WHERE `published` = 1 $clause ";
		$base_property_uids =doSelectSql($query); 

		if (empty($base_property_uids))
			return;
			
		$list = array();
		foreach ($base_property_uids as $p)
			{
			if ($p->propertys_uid > 0)
				$list[]=$p->propertys_uid;
			}

		shuffle($list);
		for ($i=0;$i<$listlimit;$i++)
			{
			if (isset($list[$i]))
				{
				$property_uids[]=$list[$i];
				}
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


