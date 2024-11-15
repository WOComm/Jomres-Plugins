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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"List REST API Access tokens");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"This page lists all clients and if available, their access tokens (clients may not have requested an access token). This is useful if you want to send queries through a client like Postman and you need an access token. Although this page lists SYSTEM access tokens, it is not recommended that you use them. ");