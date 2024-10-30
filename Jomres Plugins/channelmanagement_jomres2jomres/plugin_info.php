<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_channelmanagement_jomres2jomres
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"channelmanagement_jomres2jomres",
			"category"=>"Integration",
			"marketing"=>"Plugin that allows child installations of Jomres to import properties from parent installations",
			"version"=>(float)"1.5",
			"description"=> "Thin plugin for the Jomres CMF that allows child installations of Jomres to import properties from parent installations",
            "lastupdate"=>"2022/10/26",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'v0.2 Bunches of changes regarding booking export. v0.3 Property export improvements. v0.4 Added webhook processing v0.5 Proxy header changed to use hyphens v0.6 Proxy header changed to use hyphens. Changed logging so that J2J has it\'s own log file. Queue handling moved into own class for performance. Webhook events are now base64 encoded. v0.7 Refactored error reporting. Changed how manager id is found.
Prevent attempted import of properties with too few webhook events because there\'s not enough data to build the property. 0.8 Fixed a notice, Improved local token storage and added detection of expired/invalid tokens. 0.9 Added property created handling. v0.10 Significant improvement of importing of properties from a remote Jomres site into the local site. v0.11 For SRPs rooms are automatically created by the Core, so added a change to remove this invisible room because the import script will add it\'s own during the import phase. v0.12 Improved pricing importing v1.0 Language files updated v1.1 Resolved a PHP 8 compatability issue. v1.2 Trying to limit the number of tariffs to import. v1.3 Codename Yubi, lots of adjustments to clarify which property uid we are calling to get manager ids, other tweaks to improve import process. v1.4 Bootstrap 5 template set added. v1.5 Fixed some notices.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
