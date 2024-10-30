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

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Показує кімнати властивостей/ресурси у віджеті/модулі ASAModule. Корисно для веб -сайтів з однією власністю.");

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Потрібно. Ідентифікатор властивості, для якого потрібно показати ресурси.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Потрібно. Ідентифікатори ресурсів (наприклад, кімнат), які потрібно показати. Список ідентифікаторів, розділених комами.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Необов’язково. Встановіть дату прибуття у форматі, що відповідає Конфігурації сайту> вкладка Календар> Налаштування формату введення календаря. Наприклад, 01.02.2018. Це дозволяє відображати конкретні ціни на конкретні дати в майбутнє, припускаючи, що у вас встановлені тарифи, що охоплюють ці дати. ");