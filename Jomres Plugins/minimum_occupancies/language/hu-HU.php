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
jr_define('_OCCUPANCIES_TITLE',"Minimális foglaltság");

jr_define('_OCCUPANCIES_DESCRIPTION',"Beállíthatja az adott szobatípusok minimális foglaltsági szintjét, ha azt szeretné, hogy a vendég bizonyos számú vendégtípust kiválasztott a foglalási űrlapon, mielőtt a megfelelő szoba és tarifa kombináció megjelenik." );
jr_define ('_OCCUPANCIES_DESCRIPTION_INFO', "Itt létrehozhat egy minimális kihasználtsági szintet minden szobatípushoz. Szoba/tarifa kombináció nem lesz elérhető, ha a vendég nem választotta ki a megfelelő számú vendégtípust. Minden szobatípushoz válassza ki a egy adott típusú vendégszám, amelyet a foglalási űrlapon minimum szerepeltetni kell a szobatípus felajánlása előtt. Ha nem érdekli, hogy egy szobatípushoz mekkora legyen a foglaltság, hagyja az adott szobatípus vendégszámát 0-ra állítva (nulla). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Vendégtípus száma");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Még nem hozott létre vendégtípusokat. A szolgáltatás használata előtt hozzon létre néhány vendégtípust.");

jr_define('_OCCUPANCIES_EDIT',"Minimális foglaltság szerkesztése ");