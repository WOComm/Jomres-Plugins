<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Promemoria di pagamento");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Invia un'email di promemoria del pagamento..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..giorni dopo che è stata effettuata la prenotazione provvisoria");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Questo plug-in viene eseguito automaticamente in background e invia un'e-mail di promemoria di pagamento agli ospiti che hanno effettuato prenotazioni provvisorie che non sono contrassegnate come pagate entro un intervallo di tua scelta. Ciò è utile quando si accettano prenotazioni pagate utilizzando metodi di pagamento offline (bonifico bancario, assegno). Se una prenotazione non viene pagata entro un numero X di giorni dal momento in cui è stata effettuata, all'ospite viene inviata un'e-mail di promemoria del pagamento. Riceverai anche una copia del messaggio. Se utilizzi anche il plug-in Gestione delle prenotazioni provvisorie, assicurati che l'intervallo in cui desideri inviare l'e-mail di promemoria del pagamento sia inferiore di almeno 1 giorno a quello impostato per l'eliminazione o l'annullamento della prenotazione non pagata.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Promemoria di pagamento per la prenotazione presso ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Hai una prenotazione non pagata presso ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Al fine di garantire la prenotazione, è necessario versare un acconto di ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Numero di prenotazione");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Contattaci se desideri discutere le opzioni di pagamento.<br /><br />Grazie.");
