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

jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Налаштування властивостей за умовчанням");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Загальна назва конфігурації (за наявності, деякі можуть і не бути)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Назва змінної");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Поточне значення");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Це розширена функція, якщо у вас немає спеціального призначення для неї, краще не використовувати її. Цей плагін дозволяє змінювати значення нової властивості за замовчуванням. Зробити переконайтеся, що ви розумієте, що робить змінна, перш ніж її змінити, оскільки її зміна тут може мати далекосяжні наслідки для вашої системи Jomres. Пусті елементи, як правило, є старими налаштуваннями, які більше не використовуються, але залишаються на місці з причини зворотньої сумісності, або це параметри, які неможливо змінити через область конфігурації власності. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Нове значення");