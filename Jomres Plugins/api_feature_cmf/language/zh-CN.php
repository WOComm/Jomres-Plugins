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

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"频道管理");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"客户可以执行渠道管理活动。注意，这使客户在系统中拥有相当大的权力来修改您的帐户和属性。");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"清洁");

jr_define('_CMF_CANCELLED_BOOKING',"渠道经理取消预订");

jr_define('_CMF_CLEANING_STRING',"清洁"); // 如果您已经导入了属性，请不要更改此项。有清洁费的物业有一个叫这个名字的 Extra
jr_define('_CMF_SECURITY_STRING',"保证金"); // 如果您已经导入了属性，请不要更改此项。有保证金的属性有一个带有这个名字的 Extra


jr_define('_CMF_API_PRIVACY',"API 隐私");
jr_define('_CMF_API_PRIVACY_ON',"隐私开启");
jr_define('_CMF_API_PRIVACY_OFF',"隐私关闭");

jr_define('_CMF_API_PRIVACY_DESC',"一个属性的信息只能被创建它的通道看到。例如，如果你给通道A和通道B提供了不同的API密钥对，通道A创建的属性的信息不能被频道 B 看到...除非您关闭 API 隐私以允许所有频道通过 API 查看所有属性的信息。如果您要与想要列出该属性的另一个站点共享此属性，请将 API 隐私设置为关闭。如果您不与任何其他站点共享此属性，请将 API Privacy 设置为 On。");