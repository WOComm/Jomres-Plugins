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
			"version"=>"14.1",
			"description"=> "Handles tour/resource booking creation and management functionality for items that are booked at the same time as a room/property is booked.",
            "lastupdate"=>"2023/05/24",
            "min_jomres_ver"=>"10.6",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/24-control-panel/portal-functionality/178-tour-activity-management',
			'change_log'=>'v12 Added image uploading for tour profiles, and modernised how tours are displayed in the booking form, adjusting output so that it is constructed from a template file. Images can only be uploaded for tour profiles that have tours generated after this update due to a table change. v12.1 Fixed a bug in new functionality that would trigger errors in media centre functionality. v12.2 Fixed an issue where the uploaded image for a tour can go missing after the tour is selected in the booking form. v12.3 Restored missing text strings to templates. v12.4 Fixed a notice in the widget. v12.3 French language file added v12.4 template updated to use a definition. v12.5 Lets try that again, shall we? Template updated. v12.6 Fixed a notice. v12.7 Tweaked the cancellation script so that this plugin can be called safely when cancelling bookings automatomagically, specifically for No Show cancellations coming in Jomres v9.21 v12.8 French language file updated. v12.9 BS4 template set added v13.0 Italian language file added, thanks Nicola v13.1 Language files updated v13.2  Fixed issue affecting WordPress forms v13.3 Bootstrap 5 template set added. v13.4 Markup improved. v13.5 Serbian lang file updated. v13.6 Documentation updated. v13.7 Resolved a PHP8.1 depreciation notice v13.8 Prevent a section of code from running if it is an api call. v13.9 Updated the Booking form template and added the ability to rename adults and children to translations page in Jomres v14.0 Quash a notice. v14.1 Select list markup changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_2l3p8.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
