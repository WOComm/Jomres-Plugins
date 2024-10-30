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

jr_define ('_JOMRES_DATAWIPE_TITLE', "Стирання даних");
jr_define ('_JOMRES_DATAWIPE_DESC', "Ця функція дозволяє видаляти дані, зібрані під час бронювання. Вона призначена для використання розробниками, які створили багато даних про розробку своїх установок (наприклад, тестові замовлення, підписки) і хочуть видалити інформацію з системи, зберігаючи інформацію про властивості та тарифи. <br/> Плагін видалить ВСІ журнали cron, улюблені користувачі, нотатки, бронювання, рахунки -фактури, передплатників, підписок, гостей, дані аудиту, кількість кліків та відгуки. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Ці дані можна отримати лише з резервної копії вашої системи, тому ви повинні розуміти, що це дуже шкідливий сценарій. У результаті рекомендується, щойно ви його використаєте за призначенням щоб потім видалити його знову. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Натисніть, щоб стерти дані");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Очищення");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Успішно видалено.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Не вдалося очистити таблицю.");