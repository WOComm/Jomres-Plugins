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

jr_define ('STRIPE_TITLE', "Полоса");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Этот шлюз Stripe разработан специально для того, чтобы вы, как менеджер сайта, могли получать часть платежей, произведенных менеджерам по управлению недвижимостью во время бронирования. Прежде чем его можно будет использовать, вы должны сначала настроить собственную интеграцию с Stripe. Подключитесь. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>   Документацию для этого плагина можно найти здесь. </a> <br/> Если вы нажмете \"Сохранить\" на этой странице, чтобы этот плагин работал без проблем,  все остальные шлюзы будут отключены </ strong> Прежде чем начать, убедитесь, что вы перешли на страницу Stripe Connect и указали, что настраиваете платформу. После этого следуйте инструкциям на экране, чтобы настроить свою учетную запись. Прежде чем менеджеры смогут подключить свою учетную запись к вашей, вы необходимо посетить \"Настройки\"> \"Настройки подключения\" и в области \"Настройки OAuth\" включить OAuth для стандартных учетных записей. а затем нажмите \"Сохранить\" (обратите внимание, что вам нужно будет сделать это как в тестовом, так и в интерактивном режимах). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Свяжитесь с нами!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Вы зарегистрировались, но соединение еще не установлено. Вам необходимо связать свою учетную запись Stripe с нашим веб-сайтом. Как только это будет сделано, вы можете добавить все свои объекты на наш сайт и начать принимать заказы . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Добро пожаловать в");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Прежде чем вы сможете начать настройку своих свойств, вам необходимо связать нас с вашей учетной записью Stripe. Нажмите на ссылку, чтобы начать.");

jr_define ('STRIPE_SETUP_INFO', "Теперь нам нужно подключить вашу учетную запись к нашей, это позволит нам принимать платежи от вашего имени, поэтому нажмите кнопку \"Подключить\", чтобы перейти в Stripe, где вы сможете подтвердить подключение.");
jr_define ('STRIPE_SETUP_DONE', "Вы уже связаны с нами, здесь больше нечего делать! Закройте это окно и давайте приступим к делу ведения бизнеса.");
jr_define ('STRIPE_SETUP_THANKS', "Спасибо, что связались с нами! Теперь вы можете закрыть это окно.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Отключить вашу учетную запись.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Учетная запись отключена, теперь вы можете закрыть это окно.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Идентификатор клиента Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Вы можете получить свой идентификатор клиента Stripe из <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Dashboard> Settings> Connect. ключи находятся в меню \"Разработчики\". </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Убедитесь, что вы установили URI перенаправления в <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Connect> Settings </a> к <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Секретный ключ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Открытый ключ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Ваша комиссия");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Эта комиссия вычитается из платежа, отправленного управляющему недвижимостью во время бронирования. Затем Stripe переводит ее на ваш счет Stripe. <br/> Это процент комиссии, за которую вы будете взимать комиссию с управляющих недвижимостью. их бронирования. Ваша комиссия взимается на основе ВСЕЙ стоимости бронирования, а не суммы депозита. <br/> Какое бы значение вы ни установили, мы рекомендуем настроить Конфигурацию сайта -> Форма бронирования -> Минимальная сумма депозита. как минимум вдвое больше, поэтому, если вы хотите взимать комиссию в размере 10%, вы должны сделать минимальный депозит 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Европейская комиссия за полосу");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Это процент, который Stripe взимает с вас за совершение платежей на вашем сайте. В настоящее время они взимают 1,4% для европейских карт и 2,9% для неевропейских карт. Эта цифра необходима для определения цен при бронировании и время оплаты. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Комиссия за полосу без евро");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Номер карты");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Срок действия (ММ / ГГ)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Почтовый индекс для выставления счетов");

jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Безопасная форма оплаты");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Платежные реквизиты");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Детали карты");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Имя владельца карты");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Оплатить сейчас");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Чтобы заплатить сейчас");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Улица обязательна и не может быть пустой');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Улица должна быть больше 6 и меньше 96 символов');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Город является обязательным и не может быть пустым');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'ZIP-архив является обязательным и не может быть пустым');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'ZIP-файл должен содержать более 3 и менее 12 символов');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'Адрес электронной почты является обязательным и не может быть пустым');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Введен неверный адрес электронной почты');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'Электронная почта должна содержать более 6 и менее 65 символов');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Имя держателя карты является обязательным и не может быть пустым');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Имя держателя карты должно быть больше 6 и меньше 70 символов');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Номер кредитной карты является обязательным и не может быть пустым');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Номер кредитной карты недействителен');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Требуется месяц истечения срока');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Месяц истечения может содержать только цифры');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Требуется год истечения срока');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Год истечения срока может содержать только цифры');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'CVV является обязательным и не может быть пустым');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Значение не является допустимым CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "К сожалению, в данный момент мы не смогли обработать ваш платеж.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Пожалуйста, попробуйте еще раз");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Платеж отклонен.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Слишком много запросов к API сделано слишком быстро");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "В Stripe API были переданы неверные параметры");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Ошибка аутентификации с помощью Stripe API");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Сетевое соединение с Stripe не удалось (оборвалось ли ваше интернет-соединение?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Произошла неперехваченная ошибка");