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

jr_define('_PHPLIST_INSTRUCTIONS',"Цей плагін інтегрує Jomres з PHPList і дозволяє автоматично додавати ім'я та електронну адресу клієнтів до списку розсилки, коли вони роблять бронювання.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Пропустити електронний лист підтвердження підписки?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Надіслати листи HTML?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPLlist основної сторінки URL-адреси");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"URL-адреса повинна мати кінцеву косу риску і не використовувати в ній жодних параметрів");
jr_define('_PHPLIST_HUSER',"Ім'я користувача адміністратора PHPlist");
jr_define('_PHPLIST_HPASS',"Пароль адміністратора PHPlist");
jr_define('_PHPLIST_HATTRIB1',"атрибут1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPList атрибут/ім'я поля, де ви хочете зберегти ім'я гостя. Залиште порожнім для жодного.");
jr_define ('_PHPLIST_HATTRIB2', "attribute2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPLlist атрибут/ім'я поля, де ви хочете зберегти прізвище гостя. Залиште порожнім для жодного.");
jr_define('_PHPLIST_HLIST_ID',"Ідентифікатор списку розсилки");