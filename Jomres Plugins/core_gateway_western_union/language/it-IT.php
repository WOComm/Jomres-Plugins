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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Impostazioni Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Qui puoi definire i dettagli dell'account WU che verranno utilizzati per tutte le proprietà che hanno il gateway WU abilitato. Se scegli di sovrascrivere i dettagli dell'account WU impostati nel frontend, verranno utilizzati i dettagli impostati qui Se si sceglie di non farlo, verranno utilizzati i dettagli dell'account WU definiti nella configurazione del gateway frontend.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Ignorare i dettagli dell'account WU impostati per tutte le proprietà? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Filiale Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Nome beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"ID beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Indirizzo beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Altre informazioni: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Filiale Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Nome beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"ID beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Indirizzo beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Altre informazioni: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Filiale Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Nome beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"ID beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Indirizzo beneficiario: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Altre informazioni: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Dettagli di pagamento per la tua prenotazione a ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Caro");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Grazie per la tua prenotazione su ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Per garantire la tua prenotazione, invia il tuo acconto di ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," all'account Western Union sottostante.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," all'account Western Union di seguito. Una copia delle informazioni sull'account Western Union ti verrà inviata anche via e-mail dopo aver inviato questa prenotazione.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Se hai domande, non esitare a contattarci. Puoi chiamarci su ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," o inviaci un'e-mail a ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Se hai domande, non esitare a contattarci.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Stampa dettagli account Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Invia");

	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"L'ospite pagherà tramite Western Union");
