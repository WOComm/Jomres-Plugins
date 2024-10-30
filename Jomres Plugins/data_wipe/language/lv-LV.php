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

jr_define ('_JOMRES_DATAWIPE_TITLE', "Datu dzēšana");
jr_define ('_JOMRES_DATAWIPE_DESC', "Šī funkcija ļauj izdzēst rezervēšanas laikā apkopotos datus. Tā ir paredzēta izstrādātājiem, kuri ir izveidojuši daudz izstrādes datu par savām instalācijām (piemēram, testa rezervācijas, abonementi) un vēlas noslaukiet informāciju no sistēmas, vienlaikus saglabājot informāciju par īpašumiem un tarifiem. <br/> Spraudnis noņems VISUS cron žurnālus, lietotāju izlases, piezīmes, rezervācijas, rēķinus, abonentus, abonementus, viesus, revīzijas datus, klikšķu skaitu un atsauksmes. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Šos datus var izgūt tikai no jūsu sistēmas rezerves kopijas, tāpēc jums jāsaprot, ka tas ir ļoti kaitīgs skripts. Tā rezultātā ieteicams to izmantot, kad tas ir paredzēts, kā paredzēts lai pēc tam to atkal atinstalētu. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Noklikšķiniet, lai notīrītu datus");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Iztukšošana");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Iztukšots veiksmīgi.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Neizdevās iztukšot tabulu.");