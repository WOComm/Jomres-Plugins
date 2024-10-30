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

jr_define('_CLONE_TARIFFS_TITLE',"Клонові тарифи");
jr_define('_CLONE_TARIFFS_INFO',"Тут ви можете клонувати тариф із цільової властивості до вихідної. Вам будуть доступні лише властивості, керування якими у вас є.");
jr_define('_CLONE_TARIFFS_SOURCE',"Властивість джерела");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Тариф для клонування");
jr_define('_CLONE_TARIFFS_TARGET',"Цільова властивість");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Цільовий тип кімнати власності");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Якщо режим редагування тарифу цільового властивості відрізняється від режиму редагування тарифу вихідного властивості, тоді, коли відбудеться клонування, вихідні тарифи цільового властивості будуть видалені, а його режим редагування тарифу буде змінено відповідно до режиму редагування тарифу джерела налаштування властивості.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Видалити існуючі тарифи у властивості Target?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Якщо режим редагування тарифу цільової властивості такий самий, як і властивість Source, то існуючі тарифи не будуть видалені. Однак ви можете змінити це, встановивши для цієї опції значення Так.");