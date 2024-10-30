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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Táto metóda integrácie aktualizuje zoznam Mailchimp, keď do systému pridáte hosťa.<br/>
Pre tento webhook nemusíte nastavovať vstup URL, zistíme to na základe vášho API.<br/>
Na konfiguráciu tohto webhooku budete potrebovať dve informácie, kľúč API a ID zoznamu. <br/>
Ak chcete nájsť svoj kľúč API, prejdite do svojho účtu Mailchimp a :<br/>
<ol>
  <li>Kliknutím na názov svojho profilu rozbaľte panel účtu a vyberte možnosť Účet.</li>
  <li>Kliknite na rozbaľovaciu ponuku Extras a vyberte API kľúče.</li>
  <li>Skopírujte existujúci kľúč API alebo kliknite na tlačidlo Vytvoriť kľúč.</li>
  <li>Pomenujte svoj kľúč popisne, aby ste vedeli, ktorá aplikácia tento kľúč používa.</li>
</ol>
Ďalej budete potrebovať List Id, ktorý nájdete vo svojich zoznamoch v Mailchimpe. Kliknite na odkaz ponuky Zoznamy a na konci riadka vpravo kliknite na rozbaľovaciu ponuku a vyberte položku Nastavenia. Prejdite na koniec tejto stránky, bude tam niečo ako „Id zoznamu pre zoznam blabla“. Toto je id zoznamu, ktorý musíte použiť.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Kľúč API' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID zoznamu' );