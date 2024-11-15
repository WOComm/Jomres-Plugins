<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2022 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_jomres_messaging_system
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_messaging_system",
			"category"=>"Customer relationship management",
			"marketing"=>"Messaging System User Interface for Jomres installations.",
			"version"=>(float)"1.1",
			"description"=> "Bootstrap 5 only. Messaging System User Interface for Jomres installations. ",
			"lastupdate"=>"2023/05/30",
			"min_jomres_ver"=>"10.7.0",
			"manual_link"=>'',
			'change_log'=>"v.2 Added search for messages feature, emojis and login form handling. Oh, and tons of UI improvements. v0.3 Login form now in a modal of it's own. Added button that adds the Conversations link to the Edit Bookings page. Fixed leave conversation link. Updated to work with WP. v0.4 Solved a minor niggle with multiple buttons showing. v0.5 Removed a max-height setting that was not working well, hiding the text input. v0.6 Tweaked some wording. v0.7 Added checks to see if Jomres is configured to run in a BS5 based site. v0.8 Added dependency check for api messaging endpoint plugin to install that automatically, and added code to check for api location and advise to move for WP users. Other languages lang files updated. v0.9 Fine tuned when 00005 script runs so that widget can be enabled in dashboard. v1.0 Constants in the conversation changed to vars so that we can have multiple conversation modals in the page if required. v1.1 lang files updated as gtranslate had butchered some definitions.",
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true,
            'compatability'=>['Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
