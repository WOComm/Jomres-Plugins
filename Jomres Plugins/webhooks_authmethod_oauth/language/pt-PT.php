<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Translated to pt-PT by Mario Oliveira, Camara de Lobos, Madeira Island, Portugal, 17Set2010 - www.marioliveira.net - Updated 21Jun2011 for ver 5.1
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
//#################################################################


jr_define ('WEBHOOKS_AUTH_METHOD_OAUTH2', 'Oauth2');
jr_define ('WEBHOOKS_AUTH_METHOD_OAUTH2_CLIENT_ID', 'ID do cliente');
jr_define ('WEBHOOKS_AUTH_METHOD_OAUTH2_SECRET', 'Segredo');
jr_define ('WEBHOOKS_AUTH_METHOD_OAUTH2_NOTES', 'Use este método de integração se o serviço remoto requer login via Credenciais do Cliente OAuth2.');