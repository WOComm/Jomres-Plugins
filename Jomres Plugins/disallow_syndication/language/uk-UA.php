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

jr_define ('DISALLOW_SYNDICATION_TITLE', "Заборонити синхронізацію");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Функція синдикації Jomres.net - це нова функція, призначена для обміну властивостями між сайтами, хоча бронювання можна здійснювати лише на домашньому сервері.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Мета цього полягає у тому, щоб дозволити сайтам завоювати довіру з пошуковими системами. Це безкоштовна функція, доступна для всіх користувачів Jomres. Активні власники ліцензій Jomres можуть, якщо вони хочуть, вилучити свої веб -сайт із мережі розповсюдження через цю сторінку. Localhost неможливо додати до мережі, і якщо з якихось причин виникають проблеми з підключенням, ви не зможете додати свій сайт до мережі. Перевірте сторінку тестування підключення REST API, якщо ви є будь -які сумніви. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Натисніть це посилання, щоб видалити свій сайт із мережі.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Натисніть це посилання, щоб додати свій сайт до мережі.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Видалити цей сайт із мережі");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Додати цей сайт до мережі");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Вибачте, ваш ключ підтримки недійсний або неактивний, ви не можете змінити статус розповсюдження цієї інсталяції.");