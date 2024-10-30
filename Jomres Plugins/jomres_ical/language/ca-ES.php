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
jr_define('_JOMRES_ICAL_EVENT', 'Esdeveniment iCal');
jr_define('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'URL del canal iCal');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Els vostres feeds d\'iCal poden mostrar les properes reserves en un calendari remot, inclòs el vostre dispositiu mòbil, Google Calendar, Apple Calendar, Thunderbird, Outlook i més. Utilitzeu els següents URL per subscriure\'s als feeds a el vostre programari de calendari.' );
jr_define( '_JOMRES_ICAL_ANON', 'URL del canal iCal anònim');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Permetre l\'accés anònim als canals iCal?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Si aquesta opció està activada, el vostre feed d\'esdeveniments d\'iCal estarà disponible per a tothom, però sense les dades de la reserva ni dels convidats.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'Importació iCal');
jr_define( '_JOMRES_ICAL_SELECT', 'Selecciona el fitxer per importar');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Error, no s\'ha carregat cap fitxer.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Quan s'importa un fitxer iCal, la data de finalització de l'esdeveniment hauria de ser la data de sortida del convidat. El resum hauria de ser el nom del convidat. La descripció de l'esdeveniment pot contenir la resta de detalls." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Aquest número de reserva ja existeix al sistema.' );
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'No hi ha habitacions disponibles a les dates seleccionades.');
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'No s\'han trobat esdeveniments al fitxer ics.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Esdeveniment importat amb èxit');
jr_define( '_JOMRES_ICAL_FAILURE', 'L\'esdeveniment no s\'ha pogut importar');

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Nom del convidat');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Descripció de l\'esdeveniment');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Inici');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Final' );
jr_define ('_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Resultat');
jr_define ('_JOMRES_ICAL_WITHHELD', 'Retingut');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Els vostres feeds iCal poden mostrar les properes reserves en un calendari remot, inclòs el vostre dispositiu mòbil, Google Calendar, Apple Calendar, Thunderbird, Outlook i més.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Aquesta funció us permet sincronitzar les reserves de llocs com Airbnb, Homeway i altres amb Jomres. Haureu d\'introduir l\'URL del canal iCal de la vostra propietat per a cada lloc amb el qual voleu sincronitzar. Si algú ho vol reserveu la vostra propietat a Airbnb, per exemple, aquestes dates es mostraran com a bloquejades (reserves negres) en aquest lloc de Jomres, de manera que ningú també no podrà reservar aquestes dates aquí. Això no sincronitzarà els detalls de la reserva entre llocs (com ara detalls dels clients, factures, etc.), però és una manera senzilla i senzilla d’evitar reserves dobles sincronitzant només la disponibilitat. ');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'Configuració de sincronització iCal');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Configuració del canal iCal');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'URL iCal extern');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Inclou també consultes de reserva?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Si està activat, també inclourà les reserves que encara no s\'han aprovat (si la funció d\'aprovació de reserves està activada). Mantenir aquesta opció desactivada és una bona manera d\'amagar les reserves del calendari que potser estan pendents de confirmació. un estat de consulta no aprovat. Si les reserves no requereixen aprovació (la funció d\'aprovació de reserves està desactivada), s\'exportaran totes les reserves. ');

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'Feeds remots iCal');
jr_define('_JOMRES_ICAL_REMOTE_FEED_URL', 'URL remot');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID de sala');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Nom/número de la sala');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Seleccioneu la sala a la qual afectarà aquest canal i l'URL del lloc remot. Quan importeu un fitxer iCal, la data de finalització de l'esdeveniment hauria de ser la data de sortida del convidat. El resum hauria de ser el nom del convidat. Esdeveniment. la descripció pot contenir la resta de detalls. ");

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'S\'ha creat un feed remot Ical');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical feed remot eliminat');