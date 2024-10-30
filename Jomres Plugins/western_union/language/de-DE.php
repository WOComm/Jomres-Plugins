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
jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Western Union-Einstellungen");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Hier können Sie die WU-Kontodetails definieren, die für alle Unterkünfte verwendet werden, bei denen das WU-Gateway aktiviert ist. Wenn Sie die im Frontend festgelegten WU-Kontodetails überschreiben möchten, werden die hier festgelegten Details verwendet . Wenn Sie sich dagegen entschieden haben, werden die WU-Kontodetails verwendet, die in der Frontend-Gateway-Konfiguration definiert sind.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"WU-Kontodetails für alle Unterkünfte überschreiben? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Name des Begünstigten: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Empfänger-ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Adresse des Begünstigten: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Weitere Informationen: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Name des Begünstigten: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Empfänger-ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Adresse des Begünstigten: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Weitere Informationen: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Name des Begünstigten: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Empfänger-ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Adresse des Begünstigten: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Weitere Informationen: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Zahlungsdetails für Ihre Buchung unter ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Lieber ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Vielen Dank für Ihre Buchung bei ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Um Ihre Buchung zu sichern, senden Sie bitte Ihre Anzahlung von ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," zum Western Union-Konto unten.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," an das unten stehende Western Union-Konto. Eine Kopie der Western Union-Kontoinformationen wird Ihnen auch per E-Mail zugesandt, nachdem Sie diese Buchung abgeschickt haben.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Wenn Sie Fragen haben, zögern Sie bitte nicht, uns zu kontaktieren. Rufen Sie uns unter ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," oder mailen Sie uns an ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Wenn Sie Fragen haben, zögern Sie bitte nicht, uns zu kontaktieren.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Western Union-Kontodetails drucken");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Senden");