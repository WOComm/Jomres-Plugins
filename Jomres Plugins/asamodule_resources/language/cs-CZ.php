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

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Ukazuje vlastnosti místností/zdrojů v widgetu/modulu ASAModule. Užitečné pro webové stránky s jednou nemovitostí.");

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Povinné. Vlastnost uid, pro kterou chcete ukázat zdroje.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Povinné. ID zdrojů (např. místností), které chcete zobrazit. Čárkami oddělený seznam ID.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Volitelné. Nastavte datum příjezdu ve formátu, který odpovídá konfiguraci webu> karta Kalendář> nastavení formátu kalendáře. Např. 1. 2. 2018. To vám umožní zobrazit konkrétní ceny pokojů v konkrétní data v budoucnost, za předpokladu, že máte nastavené tarify pokrývající tato data. ");
