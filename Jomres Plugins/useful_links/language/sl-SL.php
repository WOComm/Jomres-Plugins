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



jr_define('USEFUL_LINKS_MODULE_TITLE',"Koristne povezave za ");
jr_define('USEFUL_LINKS_FORSALE',"Nepremičnine za prodajo v ");
jr_define('USEFUL_LINKS_HOTELS',"Hoteli/nočitve z zajtrkom v ");
jr_define('USEFUL_LINKS_VILLAS',"Počitniške hiše za najem v ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Informacije o ");

jr_define('USEFUL_LINKS_ADMIN',"Koristne povezave");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"ID vrste nepremičnine");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"ID vrste nepremičnine za hotel/B&B");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"ID vrste lastnine počitniških hiš");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'Ta vtičnik je zasnovan tako, da prikazuje povezave do določenih iskanj, če URL vključuje "državo", "regijo" ali "mesto", zato bi ga običajno želeli postaviti v stransko vrstico ali modul/pripomoček na na vrhu strani. Najprej boste morali konfigurirati vtičnik v zavihku Konfiguracija spletnega mesta > Uporabne povezave, da navedete ID-je vrste nepremičnin za Hotele, Nepremičnine in Stanovanje/koča/Vile. ');