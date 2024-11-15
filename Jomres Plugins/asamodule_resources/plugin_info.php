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

class plugin_info_asamodule_resources
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"asamodule_resources",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows a property rooms/resources in an ASAModule widget/module. Useful for single property websites.",
			"version"=>(float)"2.2",
			"description"=> "Shows a property rooms/resources in an ASAModule widget/module. Use the argument 'asamodule_resources_puid' to set the property uid and 'asamodule_resources_ids' to set what rooms to show.  Alternatively, can be shown through a shortcode.",
            "lastupdate"=>"2022/05/08",
            "min_jomres_ver"=>"10.3.0",
			"type"=>"",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/308-asamodule-resources',
			'change_log'=>'v1.3 PHP7 related maintenance. v1.4 Remaining globals cleanup and jr_gettext refactor related changes. v1.5 fixed a notice. v1.6 Modified how array contents are checked. v1.7 Shortcode data updated. v1.8 French language file added. v1.9 BS4 template set added v2.0 Language files updated v2.1 Bootstrap 5 template set added. v2.2 Documentation updated.',
			'image'=>'https://snippets.jomres.net/2017-09-21_js0sh.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
