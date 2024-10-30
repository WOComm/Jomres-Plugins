<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
* * @version Jomres 10.1.1
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
     * Produces slideshows based on the Galleria slideshow functionality
	 * 
	 */

class j06000property_card_carousel
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			{
				$this->template_touchable = false;
				$this->shortcode_data = array (
					"task" => "property_card_carousel",
					"info" => "JOMRES_SHORTCODES_PROPERTY_CAROUSEL_TITLE",
					"arguments" => array (
						array (
							"argument" => "property_carousel_prefilter_property_uids",
							"arg_info" => "JOMRES_SHORTCODES_PROPERTY_CAROUSEL_PROPERTY_UIDS",
							"arg_example" => "3,1,19",
						),
						array (
							"argument" => "property_carousel_prefilter_property_types",
							"arg_info" => "JOMRES_SHORTCODES_PROPERTY_CAROUSEL_PROPERTY_TYPES",
							"arg_example" => "1,5",
						),
						array (
							"argument" => "property_carousel_prefilter_property_region",
							"arg_info" => "JOMRES_SHORTCODES_PROPERTY_CAROUSEL_REGION",
							"arg_example" => "987",
						)
					)
				);
				return;
			}
		}
		$this->retVals = '';
        $ePointFilepath = get_showtime('ePointFilepath');

		$filters = array();

		$property_prefilter = jomresGetParam( $_REQUEST, 'property_carousel_prefilter_property_uids', '' );
		if ($property_prefilter!='' && $property_prefilter!=0)
		{
			$tmp = array();
			$property_uid_bang = explode (",",$property_prefilter);
			foreach ($property_uid_bang as $id)
			{
				if ((int)$id != 0 )
					$tmp[]=(int)$id;
			}
			$filters['property_uids'] = $tmp;
		}


		$ptype_prefilter = jomresGetParam( $_REQUEST, 'property_carousel_prefilter_property_types', '' );
		if ($ptype_prefilter!='' && $ptype_prefilter!=0)
		{
			$tmp = array();
			$ptype_prefilter = explode (",",$ptype_prefilter);
			foreach ($ptype_prefilter as $id)
			{
				if ((int)$id != 0 )
					$tmp[]=(int)$id;
			}
			$filters['ptypes'] = $tmp;
		}

		$arguments = jomresGetParam( $_REQUEST, 'property_carousel_prefilter_property_region', '' );
		if ($arguments!='')
		{
			$region_bang = explode (",",$arguments);
			foreach ($region_bang as $region)
				$filters['regions'][] =(int)$region;
		}

		$this->get_all_published_properties($filters);
		if ($property_prefilter!='' && $property_prefilter!=0) { // Doing it this way because otherwise the get_all_published_properties method breaks the ordering of the property uids
			$tmp_arr = $filters['property_uids'];
			$empty_arr = [];
			foreach ( $tmp_arr as $property_uid ) { // Need to check that we are not adding an unpublished or deleted property to this array
				if ( in_array($property_uid,$this->all_published_properties)) {
					$empty_arr[]=$property_uid;
				}

			}
			$this->all_published_properties = $empty_arr;
		}


		if (!empty($this->all_published_properties))
		{
			$pageoutput = array();

			$result = get_property_module_data($this->all_published_properties, $ePointFilepath.'templates'.JRDS.'bootstrap5', 'card.html');

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
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'slideshow.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows', $rows );
			$tmpl->displayParsedTemplate();
		}
	}

	function get_all_published_properties($filters)
	{
		$property_id_clause = "";
		if (isset($filters['property_uids']))
		{
			$property_id_clause = "`propertys_uid` IN (".implode(',',$filters['property_uids']).")";
		}
		$ptype_clause = "";
		if (isset($filters['ptypes']))
		{
			$ptype_clause = "`ptype_id` IN (".implode(',',$filters['ptypes']).")";
		}

		$region_clause = "";
		if (isset($filters['regions']))
		{
			$region_clause = " AND `property_region` IN (".implode(',',$filters['regions']).")";
		}

		$and_str1 = "";
		if ( $property_id_clause != "" || $ptype_clause != "")
			$and_str1 = " AND ";

		$and_str2 = "";
		if ( $property_id_clause != "" && $ptype_clause != "")
			$and_str2 = " AND ";

		$property_uids = array();

		$query = "SELECT `propertys_uid` FROM #__jomres_propertys WHERE `published` = 1 ".$and_str1.$property_id_clause.$and_str2.$ptype_clause.$region_clause;
		$result = doSelectSql($query);

		if (!empty($result))
		{
			foreach ($result as $r)
			{
				$property_uids[] = (int)$r->propertys_uid;
			}
		}
		$this->all_published_properties = $property_uids;
	}

	public function getRetVals()
	{
		return $this->retVals;
	}
}
