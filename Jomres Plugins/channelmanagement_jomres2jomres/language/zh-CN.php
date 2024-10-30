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

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE',"Jomres 2 Jomres 集成");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE',"父站点客户端ID");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC',"父站点的客户端 ID。在父站点上，您需要一个唯一的客户端 ID 和机密，其中安装了所有 api 功能插件，安装了频道管理框架插件，以及当您创建/编辑客户端 ID/您需要授予它访问所有可用范围的密钥对。");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE',"父站点客户端密码");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC',"父站点客户端密码");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE',"父网址");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC',"父Jomres站点的url。");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET',"错误，您的父站点客户 ID 未设置。访问站点配置 > 渠道经理帐户选项卡以保存您的客户 ID。");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET',"错误，您的父站点机密未设置。访问站点配置>频道管理器帐户选项卡以保存您的机密。");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET',"错误，您的父站点秘密 URL 未设置。访问站点配置 > 渠道管理器帐户选项卡以保存您的父站点 URL。");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"错误，您的客户 ID 未设置。访问站点配置 > 渠道经理帐户选项卡以保存您的用户名。");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"错误，您的客户 ID 未设置。访问站点配置 > 渠道经理帐户选项卡以保存您的密码。");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE',"频道设置");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE',"Jomres 2 Jomres : 导入新属性。");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT',"进口");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT',"出口");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET',"未设置属性ID");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET',"未设置映射字典项");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND',"未找到本地属性类型。如果已创建属性类型，请确保您已将远程服务的属性类型映射到本地属性类型。");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND',"通道未返回远程属性类型。");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND',"本地属性类型未通过。");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND',"无法确定预订模式(mrp or srp)。");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE',"找到属性类型id后无法确定预订模式(mrp or srp)。");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND',"无法确定国家代码");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND',"无法确定区域ID");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED',"无法正确验证设置数组");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES',"管理员未映射的属性类型");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES',"管理员未映射的属性");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES',"管理员未映射的房间类型");

