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

class plugin_info_isotope_properties
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"isotope_properties",
			"category"=>"Site Building Tools",
			"marketing"=>"Display all properties in an Isotope layout which can filter and sort properties incredibly quickly.",
			"version"=>"1.3",
			"description"=> "Display all properties in an Isotope layout which can filter and sort properties incredibly quickly. You can also set the property/listing types ids to be displayed by using &ptype_ids=X,Y,Z and the number of properties/listings to be displayed by using &limit=L",
            "lastupdate"=>"2023/05/12",
            "min_jomres_ver"=>"10.5.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Fixed a broken path to the javascript file. v1.2 Updated plugin so that it can use the basic module output template for consistency. V10.5 of Jomres required for this to work. v1.3 Disable animations  ',
			'image'=>'',
			'demo_url'=>'',
			'highlight'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
