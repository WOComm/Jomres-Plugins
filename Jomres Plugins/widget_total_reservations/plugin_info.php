<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_widget_total_reservations
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"widget_total_reservations",
			"category"=>"Widgets",
			"marketing"=>"A widget to display the total number of reservations for a property.",
			"version"=>(float)"1.6",
			"description"=> "A widget to display the total number of reservations for a property. Install the widget then any hotel or b&b type property will see a summary of Total Bookings, Pending Bookings, Completed Bookings and Cancelled bookings.",
            "lastupdate"=>"2022/08/03",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'v1.1 French language file added v1.2 BS4 template set added v1.3 Italian lang file added, thanks Nicola. v1.4 Language files updated v1.5 Bootstrap 5 template set added. v1.6 Documentation updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_anz78.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
