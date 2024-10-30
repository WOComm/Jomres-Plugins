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


jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Questo metodo di integrazione aggiorna un elenco Mailchimp quando aggiungi un ospite al sistema.<br/>
Non è necessario impostare l\'input dell\'URL per questo webhook, lo scopriremo in base alla tua API.<br/>
Per configurare questo webhook avrai bisogno di due informazioni, una chiave API e l\'ID elenco. <br/>
Per trovare la tua chiave API vai al tuo account Mailchimp e :<br/>
<ol>
  <li>Fai clic sul nome del tuo profilo per espandere il pannello Account e scegli Account.</li>
  <li>Fai clic sul menu a discesa Extra e scegli Chiavi API.</li>
  <li>Copia una chiave API esistente o fai clic sul pulsante Crea una chiave.</li>
  <li>Assegna un nome descrittivo alla tua chiave, in modo da sapere quale applicazione utilizza quella chiave.</li>
</ol>
Successivamente avrai bisogno dell\'ID elenco, che puoi trovare visitando le tue liste in Mailchimp. Fare clic sul collegamento del menu Elenchi e alla fine della riga a destra fare clic sul menu a discesa, quindi selezionare Impostazioni. Scorri fino alla fine di quella pagina, dirà qualcosa come "List id for blahblah list". Questo è l\'id dell\'elenco che devi usare.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Chiave API' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID elenco' );