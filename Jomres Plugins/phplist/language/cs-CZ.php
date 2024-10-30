<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################
jr_define('_PHPLIST_INSTRUCTIONS',"Tento plugin integruje Jomres s PHPList a umožňuje vám automaticky přidávat jména a e-maily zákazníků do mailing listu, když provádějí rezervaci.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Přeskočit e-mail s potvrzením odběru?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Posílat HTML e-maily?");
jr_define('_PHPLIST_HPHPLISTURL',"Základní URL úvodní stránky PHPlistu");
jr_define ('_PHPLIST_HPHPLISTURL_DESC', "Adresa URL musí mít koncové lomítko a nepoužívat v něm žádné parametry");
jr_define ('_PHPLIST_HUSER', "PHPList admin uživatelské jméno");
jr_define('_PHPLIST_HPASS',"heslo správce PHPlist");
jr_define('_PHPLIST_HATTRIB1',"attribute1");
jr_define('_PHPLIST_HATTRIB1_DESC',"název atributu/pole PHPlist, kam chcete uložit křestní jméno hosta. Nechte prázdné pro žádné.");
jr_define ('_PHPLIST_HATTRIB2', "atribut2");
jr_define ('_PHPLIST_HATTRIB2_DESC', "Atribut/název pole PHPList, kam chcete uložit příjmení hosta. U žádného nechte pole prázdné.");
jr_define('_PHPLIST_HLIST_ID',"ID seznamu adresátů");