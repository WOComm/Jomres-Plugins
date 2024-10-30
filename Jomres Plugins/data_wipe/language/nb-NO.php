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
jr_define ('_JOMRES_DATAWIPE_TITLE', "Data wipe");
jr_define ('_JOMRES_DATAWIPE_DESC', "Denne funksjonen lar deg slette data som samles inn når bestillinger foretas. Den er beregnet for bruk av utviklere som har laget mye utviklingsdata på sine installasjoner (for eksempel testbestillinger, abonnementer) og ønsker å tørk informasjonen fra systemet, samtidig som du beholder eiendoms- og tariffinformasjon. <br/> Programtillegget fjerner ALLE cron -logger, brukerfavoritter, notater, bestillinger, fakturaer, abonnenter, abonnementer, gjester, revisjonsdata, klikkantall og anmeldelser. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Disse dataene kan bare hentes fra en sikkerhetskopi av systemet ditt, så du må forstå at dette er et veldig skadelig skript. Som et resultat anbefales det at når du har brukt det for det det er ment hensikt at du avinstallerer det igjen etterpå. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Klikk for å slette data");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Tømning");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Tømt vellykket.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Kunne ikke tømme tabellen.");