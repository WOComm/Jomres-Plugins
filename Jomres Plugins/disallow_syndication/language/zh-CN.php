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

jr_define('DISALLOW_SYNDICATION_TITLE',"禁止联合");
jr_define('DISALLOW_SYNDICATION_DESCRIPTION','Jomres.net 联合功能是一项新功能，旨在在站点之间共享属性，尽管只能在主服务器上进行预订。');

jr_define('DISALLOW_SYNDICATION_DESCRIPTION_MORE',"这样做的目的是使网站能够与搜索引擎建立信任。这是一项免费功能，可供所有 Jomres 用户使用。活跃的 Jomres 许可证持有者可以，如果他们希望选择删除他们的通过此页面从联合网络中删除站点。无法将本地主机添加到网络中，如果由于任何原因存在连接问题，您将无法将您的站点添加到网络中。检查 REST API 连接测试页面，如果您有任何疑问。");

jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW',"单击此链接可将您的站点从网络中删除。");
jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW',"单击此链接将您的站点添加到网络中。");

jr_define('DISALLOW_SYNDICATION_DISALLOW',"从网络中删除该站点");
jr_define('DISALLOW_SYNDICATION_ALLOW',"将此站点添加到网络");

jr_define('DISALLOW_SYNDICATION_INVALID_KEY',"抱歉，您的支持密钥无效或未激活，您无法更改此安装的联合状态。");