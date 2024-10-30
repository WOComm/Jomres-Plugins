<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Hyphen check");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"This tool is designed to check all property lag and long fields. Some may incorrectly have html entities in the lat or long fields instead of actual hyphens. Where found this tool converts those to hyphens.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Some properties found with html entities, which have now been converted to actual hyphens. The number of properties converted is ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Everything is good, no properties were found with html entities where actual hyphens should be.");