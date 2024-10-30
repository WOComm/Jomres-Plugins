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

jr_define ('_JOMRES_DATAWIPE_TITLE', "Brisanje podataka");
jr_define ('_JOMRES_DATAWIPE_DESC', "Ova značajka omogućuje vam brisanje podataka koji se prikupljaju prilikom rezervacija. Namijenjena je razvojnim programerima koji su stvorili mnogo razvojnih podataka o svojim instalacijama (kao što su testne rezervacije, pretplate) i žele obrišite podatke iz sustava, a da pritom zadržite podatke o svojstvima i tarifama. <br/> Dodatak će ukloniti SVE zapisnike crona, favorite korisnika, bilješke, rezervacije, račune, pretplatnike, pretplate, goste, podatke revizije, broj klikova i recenzije. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Ovi se podaci mogu dohvatiti samo iz sigurnosne kopije vašeg sustava, stoga morate shvatiti da je ovo vrlo štetna skripta. Zbog toga se preporučuje da nakon što je upotrijebite za to je namijenjeno namjeravate da ga nakon toga ponovno deinstalirate. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Kliknite za brisanje podataka");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Pražnjenje");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Uspješno ispražnjeno.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Tablica nije ispražnjena.");