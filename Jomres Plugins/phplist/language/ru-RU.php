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

jr_define ('_PHPLIST_INSTRUCTIONS', "Этот плагин интегрирует Jomres с PHPList и позволяет автоматически добавлять имена клиентов и адрес электронной почты в список рассылки, когда они делают бронирование.");
jr_define ('_PHPLIST_HSKIPCONFEMAIL', "Пропустить письмо с подтверждением подписки?");
jr_define ('_PHPLIST_HSENDHTMLEMAILS', "Отправить электронные письма в формате HTML?");
jr_define ('_PHPLIST_HPHPLISTURL', "Базовый URL главной страницы PHPList");
jr_define ('_PHPLIST_HPHPLISTURL_DESC', "URL-адрес должен иметь косую черту в конце и не использовать в нем какие-либо параметры");
jr_define ('_PHPLIST_HUSER', "Имя пользователя администратора PHPList");
jr_define ('_PHPLIST_HPASS', "Пароль администратора PHPList");
jr_define ('_PHPLIST_HATTRIB1', "атрибут1");
jr_define ('_PHPLIST_HATTRIB1_DESC', "Атрибут PHPList / имя поля, в котором вы хотите сохранить имя гостя. Оставьте поле пустым, чтобы ничего не было.");
jr_define ('_PHPLIST_HATTRIB2', "атрибут2");
jr_define ('_PHPLIST_HATTRIB2_DESC', "Атрибут PHPList / имя поля, в котором вы хотите сохранить гостевую фамилию. Оставьте поле пустым, если нет.");
jr_define ('_PHPLIST_HLIST_ID', "ID списка рассылки");