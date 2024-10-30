<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"List REST API Access tokens");
jr_define('REST_API_ACCESS_TOKENS_INFO',"This page lists all clients and if available, their access tokens (clients may not have requested an access token). This is useful if you want to send queries through a client like Postman and you need an access token. Although this page lists SYSTEM access tokens, it is not recommended that you use them. ");