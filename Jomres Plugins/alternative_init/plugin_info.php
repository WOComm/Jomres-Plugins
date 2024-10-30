<?php
/**
* Jomres CMS Specific Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_alternative_init
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"alternative_init",
			"category"=>"System",
			"version"=>(float)"5.8",
			"marketing"=>"Allows various plugins to call the Jomres framework without actually running Jomres itself.",
			"description"=> "When Jomres starts it needs some information to be created before it will run. Jomres.php/j00030search.class.php will do this normally however there are times when you may want to run use Jomres functionality without actually running Jomres in the component area. In this case you can include the alt_init.php script included in this plugin. This will perform the required initialisation steps without actually running Jomres itself.",
			"lastupdate"=>"2016/09/14",
			"min_jomres_ver"=>"9.8.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/108-alternative-init',
			'change_log'=>'v5.6 Framework changes in Jomres 9.8.0 allow us to consolidate the Joomla and Wordpress versions of Alt Init into one CMS Agnostic plugin. v5.7 Changed how we check for _JOMRES_INITCHECK v5.8 Improved paths. ',
			'highlight'=>'',
			'image'=>'https://www.jomres.net/manual/images/Manual/C__Users_Vince_Desktop_Jomres_Plugins_cms_agnostic_alternative_init_alt_init.php_-_Notepad%2B%2B_v3m45.png',
			'demo_url'=>'',
			'free'=>true,
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
