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

jr_define( '_JOMRES_ICAL_EVENT', 'iCal-Ereignis');
jr_define( '_JOMRES_ICAL_FEED', 'iCal-Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal-Feed-URL');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal-Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Ihr/Ihre iCal-Feeds können anstehende Buchungen in einem Remote-Kalender anzeigen, einschließlich Ihres Mobilgeräts, Google-Kalender, Apple-Kalender, Thunderbird, Outlook und mehr. Verwenden Sie die folgenden URLs zum Abonnieren von Feeds in Ihre Kalendersoftware.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonymisierte iCal-Feed-URL');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Anonymen Zugriff auf iCal-Feeds erlauben?');
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Wenn diese Option aktiviert ist, ist Ihr iCal-Event-Feed für alle verfügbar, jedoch ohne Buchungs- oder Gastdetails.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal-Import');
jr_define( '_JOMRES_ICAL_SELECT', 'Datei zum Importieren auswählen');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Fehler, es wurde keine Datei hochgeladen.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Beim Import einer iCal-Datei sollte das Enddatum der Veranstaltung das Abreisedatum des Gastes sein. Die Zusammenfassung sollte der Name des Gastes sein. Die Veranstaltungsbeschreibung kann alle anderen Details enthalten." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Diese Buchungsnummer existiert bereits im System.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'An den ausgewählten Daten sind keine Zimmer verfügbar.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Es wurden keine Ereignisse in der ics-Datei gefunden.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Ereignis erfolgreich importiert');
jr_define( '_JOMRES_ICAL_FAILURE', 'Ereignis konnte nicht importiert werden');

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Gastname' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Ereignisbeschreibung' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Start');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Ende');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Ergebnis');
jr_define( '_JOMRES_ICAL_WITHHELD', 'Einbehalten');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Ihre iCal-Feeds können anstehende Buchungen in einem Remote-Kalender anzeigen, einschließlich Ihres Mobilgeräts, Google-Kalender, Apple-Kalender, Thunderbird, Outlook und mehr.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Mit dieser Funktion können Sie Buchungen von Websites wie Airbnb, Homeway und anderen mit Jomres synchronisieren. Sie müssen die iCal-Feed-URL Ihrer Unterkunft für jede Website eingeben, mit der Sie synchronisieren möchten Wenn Sie beispielsweise Ihre Unterkunft auf Airbnb buchen, werden diese Daten auch auf dieser Jomres-Website als blockiert (schwarze Buchungen) angezeigt, sodass niemand diese Daten auch hier buchen kann. Dadurch werden keine Buchungsdetails zwischen Websites synchronisiert (wie Gästedetails, Preise, Rechnungen usw.), aber es ist eine schöne und einfache Möglichkeit, Doppelbuchungen zu vermeiden, indem nur die Verfügbarkeit synchronisiert wird.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync-Einstellungen');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed-Einstellungen');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Externe iCal-URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Auch Buchungsanfragen einbeziehen?');
jr_define ( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Wenn aktiviert, wird es auch gehören Buchungen, die noch nicht zugelassen sind (wenn die Buchungen Genehmigung Funktion aktiviert ist). Halten Sie diese Option deaktiviert ist eine gute Möglichkeit, sich zu verstecken Buchungen aus dem Kalender, die vielleicht Bestätigung aussteht in ein nicht genehmigter/Anfragestatus. Wenn Buchungen keine Genehmigung erfordern (die Buchungsgenehmigungsfunktion ist deaktiviert), werden alle Buchungen exportiert.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Remote-URL');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Raum-UID');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Raumname/-nummer' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Wählen Sie den Raum aus, auf den sich dieser Feed auswirkt, und die URL der Gegenstelle. Beim Importieren einer iCal-Datei sollte das Enddatum der Veranstaltung das Abreisedatum des Gastes sein. Die Zusammenfassung sollte der Name des Gastes sein. Veranstaltung Beschreibung kann alle anderen Details enthalten." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical Remote Feed erstellt');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical Remote Feed gelöscht');