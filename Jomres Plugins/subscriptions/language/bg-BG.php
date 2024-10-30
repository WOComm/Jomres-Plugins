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

jr_define('_SUBSCRIPTIONS_ACTIVE',"Активно");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Не е активно");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Състояние на плащане");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Ниво");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Редактиране на абонамента");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Изпращане на имейл с напомняне за изтичане на абонамента?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Изпращане на имейл с напомняне");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"дни преди да изтече абонамента");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Изпращане на имейл, когато абонаментът изтече?");
jr_define('_SUBSCRIPTIONS_MY',"Моите абонаменти");
jr_define('_SUBSCRIPTIONS_HRENEW',"Подновяване");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Подновяване на абонамента");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Вече сте се абонирали, моля, закупете подновяване.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Редактиране на абонаментен пакет");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Въведете първите няколко букви от потребителското име и ще видите падащо меню с потребителски имена. Щракнете върху потребителско име, за да го изберете.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Този абонаментен пакет вече не е наличен, така че не може да бъде подновен, моля, помислете за надграждането му.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Не сте абонирани за този пакет, така че не можете да го подновите.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Няма опции за подновяване за този пакет");
jr_define('_SUBSCRIPTIONS_CANCEL',"Отказ на абонамента");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Честота (дни)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Продължителност на абонамента в дни");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Подновяванията не са разрешени за този пакет.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Цена за подновяване");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Задайте това на 0, за да деактивирате подновяванията за този пакет или въведете цена за подновяването");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Опции за пакет");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Подробности за пакета");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Вашият абонаментен пакет");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Вашият абонаментен пакет не включва достъп до тази функция. За да използвате тази функция, ще трябва да надстроите абонамента си.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Абонаментът ви е изтекъл и всичките ви обяви са прекратени. Вашите обяви вече не се виждат от гостите и няма да можете да получавате повече онлайн резервации от нашия уебсайт. За да продължите да използвате нашите услуги, публикувайте вашите обяви и започнете да получавате онлайн резервации, моля, влезте в акаунта си и закупете подновяване." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Вашият абонамент на");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"изтекла");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Това е известие, за да ви уведомим, че вашият абонамент скоро ще изтече. За да продължите да използвате нашите услуги, моля, влезте в акаунта си и закупете подновяване." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Абонаментни пакети");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Име");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Описание");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Публикувано");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Честота");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Цена");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Бизнес ограничение");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Максимален брой фирми, които могат да бъдат добавени с този абонаментен пакет");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Абониране");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Използвайте функционалност за работа с абонамент" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Съжаляваме, но този идентификатор на пакета не е разпознат." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Изглежда, че все още не сте попълнили данните за акаунта си. За да посочите собствеността си на сайта, трябва да попълните данните за акаунта си, преди да можем да продължим." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Използвахте всички налични слотове за имоти във вашия абонаментен пакет, така че няма да можете да създавате нови обяви. Моля, надстройте пакета си, ако искате да създадете още обяви." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Приходи по година/месец");
jr_define('_SUBSCRIPTION_WARNING',"Вие сте активирали абонаменти, но изглежда, че все още не сте създали никакви абонаментни пакети. Собствениците няма да могат да регистрират имоти на вашия сайт, докато не бъде създаден поне един пакет за абонамент.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"Достъп до API");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Можете да получите достъп до тази функция, като надстроите до " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Абонаментен пакет. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Надстройка');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Абониран');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Настройки на абонаментния шлюз');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'В момента не сте абонирани за никакви абонаментни пакети. Моля, абонирайте се за пакет, за да продължите да използвате нашите услуги.');
