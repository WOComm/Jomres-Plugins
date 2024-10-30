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

jr_define('_CLONE_TARIFFS_TITLE',"克隆关税");
jr_define('_CLONE_TARIFFS_INFO',"您可以在此处将关税从目标属性复制到源属性。只有您有权管理的属性才可供您使用。");
jr_define('_CLONE_TARIFFS_SOURCE',"源属性");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"要克隆的关税");
jr_define('_CLONE_TARIFFS_TARGET',"目标属性");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"目标物业房间类型");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"如果目标属性的关税编辑模式与源属性的关税编辑模式不同，那么当克隆发生时，目标属性的原始关税将被删除，其关税编辑模式将更改为反映源的关税编辑模式属性的设置。");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"删除目标财产的现有关税？");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"如果目标属性的关税编辑模式与源属性相同，则不会删除现有关税。但是您可以通过将此选项设置为是来选择覆盖它。");