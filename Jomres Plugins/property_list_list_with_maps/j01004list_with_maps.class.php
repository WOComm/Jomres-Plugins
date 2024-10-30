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

class j01004list_with_maps
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}

		if (jomres_bootstrap_version() == '5' ) {
			return null;
		}

		$ePointFilepath=get_showtime('ePointFilepath');
		$this_plugin = "listwithmaps";
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		if (isset($tmpBookingHandler->tmpsearch_data['current_property_list_layout']))
			{
			$layout = $tmpBookingHandler->tmpsearch_data['current_property_list_layout'];
			if ($layout == $this_plugin)
				set_showtime("number_of_ajax_results_required",6); // This is for the list scrolling feature, we need to know the number of properties that should be returned
			}
		$property_list_layouts = get_showtime('property_list_layouts');
		if (is_null($property_list_layouts))
			$property_list_layouts = array();
		
		$property_list_layouts[$this_plugin] = array ("layout"=>"list_properties_with_maps.html","title"=>jr_gettext("_JOMRES_PROPERTYLIST_LISTWITHMAPS",'_JOMRES_PROPERTYLIST_LISTWITHMAPS',false,false),"path"=>$ePointFilepath.'templates'.JRDS.find_plugin_template_directory());

		set_showtime('property_list_layouts',$property_list_layouts);
		}

	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JOMRES_PROPERTYLIST_LISTWITHMAPS', '_JOMRES_PROPERTYLIST_LISTWITHMAPS');

		foreach ($output as $o)
			{
				echo $o;
			echo "<br/>";
			}
		}
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
