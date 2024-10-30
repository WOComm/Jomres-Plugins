<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_phplist
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"phplist",
			"category"=>"Integration",
			"marketing"=>"PHPList integration plugin.",
			"version"=>(float)"2.8",
			"description"=> "The PHPList Integrator plugin offers the possibility to integrate Jomres with the most popular open-source newsletter script available on the web. When a user makes a booking in Jomres, he will be added to a mailing list in PHPList. By using PHPList and this plugin, you`ll have more marketing possibilities, which may result in more bookings made on your site. All plugin settings can be made from backend administration area. The PHPList Integrator plugin uses CURL to communicate with your PHPList script.",
            "lastupdate"=>"2023/05/24",
			"min_jomres_ver"=>"9.11.0",
			"manual_link"=>'',
			'change_log'=>'v2.1 Settings moved to Site Config. v2.2 Plugin updated to work with Jomres data encryption of user details. v2.3 French language file added v2.4 Fixed notices. v2.5 Language files updated v2.6 Resolved a notice v2.7 Documentation updated v2.8 Select list markup changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_51ars.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
