<?php
/**
* Jomres CMS Agnostic Plugin.
*
* @author Woollyinwales IT <sales@jomres.net>
*
* @version Jomres 9
*
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project
**/

// ################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
// ################################################################

class j06000upcoming_tours
{
    public function __construct()
    {
        $MiniComponents = jomres_getSingleton('mcHandler');
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "upcoming_tours",
				"info" => "_JOMRES_SHORTCODES_06000UPCOMING_TOURS",
				"arguments" => array (
					array (
						"argument" => "upcoming_tours_listlimit",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_POPULAR_ARG_UPCOMING_TOURS_LISTLIMIT",
						"arg_example" => "10",
						),
					array (
						"argument" => "upcoming_tours_vertical",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_POPULAR_ARG_UPCOMING_TOURS_VERTICAL",
						"arg_example" => "0",
						)
					)
				);
			return;
			}

		$listlimit =  (int)trim(jomresGetParam($_REQUEST,'upcoming_tours_listlimit',10));
		$vertical 	= (bool)trim(jomresGetParam($_REQUEST,'upcoming_tours_vertical', false));
		
		$query = "SELECT 
						DISTINCT
						`property_uid` 
					FROM #__jomres_jintour_tours 
					WHERE tourdate > NOW()";
		$properties = doSelectSql($query);

		$property_uids = array();
		
		if (!empty($properties))
			{
			for ($i = 0 ; $i < $listlimit ; $i++ ) {
				if (isset($properties[$i]->property_uid)) {
					$property_uids[]=$properties[$i]->property_uid;
				}
			}

			$result = get_property_module_data($property_uids, '', '', $vertical);
			$rows = array();
			foreach ($result as $property)
				{
				$r=array();
				$r['PROPERTY'] = $property['template'];
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
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
