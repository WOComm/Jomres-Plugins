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

jr_define ('_COMMON_STRINGS_TITLE', "Közös sablonváltozók");

jr_define ('_COMMON_STRINGS_INFO', "Fejlesztői eszköz. Úgy tervezték, hogy megmutassa a fejlesztőknek azokat a közös karakterláncokat, amelyek minden sablon számára elérhetők anélkül, hogy hozzá kellene adni őket a sablon hívó szkriptjéhez. <br/> Például ebben a listában megtalálható a COMMON_NEXT definíció. hozzáadhatja ezt a Jomres sablonhoz anélkül, hogy definiálnia kellene a hívó szkriptben. A közös karakterláncot ugyanúgy hozzá kell adnia a sablonhoz, mint bármely más karakterláncot, ha a &#123;COMMON_NEXT&#125; elemet a sablonba helyezi. <br/> Az alábbi listában látni fogja a nyelvfájlban meghatározott konstansot, és mellette azt a kimenetet, amelyet megjeleníteni fog (feltéve, hogy vannak tulajdonság -specifikus nyelvi testreszabások). Megjegyzés: a \"COMMON_LAST_VIEWED_PROPERTY_UID\" állandó esetén, a tulajdonság uid változó, és nem jelenik meg ebben a listában. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Állandó");
jr_define ('_COMMON_STRINGS_VALUE', "Kimenet");
