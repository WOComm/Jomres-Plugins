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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Tato metoda integrace aktualizuje seznam Mailchimp, když do systému přidáte hosta.<br/>
Pro tento webhook nemusíte nastavovat vstup URL, zjistíme to na základě vašeho API.<br/>
Ke konfiguraci tohoto webhooku budete potřebovat dvě položky informací, klíč API a ID seznamu. <br/>
Chcete-li najít svůj klíč API, přejděte do svého účtu Mailchimp a :<br/>
<ol>
  <li>Kliknutím na jméno svého profilu rozbalte panel účtu a vyberte Účet.</li>
  <li>Klikněte na rozbalovací nabídku Extras a vyberte API klíče.</li>
  <li>Zkopírujte existující klíč API nebo klikněte na tlačítko Vytvořit klíč.</li>
  <li>Pojmenujte svůj klíč popisně, abyste věděli, která aplikace tento klíč používá.</li>
</ol>
Dále budete potřebovat List Id, který najdete ve svých seznamech v Mailchimpu. Klikněte na odkaz nabídky Seznamy a na konci řádku vpravo klikněte na rozevírací seznam a vyberte Nastavení. Přejděte na konec této stránky, bude to říkat něco jako „Id seznamu pro seznam blabla“. Toto je id seznamu, který musíte použít.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Klíč API');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID seznamu');