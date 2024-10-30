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

jr_define ('_JOMRES_DATAWIPE_TITLE', "Очистка данных");
jr_define ('_JOMRES_DATAWIPE_DESC', "Эта функция позволяет удалять данные, собранные при бронировании. Она предназначена для использования разработчиками, которые создали много данных о разработке на своих установках (например, тестовые заказы, подписки) и хотят стереть информацию из системы, сохранив при этом информацию о свойствах и тарифах. <br/> Плагин удалит ВСЕ журналы cron, избранное пользователя, заметки, бронирования, счета-фактуры, подписчиков, подписки, гостей, данные аудита, количество кликов и отзывы ");
jr_define ('_JOMRES_DATAWIPE_WARNING', "Эти данные можно получить только из резервной копии вашей системы, поэтому вы должны понимать, что это очень опасный сценарий. для того, чтобы вы потом снова его удалили. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Щелкните, чтобы стереть данные");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Очистка");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Успешно опорожнен.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Не удалось очистить таблицу.");