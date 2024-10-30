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

jr_define ('_JRPORTAL_CLONEPROPERTY_TITLE', "Властивість клонування");
jr_define ('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY', "Виберіть властивість, яку потрібно клонувати:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME', "Назва нової властивості:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NOTES', "Майте на увазі, що властивості клонування не мають тарифів, вам слід скористатися плагіном Clone Tariffs, якщо ви хочете скопіювати тарифи, або створити тарифи вручну. Налаштування плагіна не імпортуються, якщо вони є. Властивість не перехресне посилання з будь -якими менеджерами нерухомості. <br/> Власність клонування слід використовувати лише для дублювання властивості, коли після цього нова властивість буде використовувати той самий тип власності та тип кімнати. ");
jr_define ('_JRPORTAL_CLONEPROPERTY_DONE', "Власність клоновано");