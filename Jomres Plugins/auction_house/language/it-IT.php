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

jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"Casa d'aste");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"Acquisto");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"Vendita");

jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"Casa aste");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"Articoli su cui ho fatto offerte");

jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"Elenca aste");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"Dashboard proprietà");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"Elenca le tue aste");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"Nuova asta");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"Modifica asta");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"Annulla asta");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"Termina l'asta in anticipo");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"Scegli la proprietà a cui vuoi associare questa asta.");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"Stai includendo le stanze/la proprietà in questa asta?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"Seleziona le stanze che vuoi includere in questa asta. Prima scegli le date per la prenotazione, poi puoi selezionare le stanze. ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"Scegli le date in cui vuoi prenotare la proprietà come parte dell'asta.");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"Termini e condizioni");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"Termini e condizioni");

jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"Termini e condizioni dettagliati.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"Titolo Asta");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"Descrizione");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"Valore di questa asta");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"Inserisci il valore del pacchetto che stai offrendo. Non verrà mostrato agli acquirenti.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"Prenota");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"Riserva non soddisfatta");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"Acquista ora");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"Per quanti giorni dovrebbe durare questa asta?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"Prenotazione casa d'aste (non annullare) per asta: ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"Nota che quando fai un'offerta la tua fattura includerà l'imposta aggiuntiva di ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"Se fai clic sul pulsante Fai un'offerta o Acquista ora, stai stipulando un contratto legalmente vincolante per acquistare l'articolo o il pacchetto dal venditore. Questo sito non è responsabile per i contenuti elencati dal venditore.") ;


jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"Errore, devi includere un titolo.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"Errore, devi includere una descrizione.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"Aste attive");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"Aste concluse");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"Offerta più alta");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"Nessuna offerta");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"Tempo rimasto");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"Fai la tua offerta");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',"La tua offerta è stata fatta!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"Stai vincendo questa asta!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"La tua offerta è stata superata!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"Congratulazioni, hai vinto quest'asta!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"Spiacente, hai perso questa asta.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"Asta terminata");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"Spiacenti, non puoi fare offerte su quest'asta perché non sei loggato.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"Spiacenti, non puoi fare offerte per quest'asta perché è terminata.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"Spiacenti, non puoi fare offerte su quest'asta, non riusciamo a trovare l'ID dell'asta.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"Spiacenti, la tua offerta era troppo bassa.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"Non puoi fare offerte sulla tua asta.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"Non puoi ancora fare offerte per questa asta perché non hai inserito i tuoi dati. Clicca sul link sopra 'Modifica account' per inserire prima i dettagli del tuo account.");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"Spiacenti, non puoi annullare questa asta perché non sei loggato.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"Spiacenti, non puoi annullare questa asta perché è già stata offerta. Solo le aste che non hanno offerte possono essere annullate.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"Spiacenti, non puoi annullare questa asta perché è già terminata.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"Spiacenti, non puoi annullare questa asta in quanto non disponi dei diritti di accesso a questa asta.");

jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"d");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");

jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"Le tue watchlist");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"Numero nell'elenco");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"Lista osservati");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"Aggiungi alla watchlist");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"Aggiungi watchlist");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"Inserisci il nuovo nome della lista");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"Salva nuova lista osservati");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"Asta aggiunta alla lista");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"Non hai ancora nessuna watchlist. Puoi aggiungere un'asta alla tua watchlist per creare la tua prima lista, o usare l'opzione Aggiungi Watchlist nel menu per aggiungere manualmente una lista.");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"Errore, quella lista di controllo non esiste.");

jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"Questa proprietà sta partecipando al nostro programma di aste e offre uno o più pacchetti per l'asta, si prega di consultare l'elenco sottostante.");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"Informazioni su ");

jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"Commissione d'asta");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"Asta: ");

jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"Hai fatto un'offerta per l'asta: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"Hai fatto un'offerta per un'asta. Puoi vedere l'asta visitando il seguente link: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"La tua offerta è stata superata! Asta: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"Sei stato superato in un'asta. Puoi vedere l'asta visitando il seguente link: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"Hai vinto un'asta! Asta : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"Hai vinto un'asta. Puoi vedere l'asta visitando il seguente link: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"Assicurati di pagare il venditore tempestivamente. La tua fattura è qui: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"Asta terminata. Asta : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"Questa asta è terminata. Puoi vedere l'asta qui: ");

jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"Asta completata. Seguono i dettagli del vincitore: ");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Visualizza la pagina della casa d'aste." );

