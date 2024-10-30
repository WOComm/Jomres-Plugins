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

jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API ключ");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Конфигурирайте вашия Paypal Client ID и Secret както за вашите акаунти на живо, така и за Sandbox. След като бъде конфигуриран, ще можете да приемате както резервации, така и фактури чрез Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "ИД на клиент");
jr_define ('PAYPAL_API_SECRET', "Тайна");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Идентификационен номер на клиент в Sandbox");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Secret Sandbox Secret");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Как намирате вашия клиентски идентификатор и тайна?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Отидете на https://developer.paypal.com/ и влезте.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Отидете на Моите приложения и идентификационни данни в страничното меню.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "щракнете върху Създаване на приложение, за да създадете ново приложение");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Дайте име на приложението си, след което щракнете върху Създаване на приложение.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "На тази страница можете да видите вашия Client ID и Secret. Копирайте и поставете тези ключове в съответните полета по -горе.");