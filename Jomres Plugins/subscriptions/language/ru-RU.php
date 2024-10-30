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

jr_define ('_SUBSCRIPTIONS_ACTIVE', "Активный");
jr_define ('_SUBSCRIPTIONS_EXPIRED', "Не активен");
jr_define ('_SUBSCRIPTIONS_HPAYMENT_STATUS', "Статус платежа");
jr_define ('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL', "Уровень");
jr_define ('_SUBSCRIPTIONS_EDIT_TITLE', "Изменить подписку");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE', "Отправить электронное письмо с напоминанием об истечении срока подписки?");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A', "Отправить электронное письмо с напоминанием");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B', "дни до истечения срока подписки");
jr_define ('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE', "Отправить письмо по истечении срока подписки?");
jr_define ('_SUBSCRIPTIONS_MY', "Мои подписки");
jr_define ('_SUBSCRIPTIONS_HRENEW', "Продлить");
jr_define ('_SUBSCRIPTIONS_HRENEWAL', "Продление подписки");
jr_define ('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', "Вы уже подписались, вместо этого приобретите обновление.");
jr_define ('_SUBSCRIPTIONS_HEDIT', "Редактировать пакет подписки");
jr_define ('_SUBSCRIPTIONS_USERID_DESC', "Введите несколько первых букв имени пользователя, и вы увидите раскрывающийся список с именами пользователей. Щелкните имя пользователя, чтобы выбрать его.");
jr_define ('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED', "Этот пакет подписки больше не доступен, поэтому его нельзя продлить, рассмотрите возможность его обновления.");
jr_define ('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID', "Вы не подписаны на этот пакет, поэтому вы не можете его продлить.");
jr_define ('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE', "Для этого пакета нет вариантов продления");
jr_define ('_SUBSCRIPTIONS_CANCEL', "Отменить подписку");
jr_define ('_SUBSCRIPTIONS_HFREQUENCY_DAYS', "Периодичность (дни)");
jr_define ('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC', "Срок подписки в днях");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED', "Продление не разрешено для этого пакета.");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_PRICE', "Цена продления");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL', "Установите значение 0, чтобы отключить продление для этого пакета или введите цену за продление");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_FEATURES', "Параметры пакета");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_DETAILS', "Сведения о пакете");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_YOUR', "Ваш пакет подписки");
jr_define ('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED', "Ваш пакет подписки не включает доступ к этой функции. Чтобы использовать эту функцию, вам необходимо обновить подписку.");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Срок действия вашей подписки истек, и все ваши объявления не опубликованы. Ваши объявления больше не видны гостям, и вы больше не сможете получать онлайн-бронирования с нашего веб-сайта. Чтобы продолжить использование наших услуг, опубликуйте ваши объявления и начните получать онлайн-бронирования, пожалуйста, войдите в свою учетную запись и приобретите продление. ");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1', "Ваша подписка на");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2', "истек");
jr_define ('_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1', "Это уведомление, чтобы вы знали, что ваша подписка скоро истечет. Чтобы продолжить использование наших услуг, войдите в свою учетную запись и приобретите продление.");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', "Пакеты подписки");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME', "Имя");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "Описание");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', "Опубликовано");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY', "Частота");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', "Цена");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT', "Бизнес-лимит");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC', "Максимальное количество предприятий, которые могут быть добавлены с помощью этого пакета подписки");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', "Подписаться");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_USE', "Использовать функцию обработки подписки");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', "Извините, но этот идентификатор пакета не распознан.");
jr_define ('_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', "Кажется, вы еще не ввели данные своей учетной записи. Чтобы разместить свою собственность на сайте, нам нужно, чтобы вы указали данные своей учетной записи, прежде чем мы продолжим.");
jr_define ('_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED', "Вы использовали все слоты свойств, доступные в вашем пакете подписки, поэтому вы не сможете создавать какие-либо новые объявления. Пожалуйста, обновите свой пакет, если вы хотите создать больше объявлений.");
jr_define ('_JOMRES_CHART_SUBSCRIPTIONS_DESC', "Доход за год / месяц");
jr_define ('_SUBSCRIPTION_WARNING', "Вы включили подписки, но похоже, что вы еще не создали ни одного пакета подписки. Владельцы не смогут регистрировать свойства на вашем сайте, пока не будет создан хотя бы один пакет подписки.");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "Доступ к API");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"You can access this feature by upgrading to the " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Subscription Package. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Upgrade');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Subscribed');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Subscription gateway settings');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'You are not currently subscribed to any subscription packages. Please subscribe to a package to continue using our services.');

