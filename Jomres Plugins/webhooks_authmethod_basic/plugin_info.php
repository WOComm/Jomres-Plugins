<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.8.21
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_webhooks_authmethod_basic
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"webhooks_authmethod_basic",
			"category"=>"Webhooks",
			"marketing"=>"Part of the Webhooks library. Used for sending data to servers using Basic Authentication.",
			"version"=>"1.6",
			"description"=> "Part of the Webhooks library. Used for sending data to servers using Basic Authentication.. Install the Webhooks Core, when you create a new Webhook this plugin will provide the 'Basic' option.",
			"lastupdate"=>"2022/08/03",
			"min_jomres_ver"=>"9.9.1",
			"manual_link"=>'',
			'change_log'=>'v0.2 Refactored code to support webhook calls being available in 9.8.22 v0.3 Improved logging. v0.4 Added check for duplicate webhooks and strip accordingly. v1.0 Changed how array contents are checked. v1.1 Path definition related changes. v1.2 French language file added 1.3 Fixed a notice. v1.4 Fixed another notice caused by unanticipated usage patterns. v1.5 Language files updated v1.6 Documentation updated.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true,
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
