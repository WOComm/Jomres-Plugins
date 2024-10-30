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


jr_define ('DISALLOW_SYNDICATION_TITLE', "Disallow Syndication");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Jomres.net syndikeringsfunktionen er ny funktionalitet designet til at dele ejendomme mellem websteder, selvom bookinger kun kan foretages på hjemmeserveren.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Formålet med dette er at gøre det muligt for websteder at opbygge tillid med søgemaskiner. Det er en gratis funktion, tilgængelig for alle Jomres -brugere. Aktive Jomres -licensindehavere kan, hvis de ønsker at fjerne deres websted fra syndikeringsnetværket via denne side. Localhost kan ikke tilføjes til netværket, og hvis der af en eller anden grund er et problem med forbindelse, vil du ikke kunne tilføje dit websted til netværket. Kontroller REST API -forbindelsestestsiden, hvis du er i tvivl. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Klik på dette link for at fjerne dit websted fra netværket.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Klik på dette link for at tilføje dit websted til netværket.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Fjern dette websted fra netværket");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Føj dette websted til netværket");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Beklager, din supportnøgle er ugyldig eller ikke aktiv, du kan ikke ændre syndikeringsstatus for denne installation.");