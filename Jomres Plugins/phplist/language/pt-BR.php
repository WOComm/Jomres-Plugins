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


jr_define ('_PHPLIST_INSTRUCTIONS', "Este plugin integra Jomres com PHPList e permite adicionar automaticamente o nome e e-mail dos clientes a uma lista de mala direta quando eles fazem uma reserva.");
jr_define ('_PHPLIST_HSKIPCONFEMAIL', "Pular e-mail de confirmação de inscrição?");
jr_define ('_PHPLIST_HSENDHTMLEMAILS', "Enviar emails em HTML?");
jr_define ('_PHPLIST_HPHPLISTURL', "PHPList URL base da página inicial");
jr_define ('_PHPLIST_HPHPLISTURL_DESC', "O url precisa ter uma barra final e não usar nenhum parâmetro");
jr_define ('_PHPLIST_HUSER', "PHPList nome de usuário do administrador");
jr_define ('_PHPLIST_HPASS', "PHPList senha de administrador");
jr_define ('_PHPLIST_HATTRIB1', "attribute1");
jr_define ('_PHPLIST_HATTRIB1_DESC', "PHPList atributo / nome do campo onde você deseja armazenar o primeiro nome do convidado. Deixe em branco para nenhum.");
jr_define ('_PHPLIST_HATTRIB2', "attribute2");
jr_define ('_PHPLIST_HATTRIB2_DESC', "PHPList nome do atributo / campo onde você deseja armazenar o sobrenome do convidado. Deixe em branco para nenhum.");
jr_define ('_PHPLIST_HLIST_ID', "ID da lista de distribuição");