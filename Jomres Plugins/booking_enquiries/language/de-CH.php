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

jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"E-Mail-Betreff");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"E-Mail-Text (Sie können diesen Text bearbeiten, um einen Grund für die Ablehnung dieser Buchung anzugeben, Alternativen anzubieten usw.)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"Diese Buchungsanfrage wird abgelehnt und storniert. Die folgende E-Mail wird an den Kunden gesendet.");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"Diese Buchungsanfrage kann nicht abgelehnt werden, da sie bereits abgelehnt oder genehmigt wurde.");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"E-Mail-Text (Sie können diesen Text bearbeiten, um Zahlungsanweisungen für diese Buchung usw. auszufüllen)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"Diese Buchungsanfrage wird akzeptiert und die Verfügbarkeit wird im Kalender aktualisiert. Die folgende E-Mail wird an den Kunden gesendet.");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"Diese Buchungsanfrage kann nicht genehmigt werden, da sie bereits abgelehnt oder genehmigt wurde.");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"Neue Anfrage-E-Mail-Adresse des Site-Administrators");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"E-Mail an den Site-Administrator zur Buchungszeit gesendet, wenn die Buchung zuerst genehmigt werden muss und das globale Paypal-Gateway aktiviert ist");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"E-Mail für neue Hotelanfrage");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"E-Mail an das Hotel zur Buchungszeit gesendet, wenn die Buchung zuerst genehmigt werden muss");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"E-Mail für neue Gastanfrage");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"E-Mail an den Gast zur Buchungszeit gesendet, wenn die Buchung zuerst genehmigt werden muss");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"E-Mail zur Genehmigung der Gästeanfrage");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"E-Mail manuell vom Hausverwalter an den Gast gesendet, um die Verfügbarkeit für eine Anfrage zu bestätigen");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"E-Mail zur Ablehnung der Gästeanfrage");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"E-Mail manuell vom Hausverwalter an den Gast gesendet, wenn die Unterkunft für die Anfragedetails nicht verfügbar ist");