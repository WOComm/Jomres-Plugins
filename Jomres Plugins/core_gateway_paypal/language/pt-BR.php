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


jr_define ('PAYPAL_API_KEY_TITLE', "Chave de API do Paypal");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Configure seu ID de cliente e segredo do Paypal para suas contas ao vivo e Sandbox. Depois de configurado, você poderá aceitar pagamentos de reservas e faturas por meio do Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "ID do cliente");
jr_define ('PAYPAL_API_SECRET', "Segredo");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Sandbox Client ID");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Segredo do Sandbox");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Como você encontra seu ID de cliente e segredo?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Vá para https://developer.paypal.com/ e faça login.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Vá para Meus aplicativos e credenciais no menu lateral.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "clique em Criar aplicativo para criar um novo aplicativo");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Dê um nome ao seu aplicativo e clique em Criar aplicativo.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Nesta página você pode ver seu ID de cliente e segredo. Copie e cole essas chaves nos respectivos campos acima.");