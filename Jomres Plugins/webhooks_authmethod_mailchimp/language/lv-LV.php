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



jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Šī integrācijas metode atjaunina Mailchimp sarakstu, kad sistēmai pievienojat viesi.<br/>
Jums nav jāiestata URL ievade šim tīmekļa aizķerei, mēs to noskaidrosim, pamatojoties uz jūsu API.<br/>
Lai konfigurētu šo tīmekļa aizķeri, jums būs nepieciešami divi informācijas vienumi — API atslēga un saraksta ID. <br/>
Lai atrastu savu API atslēgu, dodieties uz savu Mailchimp kontu un:<br/>
<ol>
  <li>Noklikšķiniet uz sava profila nosaukuma, lai izvērstu kontu paneli, un izvēlieties Konts.</li>
  <li>Noklikšķiniet uz nolaižamās izvēlnes Extras un izvēlieties API atslēgas.</li>
  <li>Kopējiet esošu API atslēgu vai noklikšķiniet uz pogas Izveidot atslēgu.</li>
  <li>Piešķiriet atslēgai aprakstošu nosaukumu, lai zinātu, kura lietojumprogramma izmanto šo atslēgu.</li>
</ol>
Tālāk jums būs nepieciešams saraksta ID, ko varat atrast, apmeklējot savus sarakstus pakalpojumā Mailchimp. Noklikšķiniet uz izvēlnes saites Saraksti un labās puses rindas beigās noklikšķiniet uz nolaižamās izvēlnes, pēc tam izvēlieties Iestatījumi. Ritiniet līdz šīs lapas apakšdaļai, tur būs kaut kas līdzīgs “List id for blahblah list”. Šis ir izmantojamā saraksta ID.
    ');

jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API atslēga');
jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Saraksta ID');