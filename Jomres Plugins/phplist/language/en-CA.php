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