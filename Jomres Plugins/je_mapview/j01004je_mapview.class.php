<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j01004je_mapview
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		
		$property_list_layouts = get_showtime('property_list_layouts');
		
		if (is_null($property_list_layouts))
			$property_list_layouts = array();
		
		$property_list_layouts["mapview"] = array ("custom_task"=>"je_mapview","title"=>jr_gettext("_JRPORTAL_JE_MAPVIEW_MAPVIEW",'_JRPORTAL_JE_MAPVIEW_MAPVIEW',false),"path"=>null);
		
		set_showtime('property_list_layouts',$property_list_layouts);
		}

	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JRPORTAL_JE_MAPVIEW_MAPVIEW', '_JRPORTAL_JE_MAPVIEW_MAPVIEW');

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
