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

jr_define ('_DEEPL_TITLE', "Переводы DeepL");
jr_define ('_DEEPL_DESCRIPTION', "DeepL - это недорогая услуга встроенного перевода, которую вы можете использовать для автоматического перевода строк на языке Jomres. Эти переводы, полученные от службы DeepL, хранятся локально, и вы можете использовать функцию перевода меток для доработайте их. Это значительно ускоряет процесс создания вашего веб-сайта на нескольких языках. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Поддерживается языки </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "Ключ аутентификации DeepL");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Вам понадобится действующий ключ API из <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </ a > После подписки вы найдете ключ аутентификации в <a href='https://www.deepl.com/en/pro-account/' target='_blank'> своей учетной записи. </a> После того, как вы сохранили ключ в Jomres, ваш сайт может на некоторое время замедлиться, так как будет много переводов, которые нужно будет извлечь из службы DeepL. Наберитесь терпения и перезагрузите страницу несколько раз. После этого вы можете точно настроить параметры на странице переводов ярлыков. ");