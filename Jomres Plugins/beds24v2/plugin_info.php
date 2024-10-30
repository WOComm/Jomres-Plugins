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
#[AllowDynamicProperties]
class plugin_info_beds24v2
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"beds24v2",
			"marketing"=>"Provides functionality required to communicate with Beds24 Channel Manager.",
			"category"=>"Integration",
			"version"=>"6.2",
			"description"=> "Provides functionality required to communicate with Beds24 Channel Manager.",
            "lastupdate"=>"2023/11/23",
            "min_jomres_ver"=>"10.3.0",
			"manual_link"=>'',
			'change_log'=>"v0.2 Updated plugin to resolve an exception call being incorrect, and a variable transposition that put the surname in the postcode field. v0.3 Added changes supporting 9.8.30 minicomponent registry changes. v0.4 added guest requsts to be sent to Beds24 & fixed bug where normal property managers couldnt do property configuration. v0.5 Menu options updated for menu refactor in v9.8.30 v0.6 Modified how array contents are checked. v0.6 Fixed incorrect notification url generated at property export time, thanks Juan. v0.8 Added code to clean up lock files if they are over 20 seconds old. v0.9 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v1.1 Added a try catch block to gracefully handle situations when importing bookings fails. Previously on failure importing would stop, now it will continue. v1.2 Added notification lock logging. Added further logging to capture precise reasons why a notification to Beds24 might failed. Added a check to the control panel that will prompt site admins to regenerate manager api keys before sites are added to Beds24. This should prevent managers from trying to use API keys that are built into a Quickstart installation. v1.3 Added Beds24 room id to dropdown select in Display Property page. v1.6 Added feature in admin area to allow different managers to be linked to a property. Improved linking of properties on property import. v1.5 Fixed a bug in new functionality. v1.6 Resolved an issue that could be caused by apostrophes. Added BS2 templates. v1.7 Resolved an issue with exporting properties caused by previous versions htmlencoding fixes. *sigh* v1.8 Modified how a template path is determined, and fixed a notice. v1.9 Added new daily price updating feature, in the Display Property page you can now choose to export a tariff manually to P1-P10 in Beds24 daily rates. Old cron jobs removed, and modified the watcher to filter out non-beds24 calls. v2.1 Improved how cancellations are handed off to Beds24. Fixed an issue when associating room types. Modified update functionality so that if the \"send tariff information to Beds24\" option is set to no, min interval is not sent after other updates. Previously we would not sent pricing updates, with this the minimum interval is also excluded on update. v2.2 Fixed an issue with exporting accented characters in various details to Beds24. Added a flag regarding disabling of commission being raised which will come into effect in 9.9.15.v3.3 Improved some date generation. v2.4 Added feature to update Pn dates direct in micromanage list tariffs page. Fixed an issue with booking modifications. v2.5 Fixed an issue with modifying bookings. v2.6 Added property uid for modification updates. v2.7 Identified a scenario where the Pn numbers might not appear in the list micromanage tariffs page. Resolved an issue where the first available room might not be booked on incoming bookings. Modified the Save Managers functionality in admin Tools to remove potential duplicate records in the jomres to beds24 cross reference table when Save clicked. v2.8 Changed how indexes are figured out when sending booking notifications to B24. This ensure that the room numbers are allocated sequentially. Added new feature where when viewing a booking or black booking, the data stored in B24 is shown at the bottom of the page. Added ability to re-send notification from Jomres to B24 from the same pages, if required. v2.9 Tweaked booking importer to exclude cancelled bookings on Beds24. Modified Jomres redirect url handling as PHP incorrectly sees the redirect url as the current task, meaning that list tariff page Pn buttons would not work as intended. v3.0 Updated how user account is queried after an apparent adjustment to the Beds24 api. v3.1 Tweaked how we check for a variable setting when checking the manager key with Beds24. v3.2 Node/javascript path related changes. v3.3 Tweaked tariff export functionality so that it only shows when possible. v3.4 URL encoding no longer needed when exporting properties to Beds24 and sending notification urls. v3.5 Plugin modified to change how we respond to bookings created in Jomres but modified in Beds24. Also adjusted how webhooks for other plugins are discarded. v3.6 Modified remote modifications so that the booking is utterly removed before it is recreated. Modified export tariffs so that the max years is set to 3. Modified how info is pulled from Beds24 when the booking has been deleted on B24. Added option to anonymise guest details before they are sent to the channel manager. v3.7 Added experimental MASTER API key feature. v3.8 Tweaked tariff exporting to ensure that todays tariff is included. v3.9 CSRF hardening added. v4.0 Added an IP number whitelist warning. v4.1 Modified booking import functionality. If apiReference is set then that's the booking number from the OTA so we will use that instead of the Beds24 bookId. v4.2 Updated the Display Properties page with information on how to link existing properties together. v4.3 Added functionality to clean up properties xref table so that properties deleted in Beds24 are cleaned up. v4.4 French language file added. v4.5 Updated logging to trace bookings added. v4.6 Changed how the webhook is triggered, not using deferred tasks right now to help track why some bookings are not going to beds24. v4.7 BS4 template set added v4.8 Added clause to check if we are in admin area when checking to see if we need to check which tariff editing page is active, if it is. v4.9 Updated documentation to advise about setting the API key whitelist only and the IP number of this server. v5.0 Language files updated v5.1 Language files improved v5.2 Language files updated v5.3  Fixed issue affecting WordPress forms v5.3 Bootstrap 5 template set added. v5.5 Russian language file updated. v5.6 Documentation updated. v5.7 Generate a random email address of 20 characters if email address is not sent by remote system. v5.8 Added a missing template for BS5 based sites. v5.9 Tweaked how data is POSTed during export v6.0  Select list markup changes.",
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_83glh.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
