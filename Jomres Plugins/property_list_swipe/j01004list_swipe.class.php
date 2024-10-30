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

class j01004list_swipe
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
		$eLiveSite = get_showtime('eLiveSite');
		
		
		$this_plugin = "swipe";
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		if (isset($tmpBookingHandler->tmpsearch_data['current_property_list_layout']))
			{
			$layout = $tmpBookingHandler->tmpsearch_data['current_property_list_layout'];
			if ($layout == $this_plugin || (isset($_REQUEST['propertylist_layout']) && $_REQUEST['propertylist_layout'] == $this_plugin) )
				{
				set_showtime("live_scrolling_enabled",false);
				set_showtime( 'disable_paging' , true);
				set_showtime("number_of_ajax_results_required",100);

				jomres_cmsspecific_addheaddata( "javascript",JOMRES_ROOT_DIRECTORY.'/core-plugins/property_list_swipe/javascript/', "swiper.jquery.min.js" );

				jomres_cmsspecific_addheaddata( "css",JOMRES_ROOT_DIRECTORY.'/core-plugins/property_list_swipe/css/', "swiper.min.css" );
				}
			}
		
		$property_list_layouts = get_showtime('property_list_layouts');
		if (is_null($property_list_layouts))
			$property_list_layouts = array();
		
		$property_list_layouts[$this_plugin] = array ("layout"=>"list_properties_swipe.html","title"=>jr_gettext("_JOMRES_PROPERTYLIST_SWIPE",'_JOMRES_PROPERTYLIST_SWIPE',false,false),"path"=>$ePointFilepath.'templates'.JRDS.find_plugin_template_directory());

		set_showtime('property_list_layouts',$property_list_layouts);
		}

	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JOMRES_PROPERTYLIST_SWIPE', '_JOMRES_PROPERTYLIST_SWIPE');

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
