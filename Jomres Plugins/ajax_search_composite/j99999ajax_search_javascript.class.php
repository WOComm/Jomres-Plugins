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

class j99999ajax_search_javascript
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		// The purpose of this script is to give different property layout plugins an opportunity to include javascript that might need to be run after the property list has been loaded through ajax.
		if (AJAXCALL)
			{
			$endrun_javascript_for_eval_by_ajax_search = get_showtime('endrun_javascript_for_eval_by_ajax_search');
			
			if (!empty($endrun_javascript_for_eval_by_ajax_search) && get_showtime("task") == "ajax_search_filter")
				{
				$javascript = "^";
				
				foreach ($endrun_javascript_for_eval_by_ajax_search as $js)
					{
					$javascript .= $js;
					}
				echo $javascript;
				}
			}
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
