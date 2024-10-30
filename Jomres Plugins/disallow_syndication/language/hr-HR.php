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

jr_define ('DISALLOW_SYNDICATION_TITLE', "Onemogući udruživanje");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Značajka udruživanja Jomres.net nova je funkcija dizajnirana za dijeljenje svojstava između web stranica iako se rezervacije mogu izvršiti samo na kućnom poslužitelju.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Svrha ovoga je omogućiti web -lokacijama stvaranje povjerenja s tražilicama. To je besplatna značajka, dostupna svim korisnicima Jomresa. Nositelji aktivnih Jomres licenci mogu, ako žele, ukloniti svoje web -mjesto s mreže za distribuciju putem ove stranice. Localhost se ne može dodati u mrežu, a ako iz bilo kojeg razloga postoji problem s povezivanjem, nećete moći dodati svoju web lokaciju na mrežu. Provjerite stranicu za testiranje povezivanja REST API -ja ako su u bilo kakvoj sumnji. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Kliknite ovu vezu da biste uklonili svoju web lokaciju iz mreže.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Kliknite ovu vezu da biste dodali svoju web lokaciju u mrežu.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Ukloni ovu stranicu s mreže");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Dodaj ovu web lokaciju u mrežu");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Nažalost, vaš ključ za podršku nije važeći ili nije aktivan, ne možete promijeniti status distribucije ove instalacije.");