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

jr_define('_SUBSCRIPTIONS_ACTIVE',"Активний");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Неактивний");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Статус платежу");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Рівень");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Редагувати підписку");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Надіслати електронний лист із нагадуванням про закінчення підписки?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Надіслати нагадування електронною поштою");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"днів до закінчення терміну підписки");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Надіслати електронний лист, коли термін підписки закінчився?");
jr_define('_SUBSCRIPTIONS_MY',"Мої підписки");
jr_define('_SUBSCRIPTIONS_HRENEW',"Поновити");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Поновлення підписки");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Ви вже підписалися, будь ласка, придбайте поновлення.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Редагувати пакет підписки");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Введіть кілька перших літер імені користувача, і ви побачите спадне меню з іменами користувачів. Натисніть на ім'я користувача, щоб вибрати його.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Цей пакет підписки більше не доступний, тому його не можна поновити, будь ласка, подумайте про його оновлення.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Ви не підписані на цей пакет, тому не можете його поновити.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Для цього пакета немає варіантів поновлення");
jr_define('_SUBSCRIPTIONS_CANCEL',"Скасувати підписку");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Частота (дні)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Тривалість підписки в днях");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Поновлення не дозволено для цього пакету.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Ціна поновлення");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Встановіть для цього значення 0, щоб вимкнути поновлення для цього пакета або введіть ціну за поновлення");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Параметри пакету");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Відомості про пакет");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Ваш пакет підписки");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Ваш пакет підписки не містить доступу до цієї функції. Щоб скористатися цією функцією, вам потрібно оновити підписку.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Термін дії вашої підписки закінчився, і всі ваші записи скасовано. Гості більше не бачать ваші оголошення, і ви більше не зможете отримувати онлайн-бронювання з нашого веб-сайту. Щоб продовжувати користуватися нашими послугами, опублікуйте Ваші списки та почніть отримувати онлайн-бронювання, будь ласка, увійдіть у свій обліковий запис і придбайте оновлення." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Ваша підписка на");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"термін дії закінчився");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Це сповіщення, щоб повідомити вас про те, що термін дії вашої підписки скоро закінчиться. Щоб продовжити користуватися нашими послугами, увійдіть у свій обліковий запис і придбайте поновлення." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Пакети передплати");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Ім'я");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Опис");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Опубліковано");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Частота");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Ціна");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Обмеження бізнесу");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Максимальна кількість компаній, які можна додати за допомогою цього пакету підписки");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Підписатися");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Використовувати функції обробки підписок" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Вибачте, але цей ідентифікатор пакета не розпізнається." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', "Здається, ви ще не заповнили дані свого облікового запису. Щоб розмістити свою власність на сайті, нам потрібно ввести дані облікового запису, перш ніж ми зможемо йти далі." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Ви використали всі слоти властивостей, доступні у вашому пакеті підписки, тому ви не зможете створювати нові списки. Будь ласка, оновіть свій пакет, якщо ви хочете створити більше списків." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Дохід за рік/місяць");
jr_define('_SUBSCRIPTION_WARNING',"Ви ввімкнули підписки, але, схоже, ви ще не створили жодних пакетів підписки. Власники не зможуть зареєструвати властивості на вашому сайті, доки не буде створено хоча б один пакет підписки.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"Доступ до API");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Ви можете отримати доступ до цієї функції, оновивши до " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Пакет підписки. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Оновити');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Підписано');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Налаштування шлюзу підписки');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Ви зараз не підписані на жодні пакети підписки. Будь ласка, підпишіться на пакет, щоб продовжувати користуватися нашими послугами.');
