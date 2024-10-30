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

	jr_define('CONVERSATIONS',"Розмови");
	jr_define('CONVERSATION',"Ви розмовляєте з ");
	jr_define('CONVERASTIONS_GROUPS',"Групи");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_1',"Вітаю, ласкаво просимо до ");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_2',"Чим я можу вам допомогти?");
	jr_define('CONVERSATIONS_PLACEHOLDER',"Введіть своє повідомлення...");
	jr_define('CONVERSATIONS_MEMBERS',"Учасники групи");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_MANAGER',"Тут ще немає повідомлень.");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_GUEST',"Тут ще немає повідомлень. Ви можете почати нову розмову, відвідавши властивість і натиснувши кнопку контакту для цієї власності.");
	jr_define('CONVERSATION_NAME',"Назва розмови");
	jr_define('CONVERSATION_GROUP_ID',"Ідентифікатор групи");
	jr_define('CONVERSATION_UNDREAD_MESSAGES',"Непрочитані повідомлення");
	jr_define('CONVERSATION_LAST_MESSAGE',"Останнє повідомлення");
	jr_define('CONVERSATION_LEAVE_GROUP',"Вийти з групи");
	jr_define('LIST_CONVERSATIONS_INFO',"Тут ви можете побачити список бесід. Зауважте, що непрочитані повідомлення стосуються повідомлень, які ви особисто не читали, їх могли прочитати інші учасники групи та на них відповіли. Натисніть назву бесіди щоб відкрити розмову в новому вікні.");
	jr_define('CONVERSATION_MODAL_TITLE',"Попередження про розмову");
	jr_define('CONVERSATION_MODAL_NUDGE',"У вас є нові повідомлення.");
	jr_define('CONVERSATION_MODAL_GO',"Переглянути розмови");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE',"Система обміну повідомленнями");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID',"Ідентифікатор модуля входу в Joomla");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC'," Ідентифікатор вашого модуля входу. Див. Плагін інформації про плагін, щоб дізнатися більше про це налаштування. ");
	jr_define('MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER',"Пошук");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_REGISTERED',"Зареєстрований користувач");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER',"Менеджер власності");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR',"Адміністратор");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE',"Короткий код для входу в WordPress");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC',"Короткий код вашого віджета для входу. Щоб отримати додаткові відомості про це налаштування, див. Плагін інформації про плагін. ");
	jr_define('MESSAGING_SYSTEM_REST_API_LOCATION_WARNING',"Наразі ваша інсталяція Jomres знаходиться в каталозі /wp-content/plugins/jomres/jomres/, тому ви ще не можете використовувати систему обміну повідомленнями. Відвідайте Адміністратор > Jomres > Інструменти > Тестова сторінка Rest API для отримання додаткової інформації та інструкцій. Щоб видалити це повідомлення, або перемістіть файли, як зазначено на цій сторінці, або видаліть плагін Messaging.");
	jr_define('MESSAGING_SYSTEM_BSVERSION_WARNING',"На жаль, система обміну повідомленнями Jomres працює лише на сайтах із темами/шаблонами, які підтримують Bootstrap 5 і де на вкладці Конфігурація сайту > Різне > налаштування версії Bootstrap встановлено значення Bootstrap 5 або No Bootstrap у темі.") ;
