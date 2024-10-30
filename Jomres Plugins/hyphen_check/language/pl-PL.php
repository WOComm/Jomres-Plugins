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
jr_define('TOOL_HYPHEN_CHECK_TITLE',"Sprawdzanie łączników");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"To narzędzie jest przeznaczone do sprawdzania wszystkich opóźnień właściwości i długich pól. Niektóre mogą niepoprawnie zawierać encje HTML w polach szerokości lub długich zamiast rzeczywistych myślników. Gdzie znaleziono to narzędzie konwertuje je na myślniki.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Niektóre właściwości znalezione za pomocą encji HTML, które zostały teraz przekonwertowane na rzeczywiste myślniki. Liczba przekonwertowanych właściwości wynosi ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Wszystko jest w porządku, nie znaleziono żadnych właściwości z encjami HTML, w których powinny znajdować się łączniki.");