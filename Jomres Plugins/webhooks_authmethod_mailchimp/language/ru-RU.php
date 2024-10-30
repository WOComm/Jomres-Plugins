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


jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Этот метод интеграции обновляет список Mailchimp, когда вы добавляете гостя в систему. <br/>
Вам не нужно настраивать ввод URL для этого веб-перехватчика, мы выясним это на основе вашего API. <br/>
Чтобы настроить этот веб-перехватчик, вам понадобятся два элемента информации: ключ API и идентификатор списка. <br/>
Чтобы найти свой ключ API, перейдите в свою учетную запись Mailchimp и: <br/>
<ol>
  <li> Щелкните имя своего профиля, чтобы развернуть панель «Учетная запись», и выберите «Учетная запись». </li>
  <li> Щелкните раскрывающееся меню "Дополнительно" и выберите "Ключи API". </li>
  <li> Скопируйте существующий ключ API или нажмите кнопку "Создать ключ". </li>
  <li> Назовите свой ключ описательно, чтобы вы знали, какое приложение использует этот ключ. </li>
</ol>
Затем вам понадобится идентификатор списка, который вы можете найти, посетив свои списки в Mailchimp. Щелкните ссылку меню «Списки» и в конце строки справа щелкните раскрывающийся список, затем выберите «Параметры». Прокрутите страницу вниз, там будет что-то вроде «Идентификатор списка для списка бла-бла». Это идентификатор списка, который вам нужно использовать.
    ');

jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Ключ API');
jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Идентификатор списка');