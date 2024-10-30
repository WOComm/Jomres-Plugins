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
jr_define('QUICK_REGISTER_TITLE',"Gyors regisztráció");
jr_define('QUICK_REGISTER',"Csatlakozás");
jr_define('QUICK_REGISTER_BLURB',"Van ingatlanod, amit listázni szeretnél? Kattintson ide, hogy csatlakozzon a bulihoz!");
jr_define('QUICK_REGISTER_EMAIL_ADD',"Adja meg e-mail címét, és mi kezdjük el");
jr_define('QUICK_REGISTER_EMAIL',"E-mail cím");
jr_define('QUICK_REGISTER_EMAIL_SAVE',"Csináljuk!");
jr_define('QUICK_REGISTER_EMAIL_CLICKLINK',"Miután megkapta a regisztrációs e-mailt, be tud majd jelentkezni, és felveheti ingatlanja(ka)t oldalunkra.");
jr_define('QUICK_REGISTER_EMAIL_THANKS',"Köszönjük a regisztrációt!");
jr_define('QUICK_REGISTER_EMAIL_THANKS_BLURB',"Hamarosan e-mailt fog kapni, kérjük, kattintson az ott található linkre, és végigvezetjük a tulajdonának az oldalhoz adásának folyamatán.");
jr_define('QUICK_LOGIN',"Bejelentkezés");
jr_define('QUICK_REGISTER_PASSWORD',"Jelszó");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_TITLE',"Üdvözöljük a ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_LOGIN',"Kezdjük el az első tulajdon létrehozásával. Először jelentkezzen be az oldalra ezen a linken keresztül: ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_CREATE',"Miután bejelentkezett, látogassa meg ezt az oldalt az első tulajdon létrehozásához: ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_DONE',"Most kövesse a képernyőn megjelenő utasításokat, és ha bármilyen kérdése van, ne habozzon kapcsolatba lépni velünk itt ");
jr_define('QUICK_REGISTER_CONFIG_TITLE',"Megjelenítés az eszköztár alatt?");
jr_define('QUICK_REGISTER_CONFIG_DESC',"Ha ezt yes-re állítja, akkor a Gyors regisztráció gombok megjelennek az eszköztár alatt a nem regisztrált és be nem jelentkezett felhasználók számára. Ha nem-re állítja, akkor az ASAModule-t kell használnia az elhelyezéshez a gombokat egy új ASAModule modul létrehozásával és a feladat quick_register értékre állításával elhelyezheti azt a modult, ahol csak szeretné.");