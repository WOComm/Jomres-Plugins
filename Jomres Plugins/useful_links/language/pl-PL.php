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
jr_define('USEFUL_LINKS_MODULE_TITLE',"Przydatne linki do ");
jr_define('USEFUL_LINKS_FORSALE',"Właściwości na sprzedaż w ");
jr_define('USEFUL_LINKS_HOTELS',"Hotele/B&B w ");
jr_define('USEFUL_LINKS_VILLAS',"Domy wakacyjne do wynajęcia w");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Informacje o ");

jr_define('USEFUL_LINKS_ADMIN',"Przydatne linki");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"Identyfikator typu nieruchomości");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"Identyfikator typu hotelu/pensjonatu");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"Identyfikator typu nieruchomości domów wakacyjnych");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'Ta wtyczka ma na celu pokazywanie linków do określonych wyszukiwań, jeśli adres URL zawiera "kraj", "region" lub "miasto", więc zazwyczaj chcesz umieścić go na pasku bocznym lub w pozycji modułu/widżetu u góry strony. Musisz najpierw skonfigurować wtyczkę w zakładce Konfiguracja witryny > Przydatne linki, aby wskazać identyfikatory typu nieruchomości dla hoteli, nieruchomości i mieszkania/domku/willi.' );