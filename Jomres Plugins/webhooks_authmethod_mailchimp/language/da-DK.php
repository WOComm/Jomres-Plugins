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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Denne integrationsmetode opdaterer en Mailchimp-liste, når du tilføjer en gæst til systemet.<br/>
Du behøver ikke indstille URL-inputtet for denne webhook, det finder vi ud af baseret på din API.<br/>
For at konfigurere denne webhook skal du bruge to oplysninger, en API-nøgle og liste-id\'et. <br/>
For at finde din API-nøgle gå til din Mailchimp-konto og :<br/>
<ol>
  <li>Klik på dit profilnavn for at udvide kontopanelet, og vælg Konto.</li>
  <li>Klik på rullemenuen Ekstra, og vælg API-nøgler.</li>
  <li>Kopiér en eksisterende API-nøgle, eller klik på knappen Opret en nøgle.</li>
  <li>Navngiv din nøgle beskrivende, så du ved, hvilken applikation der bruger denne nøgle.</li>
</ol>
Dernæst skal du bruge liste-id\'et, som du kan finde ved at besøge dine lister i Mailchimp. Klik på menulinket Lister, og i slutningen af ​​rækken til højre klik på rullemenuen, og vælg derefter Indstillinger. Rul til bunden af ​​den side, det vil sige noget i stil med "List id for blahblah list". Dette er id\'et på listen, som du skal bruge.
');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API-nøgle');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Liste-ID' );