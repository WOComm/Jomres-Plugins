<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Керування каналами");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Клієнт може виконувати дії з управління каналами. Зауважте, це дає клієнту значні можливості в системі змінювати ваші облікові записи та властивості.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Очищення");

jr_define ('_CMF_CANCELLED_BOOKING', "Менеджер каналу скасував бронювання");

jr_define ('_CMF_CLEANING_STRING', "Очищення"); // Не змінюйте це, якщо ви вже імпортували властивості. У власності з платою за прибирання є екстра з такою назвою
jr_define ('_CMF_SECURITY_STRING', "Страховий депозит"); // Не змінюйте це, якщо ви вже імпортували властивості. У власності з гарантійними депозитами є екстра з такою назвою


jr_define ('_CMF_API_PRIVACY', "Конфіденційність API");
jr_define ('_CMF_API_PRIVACY_ON', "Конфіденційність увімкнено");
jr_define ('_CMF_API_PRIVACY_OFF', "Конфіденційність вимкнено");

jr_define ('_CMF_API_PRIVACY_DESC', "Інформацію про властивість може бачити лише канал, який її створив. Наприклад, якщо ви надали різні пари ключів API і для каналу А, і для каналу В, інформація про властивість, створена каналом А, не може відображатиметься на каналі В ... якщо ви не вимкнете конфіденційність API, щоб дозволити всім каналам бачити всю інформацію про властивість через API. Встановіть конфіденційність API на Вимкнено, якщо ви ділитеся цією властивістю з іншим сайтом, який хоче перелічити властивість. Якщо ви не ділитеся цією властивістю з іншими сайтами, залиште для конфіденційності API значення Увімкнено. ");