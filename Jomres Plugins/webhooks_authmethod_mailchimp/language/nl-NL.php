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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################


jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Deze integratiemethode werkt een Mailchimp-lijst bij wanneer u een gast aan het systeem toevoegt.<br/>
U hoeft de URL-invoer voor deze webhook niet in te stellen, we zullen dat uitzoeken op basis van uw API.<br/>
Om deze webhook te configureren heeft u twee informatie-items nodig, een API-sleutel en de lijst-ID. <br/>
Om uw API-sleutel te vinden, gaat u naar uw Mailchimp-account en:<br/>
<ol>
  <li>Klik op uw profielnaam om het accountpaneel uit te vouwen en kies Account.</li>
  <li>Klik op het vervolgkeuzemenu Extra\'s en kies API-sleutels.</li>
  <li>Kopieer een bestaande API-sleutel of klik op de knop Een sleutel maken.</li>
  <li>Geef uw sleutel een beschrijvende naam, zodat u weet welke toepassing die sleutel gebruikt.</li>
</ol>
Vervolgens heb je de List Id nodig, die je kunt vinden door naar je Lists in Mailchimp te gaan. Klik op de menulink Lijsten en klik aan het einde van de rij aan de rechterkant op de vervolgkeuzelijst en kies vervolgens Instellingen. Scroll naar de onderkant van die pagina, het zal iets zeggen als "Lijst-ID voor blahblah-lijst". Dit is de id van de lijst die u moet gebruiken.
');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API-sleutel');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Lijst-ID');