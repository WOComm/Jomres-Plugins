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

class plugin_info_webhooks_authmethod_none
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"webhooks_authmethod_none",
			"category"=>"Webhooks",
			"marketing"=>"Part of the Webhooks library. Used for sending data to servers with no authentication parameters.",
			"version"=>"1.3",
			"description"=> "Part of the Webhooks library. Used for sending data to servers with no authentication parameters. Install the Webhooks Core, when you create a new Webhook this plugin will provide the 'None' option.",
            "lastupdate"=>"2021/10/25",
			"min_jomres_ver"=>"9.9.1",
			"manual_link"=>'',
			'change_log'=>'v0.2 Refactored code to support webhook calls being available in 9.8.22 v0.3 Improved logging.  v0.4 Added check for duplicate webhooks and strip accordingly. v1.0 Changed how array contents are checked. v1.1 Path definition related changes. v1.2 French language file added v1.3 Language files updated',
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
