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

jr_define('JOMRES_COUPONS_SCAN',"Scansiona questo codice nel tuo telefono e prenota ora!");
jr_define('JOMRES_COUPONS_GETADISCOUNT',"Ottieni uno sconto di");
jr_define('JOMRES_COUPONS_PERCENT',"%");
jr_define('JOMRES_COUPONS_OFFACCOMMODATION'," di sconto sul costo del tuo alloggio");
jr_define('JOMRES_COUPONS_IFYOUBOOKBETWEEN',"se prenoti tra");
jr_define('JOMRES_COUPONS_AND'," e ");
jr_define('JOMRES_COUPONS_FORDATESBETWEEN'," per le date comprese tra ");
jr_define('JOMRES_COUPONS_ALTERNATIVELY',"In alternativa, inserisci questo codice sconto al momento della prenotazione: ");
jr_define('JOMRES_COUPONS_PRINT_COUPONS',"Stampa Buoni Sconto");

jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', "Prenotazione valida dal");
jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDTO', "Prenotazione valida al");
jr_define('_JRPORTAL_COUPONS_GUESTNAME', "Nome Ospite");
jr_define('_JRPORTAL_COUPONS_DESC_478', "I codici sconto possono essere generati e trasmessi agli ospiti come incentivo per effettuare prenotazioni.<br/>
Le date valide dal e al si riferiscono alle date in cui è possibile effettuare una prenotazione, mentre le date di prenotazione valida dal/al si riferiscono alle date che la prenotazione deve coprire affinché il coupon sia valido. Se una prenotazione non rientra in tale periodo, le tariffe normali verranno applicate ai giorni al di fuori di tale periodo.<br/>
Se desideri che la prenotazione sia disponibile per un ospite specifico, scegli il nome di quell'ospite nel menu a discesa per limitare il coupon solo a quell'ospite.");
jr_define('_JRPORTAL_COUPONS_DESC_ADMIN', "I codici sconto creati qui saranno applicabili a tutte le strutture sul sito web.");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', "Con il tuo coupon, questa prenotazione è stata scontata da ");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', " a ");