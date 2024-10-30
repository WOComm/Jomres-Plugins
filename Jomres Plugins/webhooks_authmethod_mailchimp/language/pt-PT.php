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


jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Este método de integração atualiza uma Lista Mailchimp quando você adiciona um convidado ao sistema. <br/>
Você não precisa definir a entrada de URL para este webhook, nós descobriremos isso com base em sua API. <br/>
Para configurar este webhook, você precisará de dois itens de informação, uma chave de API e o ID da lista. <br/>
Para encontrar sua chave de API, vá para sua conta Mailchimp e: <br/>
<ol>
  <li> Clique no nome do seu perfil para expandir o painel da conta e escolha Conta. </li>
  <li> Clique no menu suspenso Extras e escolha as chaves de API. </li>
  <li> Copie uma chave de API existente ou clique no botão Criar uma chave. </li>
  <li> Nomeie sua chave de forma descritiva, para saber qual aplicativo usa essa chave. </li>
</ol>
Em seguida, você precisará do Id da lista, que pode ser encontrado visitando suas listas no Mailchimp. Clique no link do menu Listas e, no final da linha à direita, clique no menu suspenso e escolha Configurações. Role até o final da página, ele dirá algo como "Id da lista para lista blahblah". Este é o id da lista que você precisa usar.
    ');

jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Chave API');
jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Listar ID');