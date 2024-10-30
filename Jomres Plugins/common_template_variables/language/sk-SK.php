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

jr_define ('_COMMON_STRINGS_TITLE', "Spoločné premenné šablóny");

jr_define ('_COMMON_STRINGS_INFO', "Nástroj pre vývojárov. Navrhnutý tak, aby vývojárom ukázal bežné reťazce, ktoré sú k dispozícii pre všetky šablóny, bez toho, aby ste ich museli pridávať do skriptu na volanie šablóny. <br/> Napríklad v tomto zozname je definícia COMMON_NEXT. Vývojár môže to pridať do šablóny Jomres bez toho, aby ste to museli definovať vo volajúcom skripte. Spoločný reťazec by ste do šablóny pridali rovnako ako všetky ostatné reťazce vložením &#123;COMMON_NEXT&#125; do šablóny. <br/> V nasledujúcom zozname uvidíte konštantu definovanú v súbore jazykov a vedľa nej výstup, ktorý bude zobrazovať (za predpokladu, že existujú nejaké prispôsobenia jazyka špecifické pre dané vlastníctvo). Upozorňujeme, že v prípade konštanty COMMON_LAST_VIEWED_PROPERTY_UID, uid vlastnosť sa líši a nie je v tomto zozname zobrazená. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "konštantný");
jr_define ('_COMMON_STRINGS_VALUE', "výstup");