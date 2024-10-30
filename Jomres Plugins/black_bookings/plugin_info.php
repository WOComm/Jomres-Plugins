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

class plugin_info_black_bookings
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"black_bookings",
			"category"=>"Property Manager tools",
			"marketing"=>"Adds a new button to the receptionist's toolbar, allows receptionists and managers to black book rooms or properties out, making them unavailable for certain periods.",
			"version"=>(float)"5.7",
			"description"=> " Adds a new button to the receptionist's toolbar, allows receptionists and managers to black book rooms or properties out, making them unavailable for certain periods.",
            "lastupdate"=>"2023/04/03",
            "min_jomres_ver"=>"10.3.0",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/41-your-toolbar/bookings/217-black-bookings',
			'change_log'=>'v2.0 changed the order of days in the calendar. v2.1  Made changes in support of the Text Editing Mode in 7.2.6. v2.2 Removed references to Token functionality that is no longer used. v2.3 Removed references to Jomres URL Token function. v2.4 changed how text is rendered to enable translation of some strings. v2.5 Changed the menu allocation. v2.6 Reordered button layout. v2.7 fixed some variables so that the menu option is hidden from those who do not need to see it. v2.8 Added changes to reflect addition of new Jomres root directory definition. v2.9 Changed how the depature date is calculated. v3.0 Modified how queries are performed to take advantage of quicker IN as opposed to OR. v3.1 Improved a url used. v3.2 fixed an issue where when the next year was chosen, the To date would be reset to the current year. v3.3 PHP7 related maintenance. 3.4 Jomres 9.7.4 related changes v3.5 Remaining globals cleanup and jr_gettext refactor related changes. v3.6 jr_gettext tweaks. v3.7 Update to add a booking number to black bookings. This allows beds24 to cancel black bookings. v3.8 Removed reliance on gregoriantojd function. v3.9 Webhook related changes. v4.0 Notices fixes. v4.1 Scripts renumbered and renamed. v4.2 Edit booking tasks renamed and renumbered. v4.3 Save booking task updated. v4.4 Menu options updated for menu refactor in v9.8.30 v4.5 Modified how array contents are checked. v4.6 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v4.7 Changed how cancellations are handled. Previously deleted black bookings were actually deleted from the contracts table. Now we instead use the bookings cancellation class, which means that the booking is marked as cancelled. This is done so that webhook calls will have information to handle when updating third party services. v4.8 Removed webhook calls that are no longer required. v4.9 Node/javascript path related changes. v5.0 French language file added. 5.1 BS4 template set added v5.2 Italian language file added, thanks Nicola v5.3 Language files updated v5.4 Bootstrap 5 template set added. v5.5 Serbian lang file updated. v5.6 Documentation updated. v5.7 Added a tweak to allow the calendar to rise above the sticky BS5 property selector (z-index related)',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_a74ot.png',
			'demo_url'=>'http://userdemo.jomres-demo.net/index.php?option=com_jomres&Itemid=103&task=list_black_bookings',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
