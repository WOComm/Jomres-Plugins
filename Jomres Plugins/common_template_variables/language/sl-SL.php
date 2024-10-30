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



jr_define ('_COMMON_STRINGS_TITLE', "Skupne spremenljivke predloge");

jr_define ('_COMMON_STRINGS_INFO', "Orodje za razvijalce. Oblikovano tako, da razvijalcem prikazuje skupne nize, ki so na voljo vsem predlogam, ne da bi jih bilo treba dodati v klicni skript predloge. <br/> Na tem seznamu je na primer definicija COMMON_NEXT. Razvijalec lahko to doda v predlogo Jomres, ne da bi jo bilo treba definirati v klicnem skriptu. Skupni niz bi v predlogo dodali tako kot kateri koli drug niz, tako da bi v predlogo vnesli &#123;COMMON_NEXT&#125;. <br/> Na spodnjem seznamu boste videli konstanto, kot je opredeljena v jezikovni datoteki, poleg nje pa izpis, ki ga bo prikazala (ob upoštevanju jezikovnih prilagoditev za lastnost). Upoštevajte, da v primeru konstante 'COMMON_LAST_VIEWED_PROPERTY_UID', uid lastnosti se spreminja in ni prikazan na tem seznamu. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Konstantno");
jr_define ('_COMMON_STRINGS_VALUE', "Izhod");