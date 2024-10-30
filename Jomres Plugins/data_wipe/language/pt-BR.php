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


jr_define ('_JOMRES_DATAWIPE_TITLE', "Limpeza de dados");
jr_define ('_JOMRES_DATAWIPE_DESC', "Este recurso permite que você exclua dados coletados quando as reservas são feitas. Destina-se ao uso por desenvolvedores que criaram muitos dados de desenvolvimento em suas instalações (como reservas de teste, assinaturas) e desejam apaga as informações do sistema, enquanto mantém as informações de propriedade e tarifa. <br/> O plugin irá remover TODOS os logs do cron, favoritos do usuário, notas, reservas, faturas, assinantes, assinaturas, convidados, dados de auditoria, contagem de cliques e avaliações. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Estes dados só podem ser recuperados de uma cópia de backup do seu sistema, então você precisa entender que este é um script muito prejudicial. Como resultado, é recomendado que você o use para o seu propósito propósito de desinstalá-lo novamente em seguida. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Clique para limpar os dados");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Esvaziando");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Esvaziado com sucesso.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Falha ao esvaziar a tabela.");