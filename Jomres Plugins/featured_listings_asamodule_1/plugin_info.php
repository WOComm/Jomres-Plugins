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

class plugin_info_featured_listings_asamodule_1
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"featured_listings_asamodule_1",
			"category"=>"Site Building Tools",
			"marketing"=>"Allows you to display the featured listings in a module position.",
			"version"=>"4.5",
			"description"=> "Allows you to display the featured listings in a module position using jomres_asamodule by setting the task to featured_listings_asamodule_1. You can also set the property/listing types ids to be displayed by using &ptype_ids=X,Y,Z and the number of properties/listings to be displayed by using &limit=L",
            "lastupdate"=>"2022/11/08",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/61-featured-listings-asamodule-1',
			'change_log'=>'v1.6 updated code to use translatable region names. v1.7 Added code supporting Media Centre image locations. v1.8 Improved how the feature listings ordering is calculated. v1.9 Added BS3 templates. v2.0 Added changes to reflect addition of new Jomres root directory definition. v2.1 Updated plugin to show prices from. v2.2 Added an animation delay variable. v2.3 BS3 template related tweaks. v2.4 PHP7 related maintenance. v2.5 Jomres 9.7.4 related changes v2.6 Jomres 9.7.4 related changes v2.7 Remaining globals cleanup and jr_gettext refactor related changes. v2.8 Removed references to customtext class due to 9.8.2 language changes. v2.9 User role related updates. v3.0 Modified functionality to use new get_property_details_url function. v3.1 Updated a query. v3.2 Menu options updated for menu refactor in v9.8.30 v3.3 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v3.4 Shortcode data updated. v3.5 Node/javascript path related changes. v3.6 French language file added. v3.7 Anonymise street if required. v3.8 BS4 template set added v3.9 Italian language file added, thanks Nicola v4.0 Language files updated v4.1 Bootstrap 5 template set added. v4.2 Updated to use get_property_module_data function for consistency. v4.3 Documentation updated. v4,4 Fixed an issue with not displaying in non-BS5 sites v4.5 BS5 markup improved.' ,
			'image'=>'https://snippets.jomres.net/2017-09-21_zcyfa.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
		

	}
