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

class plugin_info_asamodule_latest
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"asamodule_latest",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows latest properties in an ASAModule widget/module. Latest properties are those that have been created most recently.",
			"version"=>(float)"1.5",
			"description"=> "Widget. Shows latest properties in an ASAModule widget/module. Use the arguments 'asamodule_latest_listlimit' to control the number of properties shown, and 'asamodule_latest_ptype_ids' to only show latest properties of a specific property type. Use asamodule_latest_vertical=1 if the module would be used with a vertical layout.",
            "lastupdate"=>"2021/10/14",
			"min_jomres_ver"=>"9.8.30",
			"type"=>"",
			"manual_link"=>'',
			'change_log'=>'v1.1 Modified how array contents are checked. v1.2 French language file added. v1.3 Italian language file added, thanks Nicola  v1.4 Language files updated v1.5 Documentation updated.',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_m86rq.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
