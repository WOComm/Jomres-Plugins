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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Diese Integrationsmethode aktualisiert eine Mailchimp-Liste, wenn Sie dem System einen Gast hinzufügen.<br/>
Sie müssen die URL-Eingabe für diesen Webhook nicht festlegen, das finden wir anhand Ihrer API heraus.<br/>
Um diesen Webhook zu konfigurieren, benötigen Sie zwei Informationen, einen API-Schlüssel und die Listen-ID. <br/>
Um deinen API-Schlüssel zu finden, gehe zu deinem Mailchimp-Konto und :<br/>
<ol>
  <li>Klicken Sie auf Ihren Profilnamen, um das Kontofeld zu erweitern, und wählen Sie Konto.</li>
  <li>Klicken Sie auf das Dropdown-Menü Extras und wählen Sie API-Schlüssel aus.</li>
  <li>Kopieren Sie einen vorhandenen API-Schlüssel oder klicken Sie auf die Schaltfläche "Schlüssel erstellen".</li>
  <li>Benennen Sie Ihren Schlüssel aussagekräftig, damit Sie wissen, welche Anwendung diesen Schlüssel verwendet.</li>
</ol>
Als nächstes benötigen Sie die Listen-ID, die Sie finden können, indem Sie Ihre Listen in Mailchimp aufrufen. Klicken Sie auf den Menülink Listen, klicken Sie am Ende der Zeile mit der rechten Maustaste auf das Dropdown-Menü und wählen Sie dann Einstellungen. Scrollen Sie zum Ende dieser Seite, es wird etwas wie "Listen-ID für blabla-Liste" angezeigt. Dies ist die ID der Liste, die Sie verwenden müssen.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API-Schlüssel');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Listen-ID');