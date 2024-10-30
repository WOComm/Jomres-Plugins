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

jr_define('PAYPAL_API_KEY_TITLE',"Chiave API Paypal");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"Configura l'ID del Client Paypal ed il Secret sia per l'account Live che per l'Account Sandbox. Una volta configurato, sarai in grado di accettare sia la prenotazione che il pagamento della fattura tramite Paypal.");

jr_define('PAYPAL_API_CLIENTID',"ID Client");
jr_define('PAYPAL_API_SECRET',"Secret");
jr_define('PAYPAL_API_CLIENTID_SANDBOX',"ID Client Sandbox");
jr_define('PAYPAL_API_SECRET_SANDBOX',"Sandbox Secret");

jr_define('PAYPAL_API_CLIENTID_FINDING',"Come trovi il tuo Client ID ed il Secret?");

jr_define('PAYPAL_API_CLIENTID_STEP1',"Vai su https://developer.paypal.com/ e accedi.");
jr_define('PAYPAL_API_CLIENTID_STEP2',"Vai a Le Mie App e credenziali nel menu laterale.");
jr_define('PAYPAL_API_CLIENTID_STEP3',"Clicca Crea App per creare una nuova App");
jr_define('PAYPAL_API_CLIENTID_STEP4',"Fornisci un nome alla tua App, successivamente clicca su Crea App.");
jr_define('PAYPAL_API_CLIENTID_STEP5',"In questa pagina puoi vedere il tuo ID Client ed il Secret. Copia e incolla queste chiavi nei rispettivi campi sopra.");
