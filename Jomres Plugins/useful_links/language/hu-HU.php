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
jr_define('USEFUL_LINKS_MODULE_TITLE',"Hasznos linkek a következőhöz: ");
jr_define('USEFUL_LINKS_FORSALE',"Eladó ingatlanok itt: ");
jr_define('USEFUL_LINKS_HOTELS',"Szállodák/Panziók itt: ");
jr_define('USEFUL_LINKS_VILLAS',"Bérelhető nyaralók ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Információ a következőről: ");

jr_define('USEFUL_LINKS_ADMIN',"Hasznos linkek");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"Ingatlantípus azonosítója");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"Hotel/B&B ingatlantípus azonosítója");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"Nyaralók ingatlantípus azonosítója");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'Ez a beépülő modul arra készült, hogy bizonyos keresésekre mutató hivatkozásokat jelenítsen meg, ha az url tartalmazza az "ország", "régió" vagy "város" kifejezést, ezért általában egy oldalsávba vagy modul/widget pozícióba szeretné tenni Először konfigurálnia kell a beépülő modult a Webhely konfigurációja > Hasznos linkek lapon, hogy jelezze a szállodák, ingatlanok és apartmanok/házak/villák ingatlantípus-azonosítóit. ' );