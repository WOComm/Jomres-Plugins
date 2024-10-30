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
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Jomres.net syndikeringsfunksjonen er ny funksjonalitet designet for å dele eiendommer mellom nettsteder selv om bookinger bare kan gjøres på hjemmeserveren.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Formålet med dette er å gjøre det mulig for nettsteder å bygge tillit med søkemotorer. Det er en gratis funksjon, tilgjengelig for alle Jomres -brukere. Aktive Jomres -lisensinnehavere kan, hvis de ønsker å fjerne sine nettsted fra syndikeringsnettverket via denne siden. Localhost kan ikke legges til nettverket, og hvis det av en eller annen grunn er et problem med tilkobling, kan du ikke legge til nettstedet ditt i nettverket. Sjekk REST API -tilkoblingstestsiden hvis du er i tvil. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Klikk på denne lenken for å fjerne nettstedet ditt fra nettverket.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Klikk på denne lenken for å legge nettstedet ditt til nettverket.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Fjern dette nettstedet fra nettverket");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Legg til dette nettstedet i nettverket");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Beklager, støttenøkkelen din er ikke gyldig eller er ikke aktiv, du kan ikke endre syndikeringsstatusen for denne installasjonen.");
