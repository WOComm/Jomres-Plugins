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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Управљање каналима");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Клијент може обављати активности управљања каналима. Напомена, ово даје клијенту значајну моћ у систему да мења ваше налоге и својства.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Чишћење");

jr_define ('_CMF_CANCELLED_BOOKING', "Управитељ канала отказао резервацију");

jr_define ('_CMF_CLEANING_STRING', "Чишћење"); // Не мењајте ово ако сте већ увезли својства. Некретнине са накнадама за чишћење имају Ектра са овим именом
jr_define ('_CMF_SECURITY_STRING', "Сигурносни депозит"); // Не мењајте ово ако сте већ увезли својства. Некретнине са депозитима имају Ектра са овим именом


jr_define ('_CMF_API_PRIVACY', "Приватност АПИ -ја");
jr_define ('_CMF_API_PRIVACY_ON', "Приватност укључена");
jr_define ('_CMF_API_PRIVACY_OFF', "Приватност искључена");

jr_define ('_CMF_API_PRIVACY_DESC', "Информације о својству може да види само канал који га је створио. На пример, ако сте каналу А и каналу Б дали различите парове кључева АПИ -ја, подаци о својству које је направио канал А не могу бити видљив каналу Б ... осим ако не искључите приватност АПИ -ја да бисте омогућили свим каналима да виде све информације о својству путем АПИ -ја. Поставите АПИ приватност на Искључено ако ово својство делите са другом веб локацијом која жели да наведе својство. Ако не делите ово својство ни са једном другом веб локацијом, оставите АПИ приватност на Укључено. ");
