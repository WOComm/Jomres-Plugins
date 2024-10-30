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

class j06000asamodule_popular
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "asamodule_popular",
				"info" => "_JOMRES_SHORTCODES_06000ASAMODULE_POPULAR",
				"arguments" => array (
					array (
						"argument" => "asamodule_popular_listlimit",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_POPULAR_ARG_ASAMODULE_POPULAR_LISTLIMIT",
						"arg_example" => "10",
						),
					array (
						"argument" => "asamodule_popular_ptype_ids",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_POPULAR_ARG_ASAMODULE_POPULAR_PTYPE_IDS",
						"arg_example" => "1,3",
						),
					array (
						"argument" => "asamodule_popular_vertical",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_POPULAR_ARG_ASAMODULE_POPULAR_VERTICAL",
						"arg_example" => "0",
						),
                    array (
                        "argument" => "asamodule_popular_property_uids",
                        "arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_POPULAR_ARG_ASAMODULE_POPULAR_PROPERTY_UIDS",
                        "arg_example" => "6,1,5,10",
                    )
					)
				);
			return;
			}
		
		add_gmaps_source();

		$listlimit =  trim(jomresGetParam($_REQUEST,'asamodule_popular_listlimit',10));
		$ptype_ids 	= trim(jomresGetParam($_REQUEST,'asamodule_popular_ptype_ids',''));
		$vertical 	= (bool)trim(jomresGetParam($_REQUEST,'asamodule_popular_vertical', '0'));
        $property_uid_string =  trim(jomresGetParam($_REQUEST,'asamodule_popular_property_uids',''));

		$property_type_bang = explode (",",$ptype_ids);
		if (isset($property_uid_string) && $property_uid_string != '' ) {
            $property_uids_bang = array_map('intval', explode(',', $property_uid_string));
        }

        if ( !isset($property_uids_bang) || empty( $property_uids_bang)) {
            $required_property_type_ids = array();
            foreach ($property_type_bang as $ptype)
            {
                if ((int)$ptype!=0)
                    $required_property_type_ids[] = (int)$ptype;
            }
            if (!empty($required_property_type_ids))
            {
                $clause="AND b.ptype_id IN (".implode(',',$required_property_type_ids).") ";
            }
            else
                $clause='';

            $query = "SELECT 
						a.p_uid 
					FROM #__jomres_pcounter a 
					CROSS JOIN #__jomres_propertys b ON a.p_uid = b.propertys_uid 
					WHERE b.published = 1 
						$clause 
					ORDER BY a.count DESC 
					LIMIT $listlimit";
            $result = doSelectSql($query);

            $property_uids = array();
            foreach ($result as $r)
            {
                $property_uids[]=$r->p_uid;
            }
        } else {
            $property_uids =  $property_uids_bang;
        }

		
		if (!empty($property_uids))
			{
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
		else
			echo "No properties clicked yet";

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


