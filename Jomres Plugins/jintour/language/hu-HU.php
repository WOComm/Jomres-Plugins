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
jr_define('_JINTOUR_TITLE',"Utazás/tevékenység menedzsment");

jr_define('_JINTOUR_PROFILES_TITLE',"Utazás/tevékenység profilok");
jr_define('_JINTOUR_PROFILES_NEW',"Új túra/tevékenység profil");
jr_define('_JINTOUR_PROFILES_DELETE',"Körút/tevékenységprofil törlése");

jr_define('_JINTOUR_PROFILE_TITLE',"Profil címe");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Leírás");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Adja meg a körút/tevékenység leírását, beleértve annak útvonalát.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"A hét napjai");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO', "");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Felnőtt ár");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Gyermekár");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Ha egy opciót nem szeretne megjeleníteni a foglalási űrlapon, hagyja az árat 0-ban (nulla)");
jr_define ('_JINTOUR_PROFILE_SPACES_ADULTS', "Felnőtt terek");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Child spaces");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"A túrán/tevékenységen elérhető helyek száma");
jr_define('_JINTOUR_PROFILE_START_DATE',"Szezon kezdete");
jr_define('_JINTOUR_PROFILE_END_DATE',"Szezon vége");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"A körutazás/tevékenységprofil létrehozása után a profil beállításai alapján körutakat/tevékenységeket kell generálnia. Hozza létre a körutat/tevékenységet, majd kattintson a profil melletti zöld nyíl ikonra a profil létrehozásához. maguk a túrák/tevékenységek. A túrák/tevékenységek létrehozása után törölheti az egyes túrákat/tevékenységeket, ha kívánja.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Túrák/tevékenységek generálása");

jr_define('_JINTOUR_TOUR_TITLE',"Tevékenység címe");
jr_define('_JINTOUR_TOUR_DATE',"Dátum");
jr_define ('_JINTOUR_TOUR_ADULTS', "Felnőttek");
jr_define('_JINTOUR_TOUR_KIDS',"Gyerekek");
jr_define('_JINTOUR_TOUR_ITINERY',"Útvonal");

jr_define ('_JINTOUR_TOUR_SAVE_AUDIT', "Új turnék generálva");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Túrafoglalás törölve");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Új túrák generálva");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Jelenleg elérhető helyek");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Új foglalás a túrához/erőforrásazonosítóhoz ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Új foglalás megtörtént egy rendszergazdai körúthoz/erőforráshoz. Kérjük, tekintse meg a következő linket a körút adminisztrátori oldalának megtekintéséhez ");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres Integrated Tours konfiguráció");
jr_define('_JINTOUR_TITLE_WHOLESITE',"A teljes telepítés Jintour telepítés?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Ha ezt az Igen értékre állítja, akkor minden ingatlan túratulajdon lesz. Ha Nem értékre állítja, akkor az új ingatlanok létrehozásakor rendelkezni fog Túra és Szálloda/Apartman típusú tulajdonságokkal is. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Túrák");
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC', "Válassza ki a túrák opciót, ha bizonyos időpontokban rendelkezésre álló termékekre (például túrákra, koncertre szóló jegyekre) kínál foglalást");
jr_define ('_JINTOUR_SHOWDEPARTURE', "Megjeleníti az indulási beviteli mezőt?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Állítsa ezt az Igen értékre, ha az érkezési és az indulási dátumot is meg szeretné jeleníteni. Ez akkor lehet hasznos, ha buszjáratokat, repülőjegyeket stb. kínál, ahol tudnia kell a bejövő és a távozó dátumokat is, az indulás dátumának megjelenítése lehetővé teszi, hogy több dátumra kínáljon erőforrásokat, míg a Nem beállítással csak egy időpontra szóló foglalások fogadhatók el.");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Túrák listája");