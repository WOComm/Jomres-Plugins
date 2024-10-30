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

class plugin_info_ajax_search
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"ajax_search",
			"category"=>"Search",
			"marketing"=>"Provides a framework for plugins to enable ajax based search functionality.",
			"version"=>(float)"7.3",
			"description"=> " Provides a framework for other plugins to enable ajax based search functionality. All plugins titled ajax_search_XXX require this plugin to run. By default this plugin offers a search by features series of inputs, which is designed to work as a fallback if an 'ajax search' plugin hasn't been installed yet. ",
			"lastupdate"=>"2023/05/12",
			"min_jomres_ver"=>"10.5.5",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/28-ajax-search',
			'change_log'=>'3.1 improved the auto-strolling to scroll to the top of the Jomres content div, instead of the top of the page. 3.2  Made changes in support of the Text Editing Mode in 7.2.6. v3.3 modified a function in ajax search, scrolling to top caused an error to be thrown in IE, so that is fixed. v3.4 modified a clause, where we check to see if the current page includes the booking form, as the ajax search cannot be shown on the same page. v3.5 Added random identifier to the submit button. v3.6 Commented out a function that adds gmaps source as this is now handled by core functionality. v3.7 Added BS3 templates. v3.8 Added functionality to support new Jomres management view code. v3.9 Added functionality pertaining to Jomres javascript versioning. v4.1 Added support for "budget" feature. v5 Added code to support running certain javascript after property list has been loaded by ajax search composite. v5.1 removed an old javascript file refernece that has been retired. v5.2 PHP7 related maintenance. 5.4 Jomres 9.7.4 related changes v5.5 Remaining globals cleanup and jr_gettext refactor related changes. v5.6 jr_gettext tweaks. v5.7 Fixed some notice level errors. v5.8 Removed a file made redundant by shortcode introduction. v5.9 Modified how array contents are checked. v6.0 Tweaked how we detect a variable. v6.1 Tweaked how some javascript is triggered. v6.2 Updated to provide shortcode information. v6.3 Node/javascript path related changes. v6.4 BS4 template set added v6.5 Italian language file added, thanks Nicola v6.6 Bootstrap 5 template set added. v6.7 Improved plugin to handle "output_now" behaviour so that it can be called by other plugins. v6.8 Prevent plugin from showing on Edit tariffs pages because the calendar renders the other calendars unusable. v6.9 Do not show if menuoff is in the url 7.0 Behaviour tweaked, on submit we scroll to the top of the search results and close the filters bar. v7.1 No longer listening for menuoff. v7.2 We can now send a target div to say where the search results should be sent. v7.3 Added hard refresh for AOS animations if enabled.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_pgzcx.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
