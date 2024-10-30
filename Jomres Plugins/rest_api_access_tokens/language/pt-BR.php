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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Listar tokens de acesso à API REST");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Esta página lista todos os clientes e, se disponível, seus tokens de acesso (os clientes podem não ter solicitado um token de acesso). Isso é útil se você deseja enviar consultas por meio de um cliente como o Postman e precisa de um token de acesso Embora esta página liste os tokens de acesso do SISTEMA, não é recomendável usá-los. ");