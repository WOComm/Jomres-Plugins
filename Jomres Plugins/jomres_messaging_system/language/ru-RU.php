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

	jr_define('CONVERSATIONS',"Беседы");
	jr_define('CONVERSATION',"Вы разговариваете с");
	jr_define('CONVERASTIONS_GROUPS',"Группы");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_1',"Привет, добро пожаловать");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_2',"Чем я могу вам помочь?");
	jr_define('CONVERSATIONS_PLACEHOLDER',"Введите ваше сообщение...");
	jr_define('CONVERSATIONS_MEMBERS',"Участники группы");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_MANAGER',"Здесь пока нет сообщений.");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_GUEST',"Здесь пока нет сообщений. Вы можете начать новую беседу, посетив ресурс и нажав кнопку контакта для этого ресурса.");
	jr_define('CONVERSATION_NAME',"Название беседы");
	jr_define('CONVERSATION_GROUP_ID',"Идентификатор группы");
	jr_define('CONVERSATION_UNDREAD_MESSAGES',"Непрочитанные сообщения");
	jr_define('CONVERSATION_LAST_MESSAGE',"Последнее сообщение");
	jr_define('CONVERSATION_LEAVE_GROUP',"Покинуть группу");
	jr_define('LIST_CONVERSATIONS_INFO',"Здесь вы можете увидеть список бесед. Обратите внимание, что непрочитанные сообщения относятся к сообщениям, которые вы лично не читали, они могли быть прочитаны и на них ответили другие участники группы. Нажмите на название беседы чтобы открыть беседу в новом окне.");
	jr_define('CONVERSATION_MODAL_TITLE',"Предупреждение о разговоре");
	jr_define('CONVERSATION_MODAL_NUDGE',"У вас есть новые сообщения.");
	jr_define('CONVERSATION_MODAL_GO',"Просмотр бесед");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE',"Система обмена сообщениями");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID',"Идентификатор модуля входа в Joomla");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC'," Идентификатор вашего модуля входа в систему. Дополнительную информацию об этом параметре см. в разделе Информация о плагине. ");
	jr_define('MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER',"Поиск");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_REGISTERED',"Зарегистрированный пользователь");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER',"Диспетчер свойств");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR',"Администратор");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE',"Шорткод для входа в WordPress");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC',"Шорткод виджета входа в систему. Дополнительную информацию об этом параметре см. в разделе Информация о плагине. ");
	jr_define('MESSAGING_SYSTEM_REST_API_LOCATION_WARNING', "В настоящее время ваша установка Jomres находится в каталоге /wp-content/plugins/jomres/jomres/, поэтому вы пока не можете использовать систему обмена сообщениями. Пожалуйста, перейдите на страницу Administrator > Jomres > Tools > Rest API Test. для получения дополнительной информации и инструкций. Чтобы удалить это сообщение, либо переместите файлы, как рекомендуется на этой странице, либо удалите плагин обмена сообщениями.");
	jr_define('MESSAGING_SYSTEM_BSVERSION_WARNING',"Извините, система обмена сообщениями Jomres работает только на сайтах с темами/шаблонами, поддерживающими Bootstrap 5, и где для параметра \"Конфигурация сайта\" > вкладка \"Разное\" > \"Версия Bootstrap\" установлено значение \"Bootstrap 5\" или \"Без начальной загрузки в теме\".") ;