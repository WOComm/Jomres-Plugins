<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 10
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_core_gateway_mollie
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"core_gateway_mollie",
			"category"=>"Payment handling",
			"marketing"=>"Adds Mollie payment handling.",
			"version"=>"0.3",
			"description"=> "Adds Mollie payment handling. Currently does not handle balance payments, only deposit payments.",
            "lastupdate"=>"2022/09/27",
            "min_jomres_ver"=>"10.2.2",
			"manual_link"=>'',
			'change_log'=>'v0.2 Documentation updated v0.3 Minor tweak for Jomres 10.5.4',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
