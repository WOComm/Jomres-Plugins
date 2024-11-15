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

class plugin_info_review_reminder
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"review_reminder",
			"category"=>"Scheduled tasks",
			"marketing"=>"This plugin runs automatically in the background and sends a reminder email to guests to leave a review after a number of days from their departure date.",
			"version"=>(float)"3.2",
			"description"=> "This plugin runs automatically in the background and sends a reminder email to guests to leave a review for the property they stayed at after N days from their departure date. This is a tool that will help build your property reviews database and potentially result in more bookings received by the property owner. After installing the plugin, a new button is created in the admin cpanel from which you can enable/disable the reminder and set the interval in days from the departure date at which the review reminder email is sent.",
            "lastupdate"=>"2022/08/03",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'v2.1 Settings moved to Site Config v2.2 Modified how array contents are checked. v2.3 Plugin updated to work with Jomres data encryption of user details. v2.4 Use of "secret" in cron tasks removed. It is not necessary and is unreliable. v2.5 Fixed a bug where reviews would not be sent. v2.6 French language file added v2.7 BS4 template set added 2.8 Italian language file added, thanks Nicola v2.9 Notices fixed. 3.0 Language files updated v3.1 Bootstrap 5 template set added. v3.2 Documentation updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_xg795.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
