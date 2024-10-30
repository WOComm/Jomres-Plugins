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

class plugin_info_frontend_in_backend
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"frontend_in_backend",
			"category"=>"Administrator tools",
			"marketing"=>"A plugin that allows us to perform property management in the administrator area.",
			"version"=>"2.3",
			"description"=> "An experimental plugin that allows us to perform property management in the administrator area. Requires Jomres 5.6.1 (specifically changeset 1765). Caveat : This is effectively a wrapper for the frontend, so to perform property management you must already be logged into the frontend via a user who is a property manager in the frontend.",
			"lastupdate"=>"2019/08/12",
			"min_jomres_ver"=>"9.9.9",
			'change_log'=>'v1.1 Hide menu option if Simple Site Config enabled. v1.2 Added functionality to support new Jomres management view code. v1.3 Added changes to reflect addition of new Jomres root directory definition. v1.4 PHP7 related maintenance. v1.5 Modal changed to use Bootstrap modals, not older jQuery UI modal. Much prettier and actually works. v1.6 Jomres 9.7.4 related changes v1.7 Remaining globals cleanup and jr_gettext refactor related changes. v1.8 Fixed some notice level errors. v1.9 Updated modal markup. 2.0 Advanced Site Config flag removed. v2.1 Plugin refactored for admin area changes in jr 9.9 v2.2 Updated plugin to use Guzzle v2.3 Fixed menu option so that it can be translated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_5c7dx.png',
			'demo_url'=>'',
			"manual_link"=>''
			);
		}
	}
