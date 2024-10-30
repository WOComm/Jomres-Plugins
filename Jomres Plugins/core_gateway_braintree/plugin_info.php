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

class plugin_info_core_gateway_braintree
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"core_gateway_braintree",
			"category"=>"Payment handling",
			"marketing"=>"Adds Braintree payment handling",
			"version"=>"0.5",
			"description"=> "Adds Braintree payment handling. ",
            "lastupdate"=>"2022/07/08",
            "min_jomres_ver"=>"10.2.2",
			"manual_link"=>'',
			'change_log'=>'v0.2 Fixed a notice. v0.3 changed image size and changed how button in frontend is presented. v0.4 Fixed a notice. v0.5 Documentation updated',
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
