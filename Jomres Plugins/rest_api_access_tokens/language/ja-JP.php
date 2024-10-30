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
	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"REST API アクセス トークンのリスト");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"このページには、すべてのクライアントと、利用可能な場合はアクセス トークンが一覧表示されます (クライアントがアクセス トークンを要求していない可能性があります)。これは、Postman などのクライアントを介してクエリを送信し、アクセス トークンが必要な場合に役立ちます。 . このページには SYSTEM アクセス トークンがリストされていますが、それらを使用することはお勧めしません。");