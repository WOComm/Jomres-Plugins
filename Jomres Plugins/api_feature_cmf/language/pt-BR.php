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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Gerenciamento de Canais");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "O cliente pode realizar atividades de gerenciamento de canal. Observe, isso dá ao cliente um poder considerável no sistema para modificar suas contas e propriedades.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Limpeza");

jr_define ('_CMF_CANCELLED_BOOKING', "O gerente do canal cancelou a reserva");

jr_define ('_CMF_CLEANING_STRING', "Limpeza"); // Não altere isso se você já importou propriedades. As propriedades com taxas de limpeza têm um extra com este nome
jr_define ('_CMF_SECURITY_STRING', "Caução"); // Não altere isso se você já importou propriedades. Propriedades com depósitos de segurança têm um Extra com este nome


jr_define ('_CMF_API_PRIVACY', "Privacidade API");
jr_define ('_CMF_API_PRIVACY_ON', "Privacidade ativada");
jr_define ('_CMF_API_PRIVACY_OFF', "Privacidade desligada");

jr_define ('_CMF_API_PRIVACY_DESC', "As informações de uma propriedade só podem ser vistas pelo canal que a criou. Por exemplo, se você forneceu pares de chaves de API diferentes para o Canal A e Canal B, as informações de uma propriedade criada pelo Canal A não podem ser visto pelo Canal B ... a menos que você desative a privacidade da API para permitir que todos os canais vejam todas as informações da propriedade por meio da API. Defina a privacidade da API como desativada se você estiver compartilhando esta propriedade com outro site que deseja listar a propriedade. Se você não estiver compartilhando esta propriedade com nenhum outro site, deixe a privacidade da API configurada como Ativada. ");