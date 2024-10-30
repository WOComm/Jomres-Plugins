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

jr_define('FIREWALL_CHECK', '防火墙检查');
jr_define( 'FIREWALL_CHECK_DESC', '这个插件是一个简单的检查，看看这个服务器是否可以连接到远程服务。如果不能，那可能表明有防火墙规则阻止了两台机器相互通信。如果有 是，那么您可能需要与您的网络服务器主机讨论调整防火墙规则。404 和 403 响应可以被认为是可以的，因为您正在从远程服务获得响应。');
jr_define('FIREWALL_CHECK_REMOTE_SERVICE', '远程服务');
jr_define('FIREWALL_CHECK_STATUSCODE', '状态码');
jr_define('FIREWALL_CHECK_IP_NUMBER', 'IP 号码');