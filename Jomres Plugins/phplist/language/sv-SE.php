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


jr_define ('_PHPLIST_INSTRUCTIONS', "Denna plugin integrerar Jomres med PHPList och låter dig automatiskt lägga till kundens namn och e -postadress i en e -postlista när de gör en bokning.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Hoppa över prenumerationsbekräftelsemail?");
jr_define ('_PHPLIST_HSENDHTMLEMAILS', "Skicka HTML -e -post?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPLista framsidans basadress");
jr_define ('_PHPLIST_HPHPLISTURL_DESC', "Webbadressen måste ha ett bakre snedstreck och inte använda några params i den");
jr_define('_PHPLIST_HUSER',"PHPList admin användarnamn");
jr_define('_PHPLIST_HPASS',"PHPList admin lösenord");
jr_define('_PHPLIST_HATTRIB1',"attribut1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPListattribut/fältnamn där du vill lagra gästens förnamn. Lämna tomt för ingen.");
jr_define('_PHPLIST_HATTRIB2',"attribut2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPListattribut/fältnamn där du vill lagra gästens efternamn. Lämna tomt för ingen.");
jr_define('_PHPLIST_HLIST_ID',"E-postlista ID");