<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2013 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Hyphen check");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"This tool is designed to check all property lag and long fields. Some may incorrectly have html entities in the lat or long fields instead of actual hyphens. Where found this tool converts those to hyphens.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Some properties found with html entities, which have now been converted to actual hyphens. The number of properties converted is ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Everything is good, no properties were found with html entities where actual hyphens should be.");