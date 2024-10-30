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

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "在 ASAModule 小部件/模块中显示属性房间/资源。对单个属性网站有用。");

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "必填。要显示资源的属性 uid。" );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "必填。您要显示的资源的 id(例如房间)。以逗号分隔的 id 列表。");
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "可选。以与站点配置 > 日历选项卡 > 日历输入格式设置相对应的格式设置到达日期。例如 01/02/2018。这允许您显示特定日期的特定房价 未来，假设您设定了涵盖这些日期的关税。");