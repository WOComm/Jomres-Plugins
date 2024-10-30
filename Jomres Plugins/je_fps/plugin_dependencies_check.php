<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
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
