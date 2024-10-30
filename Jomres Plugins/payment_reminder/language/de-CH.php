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
jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Zahlungserinnerungen");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Zahlungserinnerungs-E-Mail senden..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..Tage nach der vorläufigen Buchung");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Dieses Plugin wird automatisch im Hintergrund ausgeführt und sendet eine Zahlungserinnerungs-E-Mail an Gäste, die provisorische Buchungen vorgenommen haben, die innerhalb eines von Ihnen gewählten Intervalls nicht als bezahlt markiert wurden. Dies ist nützlich, wenn Sie bezahlte Buchungen akzeptieren mit Offline-Zahlungsmethoden (Überweisung, Scheck). Wenn eine Buchung nicht innerhalb von X Tagen ab dem Zeitpunkt der Buchung bezahlt wird, wird eine Zahlungserinnerungs-E-Mail an den Gast gesendet. Sie erhalten auch eine Kopie davon . Wenn Sie auch das Plugin Provisional Bookings Handling verwenden, stellen Sie sicher, dass das Intervall, in dem Sie die Zahlungserinnerungs-E-Mail senden möchten, mindestens 1 Tag niedriger ist als das zum Löschen oder Stornieren der unbezahlten Buchung eingestellte.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Zahlungserinnerung für Ihre Buchung beim ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Sie haben eine unbezahlte Buchung im ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Um Ihre Buchung zu sichern, ist eine Anzahlung von ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Buchungsnummer");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Bitte kontaktieren Sie uns, wenn Sie Zahlungsoptionen besprechen möchten.<br /><br />Danke.");