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

class plugin_info_core_gateway_bitpay
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"core_gateway_bitpay",
			"category"=>"Payment handling",
			"marketing"=>"Adds Bitpay payment handling",
			"version"=>"1.2",
			"description"=> "Adds Bitpay payment handling, allowing guests to pay using their digital wallets. Bitpay supports Bitcoin, Dogecoin, Ethereum, Litecoin, Bitcoin Cash, XRP and all major stable coins. ",
            "lastupdate"=>"2022/09/26",
            "min_jomres_ver"=>"10.2.2",
			"manual_link"=>'',
			'change_log'=>'v0.9 Modified paid check to allow Paid/Confirmed/Complete invoice states to all allow the booking to go ahead. Added 03200 script to log transaction against the invoice. v0.10 Use region name instead of region id when creating the invoice for the guest. Bitpay confirmation now shows in modal, not a redirection to payment gateway. v1.0 Minor tweak to prevent a script from kicking in if it is not needed. v1.1 Documentation updated v1.2 Minor tweaks for Jomres 10.5.4',
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
