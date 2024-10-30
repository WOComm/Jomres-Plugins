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

class plugin_info_bootstrap_5_property_details_templates
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bootstrap_5_property_details_templates",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.5",
			"description"=> 'Provides an alternative set of property details template files. Visit admin area Property Details Templates page for a list of alternatives you can use. In Site Configuration admin can choose to allow property managers to choose the property details layout they want to use, as well as configure the default property details page.',
			"lastupdate"=>"2022/09/05",
			"min_jomres_ver"=>"10.2.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Minor markup tweaks. v1.2 Added weather output that will appear in content, instead of older tabs, from v10.2.3. Added new template Erika. v1.3 Some markup improved in Lux, links to github template files added. v1.4 changed the point where templates are included. v1.5 Contact owner form moved out of tabs',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}