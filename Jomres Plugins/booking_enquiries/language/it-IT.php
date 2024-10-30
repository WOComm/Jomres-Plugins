<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"Oggetto dell'email");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"Testo e-mail (puoi modificare questo testo per inserire un motivo per il rifiuto di questa prenotazione, offrire alternative, ecc.)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"Questa richiesta di prenotazione verrà rifiutata e annullata. La seguente email verrà inviata al cliente.");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"Questa richiesta di prenotazione non può essere rifiutata perché è già stata rifiutata o approvata.");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"Testo e-mail (puoi modificare questo testo per inserire le istruzioni di pagamento per questa prenotazione, ecc.)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"Questa richiesta di prenotazione sarà accettata e la disponibilità sarà aggiornata nel calendario. La seguente email verrà inviata al cliente.");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"Questa richiesta di prenotazione non può essere approvata perché è già stata rifiutata o approvata.");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"Nuova Email Di Richiesta Amministratore Del Sito");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"E-mail inviata all'amministratore del sito al momento della prenotazione se la prenotazione richiede prima l'approvazione e il gateway paypal globale è abilitato");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"Nuova Email Di Richiesta Hotel");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"E-mail inviata all'hotel al momento della prenotazione se la prenotazione richiede prima l'approvazione");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"Nuova Email Di Richiesta Ospite");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"E-mail inviata all'ospite al momento della prenotazione se la prenotazione richiede prima l'approvazione");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"Email Approvazione Richiesta Ospite");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"E-mail inviata manualmente all'ospite dal manager della struttura per confermare la disponibilità per una richiesta");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"Email Di Rifiuto Della Richiesta Dell'Ospite");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"E-mail inviata manualmente all'ospite dal manager della struttura se la proprietà non è disponibile per i dettagli della richiesta");
