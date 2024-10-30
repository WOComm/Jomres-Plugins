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
jr_define ('DISALLOW_SYNDICATION_TITLE', "Disndow Syndication");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'A Jomres.net terjesztési szolgáltatás egy új funkció, amely a tulajdonságok megosztására szolgál a webhelyek között, bár foglalásokat csak az otthoni szerveren lehet végezni.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Ennek célja, hogy lehetővé tegye a webhelyek számára, hogy bizalmat építsenek a keresőmotorokkal. Ez egy ingyenes szolgáltatás, amely minden Jomres -felhasználó számára elérhető. Az aktív Jomres -engedélyesek, ha úgy döntenek, eltávolítják webhelyet a terjesztési hálózatból ezen az oldalon keresztül. A Localhost nem adható hozzá a hálózathoz, és ha valamilyen okból probléma merül fel a kapcsolattal, akkor nem tudja hozzáadni webhelyét a hálózathoz. Ellenőrizze a REST API kapcsolódási tesztoldalát, ha kétségei vannak. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Kattintson erre a linkre, hogy eltávolítsa webhelyét a hálózatból.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Kattintson erre a linkre, hogy webhelyét hozzáadja a hálózathoz.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Az oldal eltávolítása a hálózatról");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Az oldal hozzáadása a hálózathoz");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Sajnáljuk, a támogatási kulcs nem érvényes, vagy nem aktív, nem módosíthatja a telepítés terjesztési állapotát.");