<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Lista de tokens de acceso a API REST");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Esta página enumera todos los clientes y, si están disponibles, sus tokens de acceso (es posible que los clientes no hayan solicitado un token de acceso). Esto es útil si desea enviar consultas a través de un cliente como Postman y necesita un token de acceso Aunque esta página enumera los tokens de acceso al SISTEMA, no se recomienda que los use. ");