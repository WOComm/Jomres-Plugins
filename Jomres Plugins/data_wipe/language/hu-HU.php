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
jr_define ('_JOMRES_DATAWIPE_TITLE', "Adatok törlése");
jr_define ('_JOMRES_DATAWIPE_DESC', "Ez a funkció lehetővé teszi a foglalások során gyűjtött adatok törlését. Olyan fejlesztők számára készült, akik sok fejlesztési adatot hoztak létre a telepítéseikről (például tesztfoglalások, előfizetések), és törölje az információkat a rendszerből, miközben megtartja a tulajdon- és tarifadatokat. <br/> A beépülő modul eltávolítja az ÖSSZES cron -naplót, felhasználói kedvenceket, jegyzeteket, foglalásokat, számlákat, előfizetőket, előfizetéseket, vendégeket, ellenőrzési adatokat, kattintások számát és véleményét. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Ezeket az adatokat csak a rendszer biztonsági másolatából lehet lekérni, ezért meg kell értenie, hogy ez egy nagyon káros szkript. Ebből kifolyólag ajánlott, hogy ha már rendeltetésszerűen használta célja, hogy később távolítsa el újra. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Kattintson az adatok törléséhez");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Ürítés");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Sikeresen kiürítve.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Nem sikerült kiüríteni az asztalt.");