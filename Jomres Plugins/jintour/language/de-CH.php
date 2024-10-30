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
jr_define('_JINTOUR_TITLE',"Tour-/Aktivitätsverwaltung");

jr_define('_JINTOUR_PROFILES_TITLE',"Tour-/Aktivitätsprofile");
jr_define('_JINTOUR_PROFILES_NEW',"Neues Tour-/Aktivitätsprofil");
jr_define('_JINTOUR_PROFILES_DELETE',"Tour-/Aktivitätsprofil löschen");

jr_define('_JINTOUR_PROFILE_TITLE',"Profiltitel");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Beschreibung");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Geben Sie eine Beschreibung Ihrer Tour/Aktivität ein, einschließlich der Reiseroute.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Wochentage");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Preis für Erwachsene");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Kinderpreis");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Um eine Option vom Erscheinen im Buchungsformular auszuschließen, lassen Sie den Preis auf 0 (null)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Erwachsene Räume");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Kinderräume");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Die Anzahl der verfügbaren Plätze auf der Tour/Aktivität");
jr_define('_JINTOUR_PROFILE_START_DATE',"Saisonstart");
jr_define('_JINTOUR_PROFILE_END_DATE',"Saison endet");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Sobald Sie ein Tour-/Aktivitätsprofil erstellt haben, müssen Sie Touren/Aktivitäten basierend auf den Einstellungen dieses Profils erstellen. Erstellen Sie die Tour/Aktivität und klicken Sie dann auf das grüne Pfeilsymbol neben diesem Profil, um die Touren/Aktivitäten selbst. Sobald die Touren/Aktivitäten erstellt wurden, können Sie auf Wunsch einzelne Touren/Aktivitäten löschen.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Touren/Aktivitäten erstellen");

jr_define('_JINTOUR_TOUR_TITLE',"Aktivitätstitel");
jr_define('_JINTOUR_TOUR_DATE',"Datum");
jr_define('_JINTOUR_TOUR_ADULTS',"Erwachsene");
jr_define('_JINTOUR_TOUR_KIDS',"Kinder");
jr_define('_JINTOUR_TOUR_ITINERY',"Reiseroute");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Neue Touren erstellt");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Tourbuchung storniert");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Neue Touren generiert");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Derzeit verfügbare Plätze");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Neue Buchung für Tour-/Ressourcen-ID ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Eine neue Buchung für eine Administrator-Tour/Ressource wurde vorgenommen. Bitte lesen Sie den folgenden Link, um die Administrator-Bereichsseite dieser Tour anzuzeigen ");

jr_define('_JINTOUR_TITLE_CONFIG',"Konfiguration der integrierten Jomres-Touren");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Ist die gesamte Installation eine Jintour-Installation?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Wenn Sie dies auf Ja setzen, sind alle Unterkünfte Toureigenschaften. Wenn Sie es auf Nein setzen, können Sie beim Erstellen neuer Unterkünfte sowohl Eigenschaften vom Typ Tour als auch vom Typ Hotel/Apartment haben. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Touren");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Wählen Sie die Tour-Option, wenn Sie Buchungen für Artikel anbieten, die an bestimmten Daten verfügbar sind (zB Touren, Tickets für ein Konzert.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Zeige das Eingabefeld für die Abfahrt?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Setzen Sie dies auf Ja, wenn Sie sowohl ein Ankunfts- als auch ein Abreisedatum anzeigen möchten. Dies wäre nützlich, wenn Sie Busreisen, Flugtickets usw. anbieten, bei denen Sie sowohl das Ankunfts- als auch das Abreisedatum kennen müssen. Die Anzeige des Abreisedatums ermöglicht es Ihnen, Ressourcen über mehrere Daten hinweg anzubieten, während bei der Einstellung Nein nur Buchungen für ein Datum akzeptiert werden können.");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Tourenliste");