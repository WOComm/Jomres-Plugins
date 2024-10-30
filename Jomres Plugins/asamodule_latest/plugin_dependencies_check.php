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

class plugin_check_dependencies
	{
	function __construct()
		{
		$this->test_result = true;
		$this->dependencies = array ( "alternative_init" );
		foreach ($this->dependencies as $p)
			{
			if (!file_exists(JOMRESPATH_BASE.JRDS."core-plugins".JRDS.$p.JRDS."plugin_info.php") && !file_exists(JOMRESPATH_BASE.JRDS."remote_plugins".JRDS.$p.JRDS."plugin_info.php") )
				$this->test_result = false;
			}
		}
	
	}
