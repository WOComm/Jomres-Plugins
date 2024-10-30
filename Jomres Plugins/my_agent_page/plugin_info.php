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

class plugin_info_my_agent_page
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"my_agent_page",
			"category"=>"Site Building Tools",
			"marketing"=>"Adds a link to a property manager's toolbar that will take them to their view agent page.",
			"version"=>(float)"5.1",
			"description"=> "Adds a link to a property manager's menu that will take them to their View Agent page. Not all sites will show links to the agent page in their html so this page allows the manager to view their publicly available information direct from their toolbar.",
            "lastupdate"=>"2022/08/03",
			"min_jomres_ver"=>"9.9.3",
			"manual_link"=>'',
			'change_log'=>'v4.9  French language file added v5.0 Language files updated v5.0 Documentation updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_f026z.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
