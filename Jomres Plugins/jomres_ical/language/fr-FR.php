<?php
/**
 * Plugin
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Vince Wooll
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 27/06/2019 - https://www.valtari
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define( '_JOMRES_ICAL_EVENT', 'Événement iCal' );
jr_define( '_JOMRES_ICAL_FEED', 'Flux iCal' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'URL du flux iCal' );
jr_define( '_JOMRES_ICAL_FEEDS', 'Flux iCal Feed de ' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Vos flux iCal peuvent afficher les réservations à venir dans un calendrier distant, y compris votre appareil mobile, Google Agenda, Apple Calendar, Thunderbird, Outlook, etc. Utilisez les URL suivantes pour vous abonner aux flux dans vos logiciels de calendrier.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonymiser l\'URL due flux iCal' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Autoriser l\'accès anonyme aux flux iCal ?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Si cette option est activée, votre flux d\'événements iCal sera disponible pour tout le monde, mais sans réservation, ni information sur les clients.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'Importation iCal' );
jr_define( '_JOMRES_ICAL_SELECT', 'Sélectionner le fichier à importer' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Erreur ! Aucun fichier trouvé pour l\'importation' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Lors de l'importation d'un fichier iCal, la date de fin de l'événement doit être la date de départ du client. Le nom de l'événement doit être le nom du client. La description de l'événement peut contenir tous les autres détails." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Ce numéro de réservation existe déjà dans le système !' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Aucune chambre n\'est disponible aux dates sélectionnées.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Aucun événement n\'a été trouvé dans le fichier iCal.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Événements importés avec succès !' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Les événements n\'ont pas été importés !' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Nom du client' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Description de l\'événement' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Début' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Fin' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Résultat' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Retenu(s)' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Votre flux iCal peut afficher les réservations à venir dans un calendrier distant, y compris votre appareil mobile, Google Agenda, Apple Calendar, Thunderbird, Outlook, etc.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Cette fonctionnalité vous permet de synchroniser les réservations venat de Airbnb, Homeway et autres, vers Jomres. Vous devrez entrer l’URL du flux iCal de votre établissement pour chaque site que vous souhaitez synchroniser. Si quelqu\'un souhaite réserver sur Airbnb, par exemple, ces dates seront également bloquées (réservations noires) dans Jomres, de sorte que personne ne peut également réserver ces dates. Cela ne synchronisera pas les détails de la réservation entre les sites (comme les informations sur les clients, les prix, les factures, etc.), mais c’est un moyen simple d’éviter les doubles réservations en synchronisant uniquement la disponibilité.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'Réglages d\'iCal Sync (synchonisation)' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Réglages d\'iCal Feed (flux iCal)' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'URL externe iCal' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Inclure également les demandes de réservation ?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Si activé, cela inclura également les réservations qui n\'ont pas encore été confirmées (si la fonctionnalité de confirmation des réservations est activée). Garder cette option désactivée est un excellent moyen de masquer les calendriers qui attendent peut-être une confirmation de demande de réservation. Si les réservations ne nécessitent pas de confirmation (la fonctionnalité de confirmation des réservations est désactivée), toutes les réservations seront exportées.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'Flux externe iCal' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'URL externe' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID de la chambre' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Nom/Numéro de la chambre' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Sélectionnez la chambre affectée par ce flux, ainsi que l'URL du site distant. Lors de l'importation d'un fichier iCal, la date de fin de l'événement doit être la date de départ du client. Le titre doit être le nom de l'invité. La description de l'événement peut contenir tous les autres détails." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Flux externe iCal créé' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Flux externe iCal supprimé' );
