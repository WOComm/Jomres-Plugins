<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

jr_define('_PHPLIST_INSTRUCTIONS',"This plugin integrates Jomres with PHPList and allows you to automatically add customers name and email to a mailing list when they make a booking.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Skip subscription confirmation email?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Send HTML emails?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPList frontpage base URL");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"The url needs to have a trailing slash and don`t use any params in it");
jr_define('_PHPLIST_HUSER',"PHPList admin username");
jr_define('_PHPLIST_HPASS',"PHPList admin password");
jr_define('_PHPLIST_HATTRIB1',"attribute1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPList attribute/field name where you want to store the guest firstname. Leave empty for none.");
jr_define('_PHPLIST_HATTRIB2',"attribute2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPList attribute/field name where you want to store the guest surname. Leave empty for none.");
jr_define('_PHPLIST_HLIST_ID',"Mailing list ID");
