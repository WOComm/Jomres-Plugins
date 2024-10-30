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
jr_define('_JOMRES_DATAWIPE_TITLE',"Datenlöschung");
jr_define('_JOMRES_DATAWIPE_DESC',"Mit dieser Funktion können Sie Daten löschen, die bei Buchungen gesammelt werden. Sie ist für Entwickler gedacht, die viele Entwicklungsdaten zu ihren Installationen erstellt haben (z Löschen Sie die Informationen aus dem System, während die Eigentums- und Tarifinformationen beibehalten werden.<br/> Das Plugin entfernt ALLE Cron-Protokolle, Benutzerfavoriten, Notizen, Buchungen, Rechnungen, Abonnenten, Abonnements, Gäste, Auditdaten, Klickzahlen und Bewertungen." );
jr_define('_JOMRES_DATAWIPE_WARNING',"Diese Daten können nur aus einer Sicherungskopie Ihres Systems abgerufen werden, daher müssen Sie verstehen, dass dies ein sehr schädliches Skript ist. Daher wird empfohlen, dass Sie es nach der Verwendung für den vorgesehenen Zweck verwenden Zweck, dass Sie es danach wieder deinstallieren.");
jr_define('_JOMRES_DATAWIPE_GO',"Klicken, um Daten zu löschen");
jr_define('_JOMRES_DATAWIPE_EMPTYING',"Leeren");
jr_define('_JOMRES_DATAWIPE_EMPTYING_SUCCESS',"Erfolgreich geleert.");
jr_define('_JOMRES_DATAWIPE_EMPTYING_FAILURE',"Fehler beim Leeren der Tabelle.");