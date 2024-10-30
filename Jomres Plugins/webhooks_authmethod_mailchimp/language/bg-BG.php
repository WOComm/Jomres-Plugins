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


jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Този метод на интеграция актуализира списък на Mailchimp, когато добавите гост към системата.<br/>
Не е необходимо да задавате URL входа за тази уеб кука, ние ще разберем това въз основа на вашия API.<br/>
За да конфигурирате този уеб кукичка, ще ви трябват два елемента информация, ключ за API и идентификатор на списъка. <br/>
За да намерите своя API ключ, отидете на вашия акаунт в Mailchimp и :<br/>
<ol>
  <li>Щракнете върху името на потребителския си профил, за да разгънете панела на акаунта, и изберете акаунт.</li>
  <li>Щракнете върху падащото меню Extras и изберете API ключове.</li>
  <li>Копирайте съществуващ ключ за API или щракнете върху бутона Създаване на ключ.</li>
  <li>Наименувайте ключа си описателно, за да знаете кое приложение използва този ключ.</li>
</ol>
След това ще ви е необходим List Id, който можете да намерите, като посетите вашите списъци в Mailchimp. Щракнете върху връзката с менюто Списъци и в края на реда вдясно щракнете върху падащото меню, след което изберете Настройки. Превъртете до края на тази страница, тя ще каже нещо като „Идентификатор на списък за blahblah list“. Това е идентификаторът на списъка, който трябва да използвате.
    ');

jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API ключ');
jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Идентификатор на списъка');