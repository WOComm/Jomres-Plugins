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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Denne integreringsmetoden oppdaterer en Mailchimp-liste når du legger til en gjest i systemet.<br/>
Du trenger ikke angi URL-inndata for denne webhooken, vi finner ut av det basert på API-en din.<br/>
For å konfigurere denne webhooken trenger du to informasjonselementer, en API-nøkkel og liste-ID. <br/>
For å finne API-nøkkelen din, gå til Mailchimp-kontoen din og :<br/>
<ol>
  <li>Klikk på profilnavnet ditt for å utvide kontopanelet, og velg Konto.</li>
  <li>Klikk på rullegardinmenyen Ekstra og velg API-nøkler.</li>
  <li>Kopiér en eksisterende API-nøkkel eller klikk på knappen Opprett en nøkkel.</li>
  <li>Nevn nøkkelen beskrivende, slik at du vet hvilket program som bruker denne nøkkelen.</li>
</ol>
Deretter trenger du liste-IDen, som du kan finne ved å gå til listene dine i Mailchimp. Klikk på menyen Lister, og på slutten av raden til høyre klikker du på rullegardinmenyen, og velg deretter Innstillinger. Bla til bunnen av den siden, det vil si noe sånt som "Liste-ID for blahblah-liste". Dette er ID-en til listen du må bruke.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API-nøkkel' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Liste-ID' );