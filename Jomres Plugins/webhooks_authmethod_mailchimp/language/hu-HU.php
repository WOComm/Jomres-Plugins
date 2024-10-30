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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Ez az integrációs módszer frissíti a Mailchimp listát, amikor vendéget ad a rendszerhez.<br/>
Ehhez a webhook-hoz nem kell beállítania az URL-címet, ezt az API-ja alapján fogjuk kitalálni.<br/>
A webhook konfigurálásához két információra lesz szüksége, egy API-kulcsra és a listaazonosítóra. <br/>
Az API-kulcs megtalálásához lépjen Mailchimp-fiókjába, és :<br/>
<ol>
  <li>Kattintson profilnevére a Fiókpanel kibontásához, majd válassza a Fiók lehetőséget.</li>
  <li>Kattintson az Extrák legördülő menüre, és válassza az API-kulcsok lehetőséget.</li>
  <li>Másoljon egy meglévő API-kulcsot, vagy kattintson a Kulcs létrehozása gombra.</li>
  <li>Nevezze el kulcsát leíró módon, hogy tudja, melyik alkalmazás használja a kulcsot.</li>
</ol>
Ezután szüksége lesz a listaazonosítóra, amelyet a Mailchimp listáiban találhat meg. Kattintson a Listák menü hivatkozására, majd a jobb oldali sor végén kattintson a legördülő menüre, majd válassza a Beállítások menüpontot. Görgessen az oldal aljára, és valami ilyesmit fog kiírni: "List id for blabla list". Ez a használandó lista azonosítója.
    ' );

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API kulcs' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Listaazonosító' );