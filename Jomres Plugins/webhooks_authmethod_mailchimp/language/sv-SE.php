<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Denna integrationsmetod uppdaterar en Mailchimp-lista när du lägger till en gäst i systemet.<br/>
Du behöver inte ställa in URL-inmatningen för denna webhook, vi kommer att ta reda på det baserat på ditt API.<br/>
För att konfigurera denna webhook behöver du två uppgifter, en API-nyckel och list-ID. <br/>
För att hitta din API-nyckel gå till ditt Mailchimp-konto och :<br/>
<ol>
  <li>Klicka på ditt profilnamn för att expandera kontopanelen och välj Konto.</li>
  <li>Klicka på rullgardinsmenyn Extra och välj API-nycklar.</li>
  <li>Kopiera en befintlig API-nyckel eller klicka på knappen Skapa en nyckel.</li>
  <li>Ge din nyckel ett beskrivande namn så att du vet vilket program som använder den nyckeln.</li>
</ol>
Därefter behöver du list-ID, som du kan hitta genom att besöka dina listor i Mailchimp. Klicka på menylänken Listor och i slutet av raden till höger klicka på rullgardinsmenyn och välj sedan Inställningar. Scrolla till botten av den sidan, det kommer att säga något i stil med "List id for blahblah list". Detta är ID:t för listan som du behöver använda.
    ' );

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API-nyckel' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'List-ID' );