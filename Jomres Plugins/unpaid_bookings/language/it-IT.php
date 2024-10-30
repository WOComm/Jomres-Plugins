<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Gestione delle prenotazioni non pagate");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Annullare o eliminare le prenotazioni provvisorie (non pagate)? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Dopo quanti giorni dalla prenotazione? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Questo plugin viene eseguito automaticamente in background e annulla oppure cancella tutte le prenotazioni provvisorie che non sono contrassegnate come pagate entro un intervallo di tua scelta. Ciò è utile quando si accettano prenotazioni pagate utilizzando metodi di pagamento offline (bonifico bancario, assegno). Se una prenotazione non viene pagata entro X numero di giorni dal momento in cui è stata effettuata, la prenotazione viene cancellata o annullata e il calendario mostrerà le date prenotate come disponibili, in modo che qualcun altro possa prenotare quei giorni. Quando una prenotazione viene cancellata o annullata, sia tu che l'ospite riceverete una notifica via e-mail. Se scegli di annullare una prenotazione, la prenotazione e la sua fattura verranno contrassegnate come annullate e non verranno eliminate dal database, quindi potrai accedervi in seguito. Se scegli di eliminarla, la prenotazione e la sua fattura verranno eliminate dal database.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Prenotazione annullata");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"La prenotazione è stata automaticamente annullata a causa del mancato pagamento della caparra richiesta. Questa non è più una prenotazione valida. Se desideri prenotare di nuovo, visita il nostro sito web ed effettua una nuova prenotazione. Di seguito sono riportati i dettagli della prenotazione annullata.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Se ritieni di aver ricevuto questa notifica per errore, non esitare a contattarci.");
