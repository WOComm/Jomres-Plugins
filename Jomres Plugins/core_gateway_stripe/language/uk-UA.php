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

jr_define ('STRIPE_TITLE', "Смужка");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Цей шлюз Stripe розроблений спеціально для того, щоб ви, як менеджер сайту, могли отримувати частину платежів, здійснених менеджерам нерухомості під час бронювання. Перш ніж його використовувати, ви повинні спочатку налаштувати власну інтеграцію зі Stripe Підключення. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Перш ніж почати, переконайтеся, що ви перейшли на свою сторінку Stripe Connect і вказали, що ви налаштовуєте платформу.</a> Після цього виконайте вказівки на екрані, щоб налаштувати свій обліковий запис. Перш ніж менеджери зможуть під’єднати свій обліковий запис до вашого необхідно відвідати Налаштування> Налаштування підключення та в області \"Налаштування OAuth\" увімкнути OAuth для стандартних облікових записів а потім натисніть кнопку Зберегти (зверніть увагу, вам потрібно буде це зробити як у режимі Тестування, так і в режимі реального часу). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Зв'яжіться з нами!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Ви зареєструвалися, але з'єднання ще не завершено. Вам потрібно підключити свій обліковий запис Stripe до нашого веб -сайту. Як тільки це буде зроблено, ви можете додати всі свої властивості до нашого сайту та розпочати бронювання . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Ласкаво просимо до");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', " Перш ніж почати налаштовувати власність (и), потрібно зв’язати нас зі своїм обліковим записом Stripe. Натисніть на посилання, щоб розпочати. ​​");

jr_define ('STRIPE_SETUP_INFO', "Тепер нам потрібно підключити ваш обліковий запис до нашого, це дозволить нам приймати платежі від вашого імені, тому натисніть кнопку Підключитися , щоб перейти до Stripe, де ви можете підтвердити з'єднання.");
jr_define ('STRIPE_SETUP_DONE', "Ви вже зв'язалися з нами, тут більше нічого робити! Закрийте це вікно і перейдемо до справи ведення бізнесу.");
jr_define ('STRIPE_SETUP_THANKS', "Дякуємо, що зв’язалися з нами! Ви можете закрити це вікно зараз.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Відключити обліковий запис.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Обліковий запис відключено, ви можете закрити це вікно зараз.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Ідентифікатор клієнта Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Ви можете отримати свій ідентифікатор клієнта Stripe за допомогою <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Інформаційної панелі> Налаштування> Підключити. API клавіші знаходяться під опцією меню Розробники. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Будь ласка, переконайтеся, що ви встановили свій URI переспрямування в <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Підключення> Налаштування </a> <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Секретний ключ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Відкритий ключ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Ваша комісія");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Ця комісія береться з платежу, надісланого менеджеру нерухомості під час бронювання. Після цього компанія Stripe перераховує на ваш рахунок Stripe. <br/> Це відсоток комісії, яку ви будете стягувати з менеджерів нерухомості за Ваші комісії стягуються виходячи з ВСІХ витрат на бронювання, а не на суму депозиту. <br/> Що б ви не встановили це значення, ми рекомендуємо налаштувати Конфігурація сайту -> Форма бронювання -> Мінімальна сума депозиту щонайменше вдвічі більше, ніж ця цифра, тому, якщо ви хочете стягнути 10% комісії, то вам слід зробити так, щоб мінімальний депозит становив 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Збір за смугу європейський");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Це відсоток, який Stripe стягує з вас за здійснення платежів на вашому сайті. Наразі вони стягують 1,4% для європейських карт та 2,9% для неєвропейських карт. Цей показник необхідний для визначення цін під час бронювання та час оплати. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Збір за смугу не євро");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Номер картки");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Термін дії (ММ/РР)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Поштовий індекс");
    
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Безпечна форма платежу");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Платіжна інформація");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Інформація про картку");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Ім'я власника картки");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Платіть зараз");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Оплатити зараз");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Вулиця обов\'язкова і не може бути порожньою');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Вулиця має містити більше 6 і менше 96 символів');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Місто обов\'язкове і не може бути порожнім');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Поштовий індекс обов\'язковий і не може бути порожнім');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Поштовий індекс має містити більше 3 і менше 12 символів');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'Адреса електронної пошти обов\'язкова і не може бути порожньою');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Введіть недійсну адресу електронної пошти');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'Електронна пошта має містити більше 6 і менше 65 символів');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Ім\'я власника картки обов\'язкове і не може бути порожнім');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Ім’я власника картки має складати більше 6 та менше 70 символів ');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Номер кредитної картки обов\'язковий і не може бути порожнім');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Номер кредитної картки недійсний');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Необхідний місяць закінчення терміну дії');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Місяць закінчення може містити лише цифри');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Необхідний рік закінчення терміну дії');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Рік закінчення може містити лише цифри');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'CVV є обов\'язковим і не може бути порожнім');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Значення не є дійсним CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "На жаль, наразі нам не вдалося обробити ваш платіж.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Будь ласка, повторіть спробу");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Платіж відхилено.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Занадто швидко надсилається багато запитів до API");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Недійсні параметри були надані в API Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Помилка автентифікації за допомогою API Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Мережевий зв'язок із Stripe не вдався (ваше підключення до Інтернету перервалося?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Сталася помилка, яка не була спіймана");