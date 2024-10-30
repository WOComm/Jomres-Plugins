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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define( '_JOMRES_ICAL_EVENT', 'iCal evenement');
jr_define( '_JOMRES_ICAL_FEED', 'iCal-feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal-feed-URL');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Uw iCal-feed(s) kunnen aankomende boekingen weergeven in een externe agenda, inclusief uw mobiele apparaat, Google Agenda, Apple Calendar, Thunderbird, Outlook en meer. Gebruik de volgende URL(\'s) om u te abonneren op feed(s) in uw agendasoftware.' );
jr_define( '_JOMRES_ICAL_ANON', 'Geanonimiseerde iCal Feed URL');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Anoniem toegang tot iCal-feed(s) toestaan?');
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Als deze optie is ingeschakeld, is uw iCal-evenementenfeed voor iedereen beschikbaar, maar zonder boekings- of gastgegevens.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import');
jr_define( '_JOMRES_ICAL_SELECT', 'Selecteer bestand om te importeren');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Fout, er is geen bestand geüpload.');
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Bij het importeren van een iCal-bestand moet de einddatum van het evenement de vertrekdatum van de gast zijn. Het overzicht moet de naam van de gast zijn. De beschrijving van het evenement kan alle andere details bevatten." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Dit boekingsnummer bestaat al in het systeem.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Er zijn geen kamers beschikbaar op de geselecteerde data.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Er zijn geen gebeurtenissen gevonden in het ics-bestand.');
jr_define( '_JOMRES_ICAL_SUCCESS', 'Gebeurtenis succesvol geïmporteerd');
jr_define( '_JOMRES_ICAL_FAILURE', 'Gebeurtenis kon niet worden geïmporteerd');

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Gastnaam');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Beschrijving evenement');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Start');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Einde');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Resultaat');
jr_define( '_JOMRES_ICAL_WITHHELD', 'Ingehouden');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Uw iCal-feed(s) kunnen aankomende boekingen weergeven in een externe agenda, inclusief uw mobiele apparaat, Google Agenda, Apple Agenda, Thunderbird, Outlook en meer.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Met deze functie kunt u boekingen van sites zoals Airbnb, Homeway en anderen synchroniseren met Jomres. U moet de iCal-feed-url van uw gelegenheid invoeren voor elke site waarmee u wilt synchroniseren. Als iemand dat wil boek uw accommodatie bijvoorbeeld op Airbnb, die datums worden ook weergegeven als geblokkeerde (zwarte boekingen) op deze Jomres-site, dus niemand kan die datums hier ook boeken. Hierdoor worden boekingsgegevens tussen sites niet gesynchroniseerd (zoals gastgegevens, prijzen, facturen, enz.), maar het is een leuke en gemakkelijke manier om dubbele boekingen te voorkomen door alleen de beschikbaarheid te synchroniseren.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal synchronisatie-instellingen');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal-feedinstellingen');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Externe iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Ook boekingsaanvragen opnemen?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Indien ingeschakeld, worden ook boekingen opgenomen die nog niet zijn goedgekeurd (als de goedkeuringsfunctie voor boekingen is ingeschakeld). Als u deze optie uitgeschakeld houdt, kunt u boekingen in de kalender verbergen die mogelijk op bevestiging wachten in een niet-goedgekeurde/aanvraagstatus Als boekingen geen goedkeuring vereisen (de goedkeuringsfunctie voor boekingen is uitgeschakeld), worden alle boekingen geëxporteerd.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Externe URL');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Room UID');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Kamernaam/nummer');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Selecteer de kamer waarop deze feed van invloed is en de url van de externe site. Bij het importeren van een iCal-bestand moet de einddatum van het evenement de vertrekdatum van de gast zijn. Het overzicht moet de naam van de gast zijn. Evenement beschrijving kan alle andere details bevatten." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Icale externe feed gemaakt');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Icale externe feed verwijderd');