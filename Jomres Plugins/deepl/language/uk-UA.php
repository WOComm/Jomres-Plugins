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

jr_define ('_DEEPL_TITLE', "Переклади DeepL");
jr_define ('_DEEPL_DESCRIPTION', "DeepL-це послуга вбудованого перекладу за розумними цінами, яку можна використовувати для автоматичного перекладу рядків мови Jomres. Ці переклади, отримані від служби DeepL, зберігаються локально, і ви можете використовувати функцію перекладу міток для уточнюйте їх. Це значно пришвидшує процес роботи вашого веб-сайту з використанням кількох мов. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Підтримується мови </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "Ключ автентифікації DeepL");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Вам знадобиться дійсний ключ API із <a href='https://www.deepl.com/pro?cta=header-price/'target='_blank'> DeepL. </a > Після підписки ви знайдете ключ автентифікації у <a href='https://www.deepl.com/en/pro-account/' target='_blank'> свого облікового запису. </a> Після вас зберегли ключ у Jomres, ваш сайт може сповільнитися на деякий час, оскільки буде потрібно багато перекладів, які потрібно вилучити зі служби DeepL. Будьте терплячими та перезавантажте сторінку кілька разів. Після цього ви можете точно налаштувати налаштування на сторінці перекладів етикетки. ");