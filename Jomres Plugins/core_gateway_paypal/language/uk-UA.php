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

jr_define ('PAYPAL_API_KEY_TITLE', "Ключ API Paypal");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Налаштуйте свій ідентифікатор клієнта Paypal і секрет як для вашого облікового запису, так і для\" пісочниці\". Після налаштування ви зможете приймати як бронювання, так і рахунки -фактури через Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "Ідентифікатор клієнта");
jr_define ('PAYPAL_API_SECRET', "Секрет");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Ідентифікатор клієнта пісочниці");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Секрет пісочниці");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Як знайти свій ідентифікатор клієнта та секрет?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Перейдіть на сторінку https://developer.paypal.com/ і увійдіть у систему');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Перейти до Мої програми та облікові дані у бічному меню.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "натисніть Створити додаток, щоб створити новий додаток");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Дайте додатку назву, а потім натисніть Створити додаток.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "На цій сторінці ви можете побачити свій ідентифікатор клієнта та секрет. Скопіюйте та вставте ці ключі у відповідні поля вище.");