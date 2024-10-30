<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_wire_transfer
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"wire_transfer",
			"category"=>"Payment handling",
			"marketing"=>"Wire transfer or bank debit gateway (offline payments). Adds functionality to edit banks account details for each property individually.",
			"version"=>(float)"4.7",
			"description"=> "Wire transfer or bank debit gateway (offline payments). Adds functionality to edit banks account details for each property individually.",
            "lastupdate"=>"2023/05/24",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'v3.1 Fix paths. v3.2  Improved Print icon functionality. v3.3 Added ability for wire transfer to be an option available through subscriptions. v3.4 Notices fixes. v3.5 Added changes supporting 9.8.30 minicomponent registry changes v3.6 Save plugin task changed. v3.7 Modified how admin menu is generated. v3.8 Subscription related functionality updated v3.9 Modified how array contents are checked. v4.0 CSRF hardening added. v4.1 French language file added v4.2 French lang file updated. V4.3 Italian lang file added, thanks Nicola. v4.4 Language files updated v4.5  Fixed issue affecting WordPress forms v4.6 Bootstrap 5 template set added. v4.7 Select list markup changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_7xsst.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}