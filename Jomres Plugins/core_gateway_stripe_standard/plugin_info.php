<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 10
* @package Jomres
* @copyright	2005-2022 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_core_gateway_stripe_standard
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"core_gateway_stripe_standard",
			"category"=>"Payment handling",
			"marketing"=>"Adds standard Stripe payment handling.",
			"version"=>"0.1",
			"description"=> "Adds Stripe payment handling. This plugin allows payments via Stripe but it does not use the Platform handling functionality. Use this gateway if you do not intend to split payments between yourself and the property. Currently does not handle balance payments, only deposit payments.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
            "lastupdate"=>"2022/09/15",
            "min_jomres_ver"=>"10.5.3",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
