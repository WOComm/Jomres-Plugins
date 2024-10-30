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

jr_define('_SUBSCRIPTIONS_ACTIVE',"Attivo");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Non attivo");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Status del pagamento");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Livello");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Modifica abbonamento");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Inviare un'e-mail di promemoria della scadenza dell'abbonamento?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Invia e-mail di promemoria");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"giorni prima della scadenza dell'abbonamento");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Inviare un'email quando l'abbonamento è scaduto?");
jr_define('_SUBSCRIPTIONS_MY',"I miei abbonamenti");
jr_define('_SUBSCRIPTIONS_HRENEW',"Rinnova");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Rinnovo dell'abbonamento");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Sei già iscritto, acquista invece un rinnovo.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Modifica pacchetto di abbonamento");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Digita le prime lettere del nome utente e vedrai un menu a discesa con i nomi utente che corrispondono alla tua ricerca. Clicca su un nome utente per selezionarlo.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Questo pacchetto di abbonamento non è più disponibile, quindi non può essere rinnovato, considera l'aggiornamento.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Non sei iscritto a questo abbonamento, quindi non puoi rinnovarlo.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Non ci sono opzioni di rinnovo per questo pacchetto");
jr_define('_SUBSCRIPTIONS_CANCEL',"Annullare l'iscrizione");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frequenza (giorni)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Durata dell'abbonamento in giorni");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Rinnovi non consentiti per questo pacchetto.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Prezzo di rinnovo");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Impostalo su 0 per disabilitare i rinnovi per questo pacchetto oppure inserisci un prezzo per il rinnovo");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Opzioni del pacchetto");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Dettagli del pacchetto");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Il tuo pacchetto di abbonamento");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Il tuo pacchetto di abbonamento non include l'accesso a questa funzione. Per utilizzare questa funzione, dovrai aggiornare il tuo abbonamento.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Il tuo abbonamento è scaduto e tutte le tue pubblicazioni sono state annullate. Le tue pubblicazioni non sono più visibili agli ospiti e non potrai più ricevere prenotazioni online dal nostro sito web. Per continuare a utilizzare i nostri servizi, pubblicare i tuoi annunci e iniziare a ricevere prenotazioni online, accedi al tuo account e acquista un rinnovo." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1', "Il tuo abbonamento su " );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2', "è scaduto" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1', "Questa è una notifica per informarti che il tuo abbonamento scadrà a breve. Per continuare a utilizzare i nostri servizi, accedi al tuo account e acquista un rinnovo." );

jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', "Pacchetti di abbonamento" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME', "Nome" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "Descrizione" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', "Pubblicato" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY', "Frequenza" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', "Prezzo" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT', "Limite al numero di strutture" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC', "Numero massimo di strutture che possono essere aggiunte con questo pacchetto di abbonamento" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', "Abbonati" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Utilizzare la funzionalità di gestione degli abbonamenti" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', "Spiacenti, ma l'ID del pacchetto non è stato riconosciuto." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', "Sembra che tu non abbia ancora inserito i dettagli del tuo account. Per inserire la tua struttura sul sito, abbiamo bisogno che tu completi i dettagli del tuo account prima di poter andare oltre." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED', "Hai utilizzato tutti gli slot di strutture disponibili nel tuo pacchetto di abbonamento, quindi non sarai in grado di creare nuovi elenchi. Aggiorna il tuo pacchetto se desideri creare più elenchi." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Entrate per anno/mese");
jr_define('_SUBSCRIPTION_WARNING',"Hai abilitato gli abbonamenti ma sembra che tu non abbia ancora creato alcun pacchetto di abbonamento. I proprietari non saranno in grado di registrare strutture sul tuo sito fino a quando non verrà creato almeno un pacchetto di abbonamento.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "Accesso API" );


	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Puoi accedere a questa funzione aggiornando a " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Pacchetto Abbonamento. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Aggiorna');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Iscritto');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Impostazioni del gateway di sottoscrizione');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Attualmente non sei abbonato a nessun pacchetto di abbonamento. Abbonati a un pacchetto per continuare a utilizzare i nostri servizi.');
