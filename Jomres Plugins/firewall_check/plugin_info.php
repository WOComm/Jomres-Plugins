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

class plugin_info_firewall_check
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"firewall_check",
			"marketing"=>"A simple check to confirm that the server is able to contact remote services.",
			"category"=>"Integration",
			"version"=>"1.1",
			"description"=> "Jomres relies on a variety of remote services. This plugin allows us to check and see whether or not this server can contact those remote services. If it cannot, that might indicate that a firewall rule is in place and you will need to contact your hosts to ask them to adjust the firewall rules.",
            "lastupdate"=>"2021/10/25",
			"min_jomres_ver"=>"9.9.18",
			"manual_link"=>'',
			'change_log'=>"v1.1 Language files updated",
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
