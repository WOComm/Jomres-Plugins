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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Ova metoda integracije ažurira Mailchimp popis kada dodate gosta u sustav.<br/>
Ne morate postavljati unos URL-a za ovaj webhook, mi ćemo to shvatiti na temelju vašeg API-ja.<br/>
Da biste konfigurirali ovaj webhook, trebat će vam dvije stavke informacija, API ključ i ID popisa. <br/>
Da biste pronašli svoj API ključ, idite na svoj Mailchimp račun i :<br/>
<ol>
  <li>Kliknite naziv svog profila da biste proširili ploču računa i odaberite Račun.</li>
  <li>Kliknite padajući izbornik Dodaci i odaberite API ključevi.</li>
  <li>Kopirajte postojeći API ključ ili kliknite gumb Stvori ključ.</li>
  <li>Nazovite svoj ključ opisno kako biste znali koja aplikacija koristi taj ključ.</li>
</ol>
Zatim će vam trebati ID popisa, koji možete pronaći posjetom popisa u Mailchimpu. Kliknite vezu izbornika Popisi i na kraju retka s desne strane kliknite padajući izbornik, a zatim odaberite Postavke. Pomaknite se do dna te stranice, pisat će nešto poput "List id for blahblah list". Ovo je id popisa koji trebate koristiti.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API ključ');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID liste' );