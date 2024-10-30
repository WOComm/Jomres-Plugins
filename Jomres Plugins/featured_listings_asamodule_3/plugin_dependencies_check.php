<?php
/**
 * Plugin
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 5 
* @package Jomres
* @copyright	2005-2011 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_check_dependencies
	{
	function __construct()
		{
		$this->test_result = true;
		$this->dependencies = array ( "featured_listings" );
		foreach ($this->dependencies as $p)
			{
			if (!file_exists(JOMRESPATH_BASE.JRDS."core-plugins".JRDS.$p.JRDS."plugin_info.php") && !file_exists(JOMRESPATH_BASE.JRDS."remote_plugins".JRDS.$p.JRDS."plugin_info.php") )
				$this->test_result = false;
			}
		}
	
	}
