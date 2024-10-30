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

class plugin_info_jintour
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jintour",
			"category"=>"Tours",
			"marketing"=>"Jintour offers the ability to upsell finite resources such as Ski rental at the time of booking. Alternatively you can create properties that ONLY offer Jintour resources, bypassing the room booking functionality altogether. ",
			"version"=>"12.4",
			"description"=> "Handles tour/resource booking creation and management functionality for items that are booked at the same time as a room/property is booked.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/08/13",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/24-control-panel/portal-functionality/178-tour-activity-management',
			'change_log'=>'v12 Added image uploading for tour profiles, and modernised how tours are displayed in the booking form, adjusting output so that it is constructed from a template file. Images can only be uploaded for tour profiles that have tours generated after this update due to a table change. v12.1 Fixed a bug in new functionality that would trigger errors in media centre functionality. v12.2 Fixed an issue where the uploaded image for a tour can go missing after the tour is selected in the booking form. v12.3 Restored missing text strings to templates. v12.4 Fixed a notice in the widget. v12.3 French language file added v12.4 template updated to use a definition.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_2l3p8.png',
			'demo_url'=>''
			);
		}
	}
