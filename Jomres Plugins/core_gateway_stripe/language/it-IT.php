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

jr_define('STRIPE_TITLE',"Stripe");
jr_define('STRIPE_CONNECT_CONFIG_INFO',"Questo gateway Stripe è progettato specificamente per consentire a te come gestore del sito di ricevere una parte dei pagamenti effettuati ai gestori di proprietà al momento della prenotazione. Prima che possa essere utilizzato, devi prima configurare la tua integrazione con Stripe Connettiti. <a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class= 'btn btn-primary'>La documentazione per questo plug-in può essere trovata qui.</a><br/>Se fai clic su Salva in questa pagina, per consentire a questo plug-in di funzionare senza problemi tutti gli altri gateway verranno disabilitati</ forte> Prima di iniziare, assicurati di essere andato sulla tua pagina Stripe Connect e di aver indicato che stai configurando una piattaforma. Una volta fatto ciò, segui le istruzioni sullo schermo per configurare il tuo account. Prima che i manager possano connettere il loro account con il tuo tu deve visitare Impostazioni > Impostazioni di connessione e nell'area \"Impostazioni OAuth\" abilitare OAuth per account standard e quindi fare clic su Salva (nota, sarà necessario farlo in entrambe le modalità Test e Live). ");

jr_define('STRIPE_REGISTER_CONNECT',"Connettiti con noi!");
jr_define('STRIPE_REGISTER_CONNECT_BLURB',"Ti sei registrato, ma la connessione non è ancora completa. Devi connettere il tuo account Stripe al nostro sito web. Una volta fatto, puoi aggiungere tutte le tue proprietà al nostro sito e iniziare a prendere le prenotazioni .");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE',"Benvenuto a ");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB',"Prima di poter iniziare a configurare le tue proprietà, devi connetterci con il tuo account Stripe. Clicca sul link per iniziare.");

jr_define('STRIPE_SETUP_INFO',"Ora dobbiamo connettere il tuo account al nostro, questo ci permetterà di accettare pagamenti per tuo conto quindi clicca sul pulsante Connetti per essere portato a Stripe dove puoi confermare la connessione.");
jr_define('STRIPE_SETUP_DONE',"Sei già connesso con noi, non c'è più niente da fare qui! Chiudi questa finestra e andiamo avanti con l'attività di fare affari.");
jr_define('STRIPE_SETUP_THANKS',"Grazie per esserti connesso con noi! Puoi chiudere questa finestra adesso.");
jr_define('STRIPE_SETUP_DISCONNECT',"Disconnetti il ​​tuo account.");
jr_define('STRIPE_SETUP_DISCONNECTED',"Account disconnesso, puoi chiudere questa finestra adesso.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID',"ID cliente Stripe Connect");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC',"Puoi ottenere il tuo ID client Stripe dal tuo <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Dashboard > Impostazioni > Connetti .API le chiavi sono sotto l'opzione di menu Sviluppatori.</a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL',"Assicurati di impostare il tuo URI di reindirizzamento in <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Connetti > Impostazioni</a> a <br/> ");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY',"Chiave segreta");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY',"Chiave pubblica");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION',"La tua commissione");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC',"Questa commissione viene prelevata dal pagamento inviato al gestore della struttura al momento della prenotazione. Viene quindi inserita nel tuo account Stripe da Stripe. <br/> Questa è la percentuale di commissione che addebiterai ai gestori della struttura le loro prenotazioni. La tua commissione viene addebitata in base all'INTERO costo della prenotazione, non al valore del deposito. <br/> Qualunque sia il valore impostato, ti consigliamo di configurare Configurazione sito -> Modulo di prenotazione -> Deposito minimo come almeno il doppio di questa cifra, quindi se vuoi addebitare una commissione del 10%, allora dovresti fare un deposito minimo del 20%.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO',"Stripe Fee Europea");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC',"Questa è la percentuale che Stripe ti addebita per i pagamenti sul tuo sito. Attualmente addebita l'1,4% per le carte europee e il 2,9% per le carte non europee. Questa cifra è necessaria per determinare i prezzi al momento della prenotazione e tempo di pagamento.");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO',"Stripe Fee non euro");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD',"Numero Carta");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION',"Scadenza (MM/AA)");
jr_define('STRIPE_PAYMENT_FORM_CVC',"CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP',"Zip Fatturazione");

jr_define('STRIPE_PAYMENT_FORM_SECURE',"Modulo di pagamento sicuro");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS',"Dettagli fatturazione");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS',"Dettagli Carta");
jr_define('STRIPE_PAYMENT_FORM_HOLDER',"Nome del titolare della carta");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW',"Paga ora");
jr_define('STRIPE_PAYMENT_FORM_TOPAY',"Per pagare ora");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY','La via è obbligatoria e non può essere vuota');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH','La via deve essere lunga più di 6 e meno di 96 caratteri');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY','La città è richiesta e non può essere vuota');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY','Lo zip è obbligatorio e non può essere vuoto');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH','Lo zip deve essere lungo più di 3 e meno di 12 caratteri');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY','L\'indirizzo email è obbligatorio e non può essere vuoto');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID','L\'input non è un indirizzo email valido');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH','L\'email deve contenere più di 6 caratteri e meno di 65 caratteri');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY','Il nome del titolare della carta è obbligatorio e non può essere vuoto');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH','Il nome del titolare della carta deve contenere più di 6 caratteri e meno di 70 caratteri');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY','Il numero della carta di credito è obbligatorio e non può essere vuoto');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID','Il numero della carta di credito non è valido');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY','Il mese di scadenza è obbligatorio');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS','Il mese di scadenza può contenere solo cifre');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY','E\' richiesto l\'anno di scadenza');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS','L\'anno di scadenza può contenere solo cifre');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY','Il cvv è obbligatorio e non può essere vuoto');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID','Il valore non è un CVV valido');

jr_define('STRIPE_PAYMENT_FAILED',"Spiacenti, non siamo stati in grado di elaborare il tuo pagamento in questo momento.");
jr_define('STRIPE_PAYMENT_TRY_AGAIN',"Riprova");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED',"Il pagamento è stato rifiutato.");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT',"Troppe richieste fatte all'API troppo velocemente");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS',"Sono stati forniti parametri non validi all'API di Stripe");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED',"Autenticazione con API di Stripe fallita");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT',"La comunicazione di rete con Stripe è fallita (la tua connessione Internet si è interrotta?)");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT',"Si è verificato un errore non rilevato");