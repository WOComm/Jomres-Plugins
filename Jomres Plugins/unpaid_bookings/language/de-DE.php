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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Bearbeitung unbezahlter Buchungen");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Vorläufige (unbezahlte) Buchungen stornieren oder löschen? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer wie viele Tage ab Buchungszeit? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Dieses Plugin wird automatisch im Hintergrund ausgeführt und löscht oder storniert alle vorläufigen Buchungen, die nicht innerhalb eines von Ihnen gewählten Intervalls als bezahlt markiert sind. Dies ist nützlich, wenn Sie Buchungen akzeptieren, die mit Offline-Zahlungsmethoden (wire Überweisung, Scheck). Wenn eine Buchung nicht innerhalb von X Tagen ab dem Zeitpunkt der Buchung bezahlt wird, wird die Buchung gelöscht oder storniert und der Kalender zeigt die gebuchten Daten als verfügbar an, damit jemand anders diese Tage buchen kann . Wenn eine Buchung gelöscht oder storniert wird, erhalten Sie und der Gast eine Benachrichtigung per E-Mail. Wenn Sie eine Buchung stornieren, werden die Buchung und die Rechnung als storniert markiert und nicht aus der Datenbank gelöscht , damit Sie später darauf zugreifen können. Wenn Sie es löschen, werden die Buchung und die Rechnung aus der Datenbank gelöscht.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Buchung storniert");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Ihre Buchung wurde aufgrund der Nichtzahlung der erforderlichen Anzahlung automatisch storniert. Dies ist keine gültige Buchung mehr. Wenn Sie erneut buchen möchten, besuchen Sie bitte unsere Website und wiederholen Sie die Buchung. Im Folgenden sind die Details der stornierten Buchung.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Wenn Sie der Meinung sind, dass Sie diese Benachrichtigung versehentlich erhalten haben, zögern Sie bitte nicht, uns zu kontaktieren.");