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
jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Ինտեգրման այս մեթոդը թարմացնում է Mailchimp ցուցակը, երբ դուք համակարգին հյուր եք ավելացնում:<br/>
Ձեզ հարկավոր չէ այս վեբ-կապիկի համար URL մուտքագրումը սահմանել, մենք դա կպարզենք ձեր API-ի հիման վրա:<br/>
Այս վեբ-կապիկը կարգավորելու համար ձեզ անհրաժեշտ կլինի երկու տեղեկատվություն՝ API բանալի և ցուցակի ID: <br/>
Ձեր API բանալին գտնելու համար անցեք ձեր Mailchimp հաշիվ և :<br/>
<ol>
  <li>Սեղմեք ձեր պրոֆիլի անունը՝ ընդլայնելու Հաշվի վահանակը և ընտրեք Հաշիվ:</li>
  <li>Սեղմեք «Լրացուցիչ» բացվող ընտրացանկը և ընտրեք API ստեղները:</li>
  <li>Պատճենեք գոյություն ունեցող API բանալի կամ սեղմեք Ստեղծել բանալի կոճակը:</li>
  <li>Անվանեք ձեր բանալին նկարագրական կերպով, որպեսզի իմանաք, թե որ հավելվածն է օգտագործում այդ բանալին:</li>
</ol>
Հաջորդը ձեզ անհրաժեշտ կլինի List Id-ը, որը կարող եք գտնել՝ այցելելով ձեր ցուցակները Mailchimp-ում: Կտտացրեք Ցուցակների ցանկի հղմանը և աջ կողմում գտնվող տողի վերջում կտտացրեք բացվող պատուհանին, այնուհետև ընտրեք Կարգավորումներ: Ոլորեք այդ էջի ներքևի հատվածը, այնտեղ կասի «List id for blahblah list»: Սա այն ցուցակի ID-ն է, որը դուք պետք է օգտագործեք:
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API բանալի' );
jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Ցուցակի ID' );