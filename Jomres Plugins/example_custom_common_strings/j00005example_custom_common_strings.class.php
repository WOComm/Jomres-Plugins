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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################


class j00005example_custom_common_strings {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		// The purpose of this script is to show developers an easy way of adding common strings to Jomres. The common strings can be used in any template at any time without needing to modify any other scripts.
		
		// First we need to get any existing common strings so that we don't overwrite others that another script may have created
		$common_strings			= get_showtime( 'common_template_strings' );
		
		// Now we can start adding strings. I'm going to do something simple here and set the index key TODAYSDATE to...well...today's date
		$common_strings['TODAYSDATE'] = date("d/m/Y");
		
		// Now we need to put the $common_strings variable into the common_template_strings variable
		set_showtime( 'common_template_strings' ,$common_strings );
		
		// Now, all you need to do is add {TODAYSDATE} to any template file and the date will be shown.
		
		}

	function getRetVals()
		{
		return null;
		}
	}
