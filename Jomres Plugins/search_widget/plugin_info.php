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

class plugin_info_search_widget
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"search_widget",
			"category"=>"Search",
			"marketing"=>"A variety of search plugin layouts for you to choose from. Designed to be used as shortcodes so see the Shortcodes page after installation and in that table search for search_widget to see the available layouts.",
			"version"=>"2.2",
			"description"=> "A variety of search plugin layouts for you to choose from. Designed to be used as shortcodes so see the Shortcodes page after installation and in that table search for search_widget to see the available layouts." ,
            "lastupdate"=>"2022/09/23",
            "min_jomres_ver"=>"10.3.0",
			"manual_link"=>'',
			'change_log'=>'1.1 Added search by property name/description/categories & new horizontal location (searchable)/search/dates/sleeps templates. v1.2 Jomres 9.23.2 updated to add searching by children and this has been updated to offer new fuctionality related to that, specifically horizontal_adults_children_buttons template. v1.3 BS4 template files added. v1.4 Language files updated v1.5 Bootstrap 5 template set added. v1.6 New autocomplete feature added. Depends on 10.2 data sources feature v1.7 made a few minor tweaks, and back ported autocomplete to BS3 v1.8 Autocomplete moved into Core of 10.3 v1.9 Prevent plugin from showing on Edit tariffs pages because the calendar renders the other calendars unusable. v2.0 Tweak to one form to show that IDs cannot always be used for date inputs. v2.1 Documentation updated v2.2 Modified horizontal_location_search_dates_sleeps index.html as it seems to be missing {AUTOCOMPLETE}',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
    
    
    
