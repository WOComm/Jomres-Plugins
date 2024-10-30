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


jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Această metodă de integrare actualizează o listă Mailchimp atunci când adăugați un invitat la sistem.<br/>
Nu trebuie să setați adresa URL pentru acest webhook, ne vom da seama de asta pe baza API-ului dvs.<br/>
Pentru a configura acest webhook, veți avea nevoie de două elemente de informații, o cheie API și ID-ul listei. <br/>
Pentru a găsi cheia API, accesați contul Mailchimp și:<br/>
<ol>
  <li>Faceți clic pe numele profilului dvs. pentru a extinde Panoul de cont și alegeți Cont.</li>
  <li>Faceți clic pe meniul derulant Extra și alegeți chei API.</li>
  <li>Copiați o cheie API existentă sau faceți clic pe butonul Creați o cheie.</li>
  <li>Denumește-ți cheia în mod descriptiv, astfel încât să știi ce aplicație folosește cheia respectivă.</li>
</ol>
În continuare, veți avea nevoie de ID-ul listei, pe care îl puteți găsi vizitând Listele în Mailchimp. Faceți clic pe link-ul meniului Liste și la sfârșitul rândului din dreapta faceți clic pe meniul drop-down, apoi alegeți Setări. Derulați în partea de jos a acelei pagini, va spune ceva de genul „Id listă pentru lista blahblah”. Acesta este id-ul listei pe care trebuie să o utilizați.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Cheie API');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID listă');