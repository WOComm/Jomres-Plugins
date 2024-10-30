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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Ta integracijska metoda posodobi seznam Mailchimp, ko v sistem dodate gosta.<br/>
Ni vam treba nastaviti vnosa URL-ja za ta webhook, to bomo ugotovili na podlagi vašega API-ja.<br/>
Če želite konfigurirati ta spletni kavelj, boste potrebovali dva elementa informacij, ključ API in ID seznama. <br/>
Če želite poiskati svoj ključ API, pojdite v svoj račun Mailchimp in :<br/>
<ol>
  <li>Kliknite ime svojega profila, da razširite ploščo računa, in izberite Račun.</li>
  <li>Kliknite spustni meni Dodatki in izberite Ključi API.</li>
  <li>Kopirajte obstoječi ključ API ali kliknite gumb Ustvari ključ.</li>
  <li>Poimenujte svoj ključ opisno, da boste vedeli, katera aplikacija uporablja ta ključ.</li>
</ol>
Nato boste potrebovali ID seznama, ki ga najdete tako, da obiščete sezname v Mailchimpu. Kliknite povezavo menija Seznami in na koncu vrstice na desni kliknite spustni meni, nato izberite Nastavitve. Pomaknite se na dno te strani, pisalo bo nekaj takega kot "ID seznama za blabla seznam". To je ID seznama, ki ga morate uporabiti.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Ključ API');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID seznama');