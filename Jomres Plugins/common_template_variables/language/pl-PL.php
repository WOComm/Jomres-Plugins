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

jr_define('_COMMON_STRINGS_TITLE',"Wspólne zmienne szablonów");

jr_define('_COMMON_STRINGS_INFO',"Narzędzie programistyczne. Zaprojektowane, aby pokazać programistom typowe ciągi znaków, które są dostępne dla wszystkich szablonów bez konieczności dodawania ich do skryptu wywołującego szablonu.<br/> Na przykład na tej liście znajduje się definicja COMMON_NEXT. Programista może dodać to do szablonu Jomres bez konieczności definiowania go w skrypcie wywołującym. Możesz dodać wspólny ciąg do szablonu, tak jak każdy inny ciąg, umieszczając w szablonie ciąg &#123;COMMON_NEXT&#125;.<br/> Na poniższej liście zobaczysz stałą zdefiniowaną w pliku językowym, a obok wynik, który pokaże (pod warunkiem, że istnieją jakiekolwiek dostosowania językowe specyficzne dla właściwości).Uwaga, w przypadku stałej 'COMMON_LAST_VIEWED_PROPERTY_UID', identyfikator właściwości jest różny i nie jest wyświetlany na tej liście.");
jr_define('_COMMON_STRINGS_CONSTANT',"Stała");
jr_define('_COMMON_STRINGS_VALUE',"Wyjście");