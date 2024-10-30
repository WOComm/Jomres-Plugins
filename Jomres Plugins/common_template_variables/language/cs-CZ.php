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

jr_define ('_COMMON_STRINGS_TITLE', "Běžné proměnné šablony");

jr_define ('_COMMON_STRINGS_INFO', "Nástroj pro vývojáře. Navržen tak, aby vývojářům ukázal společné řetězce, které jsou k dispozici všem šablonám, aniž byste je museli přidávat do skriptu pro volání šablony. <br/> Například v tomto seznamu je definice COMMON_NEXT. Vývojář můžete přidat do šablony Jomres, aniž byste ji museli definovat ve volajícím skriptu. Společný řetězec byste do šablony přidali stejně jako jakýkoli jiný řetězec vložením &#123;COMMON_NEXT&#125; do šablony. <br/> V níže uvedeném seznamu uvidíte konstantu, jak je definována v jazykovém souboru, a vedle ní výstup, který bude zobrazovat (s výhradou jakýchkoli přizpůsobení jazyka specifických pro danou vlastnost). Všimněte si, že v případě konstanty \"COMMON_LAST_VIEWED_PROPERTY_UID\", vlastnost uid se liší a není v tomto seznamu uvedena. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Constant");
jr_define ('_COMMON_STRINGS_VALUE', "Výstup");