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
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC', '基本');
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_USERNAME', 'ユーザー名');
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_PASSWORD', 'パスワード');
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_NOTES', 'リモートサービスが基本認証によるログインを必要とする場合は,この統合方法を使用します。');