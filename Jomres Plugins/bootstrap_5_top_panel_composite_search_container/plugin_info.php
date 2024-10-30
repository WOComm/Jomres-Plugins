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

class plugin_info_bootstrap_5_top_panel_composite_search_container
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bootstrap_5_top_panel_composite_search_container",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.2",
			"description"=> 'Combines the Ajax search composite and Top panel output. Put this into the Banner module position using Jomres ASAModule setting the task to bs5_panel_search_container. Requires Alt Init, Ajax Search, Ajax search composite and Bootstrap 5 Top Panel plugins.',
			"type"=>"module",
			"lastupdate"=>"2022/07/26",
			"min_jomres_ver"=>"10.1.2",
			"manual_link"=>'',
			'change_log'=>'v1.1 removed language switcher if Joomla, because switcher works when sef disabled, but not when sef enabled. Needs the Joomla language switcher to work properly.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}