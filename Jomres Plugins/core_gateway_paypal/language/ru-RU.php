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

jr_define ('PAYPAL_API_KEY_TITLE', "Ключ API Paypal");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Настройте свой идентификатор клиента Paypal и секрет для обоих аккаунтов в реальном времени и песочнице. После настройки вы сможете принимать платежи как за бронирование, так и по счетам через Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "Идентификатор клиента");
jr_define ('PAYPAL_API_SECRET', "Секрет");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Идентификатор клиента песочницы");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Секрет песочницы");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Как узнать свой идентификатор клиента и секрет?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Перейдите на https://developer.paypal.com/ и войдите в систему.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Перейти в Мои приложения и учетные данные в боковом меню.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "щелкните Создать приложение, чтобы создать новое приложение");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Дайте своему приложению имя, затем нажмите Создать приложение ");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "На этой странице вы можете увидеть свой идентификатор клиента и секрет. Скопируйте и вставьте эти ключи в соответствующие поля выше.");