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
jr_define('USEFUL_LINKS_MODULE_TITLE',"Užitečné odkazy pro ");
jr_define('USEFUL_LINKS_FORSALE',"Prodej nemovitostí v ");
jr_define('USEFUL_LINKS_HOTELS',"Hotely/noclehy se snídaní v ");
jr_define('USEFUL_LINKS_VILLAS',"Pronájem prázdninových domů v ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Informace o ");

jr_define('USEFUL_LINKS_ADMIN',"Užitečné odkazy");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"ID typu nemovitosti");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"ID typu hotelu/penzionu");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"ID typu nemovitosti rekreačních domů");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'Tento plugin je navržen tak, aby zobrazoval odkazy na konkrétní vyhledávání, pokud adresa URL obsahuje "země", "region" nebo "město", takže jej obvykle budete chtít umístit na postranní panel nebo pozici modulu/widgetu na V horní části stránky budete muset nejprve nakonfigurovat plugin na kartě Konfigurace webu > Užitečné odkazy, abyste uvedli ID typu nemovitosti pro Hotely, Nemovitosti a Byt/Chata/Vily. ' );