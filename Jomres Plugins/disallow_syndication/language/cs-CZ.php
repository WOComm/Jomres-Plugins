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

jr_define ('DISALLOW_SYNDICATION_TITLE', "Disallow Syndication");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Funkce syndikace Jomres.net je nová funkce určená ke sdílení vlastností mezi weby, i když rezervace lze provádět pouze na domovském serveru.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Účelem tohoto je umožnit webům budovat důvěru ve vyhledávače. Je to bezplatná funkce, dostupná všem uživatelům Jomres. Držitelé aktivních licencí Jomres mohou, pokud se chtějí rozhodnout odebrat své web ze syndikační sítě prostřednictvím této stránky. Localhost nelze přidat do sítě, a pokud z nějakého důvodu nastane problém s připojením, nebudete moci přidat svůj web do sítě. Zkontrolujte stránku testu připojení REST API, pokud jsou na pochybách. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Kliknutím na tento odkaz odeberete svůj web ze sítě.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Kliknutím na tento odkaz přidáte svůj web do sítě.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Odebrat tento web ze sítě");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Přidat tento web do sítě");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Litujeme, váš klíč podpory není platný nebo není aktivní, nemůžete změnit stav syndikace této instalace.");