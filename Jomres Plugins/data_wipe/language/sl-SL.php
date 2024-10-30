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



jr_define ('_JOMRES_DATAWIPE_TITLE', "Obris podatkov");
jr_define ('_JOMRES_DATAWIPE_DESC', "Ta funkcija vam omogoča, da izbrišete podatke, zbrane pri rezervacijah. Namenjena je razvijalcem, ki so ustvarili veliko razvojnih podatkov o svojih namestitvah (na primer testne rezervacije, naročnine) in želijo izbrisati podatke iz sistema, hkrati pa ohraniti podatke o lastnini in tarifah. <br/> Vtičnik bo odstranil VSE dnevnike cron, priljubljene uporabnikov, zapiske, rezervacije, račune, naročnike, naročnine, goste, revizijske podatke, štetje klikov in ocene. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Te podatke je mogoče pridobiti samo iz varnostne kopije vašega sistema, zato morate razumeti, da je to zelo škodljiv skript. Zato je priporočljivo, da ga uporabite, ko je namenjen namen, da ga nato znova odstranite. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Kliknite za brisanje podatkov");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Praznjenje");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Uspešno izpraznjeno.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Tabele ni bilo mogoče izprazniti.");