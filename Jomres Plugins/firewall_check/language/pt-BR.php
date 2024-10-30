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


jr_define ('FIREWALL_CHECK', 'Verificação do Firewall');
jr_define ('FIREWALL_CHECK_DESC', 'Este plugin é uma verificação simples para ver se este servidor pode se conectar a serviços remotos. Se não puder, isso pode indicar que existem regras de firewall em vigor impedindo as duas máquinas de se comunicarem. Se houver são, então você pode precisar discutir o ajuste das regras de firewall com seus hosts de servidor da web. As respostas 404 e 403 podem ser consideradas corretas porque você está recebendo uma resposta do serviço remoto. ');
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'Serviço remoto');
jr_define ('FIREWALL_CHECK_STATUSCODE', 'Código de status');
jr_define ('FIREWALL_CHECK_IP_NUMBER', 'Número IP');