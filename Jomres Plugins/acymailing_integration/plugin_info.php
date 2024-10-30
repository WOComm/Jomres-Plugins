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

class plugin_info_acymailing_integration
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"acymailing_integration",
			"category"=>"Integration",
			"marketing"=>"The AcyMailing Integration plugin offers the possibility to integrate Jomres with the most popular Joomla newsletter component available at the moment. ",
			"version"=>(float)"3.0",
			"description"=> "The AcyMailing Integration plugin offers the possibility to integrate Jomres with the most popular Joomla newsletter component available at the moment. When a user makes a booking in Jomres, he will be automatically added to a mailing list in AcyMailing. By using AcyMailing and this plugin, you`ll have more marketing possibilities, which may result in more bookings.",
            "lastupdate"=>"2021/10/29",
			"min_jomres_ver"=>"9.11.0",
			"manual_link"=>'',
			'change_log'=>'v2.1 Settings moved to Site Config. v2.2 Updated plugin to use Guzzle v2.3 Fixed a notice. v2.4 Plugin updated to work with Jomres data encryption of user details. v2.5 Added more logging. v2.6 french lang file added v2.7 Language files updated v2.8 Language files updated v2.9 Resolved a notice v3.0 Documentation updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_u0fb4.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
