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


jr_define ('DISALLOW_SYNDICATION_TITLE', "Disallow Syndication");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'O recurso de distribuição Jomres.net é uma nova funcionalidade projetada para compartilhar propriedades entre sites, embora as reservas só possam ser feitas no servidor Home.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "O objetivo é permitir que os sites construam confiança com os motores de busca. É um recurso gratuito, disponível para todos os usuários do Jomres. Os titulares de licenças do Jomres podem, se desejarem, remover seus site da rede de distribuição por meio desta página. Localhost não pode ser adicionado à rede e, se por algum motivo houver um problema de conectividade, você não poderá adicionar seu site à rede. Verifique a página de teste de conectividade da API REST se você estão em dúvida. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Clique neste link para remover seu site da rede.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Clique neste link para adicionar seu site à rede.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Remover este site da rede");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Adicionar este site à rede");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Desculpe, sua chave de suporte não é válida ou não está ativa, você não pode alterar o status de distribuição desta instalação.");