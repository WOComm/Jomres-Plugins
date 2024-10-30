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

jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Този шлюз Stripe е проектиран специално, за да ви позволи като мениджър на сайта да получавате част от плащанията, направени на мениджърите на имоти по време на резервацията. Преди да може да се използва, първо трябва да настроите своя собствена интеграция с Stripe Свържете се. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Преди да започнете, уверете се, че сте отишли ​​на страницата си Stripe Connect и сте посочили, че настройвате платформа. След като направите това, следвайте инструкциите на екрана, за да настроите вашия акаунт. Преди мениджърите да могат да свържат своя акаунт с вашия трябва да посетите Настройки> Настройки за свързване и в областта \"Настройки на OAuth\" активирана OAuth за стандартни акаунти и след това щракнете върху Запазване (забележете, ще трябва да направите това както в тестовия, така и в режимите на живо). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Свържете се с нас!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Регистрирахте се, но връзката все още не е завършена. Трябва да свържете профила си Stripe с нашия уебсайт. След като това стане, можете да добавите всичките си имоти към нашия сайт и да започнете да приемате резервации . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Добре дошли в");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Преди да можете да започнете да настройвате собствеността (ите) си, трябва да ни свържете с вашия акаунт в Stripe. Кликнете върху връзката, за да започнете.");

jr_define ('STRIPE_SETUP_INFO', "Сега трябва да свържем вашия акаунт с нашия, това ще ни позволи да приемаме плащания от ваше име, така че щракнете върху бутона Свързване, за да бъдете отведени до Stripe, където можете да потвърдите връзката.");
jr_define ('STRIPE_SETUP_DONE', "Вече сте свързани с нас, няма какво повече да правите тук! Затворете този прозорец и нека да продължим с бизнеса.");
jr_define ('STRIPE_SETUP_THANKS', "Благодарим ви, че се свързахте с нас! Можете да затворите този прозорец сега.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Прекъснете връзката с акаунта си.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Профилът е изключен, можете да затворите този прозорец сега.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Клиентски идентификатор на Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Можете да получите своя идентификатор на Stripe Client от <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> таблото за управление> Настройки> Свързване. API клавишите са под опцията от менюто Developers. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Моля, уверете се, че сте задали своя URI за пренасочване в <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Connect> Settings </a> към <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Секретен ключ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Публичен ключ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Вашата комисия");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Тази комисионна се взема от плащането, изпратено до мениджъра на имота по време на резервацията. След това се внася в профила ви в Stripe от Stripe. <br/> Това е процентът комисионна, която ще начислявате на мениджърите на имоти за техните резервации. Вашата комисионна се начислява въз основа на ЦЯЛАТА цена на резервацията, а не на стойността на депозита. <br/> Каквото и да зададете тази стойност, препоръчваме ви да конфигурирате Конфигурация на сайта -> Формуляр за резервация -> Минимален депозит поне два пъти тази цифра, така че ако искате да начислите 10% комисионна, тогава трябва да направите минималния депозит 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Такса за ивици в Европа");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Това е процентът, който Stripe ви таксува за извършване на плащания на вашия сайт. Понастоящем те таксуват 1,4% за европейски карти и 2,9% за неевропейски карти. Тази цифра е необходима за определяне на цените при резервация и време за плащане. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Такса за ивици извън евро");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Номер на картата");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Изтичане (MM/YY)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Пощенски код за фактуриране");
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Форма за сигурно плащане");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Данни за фактуриране");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Данни за картата");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Име на притежателя на карта");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Платете сега");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "За да платите сега");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Улицата е задължителна и не може да бъде празна');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Улицата трябва да е с повече от 6 и по -малко от 96 знака');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Градът е задължителен и не може да бъде празен');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Ципът е задължителен и не може да бъде празен');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Ципът трябва да е повече от 3 и по -малък от 12 знака');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'Имейл адресът е задължителен и не може да бъде празен');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Въведеното не е валиден имейл адрес');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'Имейлът трябва да е повече от 6 и по -малък от 65 знака');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Името на притежателя на карта е задължително и не може да бъде празно');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Името на притежателя на картата трябва да е повече от 6 и по -малко от 70 знака');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Номерът на кредитната карта е задължителен и не може да бъде празен');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Номерът на кредитната карта е невалиден');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Изисква се срокът на годност');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Срокът на годност може да съдържа само цифри');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Годината на изтичане е задължителна');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Годината на изтичане може да съдържа само цифри');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'CVV е задължително и не може да бъде празно');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Стойността не е валиден CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "За съжаление не успяхме да обработим плащането ви понастоящем.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Моля, опитайте отново");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Плащането е отхвърлено.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Твърде много заявки, направени към API твърде бързо");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Невалидни параметри бяха предоставени на API на Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Удостоверяването с API на Stripe е неуспешно");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Мрежовата комуникация с Stripe е неуспешна (вашата интернет връзка е прекъсната?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Възникна неуловена грешка");