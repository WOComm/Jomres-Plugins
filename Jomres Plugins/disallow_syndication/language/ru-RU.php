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

jr_define ('DISALLOW_SYNDICATION_TITLE', "Запретить распространение");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Функция синдикации Jomres.net - это новая функция, предназначенная для совместного использования свойств между сайтами, хотя заказы могут быть сделаны только на домашнем сервере.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Цель этого состоит в том, чтобы позволить сайтам укрепить доверие с поисковыми системами. Это бесплатная функция, доступная для всех пользователей Jomres. Активные держатели лицензии Jomres могут, если они хотят удалить свои сайт из сети распространения через эту страницу. Localhost не может быть добавлен в сеть, и если по какой-либо причине возникнет проблема с подключением, вы не сможете добавить свой сайт в сеть. Проверьте страницу проверки подключения REST API, если вы есть сомнения. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Щелкните эту ссылку, чтобы удалить свой сайт из сети.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Щелкните эту ссылку, чтобы добавить свой сайт в сеть.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Удалить этот сайт из сети");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Добавить этот сайт в сеть");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "К сожалению, ваш ключ поддержки недействителен или неактивен, вы не можете изменить статус распространения этой установки.");