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

class plugin_info_nearby_propertys
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"nearby_propertys",
			"category"=>"Search",
			"marketing"=>"Displays nearby properties based on latitude and longitude details and a given radius, selectable by the administrator.",
			"version"=>(float)"5.0",
			"description"=> "Displays nearby properties based on latitude and longitude details and a given radius, selectable by the administrator. The nearby properties list includes the property name, stars, distance from the current property, price and will integrate very well with any Jomres template you might have. After successfully installing the plugin, a new button will be created in your Jomres control panel (backend). All plugin settings can be made from here. The administrator has the option to enable or disable the plugin, select the radius in which to display properties (can be in miles or kilometers), the number of properties to display and the property image width and height. He can also choose if the displayed nearby properties will be of the same type as the currently viewed property, or the nearby properties will be of all types available. For this plugin to work, latitude and longitude coordinates for all properties are a must. Otherwise the radius can`t be calculated and an error message will be displayed for the properties that don`t have the coordinates set.",
            "lastupdate"=>"2023/05/24",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'v1.1 Updated for Jomres 4.5. v1.2 Removed reviews output from the templates as it was causing some bugs. v1.3 Completely changed the nearby properties layout. Now the nearby_propertys task can also be called by jomres_asamodule, if the property_uid is provided as parameter. v1.4 The nearby_propertys task called by jomres_asamodule now accepts lat and long details as params, so you can display properties nearby any location. v1.5 Small improvements and fixes. v1.6 Fixed a language file issue. v1.7 Updated for Jomtes v5.6. v1.8 Fixed problem with prices not being displayed properly. v1.9 Updated with Twitter Bootstrap templates. v2 Removed references to no longer used Jomres token functionality. v2.1 Optimized queries. v2.2 Small tweaks. v2.3 Updated for Jomres 8.1 and dropped compatibility with older Jomres versions. v2.4 Added Bootstrap 3 support. v2.5 Tweaked property type specific language handling. v2.6 Updated constructors for PHP7. v3.1 Minor tweak to not set showtime property uid. v3.2 Resolved an issue with concatenation when no properties found. v3.3 Added spaces in template files. v3.4 Modified functionality to use new get_property_details_url function. v3.5 Added IMAGE to template output for those users that want it. v3.6 Settings moved to Site Config. v3.7 Site config tabs updated. v3.8 Modified how array contents are checked. v3.9 Node/javascript path related changes. v4.0 Fixed hyphen sanitisation. v4.1 French language file added v4.2 BS4 template set added v4.3 Italian language file added, thanks Nicola v4.4 Fixed notices. v4.5 Language files updated v4.6 Fixed a notice v4.7 Bootstrap 5 template set added. v4.8 Documentation updated v4.9 Resolved a PHP8.1 depreciation notice. v5.0 Fix a notice.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_5uyr0.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net",
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
